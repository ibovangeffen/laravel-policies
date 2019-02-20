@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-8 offset-2">

				<div class="card">
					<div class="card-header">
						Drafts
						<a href="{{ route('posts/index') }}" class="btn btn-primary btn-sm float-right">Go back</a>
					</div>
					<div class="card-body">
						<table class="table">
							<thead>
								<tr>
									<th scope="col">#</th>
									<th scope="col">Title</th>
									<th scope="col">Created at</th>
									<th scope="col">Actions</th>
								</tr>
							</thead>
							<tbody>
							@foreach($posts as $post)
								<tr>
									<th scope="row">{{ $post->id }}</th>
									<td>
										<a href="{{ route('posts/show', $post->id) }}">{{ $post->title }}</a>
									</td>
									<td>{{ $post->created_at->diffForHumans () }}</td>
									<td>
										@can('update', $post)
											<a href="{{ route('posts/edit', $post->id) }}" class="btn btn-warning btn-sm" style="margin-right: 10px;">Edit</a>
										@endcan
										@can('publish', $post)
											<a href="{{ route('posts/publish', $post->id) }}" class="btn btn-success btn-sm">Publish</a>
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