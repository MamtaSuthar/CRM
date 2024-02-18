<?php

namespace App\Http\Controllers;
Use Spatie\Permission\Models\Role;
use  Spatie\Permission\Models\Permission;
use App\Models\User;

use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $post= Role::where('status','!=',0)->get();

       return view('postmanager.index',compact('post'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('postmanager.create');  
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
			'post'=>['required'],
		],[
			 'post.required'=>'Post field is required',
		]);
          $role = $validated['post'];
          Role:: create(['name'=>$role]);
          return redirect()->route('postmanager.index')->with('success','Add Post Successfully');
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
          $status=$request['status'];
          $id=$request->id;
          Role::where('id', $id)->update(['status'=>$status]);
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
        Role::where('id', $id)->update(['status'=>'0']);
        return back()->with('success', 'Success! project deleted');
    }
    // public function updatestatus(Request $request,$id){
    //     dd($id);
    // }
}
