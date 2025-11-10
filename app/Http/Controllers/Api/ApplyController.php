<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ApplyResource;
use App\Models\Apply;
use App\Services\ApiResponseBuilder;
use App\Services\ApplyService;
use App\Services\ResponseService;
use Illuminate\Http\Request;

class ApplyController extends Controller
{
    public function __construct(public ApplyService $service){}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $result=$this->service->allApplies();
        return (new ApiResponseBuilder())->data(ApplyResource::collection($result->data))->response();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Apply $apply)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Apply $apply)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Apply $apply)
    {
        //
    }
}
