<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
use App\Comment;
use Carbon\Carbon;

class AuthorsController extends Controller
{
    public function index() {

      $authors = User::select(\DB::raw('users.*, COUNT(posts.id) as posts'))
                ->leftJoin('posts', 'users.id', '=', 'posts.user_id')
                ->groupBy('users.id', 'users.alias', 'users.email', 'users.email_verified_at', 'users.password', 'users.remember_token', 'users.user_image', 'users.created_at', 'users.updated_at', 'users.gender', 'users.birth', 'users.city', 'users.province_state', 'users.country', 'users.xtra_field_1', 'users.about', 'users.name', 'users.priv_about', 'users.priv_id', 'users.priv_name', 'users.priv_email', 'users.priv_user_image', 'users.priv_gender', 'users.priv_birth', 'users.priv_city', 'users.priv_province_state', 'users.priv_country')
                ->orderBy('posts', 'desc')
                ->get();

      $myTime = Carbon::now('America/Argentina/Buenos_Aires');

      $title = "Autores";
      return view('authors')->with('title', $title)->with('authors', $authors)->with('myTime', $myTime);
    }

    public function getSingle($id) {

      $oneAuthor = User::where('id', $id)->first();

      $authorsPosts = Post::where('user_id', $id)->get();

      $comments_and_rating = Comment::select(\DB::raw('comments.post_id, COUNT(comments.id) as comments, AVG(comments.rating) as average_rating'))
        ->groupBy('comments.post_id')
        ->get();

        //dd($comments_and_rating);
        //exit;

      $myTime = Carbon::now('America/Argentina/Buenos_Aires');

      $title = "Un autor";
      return view('one_author')->with('title', $title)->with('oneAuthor', $oneAuthor)->with('authorsPosts', $authorsPosts)->with('comments_and_rating', $comments_and_rating)->with('myTime', $myTime);

    }

}
