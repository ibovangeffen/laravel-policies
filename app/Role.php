<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
	protected $fillable = [
		'name'
	];

	public function users()
	{
		return $this->hasMany(User::class);
	}

	public function policies()
	{
		return $this->belongsToMany(Policy::class);
	}

	public function permissions()
	{
		$policies_array = [];
		$policies = $this->policies()->select(['model', 'action'])->get();

		$policies->each(function($policy, $key) use (&$policies_array) {
			$policies_array[$policy->model][] = $policy->action;
		});

		return $policies_array;
	}
}
