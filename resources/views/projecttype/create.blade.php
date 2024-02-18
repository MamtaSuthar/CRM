@extends('_layouts.default')

@section('content')
  <div class="content-wrapper">
      <section class="content">
      <div class="container-fluid">
      <h1 >Add Project Type</h1>
      <form class="form-horizontal multipart/form-data" method="post" action="{{route('projecttype.store')}}">
          @csrf
          @method('post')
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Project Type</label>
             <div class="col-sm-10">
                <input type="text" class="form-control" style="width:500px" id="inputEmail3" placeholder="Enter your Project Type"
                name="project_type"   value="" autocomplete="off"/>
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
  