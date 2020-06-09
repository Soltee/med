<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use VanOns\Laraberg\Models\Gutenbergable;

class Post extends Model
{
	use Gutenbergable;

    protected $fillable = [
    	'category_id', 'cover', 'title', 'slug', 'content'
    ];

    public function category()
    {
    	return $this->belongsTo(Category::class);
    }

    public function truncateWords()
    {
		return Str::limit($this->content, 150, $end='...');
    }
}
