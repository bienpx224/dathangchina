<?php

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
    return view('home');
});
Route::get('/lien-he', function () {
    return view('lien-he');
});
Route::get('/translate', function () {
    return view('translate');
});
Route::get('/quy-dinh-dat-hang', function () {
    return view('quy-dinh-dat-hang');
});
Route::get('/bang-gia', function () {
    return view('bang-gia');
});
Route::get('/get-link', function () {
    return view('tao-don-hang');
});
// Route::get('translate/{link}',['as'=>'translate','uses'=>'Controller@getTranslate']);
Route::post('/translate',['as'=>'translate','uses'=>'Controller@postTranslate']);