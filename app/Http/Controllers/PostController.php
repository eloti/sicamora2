<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Genre;
use App\Assignment;
use App\Post;
use Session;

class PostController extends Controller
{
    /**
     * Display a listing of the resource. Muestra los posteos del usuario logueado
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $user_id = auth()->user()->id;
      $user = User::find($user_id);
      //$user_posts = Post::where('user_id', $user_id)->orderBy('created_at', 'desc')->paginate(5);
      $user_posts = Post::select(\DB::raw('posts.*, COUNT(comments.post_id) as comments, AVG(comments.rating) as average_rating'))
                ->where('posts.user_id', $user_id)
                ->leftJoin('comments', 'posts.id', '=', 'comments.post_id')
                ->groupBy('posts.id', 'posts.created_at', 'posts.updated_at', 'posts.user_id', 'posts.title', 'posts.body', 'posts.assignment_id', 'posts.genre_id', 'posts.slug', 'posts.counter')
                ->orderBy('created_at', 'desc')
                ->paginate(5);

      $genre = Genre::all();

      return view ('posts.index')->with('user', $user)->with('user_posts', $user_posts)->with('genre', $genre);
    }

    /**
     * Show the form for creating a new resource. We just need to show the user a form to create a post.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $user_id = auth()->user()->id;
      $user = User::find($user_id);
      $genre = Genre::all();

      return view ('posts.create')->with('genre', $genre)->with('user', $user);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Create the slug
        $normedtitle = str_replace(' ', '_', $request->title);
        $slug = $request->user_id."+".$normedtitle;

        //validate the Data
        $this->validate($request, array(
          'title' => 'required|max:255',
          'body' => 'required',
          'user_id' => 'required',
          'genre_id' => 'required'
        ));
        //validate the slug
        //$this->validate($slug, 'required|alpha_dash|min:5|max:255|unique:posts,slug');

        //store in the Database
        $post = new Post;
        $post->user_id = $request->user_id;
        $post->title = $request->title;
        $post->slug = $slug;
        $post->body = $request->body;
        $post->genre_id = $request->genre_id;
        $post->save();

        $user_id = $request->user_id;
        $user = User::find($user_id);

        //dd($post);
        //exit;

        Session::flash('success', 'Se ha publicado su comentario');
        //redirect
        return redirect()->action(
          'BlogController@getSingle', ['slug' => $slug]);

    }

    /**
     * Display the specified resource. Muestra un posteo específico.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //public function show($id)
    //{
        //$post = Post::find($id);
        //return view('posts.show')->with('post', $post);
    //}

    public function show ($slug) {
      //fetch from the DB based on Slugs
      $post = Post::where('slug', $slug)->first();
      //return the view and pass in the post object

          //dd($post);
          //exit;

    return view('blog.single')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        $genre = Genre::all();
        return view('posts.edit')->with('post', $post)->with('genre', $genre)->with('user', $user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //Validate the Data
        $post = Post::find($id);
        if ($request->input('slug') == $post->slug) {
          $this->validate($request, array(
            'title' => 'required|max:191',
            'body' => 'required',
            'user_id' => 'required',
            'genre_id' => 'required'));
        } else {
        $this->validate($request, array(
          'title' => 'required|max:191',
          'slug' => 'required|alpha_dash|min:5|max:255|unique:posts,slug',
          'body' => 'required',
          'user_id' => 'required',
          'genre_id' => 'required'
        ));
        }
        //Save the data to the Database
        $post = Post::find($id);

        $post->user_id = $request->input('user_id');
        $post->title = $request->input('title');
        $post->slug = $request->input('slug');
        $post->body = $request->input('body');
        $post->genre_id = $request->input('genre_id');

        $slug = $request->slug;

        $post->save();

        //set flash data with success message
        Session::flash('success', "La publicación se ha modificado.");

        //redirect with flash data to posts.show
        return redirect()->action(
          'BlogController@getSingle', ['slug' => $slug]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);

        $post->delete();

        Session::flash('success', "La publicación ha sido eliminada.");

        return redirect()->route('posts.index');
    }
}
