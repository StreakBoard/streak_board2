<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Streak;

class StreakController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
      
        
    }
    public function status()
    {
       

        $matchThese = ['user_id' => \Auth::user()->id];
        $streaks = Streak::where($matchThese)->first();
        if($streaks){
        $streaks->status="Disabled";
        $streaks->save();
         return redirect("/team_dashboard");
}
    }

 public function Enabledstatus()
    {
        $matchThese = ['user_id' => \Auth::user()->id];
        $streaks = Streak::where($matchThese)->first();
        if($streaks){
        $streaks->status="Enabled";
        $streaks->save();
         return redirect("/team_dashboard");
}
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
