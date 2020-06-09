<?php

namespace App\Http\Livewire\Admin\Posts;

use App\Post;
use Livewire\Component;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class Destroy extends Component
{
	public $post;

	public function mount(Post $post)
	{
		$this->post = $post;
	}

    public function render()
    {
        return view('livewire.admin.posts.destroy');
    }

    public function destroyPost($post)
    {
    	$post = Post::findOrfail($post);
        File::delete([
            public_path($post->cover)
        ]);

        $post->delete();

        session()->flash('toast_success', 'Post deleted.');
        return redirect()->to('/admin/posts');
    }
}
