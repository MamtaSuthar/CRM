@extends('_layouts.default')

@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <section class="content">
      <div class="container-fluid">
         <h1 >Send Notification </h1>

      <form class="form-horizontal multipart/form-data" method="post" action="{{route('notification.store')}}">
          @csrf
          @method('post')

          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Name</label>
             <div class="col-sm-10">
                <input type="text" class="form-control" id="name" placeholder="Enter your name"
                name="name"   value="" autocomplete="off"/>
                @error('name')
                <div class="text-danger">{{$message}}</div>
                @enderror
            </div>
          </div>

         <div class="form-group">
           <label for="inputEmail3" class="col-sm-2 control-label">Your post</label>
           <div class="form-group col-10">
               <select class="form-control select2" name="post" style="width: 100%;">
                @foreach($role as $post)
                <option value="{{$post->name}}">{{$post->name}}</option>
                @endforeach
               </select>
                @error('post')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
           </div>
         </div>
         
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Send Notification To</label>
            <div class="form-group col-10">
            <select class="selectpicker" multiple name="notificatioin_send[]">
              @foreach($role as $post)
              <option value="{{$post->name}}">{{$post->name}}</option>
              @endforeach
              </select>
            </div>
            @error('notificatioin_send')
            <span class="text-danger">{{ $message }}</span>
           @enderror
        </div>

        <div class="form-group">
             <label for="inputEmail3" class="col-sm-2 control-label">Notification</label>
                <div class="col-sm-10">
                <textarea id="notification" name="notification" rows="4" cols="120">
                    </textarea>
            </div>
            @error('notification')
            <span class="text-danger">{{ $message }}</span>
           @enderror
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
    $(function () {
    $('.selectpicker').selectpicker(); 
    }); 
</script>
<script>
      $("#name").keypress(function(event){
   var inputValue = event.charCode;
   if(!(inputValue >= 65 && inputValue <= 120) && (inputValue != 32 && inputValue != 0)){
       event.preventDefault();
   }
});

</script>

  @endsection
  