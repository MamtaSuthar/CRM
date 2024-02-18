<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use Spatie\Permission\Models\Role;
use  Spatie\Permission\Models\Permission;
use App\Models\User;
use App\Models\Project;
use App\Models\Client;
use App\Models\AddProjectModel;
use App\Models\EmployeeModel;
use Hash;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Session\Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //  Role:: create(['name'=>'team leader']);
        //   Permission:: create(['name'=>'show']);
        // $role = Role::findById(1);
        //  $permission = Permission::findById(1);
        // $role->givePermissionTo($permission);

        //   auth()->user()->assignRole('Team_leader');
        // return  User::permission('edit')->get();
       
        $project=Project::all()->count();
        $client=Client::all()->count();
        $employe=EmployeeModel::all()->count();
        $addproject=AddProjectModel::all()->count();
        $activeproject=AddProjectModel::where('project_status',1)->count();
        // dd($addproject);
        return view('home',compact('project','client','employe','addproject','activeproject'));
    }

    public function changepassword(Request $request, User $User){	
		$validated = $request->validate([
			'password'=>['required','min:8'],
			'newpassword'=>['required','min:8','confirmed'],
			'newpassword_confirmation'=>['required','min:8']
		],[
			'password.required'=>'Old password field is Required',
			'password.current_password'=>'Password does not matched with current password',
			'newpassword.required'=>'New password field is Required',
			'newpassword_confirmation.required'=>'Confirm password field is Required',
		]);
		$oldpassword = $request->get('password');
	    $newpassword = $request->get('newpassword');
		$data =auth()->user();
		$adminpassword=$data->password;
		$newpass=Hash::make($newpassword);

		if (Hash::check($oldpassword, $adminpassword)) {
			$file= ['password'=>$newpass];
			User::where('id',auth()->user()->id)->update($file);
			return view('admin/changep');
			return redirect()->route('admin/changep')->with('success','Password change Successfully');
		}else{
            return redirect('change_profile')->with('fail','Wrong Old Password');
        }

	}
    ///////*******show edit profile page  */
    public function showadmin(){
       return view('admin/profile');
    }


    /////******update admin profile */
    public function updateadmin(Request $request,$id){

        $validateData=$request->validate([
            'name'=>'required',
            'email'=>'required',
        //  'image' => 'required',
  
        ]);
     
        if($request->file('image')){
            $file= $request->file('image');
            $filename= time().'.'.$file->getClientOriginalName();
            $file-> move(public_path('/'), $filename);
            $data['image']= $filename;
        }

       $data['name'] = $request->get('name');
       
       
        $data['email'] = $request->get('email');
       
       $users = User::where('id',$id)->update( $data);
    
    return redirect('/home');
    }
    /////*****end update Adimn */

    public function email_verification(Request $request){
       dd($request->all());


    }

  
}
