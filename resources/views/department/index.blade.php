@extends('_layouts.default')

@section('content')

<div class="content-wrapper py-2">
    <div class="container-fluid">
       {{-- @role('Admin|Hr') --}}
        <div class="col d-flex justify-content-end">
            <a href="{{route('department.create')}}" class="btn btn-danger"  > Create Department</a>
            </div>
        {{-- @endrole --}}
        <div class="row">
            <div class="col-md-12 mt-3" >
                <div class="card">
                    <div class="card-header bg-info">
                        <h6 class="text-white"><strong>Department</strong></h6>
                    </div>
                    
                    <div class="card-body">
                      
    <table class="table table-striped table-bordered" Id="notification">
        <thead>
            <tr>
                <td>ID</td>
                <td>Department</td>
                <td>Status</td>
                <td>Action</td>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <td>ID</td>
                <td>Department</td>
                <td>Status</td>
                <td>Action</td>
            </tr>
              
        </tfoot>
        <tbody>
            
            @forelse($department as $depart)
            <tr>
              <?php $role =$depart->name ?> 
                <td>{{ $loop->iteration}}</td>
                <td>{{ ucfirst($depart->name )}}</td>
                <td>
                    @if($depart->status==1)
                    <i class="nav-icon fas fa-check"></i>
                    {{$string='Active';}}
                @else
                <i class="nav-icon fas fa-ban"></i>
                   {{ $string='Deactive';}}
                @endif
                 </td>

                <td>
                
                    <div class="dropdown">
                        <button class="dropbtn btn btn-primary">Status</button>
                        <div class="dropdown-content">
                    
                            @if($depart->status=='2')

                            <form method="POST" id="deleteClient{{$depart->id}}"
                                action="{{route('department.update',$depart->id)}}">
                               @csrf
                               @method('put')
                            <input type="hidden" name="id" value="{{$depart->id}}">
                       
                           <button
                            type="submit" class="btn  btn-flat btn-sm remove-products"
                           data-id="{{ $depart->id }}" data-action="{{ route('department.update',$depart->id) }}"
                           onclick="({{$depart->id}},'{{ route('department.update',$depart->id) }}')"
                          >Active</button>
                       </form>

                            @else

                            <form method="POST" id="deleteClient{{$depart->id}}"
                                action="{{route('department.update',$depart->id)}}">
                               @csrf
                               @method('put')
                               <input type="hidden" name="id" value="{{$depart->id}}">
                               <i class="nav-icon fas fa-ban"></i>
                              
                           <button
                            type="submit" class="btn  btn-flat btn-sm remove-products"
                           data-id="{{ $depart->id }}" data-action="{{ route('department.update',$depart->id) }}"
                           onclick="({{$depart->id}},'{{ route('department.update',$depart->id) }}')"
                          >Deactive</button>
                       </form>

                            @endif

                           
                            <form method="POST" id="department{{$depart->id}}"
                               action="{{route('department.destroy',$depart->id)}}">
                              @csrf
                              @method('DELETE')
                          <button
                           type="button" class="btn  btn-flat btn-sm remove-department"
                          data-id="{{ $depart->id }}" data-action="{{ route('department.destroy',$depart->id) }}"
                          onclick="deleteConfirmat3({{$depart->id}},'{{ route('department.destroy',$depart->id) }}')"
                         >Delete</button>
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

        </table>
                   

    </div>
    </div>
    </div>
    </div>
    </div>


</div>


<!-----sweetalert---->
<script type="text/javascript">
    function deleteConfirmat3(id, url) {
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

    $('#department'+id).submit();

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

  @endsection
  