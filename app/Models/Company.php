<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable=[
        'title',
        'description',
        'address',
        'is_active',
    ];
    public function jobs()
    {
        return $this->hasMany(Job::class);
    }
    public function applicants(){
        return $this->belongsToMany(Applicant::class);
    }

}
