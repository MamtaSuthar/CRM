<?php

namespace App\Http\Controllers;
use App\Models\AddProjectModel;
use App\Models\Client;
use App\Models\assignproject;
use App\Models\Department;
use App\Models\EmployeeModel;


use Illuminate\Http\Request;
class AssignProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        if(request()->all()){
               $id =request()->all();
            //   dd($id);
            //    $project =  assignproject::where('project_name',$id)->get();
            //    $users = assignproject::select("assignproject.id","departments.id as department")->leftJoin('departments', 'departments.id', '=', 'assignproject.department')
            //    ->get();

                
    $project =assignproject::where('project_name',$id)->where("p_status","!=",0)->Join('departments', 'assignprojects.department_name', '=', 'departments.id')
    ->join('employe', 'assignprojects.project_leader', '=', 'employe.id')
    //  ->join('employe', 'assignprojects.employee', '=', 'employe.id')
    ->select('employe.first_name as leader', 'employe.last_name as last','assignprojects.employee as emp','assignprojects.*','employe.*','departments.*')

    ->get()
    ->each(function ($record){
            // dd($record->emp);
             $data =  explode(",",$record->emp);
            //  dd($data);
            $reco=[];
             foreach($data as $test){
           $reco[]= EmployeeModel::where('id',$test)->value("first_name");
                    };
            $string_version = implode(',', $reco);
            $record->emp= $string_version;
            // dd($record->emp);
           
        return $record;
    });
        //   dd($project);
               return  view('AssignProject.index',compact('project'));
             
        }
    //    return  view('AssignProject.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $client  = Client::all();
        $department =Department::all();
        // dd(request()->all());
        if($request->all()){
            $post=$request->post;
            $department = $request->department;
            if(!empty($post)){
            $client  = Client::all();
            $data =AddProjectModel::where('client_id',$post)->get();
            return response()->json([$data]);
            }elseif (!empty($department)){
               $data =  EmployeeModel::where('department',$department)->where('position',"Team_leader")->get();
              $employee = EmployeeModel::where('department',$department)->where('position',"employee")->get();
               return response()->json([$data,$employee]);            
               
            }
        };
        // if(requw)
        return view('AssignProject.create',compact('client','department'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //    dd($request->all());
        $validated=$request->validate([
            'client_name' => 'required',
            'project_name' => 'required',
            'Department_name' => 'required',
            'project_leader' => 'required',
            'employee' => 'required',
            'start_date' => 'required',
            'deadline' => 'required|date|after:today',
            'description' => 'required',
        ]);
        $validated['client_name'] = $request->client_name;
        $validated['project_name'] = $request->project_name;
        $validated['Department_name'] = $request->Department_name;
        $validated['project_leader'] = $request->project_leader;
        $validatedddd = $request->employee;
        $validated['employee'] = implode(',',$validatedddd);
        $validated['start_date'] = $request->start_date;
        $validated['deadline'] = $request->deadline;
        $validated['description'] = $request->description;
            $data= assignproject::where('client_name',$request->client_name)->where('project_name',$request->project_name)->get();
        if($data->IsEmpty()){
            assignproject::create($validated);
            return redirect()->back()->with('message', 'Success! project assign');
                 }else{
                    return redirect()->back()->with('error', 'Project  is Allready  Assign');
                   
                 }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) 
    {    
        //   dd($request->all());
        assignproject::where('s_id',$request->id)->update(['p_status'=>$request->status]);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
