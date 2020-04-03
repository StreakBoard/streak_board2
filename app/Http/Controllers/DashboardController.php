<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use \App\Task;
use \App\TeamMember;
use \App\Team;
use App\Streak;
use DB;
class DashboardController extends Controller
{
public function get_id(Request $request,$id){
//we create session for team id
$request -> session()->put('team_id', $id);
$team_id = $request->session()->get('team_id');
return Redirect::route('team_dashboard');
}
public function team_dashboard(Request $request)
{
// $team_id = $request->session()->get('team_id');
$team_id = Session::get('team_id');
$streaks = Streak::where('user_id',\Auth::user()->id)->where('team_id',$team_id)->first();
if($streaks!="")
{
$current_date = $streaks->curr_date;
$todayDate = date("Y-m-d");
if($todayDate)
{
if("Enabled" ==  $streaks->status)
{
$tasks = Task::where('user_id',\Auth::user()->id)->where('task_status',1)->orderby('id','ASC')->first();
$result = $tasks->id == $streaks->task_id;
if($result)
{
// $streaks->streaks_no = 0;
$streaks->save();
}
}
}
}
// this query is used to fetch members and team name of the user
$users = DB::table('team_members')
->join('users', 'users.id', '=', 'team_members.user_id')
->join('teams', 'teams.id', '=', 'team_members.team_id')
->select('users.name','users.id as Uid', 'teams.*')
->where(['team_members.team_id' => $team_id,'teams.id' => $team_id,])
->get();
$user_data = $users;
$user_name = $users;
// this query is used to fetch team members id's
$user_ids = DB::table('team_members')
->join('users', 'users.id', '=', 'team_members.user_id')
->select('users.id')
->where(['team_members.team_id' => $team_id ])
->get();
// this query is used to count the individual task which is not submitted using team id and user id
$task_count = [];
foreach ($user_ids as $uid):
$matchThese = ['user_id' => $uid->id, 'team_id' => $team_id];
$task_count[] = Task::where($matchThese)->count();
endforeach;
//this query is used to fetch all task which is not submitted by member
$matchThese = ['user_id' => \Auth::user()->id, 'task_status' => 0, 'team_id' => $team_id];
$tasks = Task::where($matchThese) ->orderBy('id', 'DESC')->get();
//this query is used to fetch all task which is  submitted by member
$matchThese = ['user_id' => \Auth::user()->id, 'task_status' => 1, 'team_id' => $team_id];
$tasks_submited = Task::where($matchThese)->get();
$team_tasks = [];
foreach ($user_ids as $uid):
$matchThese = ['user_id' => $uid->id, 'team_id' => $team_id];
$team_tasks[] = DB::table('tasks')
->select('task','created_at')
->where($matchThese)
->orderBy('created_at', 'asc')
->get();
endforeach;
//=====================================================================================================================
// pass data to team dashboard
$request->session()->flash('notify', 'We have sent you a verification email. Please verify your account in order to unlock all of Streaks features.');
return view('pages.home',compact('users', 'task_count', 'tasks', 'team_tasks', 'tasks_submited','user_data','user_name'));
}
}