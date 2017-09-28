<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    protected $table = 'followed';

    protected $fillable = [
        'user_id' , 'follow_id',
    ];

}
