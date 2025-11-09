<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Manager extends User
{
    protected $fillable=[
        'name',
        'email',
        'password',
    ];

}
