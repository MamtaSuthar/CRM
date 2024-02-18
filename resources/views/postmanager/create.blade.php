@extends('_layouts.default')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
      <section class="content">
      <div class="container-fluid">
      <h1 >Add Post </h1>

      <form class="form-horizontal multipart/form-data" method="post" action="{{route('postmanager.store')}}">
          @csrf
          @method('post')
          
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Post Name </label>
             <div class="col-sm-5">
                <input type="text" class="form-control" id="inputEmail3" placeholder="Enter your new post" autocomplete="off"
                name="post"   value=""/>
                @error('post')
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
 
    <script>

      $(function () {
      $('.selectpicker').selectpicker();
      }); 
        </script>
        
  @endsection