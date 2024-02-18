@extends('_layouts.default')

@section('content')

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
  <!-- Main content -->
    <section class="content">
    <div class="container-fluid">
    <h1 style="text-align: center">Update Events </h1>

    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach

<form class="form-horizontal" method="post" action="{{route('tasks.update', $tasks[0]->id)}}"
    enctype="multipart/form-data" >
    @csrf
    @method('PUT')

<div class="form-group">
<label for="inputEmail3" class="col-sm-2 control-label">Name</label>
<div class="col-sm-10">
<input type="text" class="form-control" id="inputEmail3" placeholder="name"
name="name"   value="{{ $tasks[0]->name}}"/>
@error('name')
<div class="alert alert-danger">{{$message}}</div>
@enderror
</div>
</div>

<div class="form-group">
<label for="inputEmail3" class="col-sm-2 control-label">Event Date</label>
<div class="col-sm-10">
 <input type="text" class="form-control" id="inputEmail3" placeholder="task_date"
 name="task_date"   value="{{ $tasks[0]->task_date}}"/>
 @error('task_date')
 <div class="alert alert-danger">{{$message}}</div>
 @enderror
</div>
</div>

<div class="form-group">
<label for="inputEmail3" class="col-sm-2 control-label"> Description</label>
<div class="col-sm-10">
<textarea type="text" class="form-control" id="inputEmail3"  name="description" 
value="{{$tasks[0]->description}}">@php echo $tasks[0]->description @endphp</textarea>
@error('description')
<div class="alert alert-danger">{{$message}}</div>
@enderror
</div>
</div>

<div class="form-group">
<strong>Image</strong>
<div class="col-sm-10">
<input type="file" name="image" class="form-control"   value="{{ $tasks[0]->image}}" >
<img src="{{ asset('public/'.$tasks[0]->image) }}"  width="50" class="img-circle elevation-2"  />
@error('image')
<div class="alert alert-danger">{{ $message }}</div>
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