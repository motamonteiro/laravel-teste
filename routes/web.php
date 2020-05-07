<?php


use App\Enums\PermissionEnum;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/locale/{locale}', function ($locale) {
    if (! in_array($locale, ['en', 'pt-BR'])) {
        abort(400);
    }
    App::setLocale($locale);
    return view('welcome');
});

Auth::routes();

Route::middleware(['auth'])->group(function () {

    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('/profile', 'ProfileController@show')->name('profile.show');
    Route::get('/profile/edit', 'ProfileController@edit')->name('profile.edit');
    Route::put('/profile/edit', 'ProfileController@update')->name('profile.update');
    Route::delete('/profile', 'ProfileController@destroy')->name('profile.destroy');

    Route::middleware(['perm:'. PermissionEnum::USER['value']])->group(function () {
        Route::resource('users', 'UserController');
        Route::get('/users/{user}/delete', 'UserController@delete')->name('users.delete');

        Route::get('/user-permissions/{user}/edit', 'UserPermissionController@edit')->name('user-permissions.edit');
        Route::put('/user-permissions/{user}', 'UserPermissionController@update')->name('user-permissions.update');

    });

    Route::middleware(['perm:'. PermissionEnum::PRODUCT['value']])->group(function () {
        Route::resource('products', 'ProductController');
        Route::get('/products/{id}/delete', 'ProductController@delete')->name('products.delete');

    });

    Route::middleware(['perm:'. PermissionEnum::CATEGORY['value']])->group(function () {
        Route::resource('categories', 'CategoryController');
        Route::get('/categories/{id}/delete', 'CategoryController@delete')->name('categories.delete');
    });

    Route::middleware(['perm:'. PermissionEnum::BRAND['value']])->group(function () {
        Route::resource('brands', 'BrandController');
        Route::get('/brands/{id}/delete', 'BrandController@delete')->name('brands.delete');
    });

});
