<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    // Phương thức để lấy tất cả người dùng
    public function index()
    {
        $users = [
            [
                'name' => 'rady',
                'posts' => ['Hello !', 'Good bye !'],
            ],
            [
                'name' => 'him',
                'posts' => ['How are you ?', 'I love mangos !'],
            ],
        ];

        return response()->json($users);
    }

    // Phương thức để lấy người dùng theo index
    public function showByIndex($userIndex)
    {
        $users = [
            [
                'name' => 'rady',
                'posts' => ['Hello !', 'Good bye !'],
            ],
            [
                'name' => 'him',
                'posts' => ['How are you ?', 'I love mangos !'],
            ],
        ];

        if (!isset($users[$userIndex])) {
            return response()->json(['error' => 'User not found'], 404);
        }

        return response()->json($users[$userIndex]);
    }


    // Phương thức để lấy người dùng theo tên
    public function showByName($userName)
    {
        $users = [
            [
                'name' => 'rady',
                'posts' => ['Hello !', 'Good bye !'],
            ],
            [
                'name' => 'him',
                'posts' => ['How are you ?', 'I love mangos !'],
            ],
        ];

        foreach ($users as $user) {
            if ($user['name'] === $userName) {
                return response()->json($user);
            }
        }

        return response()->json(['error' => 'User not found'], 404);
    }

    // Phương thức để lấy bài viết của người dùng theo index
    public function getPostByIndex($userIndex, $postIndex)
    {
        $users = [
            [
                'name' => 'rady',
                'posts' => ['Hello !', 'Good bye !'],
            ],
            [
                'name' => 'him',
                'posts' => ['How are you ?', 'I love mangos !'],
            ],
        ];

        // Kiểm tra xem userIndex và postIndex có hợp lệ không
        if (!isset($users[$userIndex]) || !isset($users[$userIndex]['posts'][$postIndex])) {
            return response()->json(['error' => 'User or post not found'], 404);
        }

        // Trả về bài đăng của userIndex có index là postIndex
        return response()->json($users[$userIndex]['posts'][$postIndex]);
    }

    // Phương thức để lấy bài viết của người dùng theo tên
    public function getPostByName($userName, $postIndex)
    {
        $users = [
            [
                'name' => 'rady',
                'posts' => ['Hello !', 'Good bye !'],
            ],
            [
                'name' => 'him',
                'posts' => ['How are you ?', 'I love mangos !'],
            ],
        ];
        // Tìm kiếm người dùng trong mảng $users bằng tên
        $user = collect($this->$users)->firstWhere('name', $userName);

        // Kiểm tra xem người dùng có tồn tại không
        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }

        // Kiểm tra xem chỉ số bài viết có hợp lệ không
        if (!isset($user['posts'][$postIndex])) {
            return response()->json(['error' => 'Post not found'], 404);
        }

        // Trả về bài viết
        return response()->json(['post' => $user['posts'][$postIndex]]);
    }
}
