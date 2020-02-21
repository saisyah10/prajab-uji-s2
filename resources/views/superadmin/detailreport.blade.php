@extends('baseadmin')
@section('title','Form Penguji')
@section('content')
<script src= "https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"> </script> 

<div class="container-fluid">

          <!-- Page Heading -->
           <h1 class="h3 mb-2 text-gray-800">Laporan Detail Nilai Akhir Siswa Uji Bisnis Improvment Prajabatan Tingkat S2 PLN Group</h1>
          @if(Session::has('alert-success'))
                <div class="alert alert-success">
                    <strong>{{ \Illuminate\Support\Facades\Session::get('alert-success') }}</strong>
                </div>
            @endif
            <hr>
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <div class="row" align="right">
              <!-- <h6 class="m-0 font-weight-bold text-primary">Tabel Nilai Detail Siswa</h6> -->
              @php $data_id = 0;@endphp
              @foreach($datad as $datas)

              @php 
              $data_id = $datas->id_siswa;
              @endphp
              
              @endforeach
              <a href="/user/PrintDetailReport/{{$data_id}}" class="btn btn-sm btn-primary" id="btnprint" target="_BLANK" style="right:10px;">Print</a>
                </div>
            </div>
            @if(Session::has('alert-success'))
                <div class="alert alert-success">
                    <strong>{{ \Illuminate\Support\Facades\Session::get('alert-success') }}</strong>
                </div>
            @endif
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                    <th>No</th>
                    <th>Nama Siswa</th>
                    <th>Nama Penguji</th>
                    <th>Keterangan Penguji</th>
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
                        <td>{{number_format($datas->total_subkat_1,2)}} </td>
                        <td>{{number_format($datas->total_subkat_2,2)}} </td>
                        <td>{{number_format($datas->total_subkat_3,2)}} </td>
                        <td>{{number_format($datas->total_subkat_4,2)}} </td>
                        <td>{{number_format($datas->total_subkat_5,2)}} </td>
                        <td>{{number_format($datas->total_subkat_6,2)}} </td>
                        <td>{{number_format($datas->total_subkat_7,2)}} </td>
                        <td>{{number_format($datas->total_subkat_8,2)}} </td>
                        <td>{{number_format($datas->total_subkat_9,2)}} </td>
                        <td>{{number_format($datas->total_subkat_10,2)}} </td>
                        <td>{{number_format($datas->total_subkat_11,2)}} </td>
                        <td>{{number_format($datas->total_subkat_12,2)}} </td>
                        <td>{{number_format($datas->total_nilai_subkat,2)}}</td>
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
                          echo(number_format($semuanilai,2));
                       @endphp
                       </td>
                    </tr>                    
                </tbody>
                </table>
              </div>
            </div>
          </div>

    </div>
@endsection