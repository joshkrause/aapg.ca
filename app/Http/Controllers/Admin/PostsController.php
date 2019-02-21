<?php

namespace App\Http\Controllers\Admin;

use App\Post;
use Illuminate\Http\Request;
use UxWeb\SweetAlert\SweetAlert;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Admin\PostCreateRequest;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostCreateRequest $request)
    {
        $post = new Post;


        if($post->create(array_merge($request->all(), ['user_id' => Auth::id()])))
        {
            if ($request->hasFile('image')) {
                $file = $request->image;
                $path = Storage::putFile('images/posts', $file);
                $post->image = $path;
                $post->save();
            }
            SweetAlert::success('Post created successfully', 'Post Created');
        }
        else
        {
            SweetAlert::error('Post was not created. Please correct your errors.', 'Oops!');
            return back();
        }
        return redirect('admin/posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('admin.posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostCreateRequest $request, Post $post)
    {
        if($post->update(array_merge($request->all(), ['user_id' => Auth::id()])))
        {
            if ($request->hasFile('image')) {
                if(!empty($post->image))
                {
                    Storage::delete($post->image);
                }
                $file = $request->image;
                $path = Storage::putFile('images/posts', $file);
                $post->image = $path;
                $post->save();
            }
            SweetAlert::success('Post updated successfully', 'Post Updated');
        }
        else
        {
            SweetAlert::error('Post was not updated. Please correct your errors.', 'Oops!');
            return back();
        }
        return redirect('admin/posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        SweetAlert::success('Post was deleted.', 'Post Deleted!');
        return back();
    }
}
