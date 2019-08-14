<?php

namespace App\Http\Controllers; //we are saying that the controller belongs in this folder

use Illuminate\Http\Request; //we are saying that the controller needs to access something from outside
use App\Genre;
use App\Assignment;
use App\Post;
use App\Comment;

class PagesController extends Controller
{
  public function index(){

    //$all_post = Post::orderBy('created_at','desc')->paginate(5);
    //$all_post = Post::select('posts*', 'comments.*', 'sum(comments.rating)');
    //->leftJoin('comments', 'comments.post_id', '=', 'posts.id');
    $all_post = Post::select(\DB::raw('posts.*, COUNT(comments.post_id) as comments, AVG(comments.rating) as average_rating'))
              ->leftJoin('comments', 'posts.id', '=', 'comments.post_id')
              ->groupBy('posts.id', 'posts.created_at', 'posts.updated_at', 'posts.user_id', 'posts.title', 'posts.body', 'posts.assignment_id', 'posts.genre_id', 'posts.slug', 'posts.counter')
              ->orderBy('created_at', 'desc')
              ->paginate(5);

    //dd($all_post);
    //exit;

    $genre = Genre::all();

    //$all_comment = Comment::select('id', 'post_id', 'rating')->get();

    $title = "Bienvenido a Sicamora";
    return view('welcome')->with('title', $title)->with('all_post', $all_post)->with('genre', $genre);
  }

  public function about(){
    $title = "Acerca de Sicamora";
    return view('pages.about')->with('title', $title);
  }

  public function faq(){
    $title = "Preguntas Frecuentes";
    return view('pages.faq')->with('title', $title);
  }

  public function contact(){
    $title = "Contacto";
    return view('pages.contact')->with('title', $title);
  }

}
