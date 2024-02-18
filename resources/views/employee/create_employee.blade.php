@extends('_layouts.default')



@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        
        <h1 >Add Employee </h1>

    <form class="form-horizontal multipart/form-data" method="post" action="{{asset('insert_employee')}}" autocomplete="off">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-sm-5">
                <div class="form-group">
                   <label for="inputEmail3" class="control-label">First Name</label>
                   <input type="text" class="form-control" id="first_name" placeholder="Name" value="{{old('first_name')}}" autocomplete="off"
                   name="first_name"   >
                    @error('first_name')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
           </div>
           
           <div class="col-sm-5">
            <div class="form-group">
            <label for="inputEmail3" class="control-label">Last Name</label>
                <input type="text" class="form-control" id="last_name" placeholder="Last Name" value="{{old('last_name')}}" autocomplete="off"
                name="last_name"  >
                @error('last_name')
                <span class="text-danger">{{ $message }}</span>
                @enderror
           </div>
           </div>

            <div class="col-sm-5">
               <div class="form-group">
                   <label for="inputEmail3" class="control-label">Email</label>
                   <input type="email" class="form-control" id="email" placeholder="Email" value="{{old('email')}}" name="email"  autocomplete="nope"/>
                   @error('email')
                   <span class="text-danger">{{ $message }}</span>
                   @enderror
               </div>
            </div>
            <div class="col-sm-5">
                <div class="form-group">
                    <label for="inputEmail3" class="control-label">Password</label>
                    <input type="password" class="form-control" id="password" placeholder="Password" value="{{old('password')}}" name="password" autocomplete="new-password"/>
                    @error('password')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
             {{-- @dd($department); --}}
            <div class="col-sm-5">
                <div class="form-group">
                    <label for="inputEmail3" class="control-label">Department Name</label>
                     <select class="form-control" name="department">
                     <option value="" disabled selected>Department name</option>
                     
                     @foreach($department as $c_data)
                     
{{--                      
                     <option value=""{{ old('name') == $c_data ? 'selected' : '' }}>{{$c_data}}</option> --}}
                     <option value={{$c_data->id}}>{{$c_data->name}}</option>
                     @endforeach
                     </select>
                    @error('department')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
             </div>

            <div class="col-sm-5">
                <div class="form-group">
                     <label for="inputEmail3" class="col-sm-2 control-label">Phone</label> 
                     <input type="text" class="form-control phone" id="phone" placeholder="Phone" value="{{old('phone')}}" autocomplete="new-phone"
                     name="phone"  maxlength="10"/>
                     @error('phone')
                     <span class="text-danger">{{ $message }}</span>
                     @enderror
               </div>
            </div>
            <div class="col-sm-5">
               <div class="form-group">
                     <label for="inputEmail3" class="control-label">Date Of Birth</label>
                     <input type="date" class="date form-control" id="dob"
                      placeholder="Dob" value="{{old('dob')}}" autocomplete="off"
                       name="dob"/>
                      @error('dob')
                      <span class="text-danger">{{ $message }}</span>
                      @enderror
                 </div>
             
           </div>
          </div>  
            <div class="col-sm-10">
            <label for="inputEmail3" class="control-label">Address</label>
         
            <textarea  class="form-control" id="address" placeholder="Address"  autocomplete="off"
            name="address"rows="4" cols="50">{{old('address')}}</textarea>
            @error('address')
            <span class="text-danger">{{ $message }}</span>
            @enderror
            </div>
        </div>


        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Your Designation</label>
            <div class="form-group col-10">
                <select class="form-control select2" name="position"   style="width: 100%;">
                   
               <option value="" disabled selected >Chosse Your Post </option>
                    @foreach($role as $post)
                     <option   value="{{$post->name}}" pl>{{$post->name}}</option>
                     @endforeach
                </select>
                 @error('position')
                     <span class="text-danger">{{ $message }}</span>
                 @enderror

            </div>
          </div>


        <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
        </div>
    </form>




      </div>
    </section>
    </div>

  <script>
    $("#first_name").keypress(function(event){
   var inputValue = event.charCode;
   if(!(inputValue >= 65 && inputValue <= 120) && (inputValue != 32 && inputValue != 0)){
       event.preventDefault();
   }
});
$("#last_name").keypress(function(event){
   var inputValue = event.charCode;
   if(!(inputValue >= 65 && inputValue <= 120) && (inputValue != 32 && inputValue != 0)){
       event.preventDefault();
   }
});
document.querySelector(".phone").addEventListener("keypress", function (evt) {
    if (evt.which != 8 && evt.which != 0 && evt.which < 48 || evt.which > 57)
    {
        evt.preventDefault();
    }
});
</script>

{{-- <script type="text/javascript">  
    
     $( ".date" ).datepicker({ dateFormat: 'yy-mm-dd' }); 
</script>   --}}

  
  @endsection
  
