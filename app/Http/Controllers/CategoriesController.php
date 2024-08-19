<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('welcome' , ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $category = category::create([
            'category' => $request->category,
            'slug' => $request->slug
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $category_S = Category::findOrFail($id);
        // return view(/*route*/ , ['categories' => $categories]);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $category_U = Post::findOrFail($id);
        $category_U->title = $request->title;
        $category_U->body = $request->body;

        $category_U->save();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category_D = category::findOrFail($id);
        $category_D->delete();
    }
}
