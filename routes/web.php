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



// Route::get('translate/{link}',['as'=>'translate','uses'=>'Controller@getTranslate']);

Route::get('/get-link',['as'=>'get-link','uses'=>'Controller@getLink']);
Route::post('/get-link',['as'=>'post-link','uses'=>'Controller@postLink']);

Route::post('/translate',['as'=>'translate','uses'=>'Controller@postTranslate']);
Route::get('/changePassword',['as'=>'changePassword','uses'=>'AuthController@changePassword']);

Route::get('/user-information',['as'=>'user-information','uses'=>'UserController@getUserInformation']);
Route::post('/user-information',['as'=>'user-information','uses'=>'UserController@updateUserInformation']);

Route::get('/change-password',['as'=>'change-password','uses'=>'UserController@getChangePassword']);
Route::post('/change-password',['as'=>'change-password','uses'=>'UserController@updatePassword']);

//THUONG

//THuong
Route::post('login', 'AuthController@login')->name('login');

Route::get('logout', 'AuthController@logout');
Route::post('signup', 'AuthController@signup')->name('signup');

//BIEN
Route::get('/',['as'=>'getHome','uses'=>'Controller@indexAction']);

// ADMIN

Route::group(['prefix'=>'admin', 'middleware'=>'staff'], function(){
    Route::get('/index',['as'=>'admin.index','uses'=>'AdminController@indexAction']);
    Route::group(['prefix'=>'user', 'middleware'=>'admin'],function(){
      // Route::get('add',['as'=>'admin.user.getAdd','uses'=>'AdminController@getAdd']);
      // Route::post('add',['as'=>'admin.user.postAdd','uses'=>'AdminController@postAdd']);
      Route::get('edit/{id}',['as'=>'admin.user.getEdit','uses'=>'UserController@getEdit']);
      Route::post('edit',['as'=>'admin.user.postEdit','uses'=>'UserController@postEdit']);
      Route::get('list',['as'=>'admin.user.list','uses'=>'UserController@getListUser']);
      Route::get('delete/{id}',['as'=>'admin.user.delete','uses'=>'UserController@getDelete']);
      Route::post('active',['as'=>'admin.user.active','uses'=>'UserController@active']);

        Route::any('{all?}',function(){
                return view('error');
        });
    });
});