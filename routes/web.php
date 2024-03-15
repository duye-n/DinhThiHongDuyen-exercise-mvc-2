<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Models\User;


Route::get('/', function () {
    return view('welcome');
});

// Route::get('/', function () {
//     global $users;
//     // Convert the array to a string
//     $usersString = implode(', ', array_column($users, 'name'));
//     return "The users are: " . $usersString;
// });
// Route::get('/api/user', function () {
//     global $users;
//     return $users;
// });
// Route::get('/api/user/{userIndex}', function ($userIndex) {
//     global $users;

//     if (!isset($users[$userIndex])) {
//         return response()->json(['error' => 'User not found'], 404);
//     }

//     return $users[$userIndex];
// });
// Route::get('/api/user/{userName}', function ($userName) {
//     global $users;

//     foreach ($users as $user) {
//         if ($user['name'] === $userName) {
//             return response()->json($user);
//         }
//     }

//     return response()->json(['error' => 'User not found'], 404);
// });




// Định nghĩa nhóm route với prefix 'user'
// Route::prefix('api')->group(function () {
//     // Route để lấy tất cả người dùng
//     Route::get('/user', [UserController::class, 'index']);

//     // Route để lấy người dùng theo index
//     // Route::get('/user/{userIndex}', [UserController::class, 'showByIndex']);

//     // Route để lấy người dùng theo tên
//     Route::get('/user/{userName}', [UserController::class, 'showByName']);

//     // Route fallback cho các yêu cầu không chính xác
//     Route::fallback(function () {
//         return "You cannot get the user like this";
//     });
// });
// Route::prefix('user')->group(function () {
//     // Route để lấy bài đăng của một người dùng theo index
//     Route::get('/{userIndex}/post/{postIndex}', [UserController::class, 'getPostByIndex']);

//     // Route fallback cho các yêu cầu không chính xác
//     Route::fallback(function () {
//         return response()->json(['error' => 'Invalid request'], 400);
//     });
// });

Route::prefix('user')->group(function () {
    // Route để lấy bài viết theo chỉ số bài viết và chỉ số người dùng
    Route::get('/{userIndex}/post/{postIndex}', [UserController::class, 'getPostByIndex']);

    // Route để lấy bài viết theo tên người dùng và chỉ số bài viết
    Route::get('/{userName}/post/{postIndex}', [UserController::class, 'getPostByName']);

    // Route fallback cho các yêu cầu không hợp lệ
    Route::fallback(function () {
        return response()->json(['error' => 'Invalid request'], 400);
    });
});

