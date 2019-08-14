<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Genre;
use App\Assignment;
use App\Language;
use Carbon\Carbon;

class AdminDashboardController extends Controller
{
    public function index() {

      $genres = Genre::all();
      $assignments = Assignment::all();
      $languages = Language::all();
      $myTime = Carbon::now('America/Argentina/Buenos_Aires');

      return view ('admin.admindashboard')->with('genres', $genres)->with('assignments', $assignments)->with('languages', $languages)->with('myTime', $myTime);
    }
}
