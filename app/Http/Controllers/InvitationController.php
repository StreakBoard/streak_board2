<?php

namespace App\Http\Controllers;
use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Invitation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\User;
use App\transactionlog;
use App\Package;
use App\TeamMember;
use DB;
use Auth;

class InvitationController extends Controller
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


public function create_link($team_id){


}
//this function is used to send the inviation email



    /**
     * Display the specified resource.
     *
     * @param  \App\Invitation  $invitation
     * @return \Illuminate\Http\Response
     */
    public function show(Invitation $invitation)
    {
      // // $Invitation = new Invitation;
      // $Invitation = request('uemail');
      // Mail::to($Invitation)->send(new WelcomeMail());
      // return redirect()->route('dashboard');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Invitation  $invitation
     * @return \Illuminate\Http\Response
     */
    public function edit(Invitation $invitation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Invitation  $invitation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Invitation $invitation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Invitation  $invitation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Invitation $invitation)
    {

    }

//this method is used to register invite member
    public function store(Request $request, $id)
    {
        
              $user = User::create([
                 'team_name' => "member",
                 'name' => request('name'),
                 'email' => request('email'),
                 'password' => Hash::make(request('password')),
                 'avatar' => "0"
             ]);

             if ($user) { TeamMember::create([
                       'team_id' => $id,
                       'user_id' => $user->id
                         ]);
                         
          return redirect()->route('login');
    }
  }

//this function is used when user click on the join button it will show the signup page
    public function join_team($id){
        
        if (Auth::user()){
            return view('pages.teamjoin',['team_id' =>$id]);
        }
        else{
            return view('pages.join',['team_id' =>$id]);
            
        }
    }


// this function is used to load inviation page
public function invitation_page($team_id){
      return view('pages.invite',compact('team_id'));
}

public function send_inviation(Request $request)
{
    /// to check the email if user verified their email then able to ivite members
//     $email_verified_at = DB::table('users')
//     ->select('email_verified_at')
//     ->where('id', '=', \Auth::user()->id)
//     ->get();
    
    
// if (is_null($email_verified_at))
// {
//                 $request->session()->flash('error', 'Error: Please verify your Email first.');

//   return redirect("https://staging.wpcoders.co.uk/getstreak/upgradeaccount");

// }



    $team_id = Session::get('team_id'); 
    $matchThese = ['team_id' => $team_id];
    $task_count = TeamMember::where($matchThese)->count();
 
    $transactionlog =  transactionlog::where('cardinfo',\Auth::user()->id)->orderby('id','DESC')->first();
    $currentPackage = $transactionlog->Subscription;
    
    $currentPackageCount = Package::where('title',$currentPackage)->first();
    $count = $currentPackageCount->desc1;
    if($task_count < $count)
      {
    $email = request('uemail');
    $team_id = $request->session()->get('team_id');
     $matchThese = ['team_id' =>$team_id]; 
     $data = [ 'team_id' =>$team_id, ];
    \Mail::to($email)->queue(new WelcomeMail($data));
    return redirect()->route('team_dashboard');

      }
      if($currentPackage == "UNLIMITED"){
      $email = request('uemail');
    $team_id = $request->session()->get('team_id');
     $matchThese = ['team_id' =>$team_id]; 
     $data = [ 'team_id' =>$team_id, ];
    \Mail::to($email)->queue(new WelcomeMail($data));
    return redirect()->route('team_dashboard');
      }
      
  return redirect("/upgradeaccount")->with('message', 'Please Upgrade Your Package then you able to invit members');
}

public function team_join($id){
    
                        TeamMember::updateOrCreate([
                       'team_id' => $id,
                       'user_id' => \Auth::user()->id
                         ]);
    
    return redirect()->route('team_dashboard');

}

//
}
