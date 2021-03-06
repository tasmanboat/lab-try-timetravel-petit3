<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['show', 'index']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $posts = Post::with('user')->get();
        // $count = $posts->count();
        // return view('post.index', compact('posts', 'count'));

        // $posts = Post::with('user')->orderBy('created_at', 'desc')->get();
        // $count = $posts->count();
        // return view('post.index', compact('posts', 'count'));

        $paginator = Post::with('user')->orderBy('created_at', 'desc')->paginate(10);
        $posts = $paginator;
        $count = $paginator->total();
        return view('post.index', compact('posts', 'count'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'content' => 'required',
        ]);

        $post = Auth::user()->posts()->create([
            'title' => $request['title'],
            'content' => $request['content'],
        ]);
        session()->flash('success', 'Post published!');
        return redirect()->route('posts.show', [$post]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('post.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $this->authorize('update', $post->user);
        return view('post.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $this->authorize('update', $post->user);
        $this->validate($request, [
            'title' => 'required',
            'content' => 'required',
        ]);

        $post->update([
            'title' => $request['title'],
            'content' => $request['content'],
        ]);
        session()->flash('success', 'Post updated!');
        return redirect()->route('posts.show', [$post]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $this->authorize('update', $post->user);
        $post->delete();
        session()->flash('success', "Post $post->id has been deleted.");
        // return redirect()->back();
        // return redirect()->route('posts.index');
        return redirect()->route('users.show', $post->user);
    }
}
