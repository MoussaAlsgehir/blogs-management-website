<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;

class ThemeController extends Controller
{

    public function index()
    {
        $blogs = Blog::latest()->paginate(4);
        $sliderBlogs = Blog::latest()->take(3)->get();
        return view('theme.index', compact('blogs', 'sliderBlogs'));
    }
    public function category($id)
    {
        $categoryName = Category::find($id)->name;
        $blogs = Blog::where('category_id', $id)->latest()->paginate(8);
        return view('theme.category', compact('blogs', 'categoryName'));
    }
    public function contact()
    {
        return view('theme.contact');
    }
    public function login()
    {
        return view('theme.login');
    }
    public function register()
    {
        return view('theme.register');
    }

    // public function blog_details()
    // {
    //     return view('theme.blog-details');
    // }
}
