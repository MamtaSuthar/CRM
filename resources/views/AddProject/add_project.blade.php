@extends('_layouts.default')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        
        <h1 >Add Project </h1>

        <form class="form-horizontal multipart/form-data" method="post" action="{{route('addproject.store')}}">
        @csrf
        @method('post')
        <div class="row">
          
            <div class="col-sm-5">
                <div class="form-group">
                   <label for="inputEmail3" class="control-label">Project Name</label>
                   <input type="text" class="form-control" id="cproject_name" placeholder="Project Name"
                   name="project_name"   value="{{old('project_name')}}"/>
                    @error('project_name')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
           </div>
           
           
      
            <div class="col-sm-5">
               <div class="form-group">
                   <label for="inputEmail3" class="control-label">Client Name</label>
                    <select class="form-control" id="" name="client_name">
                    <option value="" disabled selected>Client name</option>
                    @foreach($c_name as $c_data)
                   
                    {{-- <option value="{{$c_data->id}}"{{ old('client_name') == $c_data->id ? 'selected' : '' }}>{{$c_data->name}}</option> --}}
                    <option value="{{$c_data->id}}"{{ old('client_name') == $c_data ? 'selected' : '' }}>{{$c_data->name}}</option>
                    @endforeach
                    </select>
                   @error('client_name')
                   <span class="text-danger">{{ $message }}</span>
                   @enderror
               </div>
            </div>

            <div class="col-sm-5">
              <div class="form-group">
                  <label for="inputEmail3" class="control-label">Project Type</label>
                   <select class="form-control" name="project_type">
                    <option value="" disabled selected>Project Type</option>
                   @foreach($p_type as $data)
                     <option value="{{$data->project_type}}"{{ old('project_type') == $data->project_type ? 'selected' : '' }}>{{$data->project_type}}</option>
                   @endforeach
                   </select>
                  @error('client_id')
                  <span class="text-danger">{{ $message }}</span>
                  @enderror
              </div>
           </div>

            <div class="col-sm-5">
                <div class="form-group">
                     <label for="inputEmail3" class="col-sm-5 control-label"> Start Date</label>
                     <input type="date" class="form-control" id="inputEmail3" placeholder="Start Date"
                     name="start_date"   value="{{old('start_date')}}"/>
                     @error('start_date')
                     <span class="text-danger">{{ $message }}</span>
                     @enderror
               </div>
            </div>

            <div class="col-sm-5">
               <div class="form-group">
                     <label for="inputEmail3" class="control-label">DeadLine</label>
                     <input type="date" class="form-control" id="inputEmail3" placeholder="Date"
                       name="deadline"   value="{{old('start_date')}}"/>
                      @error('deadline')
                      <span class="text-danger">{{ $message }}</span>
                      @enderror
                 </div>
           </div>

          </div> 

          <div class="col-sm-10">
            <label for="inputEmail3" class="control-label">Project Description</label>
            <textarea  class="form-control" id="inputEmail3" placeholder="Project Description"
            name="project_description"   rows="4" cols="50">{{old('project_description')}}</textarea>
            @error('project_description')
            <span class="text-danger">{{ $message }}</span>
            @enderror
            </div>
          </div>

        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10 mt-3 ml-2">
              <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </div>

    </form>
      </div>
    </section>
    </div>
    <script>
    $("#cproject_name").keypress(function(event){
      var inputValue = event.charCode;
      if(!(inputValue >= 65 && inputValue <= 120) && (inputValue != 32 && inputValue != 0)){
          event.preventDefault();
      }
   });
   </script>
  @endsection