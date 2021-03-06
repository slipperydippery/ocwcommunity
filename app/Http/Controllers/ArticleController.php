<?php

namespace App\Http\Controllers;

use Auth;
use App\Article;
use App\Paragraph;
use Carbon\Carbon;
use App\Permission;
use App\Articleitem;
use App\Contributor;
use Illuminate\Http\Request;

class ArticleController extends Controller
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
        $articles = Article::with('author')->get();
        return view('article.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $article = Article::create([
            'title' => '[nieuw artikel]',
            'simple' => false,
            'published_at' => Carbon::now(),
        ]);

        $order = $article->contributors->count();

        $contributor = Contributor::create([
            'user_id' => Auth::user()->id,
            'article_id' => $article->id,
            'permission_id' => Permission::where('name', 'author')->first()->id,
            'order' => $order,
        ]);

        return redirect()->route('article.edit', $article);
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

        $article = Article::create([
            'title' => $request->title,
            'body' => $request->body,
        ]);

        $contributor = Contributor::create([
            'user_id' => Auth::user()->id,
            'article_id' => $article->id,
            'permission_id' => Permission::where('role', 'author')->first()->id,
        ]);
        $contributor->save();
        return $contributor;

        return redirect()->route('article.show', $article);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        return view ('article.show', compact($article));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        $article = Article::with('articleitems.articleitemable')->find($article->id);
        return view ('article.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        //
    }
}
