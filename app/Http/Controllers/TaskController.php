<?php

namespace App\Http\Controllers;
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use App\Task;
use DB;
use App\Streak;
use Carbon\Carbon;
use App\Quotation;
class TaskController extends Controller
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
      // var_dump(request('New-Task'));

      $users = DB::table('users')->select('name', 'email as user_email')->get();

      $team_id = DB::table('team_members')
      ->select('team_id')
      ->where('user_id',\Auth::user()->id)
      ->get();

        $task = new Task;
        $task->task = request('New-Task');
        $task->user_id = \Auth::user()->id;
        $task->team_id = $team_id[0]->team_id;
        $task->save();
        // return redirect()->back()->with('message', 'IT WORKS!');
        return redirect()->route('dashboard');
        // $this->show();
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   }
    public function show()
    {

     return redirect()->route('dashboard');

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
    public function update(Request $request)
    {
      $task = new Task;
        $id = $request->input('tskids');
      $count = count($id);
      for ($i=0; $i < $count ; $i++) {
        DB::table('tasks')
        ->where('id', $id[$i])
        ->update(['task_status' => 1]);
      }

      $tasks = Task::where('id',$id)->first();
      $team_id=$tasks->team_id;
      $taskid = $tasks->id;




       return redirect()->route('dashboard');
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

    public function taskHistory(Request $request){

      $team_id = $request->session()->get('team_id');

      $matchThese = ['user_id' => \Auth::user()->id, 'task_status' => 1, 'team_id' => $team_id];
      $task_history = Task::where($matchThese)->get();
      return view('pages/take-history',['task_history' => $task_history]);
    }

public function add_task_to_database(Request $request){

$team_id = $request->session()->get('team_id');
  //add task to the database
  $task = new Task;
  $task->task = request('New-Task');
  $task->user_id = \Auth::user()->id;
  $task->team_id = $team_id;
  $task->save();
              $request->session()->flash('message_task', 'Task Added!');
    return redirect()->route('team_dashboard');
}

//function used to submit task  or update in the database

public function submit_tasks(Request $request){

  $team_id = $request->session()->get('team_id');

  $task = new Task;
    $id = $request->input('tskids');

if ($id > 0) {
  $count = count($id);
  for ($i=0; $i < $count ; $i++) {
    DB::table('tasks')
    ->where('id', $id[$i])
    ->update(['task_status' => 1]);
}

$taskId = Task::where('user_id',\Auth::user()->id)->where('team_id',$team_id)->orderby('id','DESC')->first();
$tasklastid=$taskId->id;
$streaks = Streak::where('user_id',\Auth::user()->id)->where('team_id',$team_id)->first();
    //   echo $streaks;
      if(!$streaks)
      {
        $streaks = new  Streak();
        $streaks->streaks_status = 'basic';
        $streaks->streaks_no = 1;
        $streaks->user_id = \Auth::user()->id;
        $streaks->team_id = $team_id;
        $streaks->status = "Enabled";
        $streaks->task_id = $tasklastid=$taskId->id;
        $streaks->curr_date = date("Y-m-d");
        $streaks->save();

      }

      else{
        $CheckStatusStreaks=$streaks->status;
        if($CheckStatusStreaks=="Enabled")
        {
          $streaks = Streak::where('user_id',\Auth::user()->id)->where('team_id',$team_id)->first();
          $todayDate = date("Y-m-d");

          if($todayDate ==  $streaks->curr_date)
        {
          $streaks->streaks_status = 'basic';
          $streaks->status = "Enabled";
          $streaks->task_id = $tasklastid=$taskId->id;
          $streaks->save();
          }


        else{
          $streaks = Streak::where('user_id',\Auth::user()->id)->where('team_id',$team_id)->first();
          $StreakCount=$streaks->streaks_no;
          if($StreakCount)
          {

            $streaks->streaks_status = 'basic';
            $streaks->streaks_no = $StreakCount + 1;
            $streaks->user_id = \Auth::user()->id;
            $streaks->team_id = $team_id;
            $streaks->status = "Enabled";
            $streaks->task_id = $tasklastid=$taskId->id;
            $streaks->curr_date =  date("Y-m-d");
            $streaks->save();
        }
      }
          }


          else{
            $streaks->streaks_status = 'basic';
            $streaks->streaks_no = 1;
            $streaks->user_id = \Auth::user()->id;
            $streaks->team_id = $team_id;
            $streaks->status = "Enabled";
            $streaks->task_id = $tasklastid=$taskId->id;
            $streaks->curr_date =  date("Y-m-d");
            $streaks->save();

        }
      }


  }
  return redirect()->route('team_dashboard');

}


public function TaskloadData()
{
     $team_id = session()->get('team_id');
    $tasks = Task::where('user_id',\Auth::user()->id)->where('team_id',$team_id)->orderby('id','ASC')->where('task_status',0)->first();
    return json_encode(array('data'=>$tasks));

}
public function SubmitTaskloadData()
{
     $team_id = session()->get('team_id');
    $tasks = Task::where('user_id',\Auth::user()->id)->where('team_id',$team_id)->orderby('id','ASC')->where('task_status',1)->first();
    return json_encode(array('data'=>$tasks));

}

    public function delete_tasks()
    {
        $id = request()->except('_token');

        if ($id > 0) {
            $count = count($id['tskids']);
            for ($i = 0; $i < $count; $i++) {
                DB::table('tasks')
                    ->where('id', $id['tskids'][$i])
                    ->delete();
            }
        }
        return json_encode(array('data'=>[]));
    }


}
