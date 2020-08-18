<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PublishController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    //
    public function store(Post $post)
    {
        auth()->user()->publish()->toggle($post);
    }
}
