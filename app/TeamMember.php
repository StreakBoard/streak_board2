<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\RegisterController;
use Eloquent;


class TeamMember extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'team_id', 'user_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    // protected $hidden = [
    //     'password', 'remember_token',
    // ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
      */
    // protected $casts = [
    //     'email_verified_at' => 'datetime',
    // ];
}
