<?php

namespace App\Services;

use App\Models\Apply;
use Illuminate\Support\Facades\Auth;

class ApplyService
{
    public function allApplies()
    {
        return app(TryService::class)(function (){
            $user=Auth::guard('api_applicants')->user();
            return $user->jobs;
        });
    }
}
