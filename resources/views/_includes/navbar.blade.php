<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{asset('/home')}}" class="nav-link">Home</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

     <!-- Messages Dropdown Menu -->
     <li class="nav-item dropdown ">
     
      <a class="nav-link" data-toggle="dropdown" data-target="#menu" href="#">
                
                  @php $dd=json_decode(auth()->user()); @endphp
                @if(!empty($dd))
                  @if(empty(auth()->user('image')->image))
                    <button class="button" style="border-radius:50%; width:30px; background-color:black; color: white;">
                    {{ucfirst($dd->name[0]) }}</button>
                  @else
                    <img src="{{ asset('public/'.$dd->image) }}" width="30" 
                  class="img-circle elevation-2" alt="User Image" style="border-radius: 50%" >
                  <span class="badge badge-danger navbar-badge"></span>
                  {{ucfirst($dd->name) }}
                  @endif
                @endif
              
      <a class="nav-link" data-toggle="dropdown" data-target="#menu" href="#"> 
                @php $dd=json_decode(auth()->user()); @endphp
                @if(empty(auth()->user('image')->image))
                   <button class="button" style="border-radius:50%; width:30px; background-color:black; color: white;">
                   {{ucfirst($dd->name[0]) }}</button>
                @else
                  <img src="{{ asset('public/'.$dd->image) }}" width="30" 
                 class="img-circle elevation-2" alt="User Image" style="border-radius: 50%" >
                 <span class="badge badge-danger navbar-badge"></span>
                 {{ucfirst($dd->name) }}
                @endif     
      </a>
    
      <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right text-center" id="menu">
   
       <a class="dropdown-item" href="{{asset('edit_profile')}}">Edit Profile</a>
       
       <a class="dropdown-item" href="{{asset('change_profile')}}">Change Password</a>

        <div class="dropdown-divider"></div>
        <form id="logout-form" action="{{ route('logout') }}" method="post" class="d-none">
          @csrf
      </form>
      <a class="dropdown-item" href="{{ route('logout') }}"
      onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
       {{ __('Logout') }}
      </a>
        
      </div>
    </li>

    
      <!-- Navbar Search -->
      <li class="nav-item">
       
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>

        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
    
    </ul>
  </nav>
  <!-- /.navbar -->

  

