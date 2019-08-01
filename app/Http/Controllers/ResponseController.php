<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Response;
use App\Post;
use Session;

class ResponseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      //store in the Database
      $response = new Response;
      $response->user_id = $request->user_id;
      $response->post_id = $request->post_id;
      $response->comment_id = $request->comment_id;
      $response->body = $request->body;
      $response->save();

      //get the post's Slug
      $post_id = $request->post_id;
      $post = Post::where('id', $post_id)->first();
      $slug = $post->slug;

      //return to single.blade.php
      Session::flash('success', 'Se ha publicado su respuesta');
      //redirect
      return redirect()->action(
        'BlogController@getSingle', ['slug' => $slug]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
