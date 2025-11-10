<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Apply extends Model
{
    protected $table = 'applicant_job';
    protected $fillable=[
        'job_id',
        'applicant_id',
        'status',
        'current_status',
        'current_company',
        'hiring_description',
        'resume_description',
        'location',
        'requested_salary',
    ];
}
