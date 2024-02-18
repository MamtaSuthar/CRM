<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;
Use Spatie\Permission\Models\Role;

class NotificationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notification = Notification::all();
      
        return view('notification.index',compact('notification'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
          $role  = Role::all('name');
          return view('Notification.create',compact('role'));  
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //  dd($request->all());
        $validation = $request->validate([
			'name'=>['required'],
			 'post'=>['required'],
			 'notificatioin_send'=>['required'],
             'notification'=>['required']
		],[
			 'name.required'=>'Name field is required ',
			 'post.required'=>'Post field is required',
			 'notificatioin_send.required'=>'Notificatioin Send is required',
			 'notification.required'=>'Notificatioin field is Required',
		]);
         $validated['name'] = $request->name;
        $validated['notification'] = $request->notification;
        $validatedddd = $request->notificatioin_send;
        $validated['notification_for'] = implode('|',$validatedddd);
        $validated['notification_send'] = $request->post;
        Notification::create($validated);
        return redirect()->route('notification.index')->with('success','send notification Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Notification  $notification
     * @return \Illuminate\Http\Response
     */
    public function show(Notification $notification)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Notification  $notification
     * @return \Illuminate\Http\Response
     */
    public function edit(Notification $notification)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Notification  $notification
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Notification $notification)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Notification  $notification
     * @return \Illuminate\Http\Response
     */
    public function destroy(Notification $notification)
    {
        //
    }
}
