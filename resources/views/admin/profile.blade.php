@extends('_layouts.default')

@section('content')

<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        
        <h1 >Edit Profile </h1>

     @php $dd=json_decode(auth()->user()); @endphp
   <form class="form-horizontal multipart/form-data" method="post" enctype="multipart/form-data" action="{{route('users.updateadmin.post',$dd->id)}}">
    @csrf
    @method('PUT')

    <div class="form-group">
      <label for="inputEmail3" class="col-sm-2 control-label">Name</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="inputEmail3" placeholder="Name"
       name="name"   value="{{ucfirst($dd->name)}}"/>
       @error('name')
       <span class="text-danger">{{ $message }}</span>
       @enderror
      </div>
    </div>

    <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
        <div class="col-sm-10">
          <input type="email" class="form-control" id="inputEmail3" placeholder="Email"
         name="email"   value="{{$dd->email}}"/>
         @error('email')
         <span class="text-danger">{{ $message }}</span>
         @enderror
        </div>
      </div>

      <div class="form-group">
        <strong>Image</strong>
        <div class="col-sm-10">
            <input type="file" name="image" class="form-control"  >
            <img src="{{ asset('public/'.$dd->image) }}"  width="50" class="img-circle elevation-2"  />
         @error('image')
         <div class="alert alert-danger">{{ $message }}</div>
     @enderror 
        </div>
      </div>

    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-primary">Update</button>
      </div>
    </div>
  </form>

</div>
</section>
</div>

@endsection