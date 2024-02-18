@extends('_layouts.default')

@section('content')

<div class="content-wrapper py-2">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                
                <div class="sbp-preview position-relative">
                    <div class="form-group">
                        <div class="row mx-0 align-items-end">
                          
                            <div class="col-md">
                                <div class="form-group my-3">
                                  <label>Name</label>
                                  <input type="text" name="first_name" id="first_name" value="">
                                </div>
                            </div>

                            <div class="col-md">
                                <div class="form-group my-3">
                                <label>Email</label>
                                  <input type="text" name="email" id="email" value="">
                                </div>
                            </div>

                            <div class="col-md">
                                <div class="form-group my-3">
                                <label>phone</label>
                                  <input type="text" name="phone" id="phone" value="">
                                </div>
                            </div>
                            
                            <div class="col-md-auto text-right mb-md-3">
                                <button class="btn btn-sm btn-success text-uppercase"><i class="far fa-check-circle"></i>&nbsp;Submit</button>
                                <a href="{{url('/create_project')}}" class="btn btn-sm btn-danger text-uppercase"  >Create </a>
                            </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div> 
        </div>
        <div class="row">
           
            <div class="col-md-12 mt-3" >
            
                <div class="card">
                    <div class="card-header bg-info">
                        <h6 class="text-white"><strong>Project Assign</strong></h6>
                      
                    </div>
                  
                    <div class="card-body">
                      
    <table class="table table-striped table-bordered" id="emptable">
        <thead>
            <tr>
                <th>S.No</th>
                <th>Project Name</th>
                <th>Project S.No</th>
                <th>Project Client Name</th>
                <th>Date</th>
                <th>Status</th>
                <th>Action</th>
                 
            </tr>
        </thead>
        <tbody>
            <tr>
                <th>S.No</th>
                <th>Project Name</th>
                <th>Project ID</th>
                <th>Project Client Name</th>
                <th>Date</th>
                <th>Status</th>
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

  @endsection
  
