@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-8 offset-2">

				<div class="card">
					<div class="card-header">Link user to role</div>
					<div class="card-body">
						<form class="form-horizontal" role="form" method="POST" action="{{ route('roles/link') }}">
							@csrf

							<div class="form-group">
								<label for="user" class="col-md-4 control-label">User</label>
								<div class="col-md-6">
									<select name="user" id="user">
										@foreach($users as $user)
											<option value="{{ $user->id }}">{{ $user->name }}</option>
										@endforeach
									</select>
								</div>
							</div>

							<div class="form-group">
								<label for="role" class="col-md-4 control-label">Role</label>

								<div class="col-md-6">
									<select name="role" id="role">
										@foreach($roles as $role)
											<option value="{{ $role->name }}">{{ ucfirst($role->name) }}</option>
										@endforeach
									</select>
								</div>
							</div>

							<div class="form-group">
								<div class="col-md-6 col-md-offset-4">
									<button type="submit" class="btn btn-primary">Create</button>
									<a href="{{ route('policies/index') }}" class="btn btn-primary">Cancel</a>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection