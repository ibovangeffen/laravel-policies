<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}

	public function index()
	{
		$posts = Post::published()->paginate();
		return view('posts/index', compact('posts'));
	}

	public function create()
	{
		$this->authorize('create-posts');
		return view('posts/create');
	}

	public function store(Request $request)
	{
		$this->authorize('create-posts');
		$data = $request->only('title', 'body');
		$data['slug'] = str_slug($data['title']);
		$data['user_id'] = auth()->id();
		$post = Post::create($data);
		return redirect()->route('posts/show', ['id' => $post->id]);
	}

	public function edit($id)
	{
		$this->authorize('update', Post::findOrFail($id));
		$post = Post::findOrFail($id);
		return view('posts.edit', compact('post'));
	}

	public function update($id, Request $request)
	{
		$this->authorize('update-posts');
		$data = $request->only('title', 'body');
		$data['slug'] = str_slug($data['title']);
		Post::findOrFail($id)->update($data);
		return redirect()->route('posts/show', ['id' => $id]);

	}

	public function publish($id)
	{
		$this->authorize('publish-posts');
		$post = Post::findOrFail($id);
		$post->published = true;
		$post->save();
		return back();
	}

	public function drafts()
	{
		$this->authorize('view-drafts');
		$postsQuery = Post::unpublished();

//		if (Gate::denies('see-all-drafts')) {
//			$postsQuery = $postsQuery->where('user_id', auth()->id());
//		}

		$posts = $postsQuery->paginate();
		return view('posts.drafts', compact('posts'));
	}

	public function show($id)
	{
		$this->authorize('view-posts');
		$post = Post::findOrFail($id);
		return view('posts/show', compact('post'));
	}
}
