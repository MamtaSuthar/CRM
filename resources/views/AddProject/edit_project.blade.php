@extends('_layouts.default')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        
        <h1 >Create Project </h1>
          
        <form class="form-horizontal multipart/form-data" method="post" action="{{route('addproject.update',$data->id)}}">
        @csrf
        @method('PUT')

        <div class="row">

            <div class="col-sm-5">
                <div class="form-group">
                   <label for="inputEmail3" class="control-label">Project Name</label>
                   <input type="text" class="form-control" id="inputEmail3" placeholder="Project Name"
                   name="project_name"   value="{{$data->project_name}}"/>
                    @error('project_name')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
           </div>
           
            <div class="col-sm-5">
               <div class="form-group">
                   <label for="inputEmail3" class="control-label">Client ID</label>
                    <select class="form-control" name="client_id">
                    @foreach($c_id as $c_data)
                      <option>{{$c_data}}</option>
                    @endforeach
                    </select>
                   @error('client_id')
                   <span class="text-danger">{{ $message }}</span>
                   @enderror
               </div>
            </div>

            <div class="col-sm-5">
              <div class="form-group">
                  <label for="inputEmail3" class="control-label">Project Type</label>
                  <input type="text" class="form-control" id="inputEmail3" placeholder="Project Type"
                  name="project_type"   value="{{$data->project_type}}"/>
                  @error('project_type')
                  <span class="text-danger">{{ $message }}</span>
                  @enderror
              </div>
           </div>

            <div class="col-sm-5">
                <div class="form-group">
                     <label for="inputEmail3" class="col-sm-2 control-label"> Date</label>
                     <input type="date" class="form-control" id="inputEmail3" placeholder="Start Date"
                     name="start_date"   value="{{$data->start_date}}"/>
                     @error('start_date')
                     <span class="text-danger">{{ $message }}</span>
                     @enderror
               </div>
            </div>

            <div class="col-sm-5">
               <div class="form-group">
                     <label for="inputEmail3" class="control-label">DeadLine</label>
                     <input type="date" class="form-control" id="inputEmail3" placeholder="dob"
                       name="deadline"   value="{{$data->deadline}}"/>
                      @error('deadline')
                      <span class="text-danger">{{ $message }}</span>
                      @enderror
                 </div>
           </div>

          <div class="col-sm-10">
            <label for="inputEmail3" class="control-label">Project Description</label>
            <textarea  class="form-control" id="inputEmail3" placeholder="Address"
            name="project_description" value=""  rows="4" cols="50">{{$data->project_description}}</textarea>
            @error('project_description')
            <span class="text-danger">{{ $message }}</span>
            @enderror
            </div>
          
        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10">
              <button type="submit" class="btn btn-default">Submit</button>
          </div>
        </div>

        </div>
    </form>

      </div>
    </section>
    </div>
  
  @endsection