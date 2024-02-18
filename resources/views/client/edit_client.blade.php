@extends('_layouts.default')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        
        <h1 >Edit Client </h1>

        <form class="form-horizontal multipart/form-data" method="post" action="{{route('client.update',$client->id)}}">
        @csrf
        @method('PUT')

        <div class="row">

            <div class="col-sm-5">
                <div class="form-group">
                   <label for="inputEmail3" class="control-label">Name</label>
                   <input type="hidden" name="id" value="{{$client->id}}">
                   <input type="text" class="form-control" id="name" placeholder="name"
                   name="name"   value="{{$client->name}}"/>
                    @error('name')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
           </div>
           
            <div class="col-sm-5">
               <div class="form-group">
                   <label for="inputEmail3" class="control-label">Email</label>
                   <input type="email" class="form-control" id="inputEmail3" placeholder="Email"
                   name="email"   value="{{$client->email}}"/>
                   @error('email')
                   <span class="text-danger">{{ $message }}</span>
                   @enderror
               </div>
            </div>
 
            <div class="col-sm-5">
                <div class="form-group">
                     <label for="inputEmail3" class="col-sm-2 control-label">Company</label>
                     <input type="text" class="form-control" id="company" placeholder="Company"
                     name="company"   value="{{$client->company}}"/>
                     @error('company')
                     <span class="text-danger">{{ $message }}</span>
                     @enderror
               </div>
            </div>

          <div class="col-sm-10">
            <label for="inputEmail3" class="control-label">Description</label>
            <textarea  class="form-control" id="inputEmail3" placeholder="description"
            name="description"   rows="4" cols="50">{{$client->description}}</textarea>
            @error('description')
            <span class="text-danger">{{ $message }}</span>
            @enderror
            </div>
          </div>

        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10 mt-3 ml-3">
              <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </div>

    </form>

   </div>
    </section>
    </div>
  
    <script>
      $("#name").keypress(function(event){
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
  document.querySelector("#phone").addEventListener("keypress", function (evt) {
      if (evt.which != 8 && evt.which != 0 && evt.which < 48 || evt.which > 57)
      {
          evt.preventDefault();
      }
  });
  
    </script>
    
  @endsection