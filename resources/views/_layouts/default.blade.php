<!DOCTYPE html>
 @include('_includes.head')


    <div class="wrapper">
    
      @include('_includes.navbar')
      @include('_includes.sidebar')

      @yield('content')
      
    </div>
  @include('_includes.foot')    
  <script>
    //   @if(!empty($errors))
    //     @if($errors->any())
    //       @foreach ($errors->all() as $error)
    //       toastr.error('{{$error}}');
    //       @endforeach
    //     @endif
    //   @endif
    // @if(Session::has('message'))
    // toastr.options =
    // {
    //   "closeButton" : true,
    //   "progressBar" : true
    // }
    //     toastr.success("{{ session('message') }}");
    // @endif
  @if(!empty($errors))
    @if($errors->any())
      @foreach ($errors->all() as $error)
      toastr.error('{{$error}}');
      @endforeach
    @endif
  @endif
@if(Session::has('message'))
toastr.options =
{
  "closeButton" : true,
  "progressBar" : true
}
    toastr.success("{{ session('message') }}");
@endif

@if(Session::has('error'))
toastr.options =
{
  "closeButton" : true,
  "progressBar" : true
}
    toastr.error("{{ session('error') }}");
@endif

@if(Session::has('info'))
toastr.options =
{
  "closeButton" : true,
  "progressBar" : true
}
    toastr.info("{{ session('info') }}");
@endif

@if(Session::has('warning'))
toastr.options =
{
  "closeButton" : true,
  "progressBar" : true
}
    toastr.warning("{{ session('warning') }}");
@endif

  </script>
  
</html>
