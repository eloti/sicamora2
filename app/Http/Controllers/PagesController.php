<?php

namespace App\Http\Controllers; //we are saying that the controller belongs in this folder

use Illuminate\Http\Request; //we are saying that the controller needs to access something from outside
use App\Genre;
use App\Assignment;
use App\Post;

class PagesController extends Controller
{
  public function index(){

    $all_post = Post::orderBy('created_at','desc')->paginate(5);
    $genre = Genre::all();

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
