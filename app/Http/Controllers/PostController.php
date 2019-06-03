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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $user_id = auth()->user()->id;
      $user = User::find($user_id);
      $user_posts = Post::where('user_id', $user_id)->get();
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
        //validate the Data
        $this->validate($request, array(
          'title' => 'required|max:191',
          'body' => 'required',
          'user_id' => 'required',
          'genre_id' => 'required'
        ));
        //store in the Database
        $post = new Post;
        $post->user_id = $request->user_id;
        $post->title = $request->title;
        $post->body = $request->body;
        $post->genre_id = $request->genre_id;
        $post->save();

        //dd($post);
        //exit;

        Session::flash('success', 'Se ha publicado su aporte');
        //redirect
        return view('posts.show')->with('post', $post);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show')->with('post', $post);//
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
