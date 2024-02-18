@extends('_layouts.default')

@section('content')

<div class="content-wrapper py-2">
     <div class="container-fluid">

        <div class="row">
            <div class="col-md-12 mt-3" >
                <div class="card">
                    <div class="card-header bg-info">
                        <h6 class="text-white"><strong>Details</strong></h6>
                    </div>

                    <form class="form-horizontal" method="get" action="{{route('project.index')}}">
                        @csrf

                    <div class="row ml-3">

                        <div class="col-sm-5">
                            <div class="form-group">
                                    <label for="inputEmail3" class="control-label">Client Name</label>
                                    <select class="form-control select2" name="post" style="width: 100%;"  onchange="myFunction(this)">
                                       <option> Choose clint</option>
                                        @foreach($clint as $clint)
                                        <option value="{{$clint->id}}"
                                            @if( ($_GET['post'] ?? '') == $clint->id)
                                                selected
                                            @endif    
                                        >{{$clint->name}}</option>
                                        @endforeach
                                       </select>
                                    @error('first_name')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                          
                            </div>
                        </div>

                
                   <div class="col-sm-5">
                    <div class="form-group">
                    <label for="inputEmail3" class="control-label">Project  Name</label>
                    <select class="form-control" id ="project"  name = "project" style="width: 100%;">
                        
                        @if(!empty($data))
                        @foreach($data as $dat)
                        {{-- <option selected>{{$clint->project_name}}</option> --}}
                        @foreach($project as $clint)
                        <option {{$dat->project_name}}>{{$clint->project_name}}</option>
                        {{-- <option>{{$clint->project_name}}</option> --}}
                        @endforeach  
                        @endforeach 
                        @endif
                        </select>
                        @error('last_name')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                   </div>
                   </div>
                
                <div class="col-sm-2 ">
                <div class="form-group mt-4">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                    </div>

                    </div>
                    
                </form>
        </div>
    </div>
</div>

@if(!empty($data))
            <div class="row">
                <div class="col-md-12 mt-3" >
                    <div class="card">
                        <div class="card-header bg-info">
                            <h6 class="text-white"><strong>Project Details</strong></h6>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped table-bordered" Id="notification">
                                <thead>
                                    <tr>
                                        <td>ID</td>
                                        <td>Project Name</td>
                                        <td>Project Type</td>
                                        <td>Start Date</td>
                                        <td>Dead Line</td>
                                        <td>Project Description</td>
                                        <td>Project Assign</td>
                                        {{-- @role('Admin|Hr')
                                        <td>Action</td> 
                                        @endrole --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(!empty($data))
                                    @forelse($data as $notifi)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $notifi->project_name}}</td>
                                            <td>{{ $notifi->project_type}}</td>
                                            <td>{{date('d/M/Y',strtotime($notifi->start_date))}}</td>  
                                            <td>{{date('d/M/Y',strtotime($notifi->deadline))}}</td>
                                            <td>{{ $notifi->project_description}}</td>
                                            <td>
                                                <a href="{{route('assignproject.index',['id'=>$notifi->id])}}" class="btn btn-primary">Project Assign</a>
                                            </td>
                                        </tr>
                                            @empty
                                            <tr class="text-center">
                                                <td colspan="10">No Data Available now</td>
                                            </tr>
                                    @endforelse  
                                    @endif         
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td>ID</td>
                                        <td>Project Name</td>
                                        <td>Project Type</td>
                                        <td>Start Date</td>
                                        <td>Dead Line</td>
                                        <td>Project Description</td>
                                        <td>Project Assign</td>
                                        {{-- @role('Admin|Hr')
                                        <td>Action</td> 
                                        @endrole --}}
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endif

<script>
    $(function () {
        $('#notification').DataTable({
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

<script>
    function myFunction(element) {
        var value = element.value;
        // // /element.form.submit();
        $.ajax({
           type:"get",
            url:"{{route('project.index')}}",
            data:{
                _token: "{{csrf_token()}}",
                post:value,
            },
            success: function(response)
            {
                  $output=""; 
                  response.forEach(element => {
                  $output +='<option>'+"choose your project"+'</option>';
                  element.forEach(result => {
                  $output += '<option>'+result.project_name+'</option>';
                  });
                  document.getElementById("project").innerHTML=  $output;
                  });
            }
    });
    }
    </script>

  @endsection