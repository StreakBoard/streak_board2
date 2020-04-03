<?php

namespace App\Http\Controllers;
use App\TeamMember;
use Illuminate\Http\Request;
use App\Http\Controllers\RegisterController;
use DB;
class TeamMemberController extends Controller
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
      TeamMember::create([
                'team_id' => $team->id,
                'user_id' => $user->id
                  ]);
      return redirect()->route('dashboard');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    public function store(Request $request)
    {
///it will display all data in members table
      $team_id = $request->session()->get('team_id');

      $users = DB::table('team_members')
      ->join('users', 'users.id', '=', 'team_members.user_id')
      ->join('teams', 'teams.id', '=', 'team_members.team_id')
      ->select('users.name','users.id as Uid', 'teams.*')
      ->where(['team_members.team_id' => $team_id,'teams.id' => $team_id,])
      ->get();
         // dd($users);

      return view('pages.member', compact('users'));





 }



    /**
     * Display the specified resource.
     *
     * @param  \App\TeamMember  $teamMember
     * @return \Illuminate\Http\Response
     */
    public function show(TeamMember $teamMember)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TeamMember  $teamMember
     * @return \Illuminate\Http\Response
     */
    public function edit(TeamMember $teamMember)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TeamMember  $teamMember
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TeamMember $teamMember)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TeamMember  $teamMember
     * @return \Illuminate\Http\Response
     */
    public function destroy(TeamMember $teamMember)
    {
        //
    }

    public function create_member(){


      return redirect()->route('dashboard');
    }
}
