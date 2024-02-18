@extends('_layouts.default')
@section('content')
<style>
  
.dropbtn {
  background-color: #12750f;
  color: rgb(221, 22, 22);
  padding: 16px;
  font-size: 16px;
  border: none;
}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown-content a:hover {background-color: #ddd;}

.dropdown:hover .dropdown-content {display: block;}

.dropdown:hover .dropbtn {background-color: #8e623e;}
</style>

<div class="content-wrapper py-2">
     <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 mt-3" >
                <div class="card">
                    <div class="card-header bg-info">
                    <h6 class="text-white"><strong>Project</strong></h6>
                    </div>
                    <div class="row ml-3">

                        
        

                                <form class="form-horizontal" method="post" action="{{asset('addproject.index')}}">
                                    <label for="inputEmail3" class="control-label">Client Name</label>
                                    <select class="form-control select2" name="post" style="width: 100%;">
                                        <option value="" disabled selected>Client Name</option>
                                        @foreach($c_name as $c_data)
                                            <option value="">{{$c_data}}</option>
                                        @endforeach
                                       </select>
                                    @error('first_name')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                            
                   
                        <div class="col-sm-5">
                            <div class="form-group">
                                    <label for="inputEmail3" class="control-label">Select Project</label>
                                    <select class="form-control select2" name="post" style="width: 100%;">
                                        <option value="" disabled selected>Project Name</option>
                                        @foreach($p_name as $p_data)
                                            <option value="">{{$p_data}}</option>
                                        @endforeach
                                       </select>
                                    @error('first_name')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                            </div>
                        </div>

              
                <div class="col-sm-2 ">
                <div class="form-group mt-4">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                    </div>

                </form>

                    </div>
              
        </div>
    </div>
</div>

        <div class="row">
            <div class="col-md-12 mt-3" >
                <div class="card">
                    <div class="card-header bg-info">
                        <h6 class="text-white"><strong>Project</strong></h6>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-bordered" Id="addproject">
                            <thead>
                                <tr>
                                    <td>ID</td>
                                    <td>Project Name</td>
                                    <td>Client Id</td>
                                    <td>Project Type</td>
                                    <td>Start Date</td>
                                    <td>Deadline</td>
                                    <td>Project Description</td>
                                    {{-- @role('Admin|Hr') --}}
                                    <td>Action</td> 
                                    {{-- @endrole --}}
                                </tr>
                            </thead>
                           
                            <tbody>
                                @forelse($data as $notifi)
                                      <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $notifi->project_name}}</td>
                                        <td>{{ $notifi->client_id}}</td>
                                        <td>{{ $notifi->project_type}}</td>
                                        <td>{{ $notifi->start_date}}</td>
                                        <td>{{ $notifi->deadline}}</td>
                                        <td>{{ $notifi->project_description}}</td> 
                                        <td><div class="dropdown">
                                            <button class="dropbtn">Edit/Delete</button>
                                            <div class="dropdown-content">
                                              <a href="{{route('addproject.edit',$notifi->id)}}">Edit</a>
                                              <form method="POST" id="deleteClient{{$notifi->id}}" action="{{route('addproject.destroy',$notifi->id)}}">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                            <a class="dropdown-item waves-light waves-effect" onclick="document.getElementById('deleteClient{{$notifi->id}}').submit()">Delete</a>
                                            </div>
                                          </div></td>
                                      </tr>
                                        @empty
                                        <tr class="text-center">
                                            <td colspan="10">No Data Available now</td>
                                        </tr>
                                @endforelse           
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td>ID</td>
                                    <td>Project Name</td>
                                    <td>Client Id</td>
                                    <td>Project Type</td>
                                    <td>Start Date</td>
                                    <td>Deadline</td>
                                    <td>Project Description</td>
                                    {{-- @role('Admin|Hr') --}}
                                    <td>Action</td> 
                                    {{-- @endrole --}}
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        
     </div>
</div>

<script>
    $(function () {
        $('#addproject').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": true,
            "responsive": true,
        });
    });
</script>
  @endsection
