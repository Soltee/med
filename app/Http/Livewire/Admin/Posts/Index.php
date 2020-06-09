<?php

namespace App\Http\Livewire\Admin\Posts;

use App\Post;
use Livewire\Component;
use Illuminate\Pagination\Paginator;
use Livewire\WithPagination;


class Index extends Component
{
    use WithPagination;


    public $total,  $cover, $title, $content, $selected_id;


    public function mount()
    {
        
    }


    public function render()
    {
    	$paginate  = Post::latest()->paginate(8);
        return view('livewire.admin.posts.index', [
        	'posts' => $paginate,
        ]);
    }

    

}
