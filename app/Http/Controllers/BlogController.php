<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBlogRequest;
use App\Http\Requests\UpdateBlogRequest;
use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{

    public function __construct()
    {
        // $this->middleware('auth')->only(['create']);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (Auth::check()) {
            $categories = Category::all();
            return view('theme.blogs.create', compact('categories'));
        } else
            return to_route('login');
        //     if(Auth::check()) {
        //         $categories = Category::all();
        //         return view('theme.blogs.create', compact('categories'));
        //     }
        //         abort(403, 'Unauthorized action.');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBlogRequest $request)
    {
        //
        $dataBlog = $request->validated();

        // dd($dataBlog);
        //getImage
        $image = $request->image;
        //cahnge name image
        $newImageName = time() . '-' . $image->getClientOriginalName();
        //move image to public folder
        $image->storeAs('blogs', $newImageName, 'public');
        //save data to database
        $dataBlog['image'] = $newImageName;
        $dataBlog['user_id'] = Auth::user()->id;

        Blog::create($dataBlog);

        return back()->with('successNewBlog', 'Blog created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        return view('theme.blog-details', compact('blog'));
    }

    public function myBlogs()
    {
        if (Auth::check()) {

            $blogs = Blog::where('user_id', Auth::user()->id)->paginate(5);
            return view('theme.blogs.my-blogs', compact('blogs'));
        }
        return to_route('login');
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {

        if (Auth::check()) {
            if ($blog->user->id != Auth::user()->id) {
                abort(403, 'Unauthorized action.');
            }
            $categories = Category::all();
            return view('theme.blogs.edit', compact('categories', 'blog'));
        } else
            return to_route('login');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBlogRequest $request, Blog $blog)
    {

        if (Auth::check()) {
            if ($blog->user->id != Auth::user()->id) {
                abort(403, 'Unauthorized action.');
            }

            $dataBlog = $request->validated();

            if ($request->hasFile('image')) {

                Storage::disk('public')->delete("blogs/$blog->image");
                //getImage
                $image = $request->image;
                //cahnge name image
                $newImageName = time() . '-' . $image->getClientOriginalName();
                //move image to public folder
                $image->storeAs('blogs', $newImageName, 'public');
                //save data to datlarabase
                $dataBlog['image'] = $newImageName;
            }

            $blog->update($dataBlog);

            return back()->with('successEditBlog', 'Blog Updated successfully!');
        }
        return to_route('login');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        if (Auth::check()) {
            if ($blog->user->id != Auth::user()->id) {
                abort(403, 'Unauthorized action.');
            }
            Storage::disk('public')->delete("blogs/$blog->image");
            $blog->delete();
            return back()->with('successDeleteBlog', 'Blog Deleted successfully!');
        }
        return to_route('login');
    }
}
