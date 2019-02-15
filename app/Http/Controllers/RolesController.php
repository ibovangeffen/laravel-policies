<?php

namespace App\Http\Controllers;

use App\Role;
use Illuminate\Http\Request;
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
}
