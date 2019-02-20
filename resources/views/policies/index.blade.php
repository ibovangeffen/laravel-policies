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
								<th scope="col">Actions</th>
							</tr>
							</thead>
							<tbody>
								@foreach($policies as $policy)
									<tr>
										<th scope="row">{{ $policy->id }}</th>
										<td>{{ ucfirst($policy->model) }}</td>
										<td>{{ $policy->action }}</td>
										<td>
											@can('delete', \App\Policy::class)
												<form action="{{ route('policies/delete', $policy->id) }}" method="POST">
													@csrf
													@method('DELETE')
													<input type="submit" class="btn btn-danger btn-sm" value="Delete">
												</form>
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

		<div class="row" style="margin-bottom: 20px">
			<div class="col-md-8 offset-2">
				<div class="card">
					<div class="card-header">
						Roles
						@can('update', \App\Policy::class)
							<a href="{{ route('roles/create') }}" class="btn btn-primary btn-sm float-right">Create</a>
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
										<td>
											@foreach ($role->permissions() as $model => $actions)
												<p style="margin: 0;">{{ ucfirst($model) }}: {{ implode(', ', $actions) }}</p>
											@endforeach
										</td>
										<td>
											@can('update', \App\Policy::class)
												<a href="{{ route('policies/edit', $role->id) }}" class="btn btn-secondary btn-sm">Edit</a>
											@endcan
											@can('delete', \App\Policy::class)
												<form action="{{ route('roles/delete', $role->id) }}" method="POST">
													@csrf
													@method('DELETE')
													<input type="submit" class="btn btn-danger btn-sm" value="Delete">
												</form>
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

		<div class="row" style="margin-bottom: 20px;">
			<div class="col-md-8 offset-2">
				<div class="card">
					<div class="card-header">
						Users
						@can('link', \App\Policy::class)
							<a href="{{ route('roles/link') }}" class="btn btn-primary btn-sm float-right">Link</a>
						@endcan
					</div>
					<div class="card-body">
						<table class="table">
							<thead>
							<tr>
								<th scope="col">#</th>
								<th scope="col">User</th>
								<th scope="col">Role</th>
							</tr>
							</thead>
							<tbody>
								@foreach($users as $user)
									<tr>
										<th scope="row">{{ $user->id }}</th>
										<td>{{ ucfirst($user->name) }}</td>
										<td>{{ !empty($user->role->name) ? ucfirst($user->role->name) : 'None' }}</td>
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
