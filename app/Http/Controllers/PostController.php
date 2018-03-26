<?php

namespace App\Http\Controllers;

use Auth;
use App\Tag;
use App\Post;
use App\Tagcategory;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Label;
use Illuminate\Support\Facades\Redirect;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tagcategories = Tagcategory::get();
        $posts = Post::orderBy('updated_at','desc')->get();
        return view('post.index', compact('posts', 'tagcategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tagcategories = Tagcategory::with('tags')->get();
        return view('post.create', compact('tagcategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(), [
            'title' => 'required|min:3|max:140',
            'body' => 'required|min:10'
        ]);

        $post = Post::create([
            'title' => $request->title,
            'body' => $request->body,
            'user_id' => Auth::user()->id,
        ]);

        if(isset($request->tags)){
            foreach($request->tags as $tag) {
                $post->tags()->save(Tag::find($tag));
            }
        }
        
        return Redirect::route('post.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('post.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $tagcategories = Tagcategory::with('tags')->get();
        return view('post.edit', compact('post', 'tagcategories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        // return $request;

        $this->validate(request(), [
            'title' => 'required|min:3|max:140',
            'body' => 'required|min:10'
        ]);

        $post->title = $request->title;
        $post->body = $request->body;
        $post->save();

        $post->tags()->sync([]);

        if(isset($request->tags)){
            foreach($request->tags as $tag) {
                $post->tags()->save(Tag::find($tag));
            }
        }

        return Redirect::route('post.show', $post);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
