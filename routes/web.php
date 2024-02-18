<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TasksController;
use App\Http\Controllers\NotificationsController;
use App\Http\Controllers\AddProjectController;
use App\Http\Controllers\ProjectType;
use App\Http\Controllers\EmployeeRegisterController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\FirebaseController;
use App\Http\Controllers\ChatsController;
use App\Http\Controllers\AssignProjectController;
use App\Events\message;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

/******************** Login*****************************/
Route::get('/', function () {
    return view('auth/login');
});
Auth::routes(['register' => false]);
Route::get('/auth/login',[LoginController::class,'RedirectTo']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
/******************** End Login*****************************/

/******************** Notification*****************************/
Route::resource('notification', NotificationsController::class);
/********************End Notification*****************************/

////********employe with datatable*********//////////
Route::get('/employwee', function () {
return view('employee/emp-profile');
});
Route::any('create_employe',[EmployeeRegisterController::class, 'create_employee']);
Route::any('displayemployee_datatable',[EmployeeRegisterController::class,'displayemployee_datatable']);
Route::any('insert_employee',[EmployeeRegisterController::class, 'insert_employee']);
Route::any('edit_employee/{id}',[EmployeeRegisterController::class,'edit_employee']);
Route::any('delete_employee/{id}',[EmployeeRegisterController::class,'delete_employee'])->name('delete_employee');
Route::any('update_employee/{id}',[EmployeeRegisterController::class,'update_employee']);
Route::any('enable/{id}',[EmployeeRegisterController::class,'enable']);
/************ End Create Employee********************/

/********************Clients*****************************/
Route::any('display_client',[ClientController::class,'display_client']);
Route::any('enable_client_status/{id}',[ClientController::class,'enable_client_status']);
Route::resource('client',ClientController::class);
/**********************End Client***************************/

/********************************************************/
Route::any('/email_verification',[HomeController::class,'email_verification']);
/************************Admin Profile********************************/
Route::any('/edit_profile',[HomeController::class,'showadmin']);
Route::any('/edit_profile/{id}',[HomeController::class,'updateadmin'])->name('users.updateadmin.post');
/*************************End Admin Profile*******************************/

/********************Change Password For Admin*****************************/
Route::get('/change_profile', function () {
    return view('admin/changep');
});
Route::any('/changepassword',[HomeController::class,'changepassword'])->name('changepassword');
/********************End Password For Admin*****************************/

/******************** Project Manager*****************************/
Route::resource('project',ProjectController::class);
/********************End Project Manager*****************************/

/********************Assign Project*****************************/
Route::resource('addproject',AddProjectController::class);
/******************** End Assign Project*****************************/

/********************Add Project*****************************/
Route::resource('projecttype',ProjectType::class);
/********************End AddProject*****************************/

/********************Add Project*****************************/
Route::resource('assignproject',AssignProjectController::class);
/********************Add Project*****************************/

/********************Add Department*****************************/
Route::resource('department', DepartmentController::class);
/********************End Add Department*****************************/

/********************Add Postmananger*****************************/
Route::resource('postmanager', PostController::class);
/********************Add Postmanager*****************************/

/********************Add chat*****************************/

Route::get('/view_chat',[ChatsController::class,'index']);
Route::post('/send-message',function(Request $request){
 event(new message($request->input('username'),$request->input('message')));
 return["success" =>true];
});

/********************End Add Postmanager*****************************/

/********************Calendar*****************************/
Route::resource('tasks', TasksController::class);
/********************End Calendar*****************************/
