@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-8 offset-2">

				<div class="card">
					<div class="card-header">Edit {{ $role->name }} group its permissions</div>
					<div class="card-body">
						<form class="form-horizontal" role="form" method="POST" action="{{ route('policies/update', $role->id) }}">
							@csrf
							@method('PATCH')
							<div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
								<div class="col-md-6">
									<input id="name" type="hidden" class="form-control" name="name" value="{{ old('name', $role->name) }}" required autofocus>

									@if ($errors->has('name'))
										<span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
									@endif
								</div>
							</div>

							<div class="form-group">
								<label for="policies" class="col-md-4 control-label">Policies</label>

								<div class="col-md-6">
									@foreach($role->policies as $policy)
										<div style="margin-bottom: 20px;">
											<span>{{ ucfirst($policy->model) . ' - ' . $policy->action }}</span>
											<input type="hidden" name="policies[]" value="{{ $policy->id }}">
											<button class="btn btn-danger btn-sm float-right" onclick="removePolicy(this)">Delete</button>
										</div>
									@endforeach
									<select name="policies[]">
                                        @if ($policies->isEmpty())
                                            <option value="" selected>No policies left...</option>
                                        @else
										    <option value="" selected>Select policy</option>
                                        @endif
										@foreach($policies as $policy)
											<option value="{{ $policy->id }}">{{ ucfirst($policy->model) . ' - ' . $policy->action }}</option>
										@endforeach
									</select>
									@if ($errors->has('policies'))
										<span class="help-block">
											<strong>{{ $errors->first('policies') }}</strong>
										</span>
									@endif
								</div>
							</div>

							<div class="form-group">
								<div class="col-md-6 col-md-offset-4">
									<button type="submit" class="btn btn-primary">Update</button>
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

@section('js')

	<script type="application/javascript">
		function removePolicy(el)
		{
			el.parentElement.remove();
		}
	</script>

@endsection
