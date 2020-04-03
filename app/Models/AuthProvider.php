<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class AuthProvider extends Model
{
    protected $table = 'auth_providers';

    const PROVIDER_APPLE = 'APPLE';
    const PROVIDER_GOOGLE = 'GOOGLE';
    const PROVIDER_MICROSOFT = 'MICROSOFT';

    /**
     * Get the user that owns this data.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
