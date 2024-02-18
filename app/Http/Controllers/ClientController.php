<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('client/show_client');
    }
    

    public function create()
    {
        return view('client/add_client');
    }

   
    public function store(Request $request)
    {
        $data=$request->input();
        $validated=$request->validate([
            'name' => 'required|max:255',
            'email' => 'required|max:255',
            'company' => 'required',
            'description' => 'required',
        ]);
            $obj=new Client;
            $obj->name=$data['name'];
            $obj->email=$data['email'];
            $obj->company=$data['company'];
            $obj->description=$data['description'];
            $obj->save();
            return redirect()->back()->with('message', 'Success! User created');
    }

    public function show(Client $client)
    {
     
    }
    public function display_client(Request $request){
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
        $query = new Client;
        // dd($query);
        if(isset($_GET['name'])){
            // dd('dd');
            $name=$_GET['name'];
            if($name!=""){
               $query=  $query->where('name', 'LIKE', '%'.$name.'%');
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
               $query=  $query->where('phone', $phone);
             }
         }
        $count = $query->where([
            
            'del_status' =>'0',
        ])->count();
        $totalTitles = $count;
        $totalFiltered = $totalTitles;

        $query=$query->where([
            
            'del_status' =>'0',
        ])->get();

        $val=1;
        foreach($query as $e_data){
            $edit_category =route('client.edit', $e_data->id);
            $delete_category =route('client.destroy', $e_data->id);
            $enable =action([ClientController::class,'enable_client_status'],$e_data->id);
            $status=Client::where('id',$e_data->id)->pluck('enable_status');
            // dd($status);
            if($status[0]==0){
                $status="Deactivate";
            }else{
                $status="Activate";
            }

            $delete_swal = "deleteConfirmation('deleteClient".$e_data->id."')";

            // $delete_category =action(],$e_data->id);
            $client = $e_data;
            
            $nestedData['action'] = '<div class="dropdown">
                <button class="btn btn-sm btn-primary btn-active-pink dropdown-toggle dropdown-toggle-icon" data-toggle="dropdown" type="button" aria-expanded="true">
                    Action <i class="dropdown-caret"></i>
                </button>
                <ul class="dropdown-menu">
                    <li>
                        <a class="dropdown-item waves-light waves-effect" href="'.$edit_category.'">Edit</a>
                    </li>
                    <li>
                        <a class="dropdown-item waves-light waves-effect" href="'.$enable.'">'.$status.'</a>
                    </li>
                    <li>
                        
                        <form method="POST" action="'.$delete_category.'" id="deleteClient'.$e_data->id.'">
                            
                            <input type="hidden" name="_token" value="'.csrf_token().'">
                            '.method_field('DELETE').'
                        </form>
                        <li><a class="dropdown-item waves-light waves-effect remove-user" onclick="'.$delete_swal.'">Delete</a></li>
                    </li>
                    
                </ul>
            </div>';
            // <li><a class="dropdown-item waves-light waves-effect" onclick="return delete_add(\''.$e_data->id.'\')" >Delete</a></li>
            
            $nestedData['sno'] = $val++;
            $nestedData['name'] = ucfirst($e_data['name']);
            $nestedData['email'] = $e_data['email'];
            // $nestedData['descriptio'] =$e_data['phone'];
            $nestedData['company'] =$e_data['company'];
            // $nestedData['address'] = $e_data['address'];
            $data[] = $nestedData;
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
        // echo json_encode($json_data);

       }
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        
        return view('client/edit_client',compact('client'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id=$request->id;
        $data=collect($request);
      
        $u_data=$data->except(['_token','_method'])->toArray();
        Client::whereId($id)->update($u_data);
        return view('client.show_client')->with('success', 'Success! User deleted');
    }

    
    public function destroy($cid)
    {
        
        Client::where('id', $cid)->update(['del_status'=>'1']);
        return redirect()->back()->with('success', 'Success! User deleted');
    }

    public function enable_client_status($cid)
    {

        $status=Client::where('id',$cid)->pluck('enable_status');
        if($status[0]==0){
            Client::where('id', $cid)->update(['enable_status' => '1']); 
        }else{
            Client::where('id', $cid)->update(['enable_status' => '0']); 
        }
        return redirect()->back()->with('success','user updated');
    }
}
