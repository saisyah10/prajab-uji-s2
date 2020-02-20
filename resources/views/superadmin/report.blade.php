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
              <!-- <h6 class="m-0 font-weight-bold text-primary">Laporan Nilai Akhir Siswa</h6> -->
              <a href="/user/PrintReport" class="btn btn-sm btn-primary" id="btnprn" target="_BLANK" style="right:10px;">Print</a>
              <!-- <button name="printreport" class="btn btn-sm btn-primary" id="printreport" >Print</button> -->
              
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
                        <td>{{$datas->status}}</td>
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