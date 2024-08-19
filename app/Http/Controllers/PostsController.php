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
            $post = Post::create([
                'title' => $request->title,
                'slug' => $request->slug,
                'body' => $request->body
            ]);
        }
        
        /**
         * Display the specified resource.
         */
        public function show(string $id)
        {
            $post_S = Post::findOrFail($id);
            // return view(/*route*/ , ['posts' => $posts]);
        }

        
        /**
         * Update the specified resource in storage.
         */
        public function update(Request $request, string $id)
        {
            $post_U = Post::findOrFail($id);
            $post_U->title = $request->title;
            $post_U->body = $request->body;

            $post_U->save();
        }

        /**
         * Remove the specified resource from storage.
         */
        public function destroy(string $id)
        {
            $post_D = Post::findOrFail($id);
            $post_D->delete();
        }
    }
