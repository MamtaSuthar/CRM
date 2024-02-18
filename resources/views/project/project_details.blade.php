@extends('_layouts.default')

@section('content')

<div class="content-wrapper py-2">
    <div class="container-fluid">
  
        <div class="card">
            <div class="card-body">
                <form method="post" action="">
                    @csrf
                    <?php
                    $status="";$name="";$email="";$mobile="";$code="";
                    if(isset($_GET['client_name'])){
                        $email = $_GET['client_name'];
                        
                    }
                    if(isset($_GET['project_name'])){
                        $name = $_GET['project_name'];
                    }
                  
                ?>
                <div class="sbp-preview position-relative">
                    <div class="form-group">
                        <div class="row mx-0 align-items-end">
                          
                            <div class="col-md">
                                <div class="form-group my-3">
                                    <label>Client</label>
                                  <select  class="form-control" name="project" id="sel_depart">
                                    <option >Select Client</option>
                                    @foreach ($projects as $key => $value)
                                      <option value="{{ $key }}" > 
                                          {{ $value->client_name }} 
                                      </option>
                                    @endforeach    
                                  </select>   
                                  
                                
                            <label>Project</label>
                            <select class="form-control" name="project" id="project">
                                <option >Select Project</option> 
                                @foreach ($projects as $key => $value)
                                  <option value="{{ $key }}" > 
                                      {{ $value->project_name }} 
                                  </option>
                                @endforeach    
                              </select>   
                            
                            <div class="col-md-auto text-right mb-md-3">
                                <button class="btn btn-sm btn-success text-uppercase"><i class="far fa-check-circle">
                                    </i>&nbsp;Submit</button>

                            </div>
                            </form>
                        </div>
                    </div>

        <div class="row">
            <div class="col-md-12 mt-3" >
               
                <div class="card">
                    <div class="card-header bg-info">
                        <h6 class="text-white"><strong>Project Details</strong></h6>
                    </div>
                    <div class="card-body">
                      
    <table class="table table-striped table-bordered" id="data">
        <thead>
            <tr>
                <td>ID</td>
                <td>Project Name</td>
                <td>Client Name</td>
                <td>Project Manager</td>
                <td>Department Name</td>
                <td>Team Leader</td>
                <td>No. of Emp</td>
                <td>Project Duration</td>
                <td>Status by Emp</td>
                <td>Status by Team Leader</td>
                <td>Status by Project Manager</td>
                <td>action</td> 
            </tr>
        </thead>
    
            <tbody>
                @foreach($projects as $key=>$post)
                    <tr>
                        <td>{{ $post->id }}</td>
                        <td>{{ $post->project_name }}</td>
                        <td>{{ $post->client_name }}</td>
                        <td>{{ $post->project_mananger }}</td>
                        <td>{{ $post->department_name }}</td>
                        <td>{{ $post->team_leader }}</td>
                        <td>{{ $post->number_of_employee }}</td>
                        <td>{{ $post->project_duration }}</td>
                        <td>{{ $post->status_by_emp }}</td>
                        <td>{{ $post->status_by_team_leader }}</td>
                        <td>{{ $post->status_by_project_manager }}</td>
                        <td>
                            @if(request()->has('trashed'))
                                <a href="{{ route('projects.restore', $post->id) }}" class="btn btn-success">Restore</a>
                            @else
                                <form method="POST" action="{{ route('projects.destroy', $post->id) }}">
                                    @csrf
                                    <input name="_method" type="hidden" value="DELETE">
                                    <button type="submit" class="btn btn-danger delete" title='Delete'>Delete</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="float-end">
            @if(request()->has('trashed'))
                <a href="{{ route('projects.showp') }}" class="btn btn-info">View All posts</a>
                <a href="{{ route('projects.restoreAll') }}" class="btn btn-success">Restore All</a>
            @else
                <a href="{{ route('projects.showp', ['trashed' => 'post']) }}" class="btn btn-primary">View Deleted posts</a>
            @endif
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            $('.delete').on('click',function(e) {
                if(!confirm('Are you sure you want to delete this post?')) {
                    e.preventDefault();
                }
            });
        });
    </script>


                       
    </div>
    </div>
    </div>

    </div>
    </div>

<script>
            $(document).on('change','#sel_depart',function(){
               
             var deptid = $(this).val();
            
        $.ajax({
            url: "<?php echo URL::asset('clientproject');?>?&deptid=" + deptid,
            type: 'post',
            "data":{ _token: "{{csrf_token()}}"},
            
            dataType: 'json',
            success:function(response){
            //  $('#project').html();
                
                var len = response.length;
                alert(len);
                $("#project").empty();
                for( var i = 0; i<len; i++){
                    
                    var name = response[i]['project_name'];
                    
                    $("#project").append("<option value=''>"+name+"</option>");
                }
            }
        });
    });

</script>

  @endsection
