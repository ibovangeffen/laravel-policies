<?php

namespace App\Policies;

use App\User;
use App\Post;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class PostPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the post.
     *
     * @param  \App\User  $user
     * @param  \App\Post  $post
     * @return mixed
     */
    public function view(User $user)
    {
//        return Auth::check();
		return $user->hasPolicy('view-post');
    }

    /**
     * Determine whether the user can create posts.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
//        return $user->role->name === 'admin' || $user->role->name === 'author';
		return $user->hasPolicy('create-post');
    }

    /**
     * Determine whether the user can update the post.
     *
     * @param  \App\User  $user
     * @param  \App\Post  $post
     * @return mixed
     */
    public function update(User $user, Post $post)
    {
        return $user->role->name === 'admin' || $user->role->name === 'editor' || $user->id == $post->user_id;
    }

    /**
     * Determine whether the user can delete the post.
     *
     * @param  \App\User  $user
     * @param  \App\Post  $post
     * @return mixed
     */
    public function delete(User $user)
	{
		return $user->role->name === 'admin';
	}

	public function viewDrafts(User $user)
	{
		return $user->hasPolicy('view-drafts', 'post');
	}

	public function publish(User $user)
	{
		return $user->role->name === 'admin' || $user->role->name === 'editor';
	}
}
