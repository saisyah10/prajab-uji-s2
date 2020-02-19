<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>@yield('title') | Prajab Uji S2</title>
  <link rel="shortcut icon" href="{{ asset('assets/img/plnicon.png') }}">
  

  <!-- Custom fonts for this template-->
  <link href="{{ asset('assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="{{ asset('assets/css/sb-admin-2.min.css') }}" rel="stylesheet">

  <script type="text/javascript" src="{{asset('assets/js/bootstrap.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('assets/js/jquery-2.2.4.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('assets/js/jquery.printPage.js')}}"></script>
  <!-- <link href="{{ asset('assets/js/PrintArea.css')}}" rel="stylesheet"> -->
  <script type="text/javascript" src="{{asset('assets/js/jquery.printPage.js')}}"></script>
</head>

<body id="page-top" style="background-color:lightblue;">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->

    @if(Session::get('login')=='TRUE')
    
      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Divider -->
      <hr class="sidebar-divider">
    

      <!-- Divider ini buat garis di sidebar-->
      <!-- <hr class="sidebar-divider"> -->

      <!-- Heading ini sebenernya buat nambahin judul menu di sidebar -->
      <!-- <div class="sidebar-heading">
        Addons
      </div>  -->

    </ul>
    <!-- End of Sidebar -->

    @else

@endif
    <!-- Content Wrapper -->
    
  <div id="content-wrapper" class="d-flex flex-column">
   
      <!-- Main Content -->
      <div id="content">

      @if(Session::get('login')=='TRUE')
        <!-- Topbar -->
        <!-- <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow"> -->

          <!-- Sidebar Toggle (Topbar) -->
          
          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">
          </li>

        <!-- </nav> -->

      @endif  
        <!-- End of Topbar -->

    @yield('content')

    </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>
  <!-- Bootstrap core JavaScript-->
  <script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{ asset('assets/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{ asset('assets/js/sb-admin-2.min.js') }}"></script>

  <!-- Page level plugins -->
  <script src="{{ asset('assets/vendor/chart.js/Chart.min.js') }}"></script>

  <!-- Page level custom scripts -->
  <script src="{{ asset('assets/js/demo/chart-area-demo.js') }}"></script>
  <script src="{{ asset('assets/js/demo/chart-pie-demo.js') }}"></script>

   <!-- Page level plugins -->
   <script src="{{ asset('assets/vendor/datatables/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

  <!-- Page level custom scripts -->
  <script src="{{ asset('assets/js/demo/datatables-demo.js') }}"></script>

</body>

</html>
