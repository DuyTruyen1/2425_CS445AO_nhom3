<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Messenger extends Model
{
    protected $table = 'messenger';

    protected $fillable = [
        'fk_user_id', 'fk_thread_id', 'message'
    ];
}
