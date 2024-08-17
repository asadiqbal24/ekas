<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::all();
        return view('blog.index' , compact('blogs'));
    }
    public function details($id)
    {
        $blog = Blog::findOrFail($id);
        return view('blog.details' , compact('blog'));
    }
}
