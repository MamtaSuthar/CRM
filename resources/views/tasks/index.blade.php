@extends('_layouts.default')

@section('content')
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
  <!-- Main content -->
    <section class="content">
    <div class="container-fluid">

<h3 style="text-align:center"><strong>Calendar</strong></h3>

<div class="col d-flex justify-content-end">
<a href="{{ route('tasks.create') }}" class="btn btn-danger">Add Events</a>
</div>

<div id="calendar"  ></div>
</div>

<script>
    $(document).ready(function() {

        $('#calendar').fullCalendar({
          

            events : [
                
                @foreach($tasks as $task )
                {
                    title : '{{ $task->name }}',
                    start : '{{ $task->task_date }}',
                    text:"{{$task->description}}",
                    imageUrl: 'public/{{$task->image}}',
                    href: "{{route('tasks.edit',$task->id)}}"  ,
                },
            
                @endforeach
                
                @foreach($emps as $emp )
                {
                    title : '{{ $emp->first_name }}',
                    text:"Birthday",
                    imageUrl: 'public/images/images.png',
                    start : '{{ $emp->dob }}',
                    href: "{{url('edit_employee',$emp->id)}}?id={{$emp->id}}",
                },
            
                @endforeach
            ],

            
      eventClick: function (info) {
     Swal.fire({
     title: info.title,
    text:info.text,
    imageUrl:info.imageUrl,
  imageWidth: 100,
  imageHeight: 100,
  imageAlt: 'Custom image',
  

  showCancelButton: true,

   confirmButtonText: 'Edit',

   cancelButtonText: 'OK',

   reverseButtons: true

      }).then((result) => {

if (result.isConfirmed) {

       window.location.href =info.href;

} else if (

/* Read more about handling dismissals below */

result.dismiss === Swal.DismissReason.cancel

) {

return false;

}

});
      

       }

        })
    });
</script> 


@endsection
