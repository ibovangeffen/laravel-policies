<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Policy;
use App\Role;

class PoliciesController extends Controller
{
    public function index()
	{
		$this->authorize('view', Policy::class);
		return view('policies/index', [
			'policies' => Policy::all(),
			'roles' => Role::all(),
		]);
	}

	public function create()
	{
		return view('policies/create');
	}

	public function edit($id)
	{
		$this->authorize('update', Policy::class);
		return view('policies/edit', [
			'role' => Role::findOrFail($id),
			'policies' => Policy::all(),
		]);
	}

	public function update($id, Request $request)
	{
		$ids = array_filter($request->policies, function($value) {
			return !empty($value);
		});
		Role::findOrFail($id)->policies()->sync($ids);
		return redirect()->route('policies/edit', ['id' => $id]);
	}
}
