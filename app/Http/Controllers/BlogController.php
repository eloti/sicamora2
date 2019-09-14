<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;
use App\Response;
use App\User;
use App\Read;
use Auth;

class BlogController extends Controller
{
  public function getSingle ($slug) {
    //fetch from the DB based on Slugs
    $post = Post::where('slug', $slug)->first();

    //fetch from the DB all comments pertaining to post
    $comments = Comment::where('post_id', $post->id)
                ->orderBy('created_at', 'desc')
                ->get();

    $number_of_comments = Comment::where('post_id', $post->id)
                ->count('rating');

    $avg_rating = Comment::where('post_id', $post->id)
                ->avg('rating');

    //dd($number_of_comments);
    //exit;

    //fetch from the DB all responses pertaining to the comments of post
    $responses = Response::where('post_id', $post->id)->orderBy('created_at', 'desc')->get();

    //fetch if the user read the post or not
    if(Auth::check()) {
      $read = Read::where([
        ['post_id', $post->id],
        ['user_id', auth()->user()->id],
        ])->first();
    }

    //fetch logged user Data
     if(Auth::check()) {

       $user_id = auth()->user()->id;
       $user = User::find($user_id);

      //this is so a user does not add reads to his own posts
      if(auth()->user()->id !== $post->user_id) {
        $post->counter = $post->counter + 1;
        $post->save();
      }

      //return the view and pass in the post object
      return view('blog.single')->with('post', $post)->with('comments', $comments)->with('responses', $responses)->with('user', $user)->with('read', $read)->with('number_of_comments', $number_of_comments)->with('avg_rating', $avg_rating);

      } else {

      //if the reader is a guest, add 1 to the counter, return the view and pass in the post object
      $post->counter = $post->counter + 1;
      $post->save();
      return view('blog.single')->with('post', $post)->with('comments', $comments)->with('responses', $responses)->with('number_of_comments', $number_of_comments)->with('avg_rating', $avg_rating);
      }
  }

}
