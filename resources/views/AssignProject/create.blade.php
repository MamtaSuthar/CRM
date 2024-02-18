@extends('_layouts.default')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  
    <!-- Main content -->
    <section class="content">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">

      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        
        <h1 >Assign Project </h1>

    <form class="form-horizontal multipart/form-data" method="post" action="{{route('assignproject.store')}}">
        @csrf
       
        <div class="row">
            <div class="col-sm-5">
                <div class="form-group">
                   <label for="inputEmail3" class="control-label">Client Name</label>
                   <select class="form-control select2" name="client_name" style="width: 100%;"  onchange="myFunction(this)">
                    <option value="" disabled selected>Chosse Your Client </option>
                    @forelse($client as $pro){
                        <option value="{{$pro->id}}">{{$pro->name}}</option>
                      @empty
                      <tr class="text-center">
                          <td colspan="10">No Data Available now</td>
                      </tr>
                     @endforelse
                     </select>
                    @error('client_name')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
           </div>
           
           <div class="col-sm-5">
            <div class="form-group">
              <label for="inputEmail3" class="control-label">Project Name</label>
              <select class="form-control" id ="project"  name ="project_name" style="width: 100%;">
                <option disabled selected > Choose Project</option>
                </select>
               @error('project_name')
               <span class="text-danger">{{ $message }}</span>
               @enderror
           </div>
           </div>

           <div class="col-sm-5">
            <div class="form-group">
              <label for="inputEmail3" class="control-label">Department Name</label>
              <select class="form-control" id ="project"  name = "Department_name" style="width: 100%;" onchange="myDepartment(this)">
                <option value=""disabled selected >Chosse Department </option>
                @forelse($department as $pro){
                    <option value="{{$pro->id}}">{{$pro->name}}</option>
                  @empty
                  <tr class="text-center">
                      <td colspan="10">No Data Available now</td>
                  </tr>
                 @endforelse
           
                </select>
               @error('Department_name')
               <span class="text-danger">{{ $message }}</span>
               @enderror
           </div>
           </div>
           <div class="col-sm-5">
            <div class="form-group">
              <label for="inputEmail3" class="control-label">Project Leader</label>
              <select class="form-control" id ="leader"  name = "project_leader" style="width: 100%;">
                {{-- <option > Choose Project Leader</option>
                <option > Shakti</option>
                <option >Nitesh</option>
                <option >Mamta</option> --}}
                </select>
               @error('project_leader')
               <span class="text-danger">{{ $message }}</span>
               @enderror
           </div>
           </div>
 
           <div class="col-sm-5 mt-3">
            <div class="form-group">
              <label for="inputEmail3" class="control-label">Employee::</label>
              <select class="selectpicker"   id="emp" multiple name="employee[]" style="column-fill:red">
              {{-- <option ></option> --}}

                
            </select>
               @error('employee')
               <span class="text-danger">{{ $message }}</span>
               @enderror
           </div>
           </div>
            <div class="col-sm-5">
               <div class="form-group">
                     <label for="inputEmail3" class="control-label">Start Project Date  </label>
                     <input type="date" class="form-control" id="inputEmail3" placeholder="Start Project Date" value="{{old('dob')}}"
                       name="start_date"   value=""/>
                      @error('start_date')
                      <span class="text-danger">{{ $message }}</span>
                      @enderror
                 </div>
           </div>
          </div>  
             <div class="col-sm-5">
               <div class="form-group">
                     <label for="inputEmail3" class="control-label">DeadLine</label>
                     <input type="date" class="form-control" id="inputEmail3" placeholder="Start Project Date" value="{{old('dob')}}"
                       name="deadline"   value=""/>
                      @error('deadline')
                      <span class="text-danger">{{ $message }}</span>
                      @enderror
                 </div>
           </div>

           <div class="col-sm-10">
            <label for="inputEmail3" class="control-label">Description</label>
         
            <textarea  class="form-control" id="inputEmail3" placeholder="description" 
            name="description"   rows="4" cols="50">{{old('address')}}</textarea>
            @error('description')
            <span class="text-danger">{{ $message }}</span>
            @enderror
            </div>
        </div>

        <div class="form-group mt-3">
        <div class="col-sm-offset-2 col-sm-10">
          <button type="submit" class="btn btn-primary">Submit</button> 
        </div>
        </div>
    </form>
      </div>
    </section>
    </div>

<script>

function myFunction(element) {
        var value = element.value;
       $.ajax({
         type:"get",
         url:"{{route('assignproject.create')}}",
         data:{
          post:value,
         },
         success: function(response)
            { 
                $output=""; 
          
                response.forEach(element => {   
                  $output +='<option>'+"choose your project"+'</option>';
                  element.forEach(result => {
                  $output += '<option value="'+result.id+'">'+result.project_name+'</option>';
                  });
                  document.getElementById("project").innerHTML=  $output;
            
                 });
            }
       });
}

function myDepartment(element) {
        var value = element.value;
        
       $.ajax({
         type:"get",
         url:"{{route('assignproject.create')}}",
         data:{
          department:value,
         },
         success: function(response)
            {
                $output=""; 
                response[0].forEach(element=> {
                  $output +='<option>'+"choose your leader"+'</option>';
                  $output += '<option value="'+element.id+'">'+element.first_name+'</option>';
                  document.getElementById("leader").innerHTML=  $output;
                });

                $output=""; 
                response[1].forEach(element=> {
                  $output += '<option value="'+element.id+'">'+element.first_name+'</option>';

                  document.getElementById("emp").innerHTML=  $output;
                  $('.selectpicker').selectpicker('refresh');
                });
            }
            
       });
}


</script>
<script>

  $(function () {
  $('.selectpicker').selectpicker('refresh');
 

  
      
  }); 
    </script>
  @endsection
  
