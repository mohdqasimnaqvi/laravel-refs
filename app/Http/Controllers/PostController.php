<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index() {
        $q = Post::latest()->filter(request(['search', 'category', 'author']));
        return view('posts', [ 'posts' => $q->paginate(6), 'categories' => Category::all()]);
    }
    public function show(Post $post) {
        return view('post', [ 'post' => $post ]);
    }
}
