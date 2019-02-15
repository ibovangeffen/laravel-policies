@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-8 offset-2">

				<div class="card">
					<div class="card-header">Create role</div>
					<div class="card-body">
						<form class="form-horizontal" role="form" method="POST" action="{{ route('roles/store') }}">
							@csrf

							<div class="form-group">
								<label for="name" class="col-md-4 control-label">Name</label>

								<div class="col-md-6">
									<input type="text" name="name" placeholder="Name" required>
									@if ($errors->has('name'))
										<span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
									@endif
								</div>
							</div>

							<div class="form-group">
								<label for="user">User to assign new role to</label>
								<div class="col-md-6">
									<select name="user_id" id="user">
										@foreach($users as $user)
											<option value="{{ $user->id }}">{{ $user->name }}</option>
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