<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Department;
Use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Hash;
use App\Models\EmployeeModel;
use App\Mail\sendmail;
use Illuminate\Support\Facades\Mail;
use DB;

class EmployeeRegisterController extends Controller
{
    /////display create employee ////////
    public function create_employee(Request $request){
         $role  = Role::all('name');
        $department=Department::get();
        // dd($department);
         return view('employee/create_employee',compact('role','department'));
    }

    ///////insert employeee/////
    public function insert_employee(Request $request){
        $data=$request->input();
        // dd($data);
        $validated=$request->validate([
            'first_name' => 'required|alpha_dash|regex:/^[a-zA-Z]+$/u|max:255',
            'last_name' => 'required|alpha_dash|regex:/^[a-zA-Z]+$/u|max:255',
            'email' => 'required|email|unique:employe|regex:/^[\w.+\-]+@gmail\.com$/i|max:50',
            'password' => 'required|min:8',
            'department' => 'required',
            'phone' => 'required|min:10|unique:employe',
            'dob' => 'required|date|before:18 years|before:today',
            'address' =>'required',
            'position' =>'required'

        ],[
            'dob.before'=>'Your DOB must be greater then 18 years',

        ]);
        $obj=new EmployeeModel;
        $obj->first_name=ucfirst($data['first_name']);
        $obj->last_name=ucfirst($data['last_name']);
        $obj->email=$data['email'];
        $obj->password=Hash::make($data['password']);
        $obj->department=$data['department'];
        $obj->phone=$data['phone'];
        $obj->dob=$data['dob'];
        $obj->address=$data['address'];
        $obj->position=$data['position'];
        // dd($obj->email);
        Mail::to($obj->email)->send(new sendmail($obj->first_name));
        $obj->save();
        $User=new User;
        $User->name=$data['first_name'];
        $User->email=$data['email'];
        $User->password=Hash::make($data['password']);
        $User->save();
        $User->assignRole($data['position']);
        return redirect()->back()->with('success', 'Success! User created');

    }

    public function displayemployee_datatable(Request $request){
        date_default_timezone_set('Asia/Kolkata');
        $columns = array(
            0 => 'orders.id',
            1 => 'user_id',
            2 => 'order_id',
            3 => 'price',
            4 => 'delivery_address',
            5 => 'orders.created_at',
            6 => 'updated_at',
        );
        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
        $query = new EmployeeModel;
        // dd($query);
        if(isset($_GET['name'])){
            // dd('dd');
            $name=$_GET['name'];
            if($name!=""){
               $query=  $query->where('first_name','LIKE', '%'.$name.'%');
            }
         }
         
         if(isset($_GET['email'])){
            $email=$_GET['email'];
            if($email!=""){
               $query=  $query->where('email', 'LIKE', '%'.$email.'%');
            }
         }
 
         if(isset($_GET['phone'])){
            
            $phone=$_GET['phone'];
        if($phone!=""){
                $query=  $query->where('phone', 'LIKE', '%'.$phone.'%');
            }
         }
        $count = $query->where([
            'del_status' =>'0',
          ])->count();
        $totalTitles = $count;
        $totalFiltered = $totalTitles;
        $val=1;
        $query=$query->where([
          'del_status' =>'0',
        ])->get();
        if(!empty($query)){
            foreach($query as $e_data){
                

                $edit_category =action([EmployeeRegisterController::class,'edit_employee'],$e_data->id);
                $delete_category =action([EmployeeRegisterController::class,'delete_employee'],$e_data->id);
                $enable =action([EmployeeRegisterController::class,'enable'],$e_data->id);
                $status=EmployeeModel::where('id',$e_data->id)->pluck('enable_status');
                // dd($status);
                if($status[0]==0){
                    $status="Deactivate";
                }else{
                    $status="Activate";
                }
                $delete_swal = "deleteConfirmation('".$delete_category."')";

                $nestedData['action'] = '<div class="dropdown">
                    <button class="btn btn-sm btn-primary btn-active-pink dropdown-toggle dropdown-toggle-icon" data-toggle="dropdown" type="button" aria-expanded="true">
                        Action <i class="dropdown-caret"></i>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item waves-light waves-effect" href="'.$edit_category.'">Edit</a></li>
                         <li><a class="dropdown-item waves-light waves-effect" href="'.$enable.'">'.$status.'</a></li>
                        <li><a class="dropdown-item waves-light waves-effect remove-user" onclick="'.$delete_swal.'">Delete</a></li>

                        <form method="POST" 
                        action="'.$delete_category.'">
                        
                        <input type="hidden" name="_method" value="DELETE">
                   
               
                
            </form>

                    </ul>
                </div>';
                // <li><a class="dropdown-item waves-light waves-effect" onclick="return delete_add(\''.$e_data->id.'\')" >Delete</a></li>
               
                $nestedData['sno'] = $val++;
                $nestedData['first_name'] = ucfirst($e_data['first_name']. $e_data['last_name']);
                $nestedData['email'] = $e_data['email'];
                $nestedData['phone'] =$e_data['phone'];
                $nestedData['dob'] =date('d/M/Y', strtotime($e_data['dob']));
                $nestedData['department'] = $e_data['department'];
                $nestedData['address'] = $e_data['address'];
                $nestedData['position'] = $e_data['position'];
                $data[] = $nestedData;
            }
        }
        if(!empty($data)){
            $json_data = array(
                "draw" => intval($request->input('draw')),
                "recordsTotal" => intval($totalTitles),
                "recordsFiltered" => intval($totalFiltered),
                "data" => $data,
            );
        echo json_encode($json_data);
        }else{
            $string='NO RECORD FOUND';
            echo json_encode(json_decode($string));
        }
       
    }
    public function edit_employee($id){
        $e_data = EmployeeModel::where('id', $id)->first();
        $department=Department::pluck('name');
        $role  = Role::all('name');
        return view('employee.editprofile',compact('e_data','role','department'));
    }
    public function delete_employee($id){
       
        EmployeeModel::where('id', $id)->update(['del_status' => '1']); 
        return redirect()->back()->with('warning', 'Success! User deleted');
    }
    public function update_employee(Request $request,$id){
        $data=collect($request);
        $u_data=$data->except(['_token','_method'])->toArray();
        $validated=$request->validate([
            'first_name' => 'required|alpha_dash|regex:/^[a-zA-Z]+$/u|max:255',
            'last_name' => 'required|alpha_dash|regex:/^[a-zA-Z]+$/u|max:255',
            // 'email' => 'required|email|unique:employe|regex:/^[\w.+\-]+@gmail\.com$/i|max:50',
            // 'password' => 'required|min:8',
            'department' => 'required',
            // 'phone' => 'required|min:10|unique:employe',
            'dob' => 'required|date|before:18 years|before:today',
            'address' =>'required',
            'position' =>'required'

        ],[
            'dob.before'=>'Your DOB must be greater then 18 years',
        ]);

       EmployeeModel::where('id', $id)->update($u_data);
       $id=$request['id'];
    //    dd($id);

       if(!empty($id)){
           return redirect('tasks');
       }else{
        return view('employee.emp-profile')->with('message','Succesfully !updated');

       }
    }
    public function enable(Request $request,$id){
       
        $status=EmployeeModel::where('id',$id)->pluck('enable_status');
        if($status[0]==0){
            EmployeeModel::where('id', $id)->update(['enable_status' => '1']); 
        }else{
            EmployeeModel::where('id', $id)->update(['enable_status' => '0']); 
        }
      
    }
}
