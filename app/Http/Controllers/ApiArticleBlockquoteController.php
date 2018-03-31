<?php

namespace App\Http\Controllers;

use App\Article;
use App\Blockquote;
use App\Articleitem;
use Illuminate\Http\Request;

class ApiArticleBlockquoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Article $article, Request $request)
    {
        $blockquote = Blockquote::create([
            'quote' => $request->blockquote,
        ]);

        $articleitem = Articleitem::create([
            'order' => $request->order,
            'article_id' => $article->id,
            'articleitemable_id' => $blockquote->id,
            'articleitemable_type' => 'App\\Blockquote'
        ]);

        $articleitem = Articleitem::with('articleitemable')->find($articleitem->id);

        return $articleitem;
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
