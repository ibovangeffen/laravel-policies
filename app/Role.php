<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
	protected $fillable = [
		'name', 'user_id',
	];

	public function users()
	{
		return $this->belongsToMany(User::class);
	}

	public function policies()
	{
		return $this->belongsToMany(Policy::class);
	}

	public function permissions()
	{
		return $this->policies()->select(['model', 'action'])->get()->toArray();
	}
}
