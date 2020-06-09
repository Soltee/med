<?php

namespace App\Http\Controllers;

use App\Post;
use App\Category;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
	/*
		* Shows Welcome Page
	*/
    public function index()
    {
        $posts      = Post::latest()->paginate(3);
    	return view('welcome', compact('posts'));
    }

    /*
		* Shows Blog Page
	*/
    public function blog()
    {
        $category = request()->category;
        if($category)
        {
            $category = Category::findOrfail($category);
            $posts      = $category->posts()->latest()->paginate(5);
        } else {
            $posts      = Post::latest()->paginate(5);
        }

        $categories = Category::latest()->paginate(10);
        abort_if($posts->isEmpty(), 204);
    	return view('blog', compact('posts', 'categories'));
    }


    /*
		* Shows Single Post
	*/
    public function post(Post $post, $title)
    {
        $categories = Category::latest()->paginate(10);
        $relatedPost = $post->category->posts()->inRandomOrder()->where('id', '!=' , $post->id)->take(3)->get();
    	return view('post', compact('post', 'categories', 'relatedPost'));
    }

}
