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
      $user->alias = $request->input('alias');
      $user->name = $request->input('name');
      $user->gender = $request->input('gender');
      $user->birth = $request->input('birth');
      $user->city = $request->input('city');
      $user->province_state = $request->input('province_state');
      $user->country = $request->input('country');
      $user->about = $request->input('about');

      //$user->priv_about= $request->input('priv_about');

      if($request->input('priv_id')) {
        $user->priv_id = '1';
      } else {
        $user->priv_id = '0';
      }
      if($request->input('priv_name')) {
        $user->priv_name = '1';
      } else {
        $user->priv_name = '0';
      }
      if($request->input('priv_email')) {
        $user->priv_email = '1';
      } else {
        $user->priv_email = '0';
      }
      //$user->priv_user_image = $request->input('priv_user_image');
      if($request->input('priv_gender')) {
        $user->priv_gender = '1';
      } else {
        $user->priv_gender = '0';
      }
      if($request->input('priv_birth')) {
        $user->priv_birth = '1';
      } else {
        $user->priv_birth = '0';
      }
      if($request->input('priv_city')) {
        $user->priv_city = '1';
      } else {
        $user->priv_city = '0';
      }
      if($request->input('priv_province_state')) {
        $user->priv_province_state = '1';
      } else {
        $user->priv_province_state = '0';
      }
      if($request->input('priv_country')) {
        $user->priv_country = '1';
      } else {
        $user->priv_country = '0';
      }
      if($request->input('priv_about')) {
        $user->priv_about = '1';
      } else {
        $user->priv_about = '0';
      }

      if($request->hasFile('user_image')) {
        $user->user_image = $filenameToStore;
        }

      $user->save();

      $langids = $request->input('language_id');
      $user->language()->sync($langids);

      return redirect('/profile')->with('success', 'Usted ha modificado su perfil');
    }

}
