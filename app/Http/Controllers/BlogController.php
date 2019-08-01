<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;
use App\Response;
use App\User;

class BlogController extends Controller
{
  public function getSingle ($slug) {
    //fetch from the DB based on Slugs
    $post = Post::where('slug', $slug)->first();

    //fetch from the DB all comments pertaining to post
    $comments = Comment::where('post_id', $post->id)->orderBy('created_at', 'desc')->get();

    //fetch from the DB all responses pertaining to the comments of post
    $responses = Response::where('post_id', $post->id)->orderBy('created_at', 'desc')->get();

    //fetch logged user Data
    $user_id = auth()->user()->id;
    $user = User::find($user_id);

    //return the view and pass in the post object
    return view('blog.single')->with('post', $post)->with('comments', $comments)->with('responses', $responses)->with('user', $user);
  }
}
