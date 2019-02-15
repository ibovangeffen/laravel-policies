@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row" style="margin-bottom: 20px;">
			<div class="col-md-8 offset-2">
				<div class="card">
					<div class="card-header">
						Policies
						@can('create', \App\Policy::class)
							<a href="{{ route('policies/create') }}" class="btn btn-primary btn-sm float-right">Create</a>
						@endcan
					</div>
					<div class="card-body">
						<table class="table">
							<thead>
							<tr>
								<th scope="col">#</th>
								<th scope="col">Model</th>
								<th scope="col">Action</th>
							</tr>
							</thead>
							<tbody>
							@foreach($policies as $policy)
								<tr>
									<th scope="row">{{ $policy->id }}</th>
									<td>{{ ucfirst($policy->model) }}</td>
									<td>{{ $policy->action }}</td>
								</tr>
							@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-8 offset-2">
				<div class="card">
					<div class="card-header">
						Roles
						@can('update', \App\Policy::class)
							<a href="{{ route('policies/create') }}" class="btn btn-primary btn-sm float-right">Create</a>
						@endcan
					</div>
					<div class="card-body">
						<table class="table">
							<thead>
							<tr>
								<th scope="col">#</th>
								<th scope="col">Role</th>
								<th scope="col">Permissions</th>
								<th scope="col">Actions</th>
							</tr>
							</thead>
							<tbody>
							@foreach($roles as $role)
								<tr>
									<th scope="row">{{ $role->id }}</th>
									<td>{{ ucfirst($role->name) }}</td>
									<td>TODO: policies per role</td>
									<td>
										@can('update', \App\Policy::class)
											<a href="{{ route('policies/edit', $role->id) }}" class="btn btn-secondary btn-sm">Edit</a>
										@endcan
									</td>
								</tr>
							@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
