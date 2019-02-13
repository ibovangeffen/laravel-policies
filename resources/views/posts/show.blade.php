@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-8 offset-2">

                <div class="card">
                    <div class="card-header">
                        {{ $post->title }}
                    </div>
                    <div class="card-body">
                        <p class="card-text">{{ $post->body }}</p>
                    </div>
                    <div class="card-footer text-muted">
                        <a href="{{ route('posts.index') }}" class="btn btn-primary">Return</a>
                        <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary float-right">Edit</a>
                    </div>
                </div>


			</div>
		</div>
	</div>
@endsection
