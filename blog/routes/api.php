<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();


});

Route::middleware(['auth:sanctum'])->group(function () {
    // User's Posts
    Route::post('user/posts', [UserPostController::class, 'store'])->name('user.posts.store');

    // User's Images
    Route::post('user/images/upload', [UserImageController::class, 'upload'])->name('user.images.upload');
    Route::delete('user/images/{id}', [UserImageController::class, 'destroy'])->name('user.images.destroy');
});

