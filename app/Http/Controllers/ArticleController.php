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
            'content' => 'required',
            'category' => 'required'
        ]);

        $article = new Article();
        $article->title = $request->title;
        $article->content = $request->content;
        $category_id = Category::where('category', $request->category)->first();
        if (!$category_id) {
            $category_id = Category::create(['category' => $request->category])->id;
            $article->category_id = $category_id;
        }
        $article->user_id =  Auth::user()->id;
        $article->save();

        return back()->with('msg', 'Post was successfully uploaded. Thank you Queen Esther !!!');
    }
}
