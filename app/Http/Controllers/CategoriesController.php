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
        try {
            $validateData = $request->validate([
                'name' => 'required|string|max:255',
                'slug'  => 'unique'
            ]
            ,
            [
                'name.required' => 'category name is required',
                'name.max' => 'category name can\'t be more than 255 characters' 
            ]);
            $category = Category::create($request->all());
            return redirect('/')->with('status', 'Category created successfully!');
        }
        
        catch (Exception $e) {
            Log::error('General error creating category: ' . $e->getMessage());
            return redirect('/')->with('error', 'An unexpected error occurred.');
        }
    }
    
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $category = Category::findOrFail($id);
        return view('/' , ['category' => $category]);
    }
    
    
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $category = Category::findOrFail($id);
        $category->name = $request->name;

        $category->save();
        
        return redirect('/')->with('status', 'Category updated successfully!');
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect('/')->with('status', 'Category deleted successfully!');
    }
}
