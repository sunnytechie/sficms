<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArticleController extends Controller
{
    function index()
    {
        return view('article.index');
    }

    function show() {


        return view('article.show');
    }


    function create() {
        return view('article.create');
    }
}
