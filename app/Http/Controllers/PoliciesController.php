<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Policy;
use App\Role;
use App\User;

class PoliciesController extends Controller
{
    public function index()
	{
		$this->authorize('view', Policy::class);
		return view('policies/index', [
			'policies' => Policy::all(),
			'roles' => Role::all(),
			'users' => User::all(),
		]);
	}

	public function create()
	{
		return view('policies/create');
	}

	public function store(Request $request)
	{
		$policy = new Policy();
		$policy->fill($request->only($policy->getFillable()));
		$policy->save();
		return redirect()->route('policies/index');
	}

	public function edit($id)
	{
		$this->authorize('update', Policy::class);

		$role = Role::findOrFail($id);
		$policy_ids = [];
		$role->policies->each(function($policy, $key) use (&$policy_ids) {
		    $policy_ids[] = $policy->id;
        });

		$policies = Policy::whereNotIn('id', $policy_ids)->get();

		return view('policies/edit', [
			'role' => Role::findOrFail($id),
			'policies' => $policies,
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

	public function delete($id)
	{
		Policy::findOrFail($id)->delete();
		return redirect()->route('policies/index');
	}
}
