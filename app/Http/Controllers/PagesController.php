<?php

namespace App\Http\Controllers; //we are saying that the controller belongs in this folder

use Illuminate\Http\Request; //we are saying that the controller needs to access something from outside
use App\Genre;
use App\Assignment;
use App\Post;
use App\Comment;
use App\Read;
use Auth;

class PagesController extends Controller
{
  public function index(){

    $all_post = Post::select(\DB::raw('posts.*, COUNT(comments.id) as comments, AVG(comments.rating) as average_rating'))
              ->leftJoin('comments', 'posts.id', '=', 'comments.post_id')
              ->groupBy('posts.id', 'posts.created_at', 'posts.updated_at', 'posts.user_id', 'posts.title', 'posts.body', 'posts.assignment_id', 'posts.genre_id', 'posts.slug', 'posts.counter')
              ->orderBy('average_rating', 'desc')
              ->paginate(5);

    //fetch array with all the logged in user's read
    if(Auth::check()) {

    $user_reads = Read::where([
      ['my_read', '=', 1],
      ['user_id', '=', auth()->user()->id]
      ])->get();

    } else {

    //if user is not logged in then $user_reads is an empty array
    $user_reads = [];

    }

    $genre = Genre::all();

    $title = "Bienvenido a Sicamora";
    return view('welcome')->with('title', $title)->with('all_post', $all_post)->with('user_reads', $user_reads)->with('genre', $genre);

  }

  public function most_read(){

    $all_post = Post::select(\DB::raw('posts.*, COUNT(comments.id) as comments, AVG(comments.rating) as average_rating'))
              ->leftJoin('comments', 'posts.id', '=', 'comments.post_id')
              ->groupBy('posts.id', 'posts.created_at', 'posts.updated_at', 'posts.user_id', 'posts.title', 'posts.body', 'posts.assignment_id', 'posts.genre_id', 'posts.slug', 'posts.counter')
              ->orderBy('posts.counter', 'desc')
              ->paginate(5);

    //fetch array with all the logged in user's read
    if(Auth::check()) {

    $user_reads = Read::where([
      ['my_read', '=', 1],
      ['user_id', '=', auth()->user()->id]
      ])->get();

    } else {

    //if user is not logged in then $user_reads is an empty array
    $user_reads = [];

    }

    $genre = Genre::all();

    $title = "Más leídas";
    return view('most_read')->with('title', $title)->with('all_post', $all_post)->with('user_reads', $user_reads)->with('genre', $genre);
  }

  public function new_posts(){

    $all_post = Post::select(\DB::raw('posts.*, COUNT(comments.id) as comments, AVG(comments.rating) as average_rating'))
              ->leftJoin('comments', 'posts.id', '=', 'comments.post_id')
              ->groupBy('posts.id', 'posts.created_at', 'posts.updated_at', 'posts.user_id', 'posts.title', 'posts.body', 'posts.assignment_id', 'posts.genre_id', 'posts.slug', 'posts.counter')
              ->orderBy('posts.created_at', 'desc')
              ->limit(3)
              ->get();

    //fetch array with all the logged in user's read
    if(Auth::check()) {

    $user_reads = Read::where([
      ['my_read', '=', 1],
      ['user_id', '=', auth()->user()->id]
      ])->get();

    } else {

    //if user is not logged in then $user_reads is an empty array
    $user_reads = [];

    }

    $genre = Genre::all();

    $title = "Nuevas publicaciones";
    return view('new_posts')->with('title', $title)->with('all_post', $all_post)->with('user_reads', $user_reads)->with('genre', $genre);
  }

  public function my_reads(){

    $all_post = Post::select(\DB::raw('posts.*, COUNT(comments.id) as comments, AVG(comments.rating) as average_rating'))
              ->leftJoin('comments', 'posts.id', '=', 'comments.post_id')
              ->join('reads', 'posts.id', '=', 'reads.post_id')
              ->where([
                ['reads.my_read', '=', 1],
                ['reads.user_id', '=', auth()->user()->id],
                ])
              ->groupBy('posts.id', 'posts.created_at', 'posts.updated_at', 'posts.user_id', 'posts.title', 'posts.body', 'posts.assignment_id', 'posts.genre_id', 'posts.slug', 'posts.counter')
              ->orderBy('posts.created_at', 'desc')
              ->get();

    //fetch and array with all the logged in user's reads
    $user_reads = Read::where([
      ['my_read', '=', 1],
      ['user_id', '=', auth()->user()->id]
      ])->get();

    $genre = Genre::all();

    $title = "Mis Lecturas";
    return view('my_reads')->with('title', $title)->with('all_post', $all_post)->with('user_reads', $user_reads)->with('genre', $genre);
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
