<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use App\Models\User;
use App\Models\Apply;
use Spatie\Permission\Models\Permission;
use Hash;
class AdminController extends Controller
{
    public function AdminDashboard(){
        return view('admin.index');
    }
    public function AdminLogout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
       //////////// Admin User all Method//////////

       public function AllAdmin(){

        $alladmin = User::where('role','admin')->get();
        return view('backend.pages.admin.all_admin',compact('alladmin'));

    }// End Method 

    public function AddAdmin(){

        $roles = Role::all();
        return view('backend.pages.admin.add_admin',compact('roles'));

    }// End Method
    // public function StoreAdmin(Request $request){

    //     $user = new User();
    //     $user->name = $request->name;
    //     $user->email = $request->email;
    //     $user->contact = $request->contact;
    //     $user->address = $request->address;
    //     $user->password =  Hash::make($request->password);
    //     $user->role = 'admin';
    //     $user->status = 'active';
    //     $user->save();

    //     if ($request->roles) {
    //        $user->assignRole($request->roles);
    //     }
     
    //     $notification = array(
    //         'message' => 'User Created Successfully',
    //         'alert-type' => 'success'
    //     );

    //     return redirect()->route('all.admin')->with($notification); 

    // }// End Method 
    public function StoreAdmin(Request $request){
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->contact = $request->contact;
        $user->address = $request->address;
        $user->password =  Hash::make($request->password);
        $user->role = 'admin';
        $user->status = 'active';
        $user->save();
    
        // Check if the requested role exists
        $requestedRole = Role::find($request->roles);
        if ($requestedRole) {
            // Assign role to the user
            $user->assignRole($requestedRole);
        } else {
            // Handle the scenario where the requested role does not exist
            // For example, you can log an error or display a message to the user
            // You can also choose to assign a default role to the user
            // For now, let's just redirect back with an error message
            return redirect()->back()->with('error', 'The requested role does not exist.');
        }
    
        $notification = array(
            'message' => 'User Created Successfully',
            'alert-type' => 'success'
        );
    
        return redirect()->route('all.admin')->with($notification);
    }
    public function EditAdmin($id){

        $user = User::find($id);
        $roles = Role::all();
        return view('backend.pages.admin.edit_admin',compact('user','roles'));

    }// End Method 

    public function UpdateAdmin(Request $request,$id){

        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->contact = $request->contact;
        $user->address = $request->address; 
        $user->role = 'admin';
        $user->status = 'active';
        $user->save();

        $user->roles()->detach();
         // Check if the requested role exists
         $requestedRole = Role::find($request->roles);
         if ($requestedRole) {
             // Assign role to the user
             $user->assignRole($requestedRole);
         } else {
             // Handle the scenario where the requested role does not exist
             // For example, you can log an error or display a message to the user
             // You can also choose to assign a default role to the user
             // For now, let's just redirect back with an error message
             return redirect()->back()->with('error', 'The requested role does not exist.');
         }
        $notification = array(
            'message' => 'Admin User Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.admin')->with($notification); 

    }// End Method 


    public function DeleteAdmin($id){

        $user = User::find($id);
        if (!is_null($user)) {
            $user->delete();
        }

        $notification = array(
            'message' => 'Admin User Delete Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification); 

    }// End Method 
    public function admin_apply(Request $request)
    {
        $data['getrecord'] = Apply::get();
        return view('backend.apply.list',$data);
    } 
    public function admin_apply_delete($id,Request $request)
    {
        $removeDelete = Apply::find($id);
        $removeDelete->delete();
        
        $notification = array(
            'message' => ' Record Delete Successfully',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);


    }
}
