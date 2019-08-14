<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Language;
use Carbon\Carbon;
use Session;

class LanguageController extends Controller
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
      $language = new Language;
      $language->value = $request->value;
      $language->save();
      Session::flash('success', 'Se ha agregado un nuevo idioma');
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
      $language = Language::find($id);
      $myTime = Carbon::now('America/Argentina/Buenos_Aires');

      //dd($request);
      //exit;

      //closed_at == 0 means genre has been closed
      //closed_at == 1 means genre is active
      if($language->closed_at == null AND $request->input('close_flag') == 0) {
        $language->closed_at = $myTime;
        } else {
          if($language->closed_at !== null AND $request->input('close_flag') == 1) {
            $language->closed_at = null;
          }
        }

      $language->save();
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
