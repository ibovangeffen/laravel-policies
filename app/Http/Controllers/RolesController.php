<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;
use App\User;

class RolesController extends Controller
{
    public function create()
	{
		return view('roles/create');
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
		User::findOrFail($request->user)->update(['role_id' => $request->role]);
		return redirect()->route('policies/index');
	}
}
