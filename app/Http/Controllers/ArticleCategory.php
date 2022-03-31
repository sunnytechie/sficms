<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class ArticleCategory extends Controller
{
    public function index()
    {
        $active = 'article';
        $categories = Category::all();
        return view('article.category.index', compact('categories', 'active'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'category' => 'required|unique:categories',
        ]);
        $category = new Category();
        $category->category = $request->category;
        $category->save();
        return redirect()->route('article.category.index');
    }

    public function update(Request $request, Category $category)
    {
        $this->validate($request, [
            'category' => 'required'
        ]);
        Category::where('id', $category->id)->update(['category' => $request->category]);
        return response()->json(['status' => 'success']);
    }

    public function destroy($id)
    {
        Category::find($id)->delete();
        return back()->with('msg', 'Category was successfully Deleted. Thank you !!!');
    }
}
