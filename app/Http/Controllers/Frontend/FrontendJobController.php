<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Job;

class FrontendJobController extends Controller
{
    public function AllFrontendJobList(){

        $jobs = Job::latest()->get();
        return view('frontend.job.all_jobs',compact('jobs'));
    } // End Method 
    public function JobDetailsPage($id){

        $jobdetails = Job::find($id);
        return view('frontend.job.job_details',compact('jobdetails'));
    }
}
