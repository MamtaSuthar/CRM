@extends('_layouts.default')

@section('content')

<div class="content-wrapper py-2">
    <div class="container-fluid">
       {{-- @role('Admin|Hr') --}}
        <div class="col d-flex justify-content-end">
            <a href="{{route('notification.create')}}" class="btn btn-danger"  >Send Notification </a>
            </div>
        {{-- @endrole --}}
        <div class="row">
            <div class="col-md-12 mt-3" > 
                <div class="card">
                    <div class="card-header bg-info">
                        <h6 class="text-white"><strong>Notification</strong></h6>
                    </div>
                    <div class="card-body">
                      
    <table class="table table-striped table-bordered" Id="notification">
        <thead>
            <tr>
                <td>ID</td>
                <td>Name</td>
                <td>Notification</td>
                <td>For</td>
                <td>Sender</td>
                {{-- @role('Admin|Hr')
                <td>Action</td> 
                @endrole --}}
            </tr>
        </thead>
        {{-- @role($role) --}}
        <tbody>
            @forelse($notification as $notifi)
            <?php $role =$notifi->notification_for ?>
              @role($role)
            <tr>
                 <?php $role =$notifi->notification_for ?>
                 {{-- @role($role) --}}
                <td>{{ $loop->iteration}}</td>
                <td>{{ $notifi->name }}</td>
                <td>{{ $notifi->notification }}</td>
                <td>{{ $notifi->notification_for }}</td>
                <td>{{ $notifi->notification_send }}</td>
                {{-- @role('Admin|Hr')
                <td>
                    <div class="form-group"> 
                            <button type="button" class="btn btn-danger btn-flat btn-sm remove-products">
                            Edit</button>
                    </div>
                    <div class="form-group"> 
                            <button type="button" class="btn btn-danger btn-flat btn-sm remove-products">
                            Delete</button>
                    </div>
                      
                </td>
               @endrole --}}
               {{-- @endrole --}}
            </tr>
            @endrole
                @empty
                <tr class="text-center">
                    <td colspan="10">No Data Available now</td>
                </tr>
               @endforelse
        </tbody>
        <tfoot>
            <tr>
                <td>ID</td>
                <td>Name</td>
                <td>Notification</td>
                <td>For</td>
                <td>Sender</td>
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


<script>
    $(function () {
        $('#notification').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>

@endsection
  

