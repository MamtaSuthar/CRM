@extends('_layouts.default')

@section('content')
<div class="content-wrapper py-2">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <div class="card-header">
                    <h3 class="card-title">Change Password</h3>
                </div>

                <form action="{{route('changepassword')}}" method="post">
                    @csrf

                    <div class="card-body row">
                        <div class="form-group col-8">
                            <label for="cat_name">Old Password</label>
                            <input type="test" name="password" class="form-control" id="oldpassword" placeholder="Enter Old Password" value="{{old('password')}}">
                            @error('password')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                            <span class="text-danger">{{session()->get('fail')}}</span>
                        </div>

                        <div class="form-group col-8">
                            <label for="cat_name">New Password</label>
                            <input type="test" name="newpassword" class="form-control" id="newpassword" placeholder="Enter New Password" value="{{old('newpassword')}}">
                            @error('newpassword')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="form-group col-8">
                            <label for="cat_name">Confirm Password</label>
                            <input type="test" name="newpassword_confirmation" class="form-control" id="newpassword_confirmation" placeholder="Enter Confirm Password" value="{{old('newpassword_confirmation')}}">
                            @error('newpassword_confirmation')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <!-- /.card-body -->
  
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                    
                </form>
            </div> 
        </div>
    </div>
</div>
@endsection

