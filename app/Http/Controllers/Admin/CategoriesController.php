<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;

class CategoriesController extends Controller
{
    public function create()
    {
        return view('backend.categories.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
           'name' => 'required|min:3'
        ]);
        $category = new Category;
        $category->name = $request->get('name');

        $category->save();

        return redirect('/admin/categories/create')->with('status','A new category has been created');
    }

    public function index()
    {
        $categories = Category::all();
        return view('backend.categories.index')->with('categories',$categories);
    }
}
