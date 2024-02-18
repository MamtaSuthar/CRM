@extends('_layouts.default')

@section('content')

<div class="content-wrapper py-2">
     <div class="container-fluid">
      
        <div class="col d-flex justify-content-end">
            <a href="{{route('projecttype.create')}}" class="btn btn-danger" >Add Project Type</a>
        </div>

        <div class="row">
            <div class="col-md-12 mt-3" >
                <div class="card">
                    <div class="card-header bg-info">
                        <h6 class="text-white"><strong>Project Type</strong></h6>
                    </div>
                    <div class="card-body">
                   
                        <table class="table table-striped table-bordered" Id="projecttype">
                            <thead>
                                <tr>
                                    <td>ID</td>
                                    <td>Project Types</td>
                                    <td>Status</td>
                                    <td>Action</td>
                                    {{-- @role('Admin|Hr')
                                    <td>Action</td> 
                                    @endrole --}}
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($data as $notifi)
                                      <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $notifi->project_type}}</td>
                                        <td>
                                            @if($notifi->project_status==1)
                                            <i class="nav-icon fas fa-ban"></i>
                                            {{ $string='Deactive';}}
                                        @else
                                        <i class="nav-icon fas fa-check"></i>
                                               {{$string='Active';}}
                                        @endif
                                            </td>
                                        <td>
                                            <div class="dropdown">
                                            <button class="dropbtn btn btn-primary">Action</button>
                                            <div class="dropdown-content">
                                                
                                                 <a href="{{route('projecttype.edit',$notifi->id)}}">Edit</a>
                                                <form method="POST" id="projecttype{{$notifi->id}}"
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
                                             </form>
                                                  <form method="post"   id="deleteClient{{$notifi->id}}" action="{{route('projecttype.update',$notifi->id)}}">
                                                        @csrf
                                                        @method('put')
                                                        @if($notifi->project_status == 1)
                                                        <input type="hidden" name="id" value="{{$notifi->id}}">
                                                        <input type="hidden" name="project_status" value="2">
                                                        <i class="nav-icon fas fa-check"></i>
                                                        
                                                        <button type="submit" class="btn btn-flat btn-sm remove-products"
                                                                data-id="{{$notifi->id}}" data-action="{{route('projecttype.update',$notifi->id) }}"
                                                                onclick="({{$notifi->id}},'{{route('projecttype.update',$notifi->id) }}')"
                                                                >Active
                                                        </button>
                                                        @elseif($notifi->project_status == 2)
                                                        <input type="hidden" name="id" value="{{$notifi->id}}">
                                                        <input type="hidden" name="project_status" value="1">
                                                        <i class="nav-icon fas fa-ban"></i>
                                                        <button type="submit" class="btn btn-flat btn-sm remove-products"
                                                            data-id="{{$notifi->id}}" data-action="{{route('projecttype.update',$notifi->id) }}"
                                                            onclick="({{$notifi->id}},'{{route('projecttype.update',$notifi->id) }}')"
                                                            >Deactive</button>
                                                        @endif
                                                    </form>
                                            </div>
                                          </div>
                                        </td>
                                      </tr>
                                        @empty
                                        <tr class="text-center">
                                            <td colspan="10">No Data Available now</td>
                                        </tr>
                                @endforelse           
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td>ID</td>
                                    <td>Project Types</td>
                                    <td>Status</td>
                                    <td>Action</td>
                                    {{-- @role('Admin|Hr')
                                    <td>Action</td> 
                                    @endrole --}}
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
  function deleteConfirmation22(id, url) {
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

  $('#projecttype'+id).submit();

} else if (

/* Read more about handling dismissals below */

result.dismiss === Swal.DismissReason.cancel

) {

return false;

}

})
  }
</script>
<style>
  
    .dropbtn {
      /* background-color: #828882;
      color: rgb(10, 9, 9); */
      padding: 7px;
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
    
    .dropdown:hover .dropbtn {background-color: #8e623e;}
    </style>

<script>
 $(function () {
     $.fn.dataTable.ext.errMode = 'none';
     $('#notification').DataTable({
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

<script>
    $(function () {
        $('#notification').DataTable({
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
  

