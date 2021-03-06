<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $categories = Category::all();
        return response()->json([
            'categories' => $categories
        ],200);
    }

    public function categories()
    {
        $categories = Category::all();
        return view('public/index')->with([
            'categories' => $categories
        ]);
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'category_name' => 'required|min:2|max:50'
        ]);
        $category = new Category();
        $category->category_name = $request->category_name;
        $category->save();
        return ['message' => 'ok'];
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Category $category)
    {
        //
    }

    public function edit(Category $category)
    {
        return response()->json([
            'category' => $category
        ], 200);
    }


    public function update(Request $request, Category $category)
    {
        $this->validate($request, [
            'category_name' => 'required|min:2|max:50'
        ]);

        $category->category_name = $request->category_name;
        $category->save();
    }

    public function destroy(Category $category)
    {
        $category->delete();
    }
}
