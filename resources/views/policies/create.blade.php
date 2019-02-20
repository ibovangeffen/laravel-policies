@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-8 offset-2">

				<div class="card">
					<div class="card-header">Create policy</div>
					<div class="card-body">
						<form class="form-horizontal" role="form" method="POST" action="{{ route('policies/store') }}">
							@csrf

							<div class="form-group">
								<label for="model" class="col-md-4 control-label">Model</label>

								<div class="col-md-6">
									<input type="text" name="model" placeholder="Model" required>
									@if ($errors->has('model'))
										<span class="help-block">
											<strong>{{ $errors->first('model') }}</strong>
										</span>
									@endif
								</div>
							</div>

							<div class="form-group">
								<label for="action" class="col-md-4 control-label">Action</label>

								<div class="col-md-6">
									<input type="text" name="action" placeholder="Model" required>
									@if ($errors->has('action'))
										<span class="help-block">
											<strong>{{ $errors->first('action') }}</strong>
										</span>
									@endif
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
