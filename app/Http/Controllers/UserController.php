<?php

namespace App\Http\Controllers;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Comment;
use App\Models\Apply;

class UserController extends Controller
{
    public function Index()
    {

        return view('frontend.index',);
    }
    
    public function UserLogout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
    public function About(){

        return view('frontend.about');
    }
    public function Contact(){

        return view('frontend.contact');
    }

    public function Apply(){

        return view('frontend.apply');
    }
    public function handleComment(Request $request)
    {

        $request->validate([
            'comment' => ['required', 'string', 'max:1000']
        ]);

        $comment = new Comment();
        $comment->jobs_id = $request->jobs_id;
        $comment->user_id = Auth::user()->id;
        $comment->parent_id = $request->parent_id;
        $comment->comment = $request->comment;
        $comment->save();
        $notification = array(
            'message' => 'Comment added successfully!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    
    public function ApplyPost(Request $request){
        $insertRecord = new Apply;
        $insertRecord->name = trim($request->name);
        $insertRecord->email = trim($request->email);
        $insertRecord->message = trim($request->message);
    
    
        $insertRecord->save();
        $notification = array(
            'message' => 'Your Message Submitted Successfully',
            'alert-type' => 'success'
        ); 
        return redirect()->back()->with($notification); 
 
    }
}
