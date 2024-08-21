<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;

    class PostsController extends Controller
    {
        /**
         * Display a listing of the resource.
         */
        public function index()
        {
            $posts = Post::all();
            return view('welcome' , ['posts' => $posts]);
        }
        
        
        /**
         * Store a newly created resource in storage.
         */
        public function store(Request $request)
        {
            try {
                $validateData = $request->validate([
                    'title' => 'required|string|max:255',
                    'body'  => 'required|string',
                    'slug'  => 'unique'
                ]
                ,
                [
                    'title.required' => 'post title is required',
                    'body.required' => 'post cant be empty',
                    'title.max' => 'post title can\'t be more than 255 characters'     
                ]);
                $post = Post::create($request->all());
                return redirect('/')->with('status', 'Post created successfully!');
            }
            
            catch (Exception $e) {
                Log::error('General error creating post: ' . $e->getMessage());
                return redirect('/')->with('error', 'An unexpected error occurred.');
            }
        }
        
        /**
         * Display the specified resource.
         */
        public function show(string $id)
        {
            $post = Post::findOrFail($id);
            return view('/' , ['posts' => $posts]);
        }

        
        /**
         * Update the specified resource in storage.
         */
        public function update(Request $request, string $id)
        {
            $post = Post::findOrFail($id);
            $post->title = $request->title;
            $post->body = $request->body;

            $post->save();
            return redirect('/')->with('status', 'Post updated successfully!');
        }

        /**
         * Remove the specified resource from storage.
         */
        public function destroy(string $id)
        {
            $post = Post::findOrFail($id);
            $post->delete();
            return redirect('/')->with('status', 'Post deleted successfully!');
        }
    }
