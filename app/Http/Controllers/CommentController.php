<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request)
	{
		$comment = new Comment();
		$comment->fill($request->only($comment->getFillable()));
		$comment->save();
		return redirect()->back();
	}

	public function delete($id)
	{
		Comment::findOrFail($id)->delete();
		return redirect()->back();
	}
}
