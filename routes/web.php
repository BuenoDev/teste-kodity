<?php
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    // return view('welcome');
    return redirect('/home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


// Route::resource('marca', 'BrandController');

/**
 * Route group com middleware auth para garantir que
 * o usuário esteja autenticado
 * 
 */
Route::group([
    'prefix' => 'marca',
    'middleware' => 'auth'
], function () {
    Route::get('/','BrandController@index');

    /**
     * Define que apenas usuarios de admin poção fazer as operações de
     * modificação de dados de marcas
     */
    Route::group(['middleware' => 'admin'], function () {
        Route::get('/novo','BrandController@create');
        Route::get('/{brand}/editar','BrandController@edit');
        Route::post('/','BrandController@store');
        Route::put('/{brand}','BrandController@update');
        Route::delete('/{brand}','BrandController@destroy');        
    });
});

Route::group([
    'prefix' => 'produto',
    'middleware'=>'auth'
], function () {
    Route::get('/','ProductController@index');
    Route::get('/novo','ProductController@create');
    Route::get('/{product}/editar','ProductController@edit');
    Route::get('/{product}/show','ProductController@show');
    
    Route::post('/','ProductController@store');
    Route::put('/{product}','ProductController@update');
    Route::delete('/{product}','ProductController@destroy');
});

// Route::get('/marca','BrandController@index');
// Route::get('/marca/novo','BrandController@create');
// Route::get('/marca/{brand}/editar','BrandController@edit');
// Route::post('/marca','BrandController@store');
// Route::put('/marca/{brand}','BrandController@update');
// Route::delete('/marca/{brand}','BrandController@destroy');