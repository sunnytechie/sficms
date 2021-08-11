<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    function index()


    {


        return view('article.index');
    }

    function show()
    {


        return view('article.show');
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
        $category_id = Category::where('category', $request->category)->first();

        $category_id = Category::updateOrCreate(['category' => $request->category,], ['article_id' => 1])->id;
        $article->category_id = $category_id;

        $article->save();
        if ($article->save()) {
            $article_id =  Article::where('title', $request->title)->first()->id;
            Category::where('category', $request->category)->update(['article_id' => $article_id]);
        }

        return back()->with('msg', 'Post was successfully uploaded. Thank you Queen Esther !!!');
    }
}
