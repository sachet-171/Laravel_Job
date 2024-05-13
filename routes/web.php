<?php

use App\Http\Controllers\Backend\JobController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Backend\RoleController;
use App\Http\Controllers\Frontend\FrontendJobController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/',[UserController::class,'Index']);
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
// Admin group middleware
Route::middleware(['auth','roles:admin'])->group(function(){
    Route::get('/admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');
    Route::get('/admin/logout', [AdminController::class, 'Adminlogout'])->name('admin.logout');
/// Admin User All Route 
Route::controller(AdminController::class)->group(function(){

    Route::get('/all/admin', 'AllAdmin')->name('all.admin'); 
    Route::get('/add/admin', 'AddAdmin')->name('add.admin');
    Route::post('/store/admin', 'StoreAdmin')->name('store.admin');
    Route::get('/edit/admin/{id}', 'EditAdmin')->name('edit.admin');
    Route::post('/update/admin/{id}', 'UpdateAdmin')->name('update.admin');
    Route::get('/delete/admin/{id}', 'DeleteAdmin')->name('delete.admin');
});
       /// Job All Route 
   Route::controller(JobController::class)->group(function(){
    Route::get('/all/job', 'AllJob')->name('all.job')->middleware('permission:job.all');
    Route::get('/add/job', 'AddJob')->name('add.job')->middleware('permission:job.add'); 
    Route::post('/store/job', 'StoreJob')->name('job.store')->middleware('permission:job.add'); 
    Route::get('/edit/job/{id}', 'EditJob')->name('edit.job')->middleware('permission:job.edit');
    Route::post('/edit/job/{id}', 'UpdateJob')->name('update.job')->middleware('permission:job.edit');
    Route::get('/delete/job/{id}', 'DeleteJob')->name('delete.job')->middleware('permission:job.delete');
});
 /// Role and permission All Route 
 Route::controller(RoleController::class)->group(function(){
    Route::get('/all/permission', 'AllPermission')->name('all.permission');
    Route::get('/add/permission', 'AddPermission')->name('add.permission');
    Route::post('/store/permission', 'StorePermission')->name('store.permission');
    Route::get('/edit/permission/{id}', 'EditPermission')->name('edit.permission');
    Route::post('/update/permission', 'UpdatePermission')->name('update.permission');
    Route::get('/delete/permission/{id}', 'DeletePermission')->name('delete.permission');
 });
 Route::controller(RoleController::class)->group(function(){
    Route::get('/all/roles', 'AllRoles')->name('all.roles');
 Route::get('/add/roles', 'AddRoles')->name('add.roles');
    Route::post('/store/roles', 'StoreRoles')->name('store.roles');
    Route::get('/edit/roles/{id}', 'EditRoles')->name('edit.roles');
    Route::post('/update/roles', 'UpdateRoles')->name('update.roles');
    Route::get('/delete/roles/{id}', 'DeleteRoles')->name('delete.roles');

    Route::get('/add/roles/permission', 'AddRolesPermission')->name('add.roles.permission');
    Route::post('/role/permission/store', 'RolePermissionStore')->name('role.permission.store');
    Route::get('/all/roles/permission', 'AllRolesPermission')->name('all.roles.permission');
    Route::get('/admin/edit/roles/{id}', 'AdminEditRoles')->name('admin.edit.roles');
    Route::post('/admin/roles/update/{id}', 'AdminRolesUpdate')->name('admin.roles.update');
    Route::get('/admin/delete/roles/{id}', 'AdminDeleteRoles')->name('admin.delete.roles');
    
});
Route::get('/admin/apply',[AdminController::class,'admin_apply'])->name('admin.apply');
Route::get('/admin/contact/delete/{id}',[AdminController::class,'admin_apply_delete'])->name('delete.apply');
});
 /// Room All Route 
 Route::controller(FrontendJobController::class)->group(function(){

    Route::get('/jobs/', 'AllFrontendJobList')->name('fjob.all');
    Route::get('/job/details/{id}', 'JobDetailsPage');
 });

Route::get('/contact', [UserController::class, 'Contact'])->name('contact');
Route::get('/about', [UserController::class, 'About'])->name('about');

Route::get('/apply', [UserController::class, 'Apply'])->name('apply');

Route::post('comment', [UserController::class, 'handleComment'])->name('comment');
Route::post('logout', [UserController::class, 'UserLogout'])->name('user.logout');
Route::get('/apply', [UserController::class, 'Apply'])->name('apply');
Route::post('/apply/Post', [UserController::class, 'ApplyPost'])->name('apply.post');

