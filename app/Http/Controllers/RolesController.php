<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;
use App\User;

class RolesController extends Controller
{
    public function create()
	{
		$users = User::all();
		$new_users = [];
		$users->each(function($user, $key) use (&$new_users) {

			if (is_null($user->role)) {
				$new_users[] = $user;
			}
		});

		return view('roles/create', ['users' => $new_users]);
	}

	public function store(Request $request)
	{
		$role = new Role();
		$role->fill($request->only($role->getFillable()));
		$role->save();

		return redirect()->route('policies/index');
	}

	public function link()
	{
		return view('roles/link', [
			'users' => User::all(),
			'roles' => Role::all(),
		]);
	}

	public function linkUser(Request $request)
	{
		$role = Role::where('user_id', $request->user)->first();
		empty($role) ?
			Role::create(['name' => $request->role, 'user_id' => $request->user]) :
			Role::where('user_id', $request->user)->first()->update(['name' => $request->role]);
		return redirect()->route('policies/index');
	}
}
