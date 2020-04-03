<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use \App\Task;
use \App\TeamMember;
use \App\Team;
use App\Streak;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

       $id = DB::table('teams')->where('user_id', \Auth::user()->id)->first();
       
        $team_id_from_members = DB::table('team_members')->where('user_id', \Auth::user()->id)->first();

        if($team_id_from_members){
            
              $TesmId = $team_id_from_members->team_id;
        }
        
        if($id){
              $TesmId = $id->id;

        }
      
       return Redirect::route('get_id',$TesmId);


    }
}
