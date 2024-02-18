@extends('_layouts.default')

@section('content')

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
  <!-- Main content -->
    <section class="content">
    <div class="container-fluid">
    <h1 >Add Events </h1>

   <form action="{{ route('tasks.store') }}" method="post">
    @csrf

    Task name:
    <br />
    <input type="text" name="name" />
    <br /><br />
    Task description:
    <br />
    <textarea name="description"></textarea>
    <br /><br />
    Start time:
    <br />
    <input type="text" name="task_date" class="date" />
    <br /><br />
 
    <div class="form-group">
      <strong>Image</strong>
<div class="col-sm-10">
 <input type="file" name="image" class="form-control"  >
@error('image')
<div class="alert alert-danger">{{ $message }}</div>
@enderror 
</div>
</div>

<input type="submit" value="Save" class="btn btn-primary" />

    </form>

    </div>
    </section>
    </div>

@endsection