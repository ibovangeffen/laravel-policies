@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-8 offset-2">

                <div class="card">
                    <div class="card-header">{{ $post->title }}</div>
                    <div class="card-body">
                        <p class="card-text">{{ $post->body }}</p>
                    </div>
                    <div class="card-footer text-muted">
                        <a href="{{ route('posts/index') }}" class="btn btn-primary">Return</a>
						@can('update', $post)
                        	<a href="{{ route('posts/edit', $post->id) }}" class="btn btn-primary float-right">Edit</a>
						@endcan
                    </div>
                </div>

				@if (url()->previous() != route('posts/drafts') && url()->previous() != route('posts/create') && url()->previous() != route('posts/edit', $post->id ))
					@can('view', \App\Comment::class)
						<h2>Comments</h2>
						@foreach ($comments as $comment)
								<div class="card" style="margin-bottom: 20px;">
									<div class="card-header">
										<span>{{ $comment->title }}</span>
										@can('delete', $comment)
											<form method="POST" action="{{ route('posts/delete', $comment->id) }}" class="float-right" style="margin-left: 10px;">
												@csrf
												@method('DELETE')
												<input type="submit" class="btn btn-danger btn-sm" value="Delete">
											</form>
										@endcan
										<span class="float-right">{{ $comment->created_at->diffForHumans() }}</span>
									</div>
									<div class="card-body">
										<p class="card-text">{{ $comment->body }}</p>
										<p class="card-text">{{ $comment->user->name }}</p>
									</div>
								</div>
						@endforeach
					@endcan

					@can('create', \App\Comment::class)
						<div class="card">
							<div class="card-header">Place new comment</div>
							<div class="card-body">
								<form method="POST" action="{{ route('comments/store') }}">
									@csrf
									<input type="hidden" name="post_id" value="{{ $post->id }}" readonly>
									<input type="hidden" name="user_id" value="{{ auth()->id() }}" readonly>
									<div class="form-group">
										<input type="text" class="form-control" name="title" placeholder="Title">
									</div>
									<div class="form-group">
										<textarea class="form-control" name="body" placeholder="Write down your thoughts..." required></textarea>
									</div>
									<div class="form-group">
										<button type="submit" class="btn btn-primary">Place</button>
									</div>
								</form>
							</div>
						</div>
					@else
						<a href="{{ route('login') }}" class="btn btn-primary">Login to comment</a>
					@endcan
				@endif
			</div>
		</div>
	</div>
@endsection
