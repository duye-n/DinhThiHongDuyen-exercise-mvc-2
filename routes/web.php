<?php

use App\Http\Controllers\FruitController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});



Route::get('/myview/{user}', function ($user) {
    return view('home', ['username' => $user]);
});

use App\Models\Fruit;

Route::get('/fruits', function () {
    return Fruit::all();
});
Route::get('/showFruits', [FruitController::class, 'getFruits']);
// Route::prefix('api')->group(function () {
//     // Route để lấy tất cả người dùng
//     Route::get('/user', [UserController::class, 'index']);

//     // Route để lấy người dùng theo tên
//     Route::get('/user/{userName}', [UserController::class, 'showByName']);

//     // Route fallback cho các yêu cầu không chính xác
//     Route::fallback(function () {
//         return "You cannot get the user like this";
//     });
// });


// Route::prefix('user')->group(function () {
//     // Route để lấy bài viết theo chỉ số bài viết và chỉ số người dùng
//     Route::get('/{userIndex}/post/{postIndex}', [UserController::class, 'getPostByIndex']);

//     // Route để lấy bài viết theo tên người dùng và chỉ số bài viết
//     Route::get('/{userName}/post/{postIndex}', [UserController::class, 'getPostByName']);

//     // Route fallback cho các yêu cầu không hợp lệ
//     Route::fallback(function () {
//         return response()->json(['error' => 'Invalid request'], 400);
//     });
// });
