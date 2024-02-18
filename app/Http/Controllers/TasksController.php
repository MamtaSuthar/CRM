<?php

namespace App\Http\Controllers;
use App\Models\Task;
use App\Models\EmployeeModel;
use Illuminate\Http\Request;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        
        $emps=EmployeeModel::all();
       $tasks = Task::all();
    return view('tasks/index', compact('tasks','emps'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        return view('tasks/create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    { 
        if($request->file('image')){
            $file= $request->file('image');
            $filename= time().'.'.$file->getClientOriginalName();
            $file-> move(public_path('/'), $filename);
            $data['image']= $filename;
        }

        Task::create($request->all());
        return redirect()->route('tasks.index');
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
   if(empty($id)){
     return redirect()->back();
   }else{
    $tasks =Task::where('id',$id)->get();
    return view('tasks/edit', compact('tasks'));
   }
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
     
        $validateData=$request->validate([
            'name'=>'required',
            'task_date'=>'required',
            'description'=>'required'
        ]);

            $data1=collect($request);
            $dd=$data1->except(['_method','_token'])->toArray();
           
        if($request->file('image')){
            $file= $request->file('image');
            $filename= time().'.'.$file->getClientOriginalName();
            $file-> move(public_path('/'), $filename);
            $data['image']= $filename;
        }
        $data['name'] = $request->get('name');
        $data['task_date'] = $request->get('task_date');
        $data['description'] = $request->get('description');
   
        Task::where('id',$id)->update($data);
    
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
