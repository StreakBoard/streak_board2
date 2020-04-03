<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Team;
use App\TeamMember;
use App\transactionlog;
use App\Package;
use App\Task;
use Auth;
use App\Http\Controllers\RegisterController;
use DB;

class TeamController extends Controller
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
    
    $checkTeamCount = Team::where('user_id',\Auth::user()->id)->Count();
    $transactionlog =  transactionlog::where('cardinfo',\Auth::user()->id)->orderby('id','DESC')->first();
    $currentPackage = $transactionlog->Subscription;
    $currentPackageCount = Package::where('title',$currentPackage)->first();
    $count = $currentPackageCount->desc1;
      
      if($checkTeamCount != $count)
      {

        echo "salam";
    //   $team = Team::create([
    //     'team_name' => $user->team_name,
    //     'user_id' => $user->id
    //       ]);
          
      }
      else{
          echo "<script>alert('Your Current Packages is Team Limit Over')</script>";
      }
        //   return redirect()->route('teamMember', [$team]);

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
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function show(Team $team)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function edit(Team $team)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Team $team)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function destroy(Team $team)
    {
        //
    }
    // //////////////////////////////////////////////////////////////////////////////////////////////////

    public function create_team(Request $request){

    $matchThese = ['user_id' =>\Auth::user()->id];
    
    $task_count = Team::where($matchThese)->count();
 if ($task_count) {
    $transactionlog =  transactionlog::where('cardinfo',\Auth::user()->id)->orderby('id','DESC')->first();
    $currentPackage = $transactionlog->Subscription;
    
    $currentPackageCount = Package::where('title',$currentPackage)->first();
    $count = $currentPackageCount->desc2;
      
      if($task_count < $count)
      {
        $team = Team::create([
      'team_name' => request('team_name'),
      'user_id' => \Auth::user()->id
        ]);
      TeamMember::create([
      'team_id' => $team->id,
      'user_id' => \Auth::user()->id
        ]);
    
           return redirect()->route('team_dashboard');

      }
      if($currentPackage == "UNLIMITED"){
            
        $team = Team::create([
          'team_name' => request('team_name'),
          'user_id' => \Auth::user()->id
            ]);
    
    
          TeamMember::create([
          'team_id' => $team->id,
          'user_id' => \Auth::user()->id
            ]);
          return redirect()->route('team_dashboard');

        }
        return redirect("/upgradeaccount")->with('message', 'Please Upgrade Your Package then you able to create teams');
 }else{

            return redirect("/create-team");
 }
    }
    // //////////////////////////////////////////////////////////////////////////////////////////////////
    
    //to get the information of team edit 
    public Function edit_team(Request $request){
        
        $team_id = $request->session()->get('team_id');
        $team_name =DB::table('teams')
        ->select('team_name')
        ->where('id','=',$team_id)
        ->get();
    //   dd($team_name);
      return view('pages.editTeam',compact('team_name'));

     
    }
    
    
    public function update_team_name(Request $request){
        
            $team_id = $request->session()->get('team_id');
            $team_name = $request->input('tname');
            if($team_name){
                
            DB::table('teams')
            ->where('id', $team_id)
            ->update(['team_name' => $team_name]);
            }

            return redirect()->route('team_dashboard');

        
    }
}
