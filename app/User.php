<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function hasPolicy($policies, $model = null)
	{
		// model can be passed for view-drafts for example, else the function would search for the drafts model
		if (is_array($policies)) {
			foreach ($policies as $policy) {
				return $this->checkPolicy($policy, $model);
			}
		} else {
			return $this->checkPolicy($policies, $model);
		}

		return true;
	}

	public function checkPolicy($policy, $model = null)
	{
		if (strpos($policy, '-') === false) {
			return false;
		}

		if (is_null($model)) {
			$policy_array = explode('-', $policy);
		} else {
			$policy_array = [
				0 => $policy,
				1 => $model,
			];
		}
		$p = Policy::where([['model', $policy_array[1]], ['action', $policy_array[0]]])->whereHas(
			'roles', function($query) {
			$query->where('name', $this->role->name);
		})->get();

		if ($p->isEmpty()) {
			return false;
		}

		return true;
	}

    public function posts()
	{
		return $this->hasMany(Post::class);
	}

	public function comments()
	{
		return $this->hasMany(Comment::class);
	}

	public function role()
	{
		return $this->hasOne(Role::class, 'id', 'role_id');
	}
}
