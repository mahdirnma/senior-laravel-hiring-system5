<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreApplyRequest;
use App\Models\Applicant;
use App\Models\Company;
use App\Models\Job;
use App\Http\Requests\StoreJobRequest;
use App\Http\Requests\UpdateJobRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $jobs = Job::where('is_active',1);
        if ($request->department!=null) {
            $jobs->where('department',$request->department);
        }
        if ($request->company!=null) {
            $jobs->where('company_id',$request->company);
        }
        if ($request->type!=null){
            $jobs->where('type',$request->type);
        }
        $jobs=$jobs->paginate(10);
        $companies=Company::where('is_active',1)->get();
        return view('jobs.index',compact('jobs','companies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $companies=Company::where('is_active',1)->get();
        return view('jobs.create',compact('companies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreJobRequest $request)
    {
        $job=Job::create($request->all());
        if($job){
            return redirect()->route('jobs.index');
        }
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Job $job)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Job $job)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateJobRequest $request, Job $job)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Job $job)
    {
        //
    }

    public function applyForm(Job $job)
    {
        return view('jobs.apply',compact('job'));
    }
    public function apply(StoreApplyRequest $request, Job $job){
        $applicant=Auth::guard('applicants')->user();
        $job->applicants()->attach($applicant->id,[
            'current_company'=>$request->current_company,
            'current_status'=>$request->current_status,
            'hiring_description'=>$request->hiring_description,
            'resume_description'=>$request->resume_description,
            'location'=>$request->location,
            'requested_salary'=>$request->requested_salary
        ]);
    }
}
