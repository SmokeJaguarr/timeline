<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Post;
use App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;


class PostsController extends Controller
{
    //
    /*     public function __construct()
    {
        $this->middleware('auth');
    } */

    public function create()
    {

        // Check if user have logged in (need to simplify)
        if (auth()->user()) {
            return view('posts.create');
        } else {
            return redirect('/login');
        }
    }

    public function store(Post $post)
    {


        // Validate data
        $data = request()->validate([
            'title' => ['required', 'max:255'],
            'description' => ['required', 'max:1000'],
            'type' => ['in:News,Article,Press-release'],
        ]);
        // Pass in to database only validated data
        auth()->user()->posts()->create($data);


        return redirect('/');
    }

    public function index(Request $request)
    {
        $searchemail = $request->get('searchemail');


        //Using INNER JOIN to display only published posts and order by publish_date DESC
        $posts = DB::table('post_user')->join('posts', 'posts.id', '=', 'post_user.post_id')
            ->join('users', 'users.id', '=', 'post_user.user_id')
            ->select('posts.*', 'post_user.user_id', 'post_user.created_at as publish_date', 'users.email')->orderBy('publish_date', 'DESC')->get();

        // Overrite $posts if there are email filter applied
        $posts = Controller::SearchEmail($posts, $request);

        return view('posts.index')->with('posts', $posts);
    }

    public function show(Post $post)
    {

        // Check if post is published
        $published = (auth()->user()) ? auth()->user()->publish->contains($post) : false;

        return view('posts.show', compact('post', 'published'));
    }

    public function edit(Post $post)
    {
        // PostPolicy - Users can edit only their own posts
        $this->authorize('update', $post);

        return view('posts.edit', compact('post'));
    }

    public function update(Post $post)
    {
        // PostPolicy - Users can update only their own posts
        $this->authorize('update', $post);

        // Validate data
        $data = request()->validate([
            'title' => ['required', 'max:255'],
            'description' => ['required', 'max:1000'],
            'type' => ['in:News,Article,Press-release'],
        ]);

        // Check if it is authenticated users post
        if (auth()->user() == $post->user) {
            // Pass in database only validated data
            $post->update($data);
        }

        return redirect("/posts/{$post->id}");
    }

    public function delete(Post $post)
    {
        Post::destroy($post->id);
        return redirect('/');
    }
}
