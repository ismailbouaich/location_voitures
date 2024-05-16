<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="_token" content="{{csrf_token()}}">
    <meta name="author" content="">

    <title>Admin Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="{{asset('assets/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
            <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
           
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
   
     

    <!-- Custom styles for this template-->
    <link href="{{asset('assets/css/sb-admin-2.min.css')}}" rel="stylesheet"> 
    <link href="{{asset('assets/css/dataTables.bootstrap5.min.css')}}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.9.1/font/bootstrap-icons.min.css" rel="stylesheet">
   
   
    <script src="{{asset('assets/js/jquery-3.5.1.js')}}"></script>
  
   <script src="{{asset('assets/js/sb-admin-2.js')}}"></script>
   <script src="{{asset('assets/js/sb-admin-2.min.js')}}"></script>
    <script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/js/dataTables.bootstrap5.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
   
    
   
   

    <!-- Core plugin JavaScript-->
    <script src="{{asset('assets/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{asset('assets/js/sb-admin-2.min.js')}}"></script>
    
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">


        <!-- Sidebar -->
     
        <ul class="navbar-nav  sidebar sidebar-dark accordion" id="accordionSidebar" style="background-color: #6c0524">
            

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{url('admin/home_admin')}}">
               <img src="http://127.0.0.1:8000/logo.png" width="70px" alt="" srcset="">
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="{{url('admin/home_admin')}}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <i class="fa-solid fa-gauge-high"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            
          

            
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-table"></i>
                    <span>tables</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        
                        <a class="collapse-item" href="{{url('admin/table_client')}}">Client</a>
                        <a class="collapse-item" href="{{url('admin/table_voiture')}}">Voitures</a>
                        <a class="collapse-item" href="{{url('admin/table_user')}}">Users</a>
                        <a class="collapse-item" href="{{url('admin/table_demand')}}">Demmands</a>
                        <a class="collapse-item" href="{{url('admin/table_categorie')}}">categories</a>
                        <a class="collapse-item" href="{{url('admin/table_location')}}">location</a>
                        
                        <div class="collapse-divider"></div>
                     
                    </div>
                </div>
            </li>

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseArchieve"
                aria-expanded="true" aria-controls="collapseArchieve">
                   <i class="bi bi-archive"></i>
                   <span>Archieve</span></a>
                    <div id="collapseArchieve"class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            
                            <a class="collapse-item" href="{{url('admin/client/archieve')}}">Client</a>
                            <a class="collapse-item" href="{{url('admin/voitures/archieve')}}">Voitures</a>
                            <a class="collapse-item" href="{{url('admin/user/archieve')}}">Users</a>
                            <a class="collapse-item" href="{{url('admin/demand/archieve')}}">Demmands</a>
                            <a class="collapse-item" href="{{url('admin/categorie/archieve')}}">categories</a>
                            <a class="collapse-item" href="{{url('admin/location/archieve')}}">locations</a>
                        
                        
                            <div class="collapse-divider"></div>
                         
                        </div>
                    </div>


            </li>

            
           

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            <!-- Sidebar Message -->
           
        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <button id="sidebarToggleTop" class="btn  d-md-none rounded-circle mr-3" style="color: #6c0524">
                        <i class="fa fa-bars"></i>
                    </button>
                   

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                       


                       

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                               <!-- Authentication Links -->
                        @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" v-pre>
                            <i class="bi bi-bell"></i>
                        </a>
                        <div class="dropdown-list dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <h6 class="dropdown-header" style="background-color: #6c0524;border-color:#6c0524;">
                                Message Center
                            </h6>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                               
                                <div class="font-weight-bold">
                                    <div class="text-truncate">{{$admin->message}}</div>
                                    <div class="small text-gray-500">{{$admin->full_nom}}</div>
                                </div>
                            </a>
                        </div>
                   
                      
                            
                     
                   

                    </li>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    
                    @endguest
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                @yield('content')
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->



            <!-- Footer -->
            <footer class="sticky-footer bg-white mt-5">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your SeoCom</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
  

    <!-- Bootstrap core JavaScript-->


    <!-- Page level plugins -->
    
   

</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>

<script>
    $(document).ready(function () {

        $("#sidebarToggle, #sidebarToggleTop").on('click', function(e) {
    $("body").toggleClass("sidebar-toggled");
    $(".sidebar").toggleClass("toggled");
    if ($(".sidebar").hasClass("toggled")) {
      $('.sidebar .collapse').collapse('hide');
    };
  });
        
    });
</script>

</html>