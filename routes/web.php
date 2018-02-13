<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
!
|
*/

Route::get('/', function () {
    return view('home');
})->name('/');
Route::get('/', function () {
    return view('home');
})->name('getHome');
Route::get('home/{user}', function () {
    return view('home', ['user'=>Auth::user()]);
})->name('home');
Route::get('/lien-he', function () {
    return view('lien-he');
});
Route::get('/translate', function () {
    return view('translate');
});
Route::get('/quy-dinh-dat-hang', function () {
    return view('quy-dinh-dat-hang');
});
Route::get('/huong-dan-dat-hang', function () {
    return view('huong-dan-dat-hang');
});
Route::get('/bang-gia', function () {
    return view('bang-gia');
});
Route::get('/gioi-thieu', function () {
    return view('gioi-thieu');
});
Route::get('/tuyen-dung', function () {
    return view('tuyen-dung');
});
Route::get('/gethtml', function () {
    return view('gethtml');
});
Route::get('/error', function () {
    return view('error');
});


///////////////////////////////// ROUTE AJAX  //////////////////////////////////////////
Route::get('/get-link','Controller@getLink');
Route::post('/postlink',['as'=>'postlink','uses'=>'Controller@postlink']);

Route::post('/getprice',['as'=>'getprice','uses'=>'Controller@getprice']);

Route::post('/getRate',['as'=>'getRate','uses'=>'ConfigController@getRate']);
Route::post('/getAllRate',['as'=>'getAllRate','uses'=>'ConfigController@getAllRate']);

Route::post('/addProduct',['as'=>'addProduct','uses'=>'ProductController@addProduct']);

Route::post('/translate',['as'=>'translate','uses'=>'Controller@postTranslate']);

///////////////////////////////////////////////////////////////////////////////////////////

Route::get('/changePassword',['as'=>'changePassword','uses'=>'AuthController@changePassword']);

Route::get('/user-information',['as'=>'user-information','uses'=>'UserController@getUserInformation']);
Route::post('/user-information',['as'=>'user-information','uses'=>'UserController@updateUserInformation']);

Route::get('/danhsachdonhang', 'OrderController@danhsachdonhang')->name('danhsachdonhang');
Route::get('/danhsachsanpham/{order_id}', 'ProductController@danhsachsanpham')->name('danhsachsanpham');

Route::get('/change-password',['as'=>'change-password','uses'=>'UserController@getChangePassword']);
Route::post('/change-password',['as'=>'change-password','uses'=>'UserController@updatePassword']);

//THUONG

//THuong
Route::post('login', 'AuthController@login')->name('login');

Route::get('logout', 'AuthController@logout');
Route::post('signup', 'AuthController@signup')->name('signup');

//BIEN
Route::get('/',['as'=>'getHome','uses'=>'Controller@indexAction']);

// Managerment

Route::group(['prefix'=>'admin', 'middleware'=>'staff'], function(){
    Route::get('/index',['as'=>'admin.index','uses'=>'AdminController@indexAction']);
    Route::get('/order',['as'=>'admin.order','uses'=>'AdminController@orderAction']);
    Route::get('/order/detail/{order_id}',['as'=>'admin.order.detail','uses'=>'AdminController@orderActionDetail']);
    Route::get('/order/delete/{order_id}',['as'=>'admin.order.delete','uses'=>'AdminController@orderActionDelete']);
    Route::get('/order/edit/{order_id}',['as'=>'admin.order.edit','uses'=>'AdminController@orderActionEdit']);
    Route::group(['prefix'=>'user', 'middleware'=>'admin'],function(){

///////////////////////////////// ROUTE LIST USER  //////////////////////////////////////////      
      Route::get('edit/{id}',['as'=>'admin.user.getEdit','uses'=>'UserController@getEdit']);
      Route::post('edit',['as'=>'admin.user.postEdit','uses'=>'UserController@postEdit']);
      Route::get('list',['as'=>'admin.user.list','uses'=>'UserController@getListUser']);
      Route::get('delete/{id}',['as'=>'admin.user.delete','uses'=>'UserController@getDelete']);
      Route::post('active',['as'=>'admin.user.active','uses'=>'UserController@active']);
      Route::any('{all?}',function(){
              return view('error');
      });
    });
///////////////////////////////// ROUTE CONFIG  ////////////////////////////////////////// 
    Route::group(['prefix'=>'config', 'middleware'=>'admin'],function(){  
      Route::get('/list-rate', 'ConfigController@getRateView')->name('admin.config.rate');
      Route::post('getAllRate',['as'=>'getAllRate','uses'=>'ConfigController@getAllRate']);
      Route::post('addRate',['as'=>'addRate','uses'=>'ConfigController@addRate']);
      Route::post('editRate',['as'=>'editRate','uses'=>'ConfigController@editRate']);
      Route::post('deleteRate',['as'=>'deleteRate','uses'=>'ConfigController@deleteRate']);
      Route::any('{all?}',function(){
                return view('error');
        });
    });
});