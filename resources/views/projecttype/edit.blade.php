@extends('_layouts.default')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
      <section class="content">
      <div class="container-fluid">
      <h1 >Edit Project Type</h1>

      <form class="form-horizontal multipart/form-data" method="post" action="{{route('projecttype.update',$data[0]->id)}}">
          @csrf
          @method('PUT')
          
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Project Type</label>
             <div class="col-sm-10">
                <input type="text" class="form-control" id="inputEmail3" placeholder="Enter your Project Type"
                name="project_type"   value="{{$data[0]->project_type}}"/>
                @error('project_type')
                <div class="text-danger">{{$message}}</div>
                @enderror
            </div>
          </div>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
        </div>

    </form>

      </div>
    </section>
    </div>
 
  @endsection
  