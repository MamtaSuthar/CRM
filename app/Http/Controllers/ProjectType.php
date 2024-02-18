<?php

namespace App\Http\Controllers;
use App\Models\ProjectTypeModel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use function PHPUnit\Framework\isEmpty;

class ProjectType extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=ProjectTypeModel::where('project_status','!=','0')->get();
        return view('projecttype/index',compact('data'));
    }

  
    public function create()
    {
        $data=ProjectTypeModel::where('project_status','0')->get();
        return view('projecttype/create');
    }

    public function store(Request $request)
    {
        $data=$request->input();
        $validated=$request->validate([
            'project_type' => 'required|max:255',
        ]);
        $project_type = $request->project_type;
        $testdata =   ProjectTypeModel::where('project_type',$project_type)->get();
        if($testdata->IsEmpty()){
            $obj=new ProjectTypeModel;
            $obj->project_type=Str::ucfirst($data['project_type']);
            $obj->project_status='1';
            $obj->save();
            $data=ProjectTypeModel::where('project_status','1')->get();
            return view('projecttype/index',compact('data'))->with('message', 'Success! project Type created');
        }else{
            return redirect()->back()->with('error', 'Project Type   is Allready  Assign');
        }

    }

    
    public function show($id)
    {
        
    }

    
    public function edit($id)
    {
        
        $data=ProjectTypeModel::where('id',$id)->get();
        return view('projecttype.edit',compact('data'))->with('message', 'Success! project Type edited');

    }

   
    public function update(Request $request,$id)
    {    
     
              $data = $request->project_status;
                if($data == ""){
                    $data= collect($request);
                    $u_data=$data->except(['_token','_method'])->toArray();
                    ProjectTypeModel::whereId($id)->update($u_data);
                    $data=ProjectTypeModel::all();
                    return view('projecttype/index',compact('data'));
                }else{
                    
                    ProjectTypeModel::where('id',$request->id)->update(['project_status'=>$data]);
                    return redirect()->back(); 
                }

    }

   
    public function destroy($id)
    {
        dd('yes');
        ProjectTypeModel::where('id', $id)->update(['project_status'=>'0']);
        return back()->with('success', 'Success! project deleted');
    }
}
