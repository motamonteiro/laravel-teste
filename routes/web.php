<?php


use App\Enums\PermissionEnum;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware(['auth'])->group(function () {

    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/meus-dados', 'ProfileController@show')->name('profile.show');
    Route::get('/meus-dados/editar', 'ProfileController@edit')->name('profile.edit');

    Route::middleware(['perm:'. PermissionEnum::USER['value']])->group(function () {

        Route::get('/usuarios', 'UserController@index')->name('users.index');
        Route::get('/usuarios/{usuario}', 'UserController@show')->name('users.show');
        Route::get('/usuarios/{usuario}/editar', 'UserController@edit')->name('users.edit');
        Route::put('/usuarios/{usuario}', 'UserController@update')->name('users.update');
        //Route::resource('users', 'UserController');


    });

    Route::middleware(['perm:'. PermissionEnum::PRODUCT['value']])->group(function () {

        Route::get('/produtos', 'ProductController@index')->name('products.index');

    });

    Route::middleware(['perm:'. PermissionEnum::CATEGORY['value']])->group(function () {

        Route::get('/categorias', 'ProductController@index')->name('categories.index'); /** todo criar CategoryController */

    });

    Route::middleware(['perm:'. PermissionEnum::CATEGORY['value']])->group(function () {

        Route::get('/marcas', 'ProductController@index')->name('brands.index'); /** todo criar BrandController */

    });

});
