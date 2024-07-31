<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $posts = Post::paginate(25);
        return view('admin.posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $post = new Post();
        $categories = Category::all();
        return view('admin.posts.create', compact('post','categories'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        //
        $data = $request->validated();



        $data ['author'] = Auth:: user()->name;
        $data ['creation_date'] = Carbon::now();
        $newPost = Post::create($data);

        return redirect()->route('admin.posts.show', $newPost);
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $categories = Category::all();
        return view('admin.posts.edit', compact('post','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $data = $request ->validated();
        $newPost =$post->update($data);

        return redirect()->route('admin.posts.show', $post);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('admin.posts.index');
    }
}
