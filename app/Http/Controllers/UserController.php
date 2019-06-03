<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Language;
use Image;
use Carbon\Carbon;


class UserController extends Controller
{
    public function profile()
    {
      $user_id = auth()->user()->id;
      $user = User::find($user_id);
      $languages = Language::orderBy('value', 'asc')->get();
      $myTime = Carbon::now('America/Argentina/Buenos_Aires');
      return view('profile')->with('user', $user)->with('languages', $languages)->with('myTime', $myTime);
    }

    public function edit()
    {
      $user_id = auth()->user()->id;
      $user = User::find($user_id);
      $languages = Language::orderBy('value', 'asc')->get();
      $myTime = Carbon::now('America/Argentina/Buenos_Aires');
      return view('editprofile')->with('user', $user)->with('languages', $languages)->with('myTime', $myTime);
    }

    public function update(Request $request, $id)
    {
      //dd($request);
      //exit;
      //Manejo del archivo
      if($request->hasFile('user_image')){
        //Get filename with extension
        $filenameWithExt = $request->file('user_image')->getClientOriginalName();
        //Get just $filename
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        //Get just ext
        $extension = $request->file('user_image')->getClientOriginalExtension();
        //Filename to store
        $filenameToStore = $filename.'_'.time().'.'.$extension;
        //Upload image
        $path = $request->file('user_image')->storeAs('public/uploads/user_images', $filenameToStore);
        }

      // Update User
      $user = User::find($id);
      $user->name = $request->input('name');
      $user->gender = $request->input('gender');
      $user->birth = $request->input('birth');
      $user->city = $request->input('city');
      $user->province_state = $request->input('province_state');
      $user->country = $request->input('country');
      if($request->hasFile('user_image')) {
        $user->user_image = $filenameToStore;
        }
      $user->save();

      $langids = $request->input('language_id');
      $user->language()->sync($langids);

      return redirect('/profile')->with('success', 'Usted ha modificado su perfil');
    }

}
