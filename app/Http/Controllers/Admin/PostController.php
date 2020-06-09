<?php

namespace App\Http\Controllers\Admin;

use App\Post;
use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Image;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index()
    {
    	return view('admin.posts.index');
    }


    public function create()
    {
        $categories = Category::latest()->get();
    	return view('admin.posts.create', compact('categories'));
    }

    public function store(Request $request)
    {
    	$data = $this->validate($request , [
            'category_id' => 'numeric|exists:categories,id',
    		'title' => 'string|min:4|unique:posts',
    		'content' => 'required'
    	]);

        $photo = $request->file('cover');
        // dd(request()->all());
        if($photo)
        {
            if(! is_dir(public_path('/posts'))){
                mkdir(public_path('/posts'), 0777);
            }

            $basename  = Str::random();
            $original  = '/posts/post-' . $basename . '.' . $photo->getClientOriginalExtension();

            $img = Image::make($photo->getRealPath());
            $img->fit(600, 600, function ($constraint) {
                $constraint->upsize();                 
            });

            $img->stream(); // <-- Key point
            $photo->move(public_path('/posts'), $original);

            $coverimage = ['cover' => $original];
        	$post = Post::create(array_merge($data, $coverimage, [
                'slug' => Str::slug($data['title'])
            ]));

        	return back()->with('toast_success', 'Post published.');
        }
    }


    public function edit(Post $post)
    {
        $categories = Category::latest()->get();
        $category = $post->category;
        return view('admin.posts.edit', compact('post', 'category', 'categories'));
    }

    public function update(Request $request, Post $post)
    {
    	$data = $this->validate($request , [
            'category_id' => 'numeric|exists:categories,id',
            'title' => 'string|min:4',
    		'content' => 'required'
    	]);

        $photo = $request->file('cover');
        // dd(request()->all());
        if($photo)
        {
            if(! is_dir(public_path('/posts'))){
                mkdir(public_path('/posts'), 0777);
            }

            $basename  = Str::random();
            $original  = '/posts/post-' . $basename . '.' . $photo->getClientOriginalExtension();

            $img = Image::make($photo->getRealPath());
            $img->fit(600, 600, function ($constraint) {
                $constraint->upsize();                 
            });

            $img->stream(); // <-- Key point
            $photo->move(public_path('/posts'), $original);

            $coverimage = ['cover' => $original];

            File::delete([
                public_path($post->cover)
            ]);

    	}

        $post = $post->update(array_merge($data, $coverimage ?? []));

    	return back()->with('toast_success', 'Post updated.');
    }
}
