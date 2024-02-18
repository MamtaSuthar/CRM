@extends('_layouts.default')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
      <section class="content">
      <div class="container-fluid">
      <h1 >Create Department </h1>
      <form class="form-horizontal multipart/form-data" method="post" action="{{route('department.store')}}">
          @csrf
          @method('post')
   
          <div class="col-sm-5">
            <div class="form-group">
                <label for="inputEmail3" class="control-label">Department Name</label>
                <input type="text" class="form-control" id="department" placeholder="Department name" value="" autocomplete="off"
                name="department">
                @error('department')
                <span class="text-danger">{{ $message }}</span>
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
  