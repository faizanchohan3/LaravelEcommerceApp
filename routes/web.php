<?php

use App\Http\Controllers\admin\Authcontroller;
use App\Http\Controllers\Admin\categorycontroller;
use App\Http\Controllers\admin\homecontroller;
use App\Http\Controllers\admin\productcontroller;
use App\Http\Controllers\AttributeController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ColorController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AttributevalueController;
use App\Http\Controllers\admin\sizecontroller;

Route::get('/createadmin', [Authcontroller::class, 'createAdmin']);
Route::get('/login', function () {

    return view('auth.signinn');
});
Route::post('/registration_process', [Authcontroller::class, 'loginuser']);
//ADMIN PROFILE

Route::middleware('admin')->group(function () {

    Route::get('/admin/dashboard', function () {
        return view('admin/index');
    });

    Route::get('admin/brands', [BrandController::class, 'index']);
    Route::get('admin/products', [productcontroller::class, 'index']);
    Route::post('admin/getcategoryattributes', [productcontroller::class, 'attributes']);

    Route::get('admin/manage_products/{id?}', [productcontroller::class, 'manage_index']);

    Route::post('admin/addbrands', [BrandController::class, 'store']);
    Route::get('admin/homebanner', [homecontroller::class, 'index']);

    Route::get('admin/Sizeprofile', [sizecontroller::class, 'index']);
    Route::get('admin/attributes', [AttributeController::class, 'index']);
    Route::get('admin/attributevalue', [AttributevalueController::class, 'index']);
    Route::get('admin/categories', [categorycontroller::class, 'index']);
    Route::get('admin/Color', [ColorController::class, 'index']);
    Route::get('/admin/profile', function () {

        return view('admin/userprofile');
    });
    Route::get('admin/categoryattribute', [categorycontroller::class, 'categoryattributeindex']);
    Route::post('/admin/addcatattri', [categorycontroller::class, 'storeaddcatattri']);
    Route::post('/admin/saveproduct', [productcontroller::class, 'store']);
    Route::get('/logout', function () {

        Auth::logout();
        return redirect('login');
    });
    Route::get('admin/deletedata/{id?}/{table?}', [homecontroller::class, 'destroy']);

    Route::get('/', function () {
        return redirect('admin/dashboard');
    });
    Route::get('apidocs', function () {
        return view('apidocs');
    });

    Route::post('admin/addsize', [sizecontroller::class, 'store']);
    Route::post('admin/addcategories', [categorycontroller::class, 'store']);

    Route::post('admin/addColor', [ColorController::class, 'store']);

    Route::post('/admin/saveprofilechanges', [Authcontroller::class, 'saveprofile']);
    Route::post('/admin/addattributes', [Attributecontroller::class, 'store']);

    Route::post('/admin/addattributesvalues', [Attributevaluecontroller::class, 'store']);

    Route::post('/admin/upload-image', [App\Http\Controllers\Admin\ProductController::class, 'uploadImage'])->name('admin.upload.image');
});


Route::get('/', function () {

    return view('index');
});


