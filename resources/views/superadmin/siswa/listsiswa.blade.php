@extends('baseadmin')
@section('title','List Siswa')
@section('content')

<div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Informasi Siswa</h1>
          @if(Session::has('alert-success'))
                <div class="alert alert-success">
                    <strong>{{ \Illuminate\Support\Facades\Session::get('alert-success') }}</strong>
                </div>
            @endif
            <hr>
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <!-- <h6 class="m-0 font-weight-bold text-primary">Tabel Informasi Siswa</h6> -->
              <div class="col-md-12" align="right">
              <a href="/superadmin/createsiswa" class=" btn btn-sm btn-primary" align="right" style="right:10px;">Tambah Siswa</a>
              </div>
              
                          
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Siswa</th>
                    <th>No Test</th>
                    <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                @php $no = 1; @endphp
                @foreach($data as $datas)
                    <tr>
                    <td>{{ $no++ }}</td>
                        <td>{{$datas->nama}}</td>
                        <td>{{$datas->notest}}</td>
                        <td>
                            <form action="/superadmin/deletsiswapost/{{ $datas->id }}" method="post">
                                {{ csrf_field() }}
                                {{ method_field('POST') }}
                                <a href="/superadmin/editsiswa/{{ $datas->id }}" class=" btn btn-sm btn-primary">Edit</a>
                                <button class="btn btn-sm btn-danger" type="submit" onclick="return confirm('Yakin ingin menghapus data?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                </table>
              </div>
              
            </div>
          </div>

          <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
          </a>

    </div>
@endsection