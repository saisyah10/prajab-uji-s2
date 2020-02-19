@extends('baselisthasil')
@section('title','Lihat Hasil')
@section('content')

<div class="container-fluid" style="background-color:lightblue;">
<section class="header">
<br>
<br>
</section>
<section class="main-section">
<div class="content">
          <!-- Page Heading -->
           
            @if(Session::has('alert-success'))
                <div class="alert alert-success">
                    <strong>{{ \Illuminate\Support\Facades\Session::get('alert-success') }}</strong>
                </div>
            @endif
            <div class="card shadow mb-4">
            <div class="card-header py-3">
            <center><h5 style="color:#000000;">Laporan Hasil Nilai Akhir Siswa Uji Bisnis Improvment Prajabatan Tingkat S2 PLN Group Oleh {{Session::get('nama_penguji')}}</h5></center>
            </div>
              <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <div class="row" align="right">
              <!-- <h6 class="m-0 font-weight-bold text-primary">Tabel Nilai Detail Siswa</h6> -->
             
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
                    <th>Kelas</th>
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
                    <!-- <th>Total Nilai</th> -->
                    <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  
                  @php $no = 1; $semuanilai=0; $id=0; @endphp
                @foreach($dataq as $datas)
                    <tr>
                        <td>{{$no++ }}</td>
                        <td>{{$datas->s_nama}}</td>
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
                        <!-- <td>{{$datas->total_nilai_subkat}}</td> -->
                        <td><a href="/user/edithasil/{{$datas->id}}" class=" btn btn-sm btn-primary">Edit</a></td>
                    <!-- </tr>
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
                    </tr>                     -->
                
                  </tbody>
                </table>
                <div class="form-group">
                
            </div>
        </div>
              </div>
            </div>
            </div>
            <center>
                    
                    <a href="/user" class="btn btn-md btn-primary">KEMBALI</a>
                    <a href="/user/logout" class="btn btn-md btn-primary">LOGOUT</a>
                </center>
            </div>
            
    </section>
</div>
@endsection