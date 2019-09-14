<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Read;
use App\Post;

class ReadController extends Controller
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
    public function create(Request $request)
    {
      $my_reads = new Read;
      $my_reads->user_id = $request->user_id;
      $my_reads->post_id = $request->post_id;
      $my_reads->my_read = 1;
      $my_reads->save();

      //search for the post's slug to return the view
      $id = $my_reads->post_id;
      $post = Post::find($id);
      $slug = $post->slug;

      //redirect with flash data to single.blade
      return redirect()->action(
        'BlogController@getSingle', ['slug' => $slug]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
      //Save the data to the Database
      $read = Read::find($id);
      $read->my_read = $request->input('my_read');
      $read->save();

      //search for the post's slug to return the view
      $post_id = $read->post_id;
      $post = Post::find($post_id);
      $slug = $post->slug;

      //redirect with flash data to single.blade
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
        //
    }
}
