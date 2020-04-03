<?php
namespace App\Http\ViewComposers;
use Illuminate\View\View;
use App\Repositories\UserRepository;
use Auth;
use App\Task;
use App\TeamMember;
use App\Team;

use DB;
class NavigationViewComposer
{
    public function compose($view)
    {
        if(Auth::check()){
            $teams = DB::table('users')
      ->join('team_members', 'users.id', '=', 'team_members.user_id')
      ->join('teams', 'teams.id', '=', 'team_members.team_id')
      ->select('team_members.team_id', 'teams.team_name')
      ->where('users.id',Auth::user()->id)
      ->get();
        $view->with(array('teams' => $teams));
        }
     
    }
}
