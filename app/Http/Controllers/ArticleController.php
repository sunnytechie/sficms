<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\articleCategory;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }

    function index()

    {
        $articles = Article::all();


        return view('article.index', compact('articles'));
    }

    function show($id)
    {
        $article = Article::findOrFail($id);
        return view('article.show', compact('article'));
    }

    function edit($id)
    {
        $article = Article::findOrFail($id);
        return view('article.edit', compact('article'));
    }

    function update(Request $request, Article $article)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required|unique:articles,content',
            'category' => 'required'
        ]);


        $article->title = $request->title;
        $article->content = $request->content;
        $article->user_id =  Auth::user()->id;
        $article->save();

        //next time use this...always..use this...thats the best...try it out, chidi
        // $article->categories()->sync($request->category_id, false); look at https://github.com/jovialcore/laravel-blog-cms/blob/master/app/Http/Controllers/postController.php
        Category::updateOrCreate(['category' => $request->category], ['category' => $request->category]);
        $category_id = Category::where('category', $request->category)->first()->id;
        $article_id =  Article::where('id', $article->id)->first()->id;


        articleCategory::where('article_id', $article->id)->update(['category_id' => $category_id]);
        return redirect()->route('articles.show', ['id' => $article->id ]); //with('msg', 'Post was successfully uploaded. Thank you Queen Esther !!!');;
    }


    function create()
    {
        return view('article.create');
    }

    function compose(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required|unique:articles,content',
            'category' => 'required'
        ]);


        $article = new Article();
        $article->title = $request->title;
        $article->content = $request->content;
        $article->user_id =  Auth::user()->id;
        $article->save();

        Category::updateOrCreate(['category' => $request->category], ['category' => $request->category]);

        $category_id = Category::where('category', $request->category)->first()->id;
        $article_id =  Article::where('title', $request->title)->first()->id;

        articleCategory::updateOrCreate(['article_id' => $article_id, 'category_id' => $category_id]);

        return back()->with('msg', 'Article was successfully uploaded. Thank you !!!');
    }


    public function destroy($id)
    {
        Article::find($id)->delete();
        return back()->with('msg', 'Article was successfully Deleted. Thank you !!!');
    }
}
