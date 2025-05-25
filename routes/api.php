<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\admin\Authcontroller;
use App\Http\Controllers\front\homebannercontroller;
use App\Models\User;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/
Route::middleware('auth:sanctum')->get('/getdetails', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->get('/updateuser', function (Request $request) {

    $user = User::find($request->user()->id);

        $user->name = $request->names;
    $user->save();
    return response()->json(['message' => 'User updated successfully']);


});

Route::middleware('auth:sanctum')->get('/logout', function (Request $request) {
    $request->user()->tokens()->delete();
    return response()->json(['message' => 'Logged out successfully']);
});

Route::post('/auth/register', [Authcontroller::class, 'register']);

Route::post('/auth/login', [AuthController::class, 'login']);
// Product Routes
Route::prefix('products')->group(function () {
    // Get all products with pagination
    Route::get('/', [ProductController::class, 'index'])
        ->name('products.index');

    // Create new product
    Route::post('/', [ProductController::class, 'store'])
        ->name('products.store')
        ->middleware('auth:api');

    // Get single product
    Route::get('/{productId}', [ProductController::class, 'show'])
        ->name('products.show')
        ->where('productId', '[0-9]+');

    // Update product
    Route::put('/{productId}', [ProductController::class, 'update'])
        ->name('products.update')

        ->where('productId', '[0-9]+');

    // Delete product
    Route::delete('/{productId}', [ProductController::class, 'destroy'])
        ->name('products.destroy')

        ->where('productId', '[0-9]+');
});

Route::get('/gethomedata',[homebannercontroller::class,'getHomeData']);