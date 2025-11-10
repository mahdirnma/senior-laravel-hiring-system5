<?php

namespace App\Http\Controllers;

use App\Models\Apply;
use App\Models\Manager;
use App\Http\Requests\StoreManagerRequest;
use App\Http\Requests\UpdateManagerRequest;

class ManagerController extends Controller
{
    public function dashboard()
    {
        return view('manager.dashboard');
    }

    public function applies()
    {
        $applies = Apply::paginate(10);
        return view('manager.applies.index',compact('applies'));
    }

    public function applyAccept(Apply $apply)
    {
        if ($apply->status=='pending') {
            $apply->update(['status'=>'interview']);
        }elseif ($apply->status=='interview') {
            $apply->update(['status'=>'confirmed']);
        }else{
            return redirect()->route('manager.applies');
        }
        return redirect()->route('manager.applies');
    }

    public function applyReject(Apply $apply)
    {
        $apply->update(['status'=>'rejected']);
        return redirect()->route('manager.applies');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreManagerRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Manager $manager)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Manager $manager)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateManagerRequest $request, Manager $manager)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Manager $manager)
    {
        //
    }
}
