<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Inertia\Inertia;

class BlogController extends Controller
{
    const TAG_OPTIONS = [
        'あああああ',
        'いいいいい',
        'ううううう',
        'えええええ',
        'おおおおお',
    ];

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Blog::all();

        return Inertia::render(
            'Blogs/Index',
            [
                'blogs' => $blogs
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render(
            'Blogs/Create',
            [
                'tags_options' => self::TAG_OPTIONS
            ]
        );

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255',
            'content' => 'required',
        ]);

        Blog::create([
            'title' => $request->title,
            'slug' => \Str::slug($request->slug),
            'tags' => $request->tags,
            'content' => $request->content
        ]);

        return to_route('blogs.index')->with('message', 'Blog Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        return Inertia::render(
            'Blogs/Edit',
            [
                'blog' => $blog,
                'tags_options' => self::TAG_OPTIONS
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blog $blog)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255',
            'content' => 'required',
        ]);

        $blog->title = $request->title;
        $blog->slug = \Str::slug($request->slug);
        $blog->tags = $request->tags;
        $blog->content = $request->content;
        $blog->save();

        return to_route('blogs.index')->with('message', 'Blog Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        $blog->delete();

        return to_route('blogs.index')->with('message', 'Blog Delete Successfully');
    }
}