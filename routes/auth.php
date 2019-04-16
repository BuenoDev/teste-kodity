<?php
use Illuminate\Support\Facades\Route;

/**
 * Esse arquivo contem todas as rotas web
 * que necessitam de autenticação de usuário
 * através do midleware auth
 * 
 */


Route::get('/marca','BrandController@index');
Route::get('/marca/novo','BrandController@create');
Route::get('/marca/{brand}/editar','BrandController@edit');
Route::post('/marca','BrandController@store');
Route::put('/marca/{brand}','BrandController@update');
Route::delete('/marca/{brand}','BrandController@destroy');

Route::resource('produto', 'ProductController');
