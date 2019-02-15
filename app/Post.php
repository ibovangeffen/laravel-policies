<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
	protected $fillable = [
		'title', 'body', 'user_id', 'published',
	];

	public function scopePublished($query)
	{
		return $query->where('published', true);
	}

	public function scopeUnpublished($query)
	{
		return $query->where('published', false);
	}

	public function user()
	{
		return $this->belongsTo(User::class);
	}
}
