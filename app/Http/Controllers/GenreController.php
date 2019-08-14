<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Genre;
use Carbon\Carbon;
use Session;

class GenreController extends Controller
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
      //validate the Data
      $this->validate($request, array(
        'value' => ['required', 'unique:genres'],
        'description' => 'required'
      ));
      //store in the Database
      $genre = new Genre;
      $genre->value = $request->value;
      $genre->description = $request->description;
      $genre->save();
      Session::flash('success', 'Se ha creado un nuevo género');
      //redirect
      return redirect('/admin/admindashboard');
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

      $genre = Genre::find($id);
      $myTime = Carbon::now('America/Argentina/Buenos_Aires');

      //dd($request);
      //exit;

      if($request->input('description')) {
        $genre->description = $request->input('description');
      }

      //closed_at == 0 means genre has been closed
      //closed_at == 1 means genre is active
      if($genre->closed_at == null AND $request->input('close_flag') == 0) {
        $genre->closed_at = $myTime;
        } else {
          if($genre->closed_at !== null AND $request->input('close_flag') == 1) {
            $genre->closed_at = null;
          }
        }

      $genre->save();
      return redirect('/admin/admindashboard');

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
