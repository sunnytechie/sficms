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
        $article->save();

        $category =  new Category();
        $category->category = $request->category;
        $category->save();
        $category_id = Category::where('category', $request->category)->first()->id;
        $article_id =  Article::where('title', $request->title)->first()->id;

        articleCategory::create(['article_id' => $article_id, 'category_id' => $category_id]);

        return back()->with('msg', 'Post was successfully uploaded. Thank you Queen Esther !!!');
    }
}
