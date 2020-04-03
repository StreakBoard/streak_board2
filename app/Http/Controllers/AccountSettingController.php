<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
class AccountSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return view('pages/account-setting')->with('user',Auth::user());
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
    public function edit(Request $request)
    {

//if user change profile picture
      if ((request()->has('avatar') ) ) {
      $avataruploaded = request()->file('avatar');
      $avatarname = time().'.'.$avataruploaded->getClientOriginalExtension();
      $avatarpath = public_path('/images');
      $avataruploaded->move($avatarpath,$avatarname);
      DB::table('users')
      ->where('id', \Auth::user()->id)
      ->update(['avatar' => '/images/'.$avatarname]);
    
    }
    
//if user change passowrd
      if(request()->input('Confirm-password')){
        if (request()->input('Confirm-password')  == request()->input('password')) {
          $password = request()->input('uname');
          DB::table('users')
          ->where('id', \Auth::user()->id)
          ->update(['password' => $password]);
        
        }
      }
///////////////////////////////////////

//if user only change name
            if (request()->input('uname')){
             $uname = request()->input('uname');
              DB::table('users')
                ->where('id', \Auth::user()->id)
                ->update(['name' => $uname]);
            
              }
              

/////////////////////////////////
//if user only change email
if (request()->input('uemail')){
  if (request()->input('uemail')  == request()->input('Confirm-email')) {
    $uemail = request()->input('uemail');
    DB::table('users')
              ->where('id', \Auth::user()->id)
              ->update(['email' => $uemail]);
            
  }
  
    
}else{
  session()->flash('info', 'Something Wrong');
}

session()->flash('message', 'Setting updated successfully!');
      return redirect()->route('account-setting');

/////////////////////////////////

    }
//////////////////////////////////////

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        DB::table('users')->delete(\Auth::user()->id);
        return redirect()->route('login');

    }
}
