<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = ['fname', 'lname', 'email'];

    protected $hidden = [
        'password',
    ];
}
