<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{asset('/home')}}" class="brand-link">
      <img src="{{asset('assets/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">CRM</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <li class="nav-item  {{ (request()->is('home')) ? 'active' : '' }}"> 
                <a href="{{asset('/home')}}" class="nav-link   {{ (request()->is('home')) ? 'active' : '' }}">
                  <i class="nav-icon fas fa-th"></i>
                  <p> Dashboard </p>
                  <i class="fas fa-angle-left right"></i>
                </a>
               </li>
              
               <li class="nav-item">
                <a href="#" class="nav-link">
                      <i class="fa fa-user" aria-hidden="true"></i>
                        <p>
                          Employee Manager 
                          <i class="fas fa-angle-left right"></i>
                        </p>
                      </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{asset('create_employe')}}"
                            class="nav-link ">
                                <i class="fas fa-user-circle"></i>
                                <p>Add Employee</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{asset('employwee')}}"class="nav-link">
                              <i class="fas fa-users"></i>
                                <p>View Employee</p>
                            </a>
                        </li>
                      </ul>
                    </li>
                
          <li class="nav-item {{ (request()->is('assignproject')) ? 'active' : '' }}">
            <a href="{{route('assignproject.create')}}" class="nav-link {{ (request()->is('assignproject.create')) ? 'active' : '' }}">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Assign Project
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="fa fa-save"></i>  
              <p>Project
              <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('addproject.create')}}" class="nav-link">
                  <i class="fa fa-folder-plus"></i>
                    <p>Add Project</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{asset('project')}}"  class="nav-link ">
                  <i class="fa fa-table"></i>
                  <p>Show Project</p>
                </a>
              </li>
            </ul>
        </li>
           
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="far fa-user nav-icon"></i>
            <p>Clients</p>
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{route('client.create')}}" class="nav-link">
                <i class="nav-icon fas fa-user-plus"></i>
                <p>Add Client</p>
            </a>
            </li>
            <li class="nav-item">
              <a href="{{route('client.index')}}" class="nav-link">
                <i class="nav-icon fas fa-users"></i>
                <p>Show Client</p>
            </a>
            </li>
          </ul>
      </li>

        <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-table">
              </i>
              <p>Project Type
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('projecttype.create')}}" class="nav-link">
                  <i class="nav-icon far fa-plus-square"></i>
                    <p>Add Project</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('projecttype.index')}}" class="nav-link">
                  <i class="nav-icon fas fa-copy"></i>
                  <p>Show Project</p>
                </a>
              </li>
            </ul>
        </li>

        <li class="nav-item">
          <a href="{{asset('/chatify')}}" class="nav-link">
            <i class="nav-icon fas fa-table">
        
            </i>
            <p>Lets Chat
              {{-- <i class="fas fa-angle-left right"></i> --}}
            </p>
          </a>
      </li>

     <li class="nav-item {{ (request()->is('notification')) ? 'active' : '' }}">
       <a href="{{asset('notification')}}" class="nav-link {{ (request()->is('notification')) ? 'active' : '' }}">
         <i class="nav-icon fas fa-bell"></i>
              <p>   
                Notification
              </p>
            </a>
          </li>

          <li class="nav-item {{ (request()->is('postmanager')) ? 'active' : '' }}">
            <a href="{{asset('postmanager')}}" class="nav-link  {{ (request()->is('postmanager')) ? 'active' : '' }}">
            <i class="nav-icon fas fa-paper-plane"></i>
              <p>
                Post Manager
              </p>
            </a>
          </li>

          
          <li class="nav-item {{ (request()->is('project')) ? 'active' : '' }}">
            <a href="{{asset('project')}}" class="nav-link  {{request()->is('project')?'active':''}}">
              <i class="nav-icon fas fa-book"></i>
              <p>
                project Manager
              </p>
            </a>
          </li>

          <li class="nav-item {{ (request()->is('add_department')) ? 'active' : '' }}">
            <a href="{{asset('department')}}" class="nav-link  {{request()->is('department')?'active':''}}">
              <i class=" fa fa-cube"></i>
              <p>
               Add Department
              </p>
            </a>
          </li>
          
          <li class="nav-item {{ (request()->is('add_department')) ? 'active' : '' }}">
            <a href="{{asset('tasks')}}" class="nav-link  {{request()->is('tasks')?'active':''}}">
              <i class="fa fa-calendar-day"></i>
              <p>
               Celender Events
              </p>
            </a>
          </li>
          

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
   </aside>
   <!-- Control Sidebar -->
   <aside class="control-sidebar control-sidebar-dark">
  </aside>
</div>


 




       
        




        
   


 