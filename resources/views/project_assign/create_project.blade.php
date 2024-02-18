@extends('_layouts.default')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        
        <h1 >Insert Project Details</h1>

          @foreach ($errors->all() as $error)
             <li>{{ $error }}</li>
             @endforeach

    <form class="form-horizontal multipart/form-data" method="post" action="{{route('project.store')}}">
        @csrf
        @method('post')

        <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Project Name</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="inputEmail3" placeholder="name"
        name="first_name"   value=""/>
        @error('name')
        <div class="alert alert-danger">{{$message}}</div>
        @enderror
        </div>
        </div>

        <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Client Name</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="inputEmail3" placeholder="name"
        name="last_name"   value=""/>
        @error('name')
        <div class="alert alert-danger">{{$message}}</div>
        @enderror
        </div>
        </div>

        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Client Email</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" id="inputEmail3" placeholder="Email"
            name="email"   value=""/>
            @error('email')
            <div class="alert alert-danger">{{$message}}</div>
            @enderror
            </div>
        </div>

        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Date</label>
            <div class="col-sm-10">
            <input type="date" class="form-control" id="inputEmail3" placeholder="Phone"
            name="phone"   value=""/>
            @error('email')
            <div class="alert alert-danger">{{$message}}</div>
            @enderror
            </div>
        </div>

        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Project Type</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" id="inputEmail3" placeholder="dob"
            name="dob"   value=""/>
            @error('dob')
            <div class="alert alert-danger">{{$message}}</div>
            @enderror
            </div>
        </div>
        
        <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-default">Submit</button>
        </div>
        </div>

    </form>

      </div>
    </section>
    </div>
  
  @endsection
  
