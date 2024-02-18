@extends('_layouts.default')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        
        <h1 >Edit Project Details </h1>

          @foreach ($errors->all() as $error)
             <li>{{ $error }}</li>
             @endforeach

   <form class="form-horizontal multipart/form-data" method="post" action="{{route('projects.update',$projects->id)}}">
    @csrf
    @method('PUT')

    <div class="form-group">
      <label for="inputEmail3" class="col-sm-2 control-label">Project Name</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="inputEmail3" placeholder="project_name"
       name="project_name"   value="{{$projects->project_name}}"/>
       @error('project_name')
       <div class="alert alert-danger">{{$message}}</div>
       @enderror
      </div>
    </div>

    <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Client Name</label>
        <div class="col-sm-10">
          <input type="client_name" class="form-control" id="inputEmail3" placeholder="client_name"
         name="client_name"   value="{{$projects->client_name}}"/>
         @error('client_name')
         <div class="alert alert-danger">{{$message}}</div>
         @enderror
        </div>
      </div>

      <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Project Mananger</label>
        <div class="col-sm-10">
          <input type="project_mananger" class="form-control" id="inputEmail3" placeholder="project_mananger"
         name="project_mananger"   value="{{$projects->project_mananger}}"/>
         @error('project_mananger')
         <div class="alert alert-danger">{{$message}}</div>
         @enderror
        </div>
      </div>

      <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Department Name</label>
        <div class="col-sm-10">
          <input type="department_name" class="form-control" id="inputEmail3" placeholder="department_name"
         name="department_name"   value="{{$projects->department_name}}"/>
         @error('department_name')
         <div class="alert alert-danger">{{$message}}</div>
         @enderror
        </div>
      </div>

      <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Team Leader</label>
        <div class="col-sm-10">
          <input type="team_leader" class="form-control" id="inputEmail3" placeholder="team_leader"
         name="team_leader"   value="{{$projects->team_leader}}"/>
         @error('team_leader')
         <div class="alert alert-danger">{{$message}}</div>
         @enderror
        </div>
      </div>
      
      <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">No. of Emp</label>
        <div class="col-sm-10">
          <input type="number_of_employee" class="form-control" id="inputEmail3" placeholder="number_of_employee"
         name="number_of_employee"   value="{{$projects->number_of_employee}}"/>
         @error('number_of_employee')
         <div class="alert alert-danger">{{$message}}</div>
         @enderror
        </div>
      </div>

      <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Project Duration</label>
        <div class="col-sm-10">
          <input type="project_duration" class="form-control" id="inputEmail3" placeholder="project_duration"
         name="project_duration"   value="{{$projects->project_duration}}"/>
         @error('project_duration')
         <div class="alert alert-danger">{{$message}}</div>
         @enderror
        </div>
      </div> 

       <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Stetus by Emp</label>
        <div class="col-sm-10">
          <input type="status_by_emp" class="form-control" id="inputEmail3" placeholder="status_by_emp"
         name="status_by_emp"   value="{{$projects->status_by_emp}}"/>
         @error('status_by_emp')
         <div class="alert alert-danger">{{$message}}</div>
         @enderror
        </div>
      </div>

        <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Stetus by Team Leader</label>
        <div class="col-sm-10">
          <input type="status_by_team_leader" class="form-control" id="inputEmail3" placeholder="status_by_team_leader"
         name="status_by_team_leader"   value="{{$projects->status_by_team_leader}}"/>
         @error('status_by_team_leader')
         <div class="alert alert-danger">{{$message}}</div>
         @enderror
        </div>
      </div>
    
      <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Stetus by Project Manager</label>
        <div class="col-sm-10">
          <input type="status_by_project_manager" class="form-control" id="inputEmail3" placeholder="status_by_project_manager"
         name="status_by_project_manager"   value="{{$projects->status_by_project_manager}}"/>
         @error('status_by_project_manager')
         <div class="alert alert-danger">{{$message}}</div>
         @enderror
        </div>
      </div>

    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default">Update</button>
      </div>
    </div>

  </form>

      </div>
    </section>
    </div>
  
  @endsection
  
