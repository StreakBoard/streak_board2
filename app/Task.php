<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\Http\Controllers\TaskController;


class Task extends Model
{

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'task', 'user_id', 'team_id' , 'task_status',
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
