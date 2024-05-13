<?php

namespace App\Http\Controllers\Backend;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Job;
use Str;
class JobController extends Controller
{
    // public function AllJob(){
    //     $data['getRecord']=Job::getJob();
    //     return view('backend.job.all_job',$data);
    // }
    public function AllJob()
{
    // Check if the user can view any jobs
    $this->authorize('viewAny', Job::class);
    
    // Fetch jobs based on the user's role
    $user = Auth::user();
    if ($user->hasRole('Super User')) {
        $data['getRecord']=Job::getJob();
    } else {
        $data['getRecord']= Job::where('user_id', $user->id)->get();
    }    
    return view('backend.job.all_job', $data);
}
    public function AddJob(){
        $data['header_title'] = "Add Testimonial";
        return view('backend.job.add_job',$data);
    }
    public function StoreJob(Request $request){

        request()->validate([
            'name' => 'required',
            'description'=>'required', 
        ]);
        $job = new  Job;
        // Retrieve the current user's ID
$user_id = auth()->id();

// Assign the user_id to the job record
$job->user_id = $user_id;
        $job->name = trim($request->name);
        $job->place = trim($request->place);
        $job->email = trim($request->email);
        $job->website = trim($request->website);
        $job->contact = trim($request->contact);
        $job->level = trim($request->level);
        $job->price = trim($request->price);
        $job->description = trim($request->description);
        if (!empty ($request->file('job_pic'))) {
            $ext = $request->file('job_pic')->getClientOriginalExtension();  // getting image extension
            $file = $request->file('job_pic');
            $randomStr = date('Ymd') . Str::random(30);
            $filename = strtolower($randomStr) . '.' . $ext;
            $file->move('upload/job/', $filename);
            $job->job_pic = $filename;
        }
    
        $job->save();
        $notification = array(
            'message' => 'Job Record Saved Successfully',
            'alert-type' => 'success'
        );
    
        return redirect('/all/Job')->with($notification);
    }
    public function EditJob($id)
{
    $data['getRecord']=Job::getSingle($id);
    if(!empty($data['getRecord'])){
        return view('backend.job.edit_job',$data);
    }
else{
    abort(404);
}

}
public function UpdateJob($id,Request  $request)
{
    request()->validate([
        'name' => 'required',
    ]);
    $job = Job::getSingle($id);
    $job->name = trim($request->name);
        $job->place = trim($request->place);
        $job->email = trim($request->email);
        $job->website = trim($request->website);
        $job->contact = trim($request->contact);
        $job->level = trim($request->level);
        $job->price = trim($request->price);
        $job->description = trim($request->description);
    if (!empty ($request->file('job_pic'))) {
        if (!empty($job->getImage())) {
            unlink('upload/job/' . $job->job_pic);
        }
        $ext = $request->file('job_pic')->getClientOriginalExtension();  // getting image extension
        $file = $request->file('job_pic');
        $randomStr = date('Ymd') . Str::random(30);
        $filename = strtolower($randomStr) . '.' . $ext;
        $file->move('upload/job/', $filename);
        $job->job_pic = $filename;
    }

    $job->save();
    $notification = array(
        'message' => 'Job Record Updated Successfully',
        'alert-type' => 'success'
    );
    return redirect('/all/job')->with($notification);

}
public function DeleteJob($id)
{
    $data['getRecord'] = Job::getSingle($id);
    
    if(!empty($data['getRecord'])) {
        // Delete the profile picture if it exists
        if (!empty($data['getRecord']->getImage())) {
            unlink('upload/job/' . $data['getRecord']->job_pic);
        }
        
        // Delete the record
        $data['getRecord']->delete(); 
        $notification = array(
            'message' => 'Job Record Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    } else {
        abort(404);
    }
}
}
