<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
	public function index()
	{
		$this->authorize('view', Post::class);
		$posts = Post::published()->paginate(10);
		return view('posts/index')->with(['posts' => $posts]);
	}

	public function create()
	{
		$this->authorize('create', Post::class);
		return view('posts/create');
	}

	public function store(Request $request)
	{
		$this->authorize('create', Post::class);
        $data = $request->merge(['user_id' => $request->user()->id], $request->only(['title', 'body']))->toArray();
		$post = Post::create($data);
		return redirect()->route('posts/show', $post->id);
	}

	public function edit($id)
	{
		$this->authorize('update', Post::findOrFail($id));
		$post = Post::findOrFail($id);
		return view('posts/edit', compact('post'));
	}

	public function update($id, Request $request)
	{
		$this->authorize('update', Post::findOrFail($id));
        $data = $request->merge(['user_id' => $request->user()->id], $request->only(['title', 'body']))->toArray();
        Post::findOrFail($id)->update($data);

		return redirect()->route('posts/show', $id);

	}

	public function show($id)
	{
		$this->authorize('view', Post::class);
		$post = Post::findOrFail($id);
		return view('posts/show')->with(['post' => $post]);
	}

	public function delete($id)
    {
    	$this->authorize('delete', Post::findOrFail($id));
        Post::findOrFail($id)->delete();
        return redirect()->route('posts/index');
    }

    public function drafts()
	{
		$this->authorize('view-drafts', Post::class);
		$posts = Post::unpublished()->get();
		return view('posts/drafts', ['posts' => $posts]);
	}

	public function publish($id)
	{
		Post::findOrFail($id)->update(['published' => true]);
		return redirect()->route('posts/drafts');
	}
}
