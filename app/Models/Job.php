<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $fillable=[
        'title',
        'description',
        'salary',
        'working_days',
        'working_hours',
        'department',
        'type',
        'company_id',
        'is_active',
    ];
    public function company(){
        return $this->belongsTo(Company::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function applicants()
    {
        return $this->belongsToMany(Applicant::class)
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
