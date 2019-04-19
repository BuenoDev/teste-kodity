<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use App\Http\Resources\ProductResource;
use Illuminate\Support\Facades\DB;

class ProductApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // return Product::all();
        return ProductResource::collection(Product::all());
    }

    public function filter($name,$brand){
        // $query = Product::where('name','like','%'.$name.'%');
        $query = DB::table('products');

        if($name != 'emptyName'){
            $query->where('name','like','%'.$name.'%');
        }
        if($brand != 'all'){
            $query->where('brand_id',$brand);
        }                        
        $products = $query->get();

        //Usando JOIN
        // $products = Product::join('brands','products.brand_id','brands.id')
        //                    ->where('products.name','like','%'.$name.'%')
        //                    ->where('brands.id',$brand)->get();
        return ProductResource::collection($products);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
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
        if($product->image) Storage::delete('/public/products'.$product->image);
        $product->delete();
    }
}
