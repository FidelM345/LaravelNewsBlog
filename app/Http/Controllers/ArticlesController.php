<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;//laravel class for http requests

use App\Article;
use App\Http\Resources\Article as ArticleResource;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Get list of Articles
        $articles=Article::paginate(15);


        //Returns collection of articles as resource
        return ArticleResource::collection($articles);

    }

  
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $article=$request->isMethod('put')?
                                          Article::findOrFail($id): new Article;

        $article->id=$request->article_id;
        $article->title=$request->title;
        $article->body=$request->body;

        if($article-save()){
            return new ArticleResource($aticle);
        }

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
        $article=Article::findOrFail($id);

        
        return new ArticleResource($article);
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

        $article=Article::findOrFail($id);

        if($article->delete()){
            return new ArticleResource($article);
        }

        
      
    }
}
