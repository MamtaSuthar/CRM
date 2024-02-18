<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\AddProjectModel;
use App\Models\Client;
use Illuminate\Http\Request;
use Exception;


class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            //  dd(request()->all()); 
        // $Projects=Project::all();
        $clint = Client::all();
        if(request()->all()){
             $post= request()['post'];
             $pro = request(['project']);
            if($post !=null && $pro !=null){
                $project =AddProjectModel::where('client_id',$post)->get();
                $data =AddProjectModel::where('client_id',$post)->where('project_name',request(['project']))->get();
                $clint = Client::all();
            
                return view('project.index',compact('clint','data','project'));
             }
             $project =AddProjectModel::where('client_id',$post)->get();
           
            //  $clint = Client::all();
            //  return view('project.index',compact('project','clint'));
              return response()->json([$project]);
            //  }
        }
        //  dd('1');
         return view('project.index',compact('clint'));
    }
   

   


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    ///////****Display Project Create */
    public function create()
    {
        
        // $projects=Project::all();
        // return view('project/create_project',compact('projects'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
          ///////insert Project Details/////
    public function store(Request $request)
      {
    //     $data=$request->input();

    //     $request->validate([
    //         'project_name' => 'required',
    //         'client_name' => 'required',
    //         'project_mananger' => 'required',
    //         'department_name' => 'required',
    //         'team_leader' => 'required',
    //         'number_of_employee' => 'required',
    //         'project_duration' =>'required',
    //         'status_by_emp' =>'required',
    //         'status_by_team_leader' =>'required',
    //         'status_by_project_manager' =>'required',
    //     ]);
       
    //     $projects=new project;
      
    //     $projects->project_name=$data['project_name'];
    //     $projects->client_name=$data['client_name'];
    //     $projects->project_mananger=$data['project_mananger'];
    //     $projects->department_name=$data['department_name'];
    //     $projects->team_leader=$data['team_leader'];
    //     $projects->number_of_employee=$data['number_of_employee'];
    //     $projects->project_duration=$data['project_duration'];
    //     $projects->status_by_emp=$data['status_by_emp'];
    //     $projects->status_by_team_leader=$data['status_by_team_leader'];
    //     $projects->status_by_project_manager=$data['status_by_project_manager'];
    //     $projects->save();
    //     return view('project/project_details',compact('projects'));

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
    
     //////***8Display Edit Project */
    public function edit($id)
    {
    //     $projects=Project::findOrFail($id);
     
    //    return view('project/edit_project',compact('projects'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     /////****Update Project Details */
    public function update(Request $request, $id)
    {
  
//         $request->validate([
//             'project_name' => 'required',
//             'client_name' => 'required',
//             'project_mananger' => 'required',
//             'department_name' => 'required',
//             'team_leader' => 'required',
//             'number_of_employee' => 'required',
//             'project_duration' =>'required',
//             'status_by_emp' =>'required',
//             'status_by_team_leader' =>'required',
//             'status_by_project_manager' =>'required',
//         ]);
//         $input = collect($request->all());
//         $filterdata = $input->except(['_method','_token'])->toArray();
  
//         // dd($filterdata);
//         try{
//             $projects=Project::where('id',$id)->update($filterdata);
//             $projects=Project::all();
//         }catch(Exception $exception){
//         return back()->withErrors($exception->getMessage())->withInput();
//         }

  
//         return view('project/create_project',compact('projects'))
//    ->with('success','successfully updated!');

}



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

  /////****Display Project Details */
  public function showproject()
   {
//       $projects=Project::all();
   
//       return view('project/project_details',compact('projects'));
  }




/////****Display Project Details  */
    public function showp(Request $request)
    {
        if ($request->has('trashed')) {
            $projects = Project::onlyTrashed()
                ->get();
        } else {
            $projects = Project::get();
        }

        return view('project/project_details', compact('projects'));
    }
  
    /**
     * soft delete Project
     *
     * @return void
     */
    public function destroy($id)
    {
        Project::find($id)->delete();
  
        return redirect()->back();
    }
  
    /**
     * restore specific Project
     *
     * @return void
     */
    public function restore($id)
    {
        Project::withTrashed()->find($id)->restore();
  
        return redirect()->back();
    }  
  
    /**
     * restore all post
     *
     * @return response()
     */
    public function restoreAll()
    {
        Project::onlyTrashed()->restore();
  
        return redirect()->back();
    }

    public function clientproject(Request $request)
    {
        $dep_id=$request['deptid'];
        $project=Project::where('id', $dep_id)->get('project_name');
        foreach($project as $data){
        $projects=$data->project_name;
        }
        return response(['data'=>$projects]);
    }
}
