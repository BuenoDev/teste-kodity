<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Brand;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    private $abortMessage = 'Apenas o usuário que cadastrou o produto ou o administrador tem acesso';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('products.index')->withProducts(Product::all());
                                     
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        
        return view('products.create')->withBrands(Brand::all());;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        //TODO: images
        
        $product = $request->validate([
            'name'=>['string','min:2','required'],
            'description' =>  ['string','min:5','required'],
            'brand_id'=> ['required'],
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        // unset($product['image']);
            
        if($request->hasFile("image")){
            $path = $request->file('image')->store('/public/products');
            $product['image'] = explode('/',$path)[2];
        }
        
        $product['user_id'] = Auth::user()->id;
        Product::create($product);

        return redirect('/produto');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        // Mostrar produto com imagem
        // abort(404);
        return view('products.show')->withProduct($product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
        abort_unless(Auth::user()->type == 1 || Auth::user() == $product->user,403,$this->abortMessage);



        return view('products.edit')->withProduct($product)->withBrands(Brand::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
        abort_unless(Auth::user()->type == 1 || Auth::user() == $product->user,403,$this->abortMessage);


        $validatedData = $request->validate([
            'name'=>['string','min:2','required'],
            'description' =>  ['string','min:10'],
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        /**
         * Salva a imagem
         */
        if($request->hasFile('image')){
            if($product->image){
                Storage::delete('/public/products'.$product->image);
            }
            $path = $request->file('image')->store('/public/products');
            $validatedData['image'] = explode('/',$path)[2];
        }

        $product->update($validatedData);
        
        return redirect('/produto');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
        abort_unless(Auth::user()->type == 1 || Auth::user() == $product->user,403,$this->abortMessage);

        
        $product->delete();

        return redirect('/produto');
    }
}
