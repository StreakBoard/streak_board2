<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Http\Controllers\TaskController;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
Use Redirect;
use Auth;
use DB;
use App\User;
use App\Team;
use App\transactionlog;
use App\TeamMember;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'team_name' =>['string', 'max:25'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'avatar' =>['string'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {

        $user = User::create([
           'team_name' => $data['team_name'],
           'name' => $data['name'],
           'email' => $data['email'],
           'password' => Hash::make($data['password']),
//           'avatar' => "0",
       ]);

       if ($user) {
         $team = Team::create([
         'team_name' => $user->team_name,
         'user_id' => $user->id,
           ]);

       }

      transactionlog::create([
        'Subscription' => 'STARTER',
         'billingperiod'=> 'One Month',
         'cardinfo' => $user->id,
        ]);

              TeamMember::create([
                 'team_id' => $team->id,
                 'user_id' => $user->id,
                   ]);

  return  $user;
    }

}
