<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Policy extends Model
{
    protected $fillable = [
    	'model', 'action',
	];

    public function roles()
	{
		return $this->belongsToMany(Role::class);
	}
}
