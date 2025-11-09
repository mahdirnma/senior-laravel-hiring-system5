<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
    protected $fillable=[
        'name',
        'email',
        'password',
        'is_active',
    ];

    public function companies()
    {
        return $this->belongsToMany(Company::class);
    }
    public function jobs(){
        return $this->belongsToMany(Job::class);
    }

}
