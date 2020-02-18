<!DOCTYPE html>
<html lang="en">
<head>
  
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

<title>@yield('title') | Prajab Uji S2</title>
<link rel="shortcut icon" href="{{ asset('assets/img/plnicon.png') }}">

<!-- Bootstrap core CSS-->
@if(Session::get('status') == 'login')
<link href="{{ asset('assets/img/plnicon.png') }}" rel="icon" type="image/png">

<link href="{{ asset('assets/css_frontEnd/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">

<link href="{{ asset('assets/css_frontEnd/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">

<link href="{{ asset('assets/css_frontEnd/fonts/Linearicons-Free-v1.0.0/icon-font.min.css') }}" rel="stylesheet" type="text/css">

<link href="{{ asset('assets/css_frontEnd/vendor/animate/animate.css') }}" rel="stylesheet" >

<link href="{{ asset('assets/css_frontEnd/vendor/css-hamburgers/hamburgers.min.css') }}" rel="stylesheet" type="text/css">

<link href="{{ asset('assets/css_frontEnd/vendor/animsition/css/animsition.min.css') }}" rel="stylesheet" type="text/css">

<link href="{{ asset('assets/css_frontEnd/vendor/select2/select2.min.css') }}" rel="stylesheet">

<link href="{{ asset('assets/css_frontEnd/vendor/daterangepicker/daterangepicker.css') }}" rel="stylesheet" type="text/css">

<link href="{{ asset('assets/css_frontEnd/css/util.css') }}" rel="stylesheet" type="text/css">

<link href="{{ asset('assets/css_frontEnd/css/main.css') }}" rel="stylesheet" type="text/css">

<link href="{{ asset('assets/css_frontEnd/css/style.css') }}" rel="stylesheet" >
@else

@endif

</head>
<body>



<!-- MAIN CONTENT -->
    @yield('content')

   
<!-- Footer -->
    <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <h6 style="color:black;"><span>Copyright &copy; PKK PRAJAB 2020</span></h6>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

<!-- JS  -->

<!--===============================================================================================-->

<script src="{{ asset('assets/css_frontEnd/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
<!--===============================================================================================-->

  <script src="{{ asset('assets/css_frontEnd/vendor/animsition/js/animsition.min.js') }}"></script>
	<!--===============================================================================================-->

	  <script src="{{ asset('assets/css_frontEnd/vendor/bootstrap/js/popper.js') }}"></script>

	  <script src="{{ asset('assets/css_frontEnd/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
	<!--===============================================================================================-->

	  <script src="{{ asset('assets/css_frontEnd/vendor/select2/select2.min.js') }}"></script>
	<!--===============================================================================================-->

	  <script src="{{ asset('assets/css_frontEnd/vendor/daterangepicker/moment.min.js') }}"></script>

	  <script src="{{ asset('assets/css_frontEnd/vendor/daterangepicker/daterangepicker.js') }}"></script>
	<!--===============================================================================================-->

	  <script src="{{ asset('assets/css_frontEnd/vendor/countdowntime/countdowntime.js') }}"></script>
	<!--===============================================================================================-->
	  <script src="{{ asset('assets/css_frontEnd/js/main.js') }}"></script>

  <script src="{{ asset('assets/css_frontEnd/js/index.js') }}"></script>

  <script src="{{ asset('assets/css_frontEnd/js/jquery.js') }}"></script>


  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>

</body>
</html>