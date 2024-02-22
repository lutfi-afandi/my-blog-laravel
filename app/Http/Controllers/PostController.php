<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        // dd(request('search'));
        return view('post', [
            'title' => 'Semua Postingan ',
            'active' => 'posts',
            // 'posts' => Post::all()
            'posts' => Post::latest()->filter(request(['search', 'category', 'author']))->paginate(7)->withQueryString()
        ]);
    }

    public function show(Post $post)
    {
        return view('postingan', [
            'title' => 'Single Postingan',
            'active' => 'posts',
            'post' => $post
        ]);
    }
}
