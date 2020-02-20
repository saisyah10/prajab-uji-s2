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
  <style type="text/css" media="print">
  @page { size: landscape; }
</style>

</head>

<body id="page-top">
     <!-- Page Wrapper -->
  <div id="wrapper">

    <div id="content-wrapper" class="d-flex flex-column">
    
        <!-- Main Content -->
        <div id="content">

            <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Detail Nilai Mentee</h1>
                    @if(Session::has('alert-success'))
                            <div class="alert alert-success">
                                <strong>{{ \Illuminate\Support\Facades\Session::get('alert-success') }}</strong>
                            </div>
                        @endif
                        <hr>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Laporan Detail Nilai Akhir Mentee</h6>
                        <h6 class="m-0 font-weight-bold text-primary">Uji Bisnis Improvment Prajabatan Tingkat S2 PLN Group</h6>
                        <!-- <a href="#" class="btn btn-sm btn-primary" id="btnprint" style="right:10px;">Print</a> -->
                        </div>
                        <div class="card-body">
                        <div class="table-responsive">
                <table class="table table-bordered"  width="20%" cellspacing="0">
                  <thead>
                    <tr>
                    <th>No</th>
                    <th>Nama Siswa</th>
                    <th>Nama Penguji</th>
                    <th>Kelas Penguji</th>
                    <th>Nilai Sub Kategori 1 Bobot 2,5%</th>
                    <th>Nilai Sub Kategori 2 Bobot 2,5%</th>
                    <th>Nilai Sub Kategori 3 Bobot 10%</th>
                    <th>Nilai Sub Kategori 4 Bobot 10%</th>
                    <th>Nilai Sub Kategori 5 Bobot 10%</th>
                    <th>Nilai Sub Kategori 6 Bobot 10%%</th>
                    <th>Nilai Sub Kategori 7 Bobot 5%</th>
                    <th>Nilai Sub Kategori 8 Bobot 10%</th>
                    <th>Nilai Sub Kategori 9 Bobot 10%</th>
                    <th>Nilai Sub Kategori 10 Bobot 5%</th>
                    <th>Nilai Sub Kategori 11 Bobot 10%</th>
                    <th>Nilai Sub Kategori 12 Bobot 15%</th>
                    <th>Total Nilai</th>
                    </tr>
                  </thead>
                  <tbody>
                  @php $no = 1; $semuanilai=0; $id=0; @endphp
                @foreach($dataq as $datas)
                    <tr>
                        <td>{{$no++ }}</td>
                        <td>{{$datas->s_nama}}</td>
                        <td>{{$datas->p_nama}}</td>
                        <td>{{$datas->kelas_penguji}}</td>
                        <td>{{$datas->total_subkat_1}} </td>
                        <td>{{$datas->total_subkat_2}} </td>
                        <td>{{$datas->total_subkat_3}} </td>
                        <td>{{$datas->total_subkat_4}} </td>
                        <td>{{$datas->total_subkat_5}} </td>
                        <td>{{$datas->total_subkat_6}} </td>
                        <td>{{$datas->total_subkat_7}} </td>
                        <td>{{$datas->total_subkat_8}} </td>
                        <td>{{$datas->total_subkat_9}} </td>
                        <td>{{$datas->total_subkat_10}} </td>
                        <td>{{$datas->total_subkat_11}} </td>
                        <td>{{$datas->total_subkat_12}} </td>
                        <td>{{$datas->total_nilai_subkat}}</td>
                    </tr>
                      @php $semuanilai += $datas->total_nilai_subkat/3;
                         
                       @endphp
                    @endforeach    
                    <tr>
                      <th colspan="2">
                      Total Nilai
                      </th>
                      <td colspan="14">
                      @php 
                          echo($semuanilai);
                       @endphp
                       </td>
                    </tr>                    
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