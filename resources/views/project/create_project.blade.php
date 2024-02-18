@extends('_layouts.default')

@section('content')

<html>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <!-- Small boxes (Stat box) -->

               <h1 style="text-align: center" >Create  Projects Details </h1>

    <form class="form-horizontal multipart/form-data" enctype="multipart/form-data" method="post" 
         action="{{route('projects.store')}}" >
        @csrf

        <div class="form-group">
          <label for="inputEmail3" class="col-sm-2 control-label">Project Name</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="inputEmail3" placeholder="project_name"
           name="project_name"  value=""/>
           @error('project_name')
           <div class="alert alert-danger">{{$message}}</div>
           @enderror
          </div>
        </div>

        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Client Name</label>
            <div class="col-sm-10">
              <input type="client_name" class="form-control" id="inputEmail3" placeholder="client_name"
             name="client_name" value="" />
             @error('client_name')
             <div class="alert alert-danger">{{$message}}</div>
             @enderror
            </div>
          </div>

          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Project Mananger</label>
            <div class="col-sm-10">
              <input type="project_mananger" class="form-control" id="inputEmail3" placeholder="project_mananger"
             name="project_mananger"  value=""/>
             @error('project_mananger')
             <div class="alert alert-danger">{{$message}}</div>
             @enderror
            </div>
          </div>

          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Department Name</label>
            <div class="col-sm-10">
              <input type="department_name" class="form-control" id="inputEmail3" placeholder="department_name"
             name="department_name" value="" />
             @error('department_name')
             <div class="alert alert-danger">{{$message}}</div>
             @enderror
            </div>
          </div>

          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Team Leader</label>
            <div class="col-sm-10">
              <input type="team_leader" class="form-control" id="inputEmail3" placeholder="team_leader"
             name="team_leader"  value=""/>
             @error('team_leader')
             <div class="alert alert-danger">{{$message}}</div>
             @enderror
            </div>
          </div>

          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">No. of Emp</label>
            <div class="col-sm-10">
              <input type="number_of_employee" class="form-control" id="inputEmail3" placeholder="number_of_employee"
             name="number_of_employee"  value=""/>
             @error('number_of_employee')
             <div class="alert alert-danger">{{$message}}</div>
             @enderror
            </div>
          </div>

           <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Project Duration</label>
            <div class="col-sm-10">
              <input type="project_duration" class="form-control" id="inputEmail3" placeholder="project_duration"
             name="project_duration"  value=""/>
             @error('project_duration')
             <div class="alert alert-danger">{{$message}}</div>
             @enderror
            </div>
          </div>  

          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Stetus by Emp</label>
            <div class="col-sm-10">
              <input type="status_by_emp" class="form-control" id="inputEmail3" placeholder="status_by_emp"
             name="status_by_emp" value="" />
             @error('status_by_emp')
             <div class="alert alert-danger">{{$message}}</div>
             @enderror
            </div>
          </div>
          
           <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Stetus by Team Leader</label>
            <div class="col-sm-10">
              <input type="status_by_team_leader" class="form-control" id="inputEmail3" placeholder="status_by_team_leader"
             name="status_by_team_leader" value="" />
             @error('status_by_team_leader')
             <div class="alert alert-danger">{{$message}}</div>
             @enderror
            </div>
          </div>

          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Stetus by Project Manager</label>
            <div class="col-sm-10">
              <input type="status_by_project_manager" class="form-control" id="inputEmail3" placeholder="status_by_project_manager"
             name="status_by_project_manager" value="" />
             @error('status_by_project_manager')
             <div class="alert alert-danger">{{$message}}</div>
             @enderror
            </div>
          </div>
    
        <div class="form-data">
            <button class="btn btn-success confirm" type="submit" name="submit">
             Create
            </button>
        </div>
       
    </form>

        </div>
      </section>
    </div>

    </html>
    
@endsection
