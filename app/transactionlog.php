<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\RegisterController;
use Eloquent;

class transactionlog extends Model
{
    protected $fillable = [
        'Subscription', 'billingperiod' , 'cardinfo'
    ];
}
