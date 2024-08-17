<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use Illuminate\Http\Request;

class BlogCategoryController extends Controller
{
    public function index()
    {
        $heading = 'Blog Category';
        $sub_heading = 'You can add your own category';
        $blogs = BlogCategory::all();
        return view('admin.blogcat.index', compact('heading', 'sub_heading', 'blogs'));
    }
    public function store(Request $request)
    {
        $request->validate(['blogcategory' => 'required']);
        BlogCategory::create($request->all());
        return redirect()->back()->with('message', 'blog category created successfully');
    }
    public function destroy($id)
    {
        $record =  BlogCategory::find($id);
        if($record){
            $record->delete();
        }
        return redirect()->back()->with('message', 'blog category deleted successfully');
    }
}
