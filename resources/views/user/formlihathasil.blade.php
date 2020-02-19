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
            <center><h4 style="color:#000000;">Laporan Hasil Nilai Akhir Siswa Uji Bisnis Improvment Prajabatan Tingkat S2 PLN Group Oleh {{Session::get('nama_penguji')}}</h4></center>
            </div>
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
                    <th>Total Nilai</th>
                    <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
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