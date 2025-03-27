<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
use Illuminate\Http\Request;
use App\Models\schools;
use App\Models\Post;

class BlogController extends Controller
{
    public function index() : object
    {
        $posts = Post::latest()->paginate(9);
        return view('info_blog.index', compact('posts'));
    }

    public function show($id) : object
    {
        $post = Post::findOrFail($id);
        return view('info_blog.show', compact('post'));
    }

}
