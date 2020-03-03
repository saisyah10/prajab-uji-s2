@extends('baseadmin')
@section('title','Report Akhir')
@section('content')

<div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Laporan Nilai Akhir Siswa Uji Bisnis Improvment Prajabatan Tingkat S2 PLN Group</h1>
          @if(Session::has('alert-success'))
                <div class="alert alert-success">
                    <strong>{{ \Illuminate\Support\Facades\Session::get('alert-success') }}</strong>
                </div>
            @endif
            <hr>
            <script>
                (function($) {
                    // fungsi dijalankan setelah seluruh dokumen ditampilkan
                    $(document).ready(function(e) {
                        
                        // aksi ketika tombol cetak ditekan
                        $("#printreport").bind("click", function(event) {
                            // cetak data pada area <div id="#data-mahasiswa"></div>
                            $('#bagianprint').printArea();
                        });
                    });
                }) (jQuery);
            </script>
          <!-- DataTales Example -->
          <div id="bagianprint" class="card shadow mb-4">
            <div class="card-header py-3">
            <div class="row">
            <!-- <div class="col-md-6">
              <a href="/user/exportdetail_excel" class="btn btn-sm btn-success my-3" target="_blank" style="margin-right:50px;">EXPORT EXCEL</a>
              </div> -->
              <div class="col-md-12" align="right">
              <a href="/user/PrintReport" class="btn btn-sm btn-primary my-3" id="btnprn" target="_BLANK" style="right:10px;">PRINT LAPORAN</a>
              </div>
              </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                    <th>No</th>
                    <th>No Test</th>
                    <th>Nama Siswa</th>
                    <th>Nilai</th>
                    <th>Status</th>
                    <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                @php $no = 1; @endphp
                @foreach($datasiswa as $datas)
                    <tr>
                    <td>{{ $no++ }}</td>
                        <td>{{$datas->notest}}</td>
                        <td>{{$datas->nama}}</td>
                        <td>{{number_format($datas->nilai,3)}}</td>
                      @if($datas->status == null)
                      <td>TIDAK LULUS</td>  
                      @else
                      <td>{{$datas->status}}</td>
                      @endif
                        <td class="action"><a href="/superadmin/detailreport/{{$datas->id}}" class=" btn btn-sm btn-primary">Detail</a></td>
                    </tr>
                @endforeach
                </tbody>
                </table>
              </div>
            </div>
          </div>

    </div>
@endsection