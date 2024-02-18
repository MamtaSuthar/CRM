<?php

namespace App\Http\Controllers;
use App\Models\AddProjectModel;
use App\Models\Client;
use App\Models\ProjectTypeModel;
use Illuminate\Http\Request;
use App\Mail\sendmail;
use Illuminate\Support\Facades\Mail;

class AddProjectController extends Controller
{
   
    public function index(Request $request)
    {
        if(!empty($request->all())){
        // dd($request->all());
        }
        $c_name=Client::pluck('name');
        $p_name=AddProjectModel::pluck('project_name');
        $data=AddProjectModel::where('project_status','1')->get();
        return view('AddProject/index',compact('data','c_name','p_name'));
    }

  
    public function create()
    {
        $c_name=Client::select('name', 'id')
        ->get();
       
        $p_type=ProjectTypeModel::all();
        return view('AddProject/add_project',compact('c_name','p_type'));
    }

    
    public function store(Request $request)
    {
        $data=$request->input();
        // dd($data);
        $validated=$request->validate([
            'project_name' => 'required|max:255',
            'client_name' => 'required',
            'project_type' => 'required',
            'start_date' => 'required|',
            'deadline' => 'required|date|after:today',
            'project_description' => 'required',
            
        ]);
       
        $obj=new AddProjectModel;
        $obj->project_name=$data['project_name'];
        $obj->client_id=$data['client_name'];
        $obj->project_type=$data['project_type'];
        $obj->start_date=$data['start_date'];
        $obj->deadline=$data['deadline'];
        $obj->project_description=$data['project_description'];
        
        $obj->save();
        // Mail::to()->send(new sendmail());
        return redirect()->back()->with('message', 'Success! User created');
    }

    
    public function show($id)
    {
        
    }

    
    public function edit($id)
    {
        $data=AddProjectModel::where('id',$id)->first();
        $c_id=Client::pluck('id');
        
        return view('AddProject/edit_project',compact('data','c_id'));
    }

    
    public function update(Request $request, $id)
    {
        $data=collect($request);
        $u_data=$data->except(['_token','_method'])->toArray();
        AddProjectModel::whereId($id)->update($u_data);
        $data=AddProjectModel::all();
        return view('AddProject/index',compact('data'));

    }

    public function destroy(Request $request,$id)
    {
        
        AddProjectModel::where('id', $id)->update(['project_status'=>'0']);
        return redirect()->back()->with('success', 'Success! User deleted');
    }
}
