@extends('_layouts.default')
@section('content')
<style>
    .dropbtn {
      background-color: #04AA6D;
      color: white;
      padding: 16px;
      font-size: 16px;
      border: none;
    }
    
    .dropdown {
      position: relative;
      display: inline-block;
    }
    
    .dropdown-content {
      display: none;
      position: absolute;
      background-color: #f1f1f1;
      min-width: 160px;
      box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
      z-index: 1;
    }
    
    .dropdown-content a {
      color: black;
      padding: 12px 16px;
      text-decoration: none;
      display: block;
    }
    
    .dropdown-content a:hover {background-color: #ddd;}
    
    .dropdown:hover .dropdown-content {display: block;}
    
    .dropdown:hover .dropbtn {background-color: #3e8e41;}
    </style>
<div class="content-wrapper py-2">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 mt-3" >
                <div class="card">
                    <div class="card-header bg-info">
                        <h6 class="text-white"><strong>Assign Project</strong></h6>
                    </div>
                    <div class="card-body">
                   
    <table class="table table-striped table-bordered" Id="assignproject">
        <thead>
            <tr>
                <td>ID</td>
                <td>Department Name</td>
                <td>Project Leader</td>
                <td>Employee</td>
                <td>Start Date</td>
                <td>Deadline</td>
                <td>Status</td>
                 {{-- @role('Admin|Hr') --}}
                <td>Action</td> 
                {{-- @endrole --}}
            </tr>
        </thead>
        {{-- @role($role) --}}
     
        <tbody>
           
            @forelse($project as  $pro)
              <td>{{ $loop->iteration}}</td>
              <td>{{ $pro->name}}</td>
              <td>{{ $pro->leader.$pro->last}}</td>
              <td>{{ $pro->emp }}</td>
              <td>{{date('d/M/Y',strtotime($pro->start_date))}}</td>  
              <td>{{date('d/M/Y',strtotime($pro->deadline))}}</td>
              @if($pro->p_status == 1)
              <td> <i class="fa fa-tasks"></i>
                  {{$string='On Working'}}</td>
              @elseif($pro->p_status == 2)
              <td> <i class="nav-icon fas fa-check"></i>
             {{$string='complete'}}</td>
              @elseif($pro->p_status == 3)
                  <td>Pending</td>  
              @endif  
              
              <td>
                <div class="dropdown">
                    <button class="dropbtn">Action</button>
                        <div class="dropdown-content">
                    <form method="post"   id="assignproject{{$pro->s_id}}" action="{{route('assignproject.update',$pro->s_id)}}">
                        @csrf
                        @method('put')
                        @if($pro->p_status == 1)
                          <input type="hidden" name="id" value="{{$pro->s_id}}">
                          <input type="hidden" name="status" value="2">
                          <i class="nav-icon fas fa-check"></i>
                          
                          <button type="button" class="btn btn-flat btn-sm remove-products"
                                  data-id="{{$pro->s_id}}" data-action="{{route('assignproject.update',$pro->s_id) }}"
                                  onclick="deleteConfirmat12({{$pro->s_id}},'{{route('assignproject.update',$pro->s_id) }}')"
                                >Complete
                          </button>
                        @elseif($pro->p_status == 2)
                        <input type="hidden" name="id" value="{{$pro->s_id}}">
                        <input type="hidden" name="status" value="1">
                        <i class="fa fa-tasks"></i> 
                        <button type="button" class="btn btn-flat btn-sm remove-products"
                              data-id="{{$pro->s_id}}" data-action="{{route('assignproject.update',$pro->s_id) }}"
                              onclick="deleteConfirmat12({{$pro->s_id}},'{{route('assignproject.update',$pro->s_id) }}')"
                              >On Working</button>
                        @endif
                    </form>

                    {{-- <form method="POST" id="projecttype{{$notifi->id}}"
                      action="{{route('projecttype.destroy',$notifi->id)}}">
                     @csrf
                     @method('DELETE')
                 
                <div class="form-group"> 
                  <i class="fa fa-trash"></i>
                   <button
                    type="button" class="btn btn-flat btn-sm remove-projecttype"
                  data-id="{{ $notifi->id }}" data-action="{{ route('projecttype.destroy',$notifi->id) }}"
                  onclick=" deleteConfirmation22({{$notifi->id}}, 
                  '{{ route('projecttype.destroy',$notifi->id) }}')"
                 >Delete</button>
               </div>
               </form> --}}
                    <form method="post" id="assignprojects{{$pro->s_id}}" action="{{route('assignproject.update',$pro->s_id)}}">
                      @csrf
                      @method('PUT')
                      <input type="hidden" name="id" value="{{$pro->s_id}}">
                      <input type="hidden" name="status" value="0">
                      <i class="fa fa-trash"></i>
                      <button
                      type="button" class="btn btn-flat btn-sm remove-assignproject"

                    data-id="{{$pro->s_id}}" data-action="{{route('assignproject.update',$pro->s_id) }}"
                    onclick="deleteConfirmat({{$pro->s_id}},'{{route('assignproject.update',$pro->s_id) }}')"
                    >Delete</button>
                    </form>
                </div>  
              </td>

            @empty
            <tr class="text-center">
              <td colspan="10">No Data Available now</td>
          </tr>
            @endforelse
        
     </tbody>
        <tfoot>
            <tr>
                <td>ID</td>
                <td>Department Name</td>
                <td>Project Leader</td>
                <td>Employee</td>
                <td>Start Date</td>
                <td>Deadline</td>
                <td>Status</td>
                 {{-- @role('Admin|Hr') --}}
                <td>Action</td> 
                {{-- @endrole --}}
            </tr>
        </tfoot>
    </table>
                   
    </div>
    </div>
    </div>
    </div>
    </div>
</div>


<!-----sweetalert---->

<script type="text/javascript">
  function deleteConfirmat(id, url) {
  const swalWithBootstrapButtons = Swal.mixin({
     customClass: {
    confirmButton: 'btn btn-sm btn-success ml-2',
    cancelButton: 'btn btn-sm btn-danger'
  },

  buttonsStyling: false
   })

  swalWithBootstrapButtons.fire({

 title: 'are you confirm!',

 text: "You won't be able to revert this!",

  icon: 'success',

 showCancelButton: true,

 confirmButtonText: 'Yes',

 cancelButtonText: 'No',

 reverseButtons: true

 }).then((result) => {

if (result.isConfirmed) {

  //   window.location.href =  url; 

  $('#assignprojects'+id).submit();

} else if (

/* Read more about handling dismissals below */

result.dismiss === Swal.DismissReason.cancel

) {

return false;

}

})
  }
</script>

{{--  --}}

<script type="text/javascript">
  function deleteConfirmat12(id, url) {
  const swalWithBootstrapButtons = Swal.mixin({
     customClass: {
    confirmButton: 'btn btn-sm btn-success ml-2',
    cancelButton: 'btn btn-sm btn-danger'
  },
  buttonsStyling: false
   })
  swalWithBootstrapButtons.fire({

 title: 'are you confirm!',

 text: "You won't be able to revert this!",

  icon: 'success',

 showCancelButton: true,

 confirmButtonText: 'Yes',

 cancelButtonText: 'No',

 reverseButtons: true

 }).then((result) => {

if (result.isConfirmed) {

  //   window.location.href =  url; 

  $('#assignproject'+id).submit();

} else if (

/* Read more about handling dismissals below */

result.dismiss === Swal.DismissReason.cancel

) {

return false;

}

})
  }
</script>




<script>
$(function () {
   $.fn.dataTable.ext.errMode = 'none';
   $('#assignproject').DataTable({
       "paging": true,
       "lengthChange": true,
       "searching": true,
       "ordering": true,
       "info": true,
       "autoWidth": true,
       "responsive": true,
   });
});
</script>

  @endsection
  

