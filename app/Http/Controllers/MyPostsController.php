<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
use Illuminate\Support\Facades\DB;

class MyPostsController extends Controller
{
    public function __construct()
    {
        // User have to be logged in
        $this->middleware('auth');
    }

    // This function will push only auth user posts in /mypost route
    public function index(User $user)
    {
        $published = '';
        $user = auth()->user();

        return view('myposts.index', [
            'user' => $user,
            'published' => $published,
        ]);
    }
}
