@extends('_layouts.default')

@section('content')
<div class="content-wrapper py-2">
    <div class="container-fluid">
        
        <div class="card">
            <div class="card-body">
                <form method="get" action="">
                    <?php
                    $status="";$name="";$email="";$phone="";$code="";
                    if(isset($_GET['email'])){
                        $email = $_GET['email'];
                        
                    }
                    if(isset($_GET['first_name'])){
                        $name = $_GET['first_name'];
                    }
                    
                    if(isset($_GET['phone'])){
                        $phone= $_GET['phone'];

                    }
                ?>
                <div class="card">
                    <div class="card-header bg-info">
                        <h6 class="text-white"><strong>Search Employe</strong></h6>
                    </div>
                    <div class="sbp-preview position-relative">
                        <div class="form-group">
                            <div class="row mx-0 align-items-end">
                                <div class="col-md">
                                    <div class="form-group my-3">
                                    <label>Name</label>
                                    <input type="text" name="first_name" id="first_name" value="{{$name}}">
                                    </div>
                                </div>
                                <div class="col-md">
                                    <div class="form-group my-3">
                                    <label>Email</label>
                                    <input type="text" name="email" id="email" value="{{$email}}">
                                    </div>
                                </div>
                                <div class="col-md">
                                    <div class="form-group my-3">
                                    <label>phone</label>
                                    <input type="text" name="phone" id="phone" value="{{$phone}}">
                                    </div>
                                </div>
                                
                                <div class="col-md-auto text-right mb-md-3">

                                    <button class="btn btn-sm btn-success text-uppercase"><i class="far fa-check-circle"></i>&nbsp;Submit</button>
                                    {{-- <a href="{{url('/create_employe')}}" class="btn btn-sm btn-danger text-uppercase"  >Create </a> --}}
            
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div> 
        </div>
        <div class="row">
           
            <div class="col-md-12 mt-3" >
            
                <div class="card">
                    <div class="card-header bg-info">
                        <h6 class="text-white"><strong>Employee Profile</strong></h6>
                      
                    </div>
                  
                    <div class="card-body">
                      
    <table class="table table-striped table-bordered" id="emptable">
        <thead>
            <tr>
                <th>S.No</th>
                <th> Name</th>
                <th>Email</th>
                <th>Date Of Birth</th>
                <th>Department</th>
                <th>Phone</th>
                <th>Designation</th>
                <th>Action</th> 
                
            </tr>
        </thead>
        <tbody>
            <tr>
                <th>S.No</th>
                <th> Name</th>
                <th>Email</th>
                <th>Date Of Birth</th>
                <th>Department</th>
                <th>Phone</th>
                <th>Designation</th>
                <th>Action</th> 
                
            </tr>
              
        </tbody>
    </table>
    </div>
    </div>
    </div>
    </div>
    </div>
</div>



<script>
$(document).ready(function() {
        var name = document.getElementById('first_name').value;
       
        var email = document.getElementById('email').value;
   
        var phone = document.getElementById('phone').value;
    $('#emptable').DataTable({
        'responsive': true,
        "bFilter" : false,
        "processing": true,
        "serverSide": true,
        "ajax":{
                    "url": '<?php echo URL::asset('displayemployee_datatable');?>?&name=' + name + '&email=' + email + '&phone=' + phone + '&status=',
                    "dataType": "json",
                    "type": "POST",
                    "data":{ _token: "{{csrf_token()}}"}
                },
                "dom": 'lBfrtip',
                "lengthMenu": [[10, 25, 50,100,1000,10000 ], [10, 25, 50,100,1000,10000]],
        "buttons": [
            {
                extend: 'collection',
                text: 'Export',
                buttons: [
                    'copy',
                    'excel',
                    'csv',
                    'pdf',
                    'print'
                ]
            }
                ],
                "columns": [
                   
                    { "data": "sno" },
                    { "data": "first_name" },
                 
                    { "data": "email" },
                    { "data": "dob" },
                    { "data": "department" },
                    { "data": "phone" },
                    { "data": "position" },
                    { "data": "action" },
                ]
    })
})


</script>


<script type="text/javascript">

    function deleteConfirmation(url) {
     
        const swalWithBootstrapButtons = Swal.mixin({

            customClass: {

            confirmButton: 'btn btn-sm btn-success ml-2',

            cancelButton: 'btn btn-sm btn-danger'

            },

            buttonsStyling: false

            })
            swalWithBootstrapButtons.fire({

            title: 'Are you sure',

            text: "You won't be able to revert this!",

            icon: 'success',

            showCancelButton: true,

            confirmButtonText: 'Yes',

            cancelButtonText: 'No',

            reverseButtons: true

        }).then((result) => {

        if (result.isConfirmed) {




        window.location.href = url;

        } else if (

        /* Read more about handling dismissals below */

        result.dismiss === Swal.DismissReason.cancel

        ) {

        return false;

        }

        })
        }
</script>


@endsection

