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
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blog $blog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        //
    }
}
