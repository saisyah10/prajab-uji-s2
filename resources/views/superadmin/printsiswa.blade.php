<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Print Preview | Prajab Uji S2</title>
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
  <script>
		window.print();
	</script>
</head>

<body id="page-top">
     <!-- Page Wrapper -->
  <div id="wrapper">

    <div id="content-wrapper" class="d-flex flex-column">
    
        <!-- Main Content -->
        <div id="content">

            <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Nilai Akhir Mentee</h1>
                    @if(Session::has('alert-success'))
                            <div class="alert alert-success">
                                <strong>{{ \Illuminate\Support\Facades\Session::get('alert-success') }}</strong>
                            </div>
                        @endif
                        <hr>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary"> Laporan Nilai Akhir Mentee </h6>
                         <h6 class="m-0 font-weight-bold text-primary"> Uji Bisnis Improvment Prajabatan Tingkat S2 PLN Group</h6>
                        <!-- <a href="#" class="btn btn-sm btn-primary" id="btnprint" style="right:10px;">Print</a> -->
                        </div>
                        <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                <th>No</th>
                                <th>No Test</th>
                                <th>Nama Siswa</th>
                                <th>Nilai</th>
                                <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                            @php $no = 1; @endphp
                            @foreach($siswaprint as $datas)
                                <tr>
                                <td>{{ $no++ }}</td>
                                    <td>{{$datas->notest}}</td>
                                    <td>{{$datas->nama}}</td>
                                    <td>{{$datas->nilai}}</td>
                                    <td>{{$datas->status}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                            </table>
                        </div>
                        </div>
                    </div>

                </div>

            </div>

            <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; PKK PRAJAB 2020</span>
          </div>
        </div>
      </footer>
    </div>
</div>
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