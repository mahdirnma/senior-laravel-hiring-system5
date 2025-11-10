<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Applicant extends User
{
    use HasApiTokens, Notifiable;
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
        return $this->belongsToMany(Job::class)
            ->withPivot([
                'current_status',
                'current_company',
                'hiring_description',
                'resume_description',
                'location',
                'requested_salary',
                'status',
            ]);
    }

}
