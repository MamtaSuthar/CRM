<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;
Use Spatie\Permission\Models\Role;


class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $department= Department::where('status','!=',0)->get();
        return view('department.index',compact('department'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      
        $role  = Role::all('name');
        $department= Department::where('status','!=',1)->get('name');
        
          return view('department.create',compact('role','department'));  
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $data = $request['department'];
        $validation = $request->validate([
			'department'=>['required']
		],[
			 'department.required'=>'Name field is required '
		]);

         $validated['name'] = $request->department;
           $value =  Department::where('name',$data)->where('status','!=',0)->get();
              if($value->IsEmpty()){
                Department::create($validated);
                return redirect()->route('department.index')->with('success','Department Created Successfully');
              }else{
                  return redirect()->back()->with('message','department is allready exist');
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
        //
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
        $id=$request->id;

        $status=Department::where('id', $id)->first('status');

        
        if($status->status == '1'){
       
            Department::where('id', $id)->update(['status'=>'2']);
          
        }else{
                
            Department::where('id', $id)->update(['status'=>'1']);
            
        }
        return back()->with('success', 'Success! status updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Department::where('id', $id)->update(['status'=>'0']);
        return back()->with('success', 'Success! project deleted');
    }
}
