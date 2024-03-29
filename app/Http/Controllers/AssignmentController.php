<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Assignment;
use Carbon\Carbon;
use Session;

class AssignmentController extends Controller
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
        'title' => ['required', 'unique:assignments'],
        'description' => 'required'
      ));
      //store in the Database
      $assignment = new Assignment;
      $assignment->title = $request->title;
      $assignment->description = $request->description;
      $assignment->save();
      Session::flash('success', 'Se ha creado una nueva consigna');
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
      $assignment = Assignment::find($id);
      $myTime = Carbon::now('America/Argentina/Buenos_Aires');

      //dd($request);
      //exit;

      if($request->input('description')) {
        $assignment->description = $request->input('description');
      }

      //closed_at == 0 means genre has been closed
      //closed_at == 1 means genre is active
      if($assignment->closed_at == null AND $request->input('close_flag') == 0) {
        $assignment->closed_at = $myTime;
        } else {
          if($assignment->closed_at !== null AND $request->input('close_flag') == 1) {
            $assignment->closed_at = null;
          }
        }

      $assignment->save();
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
