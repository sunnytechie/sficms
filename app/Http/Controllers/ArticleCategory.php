<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArticleCategory extends Controller
{
    public function index() {
        return view('article.category.index');
    }
}
