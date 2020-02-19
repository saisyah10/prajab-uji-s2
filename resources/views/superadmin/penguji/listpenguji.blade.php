@extends('baseadmin')
@section('title','List Penguji')
@section('content')

<div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Informasi Penguji</h1>
          @if(Session::has('alert-success'))
                <div class="alert alert-success">
                    <strong>{{ \Illuminate\Support\Facades\Session::get('alert-success') }}</strong>
                </div>
            @endif
            <hr>
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <!-- <h6 class="m-0 font-weight-bold text-primary">Tabel Informasi Penguji</h6> -->
              <div class="col-md-12" align="right">
              <a href="/superadmin/createpenguji" class=" btn btn-sm btn-primary" align="right" style="right:10px;">Tambah Penguji</a>
              </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Penguji</th>
                    <th>Jabatan</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                @php $no = 1; @endphp
                @foreach($data as $datas)
                    <tr>
                    <td>{{ $no++ }}</td>
                        <td>{{$datas->nama}}</td>
                        <td>{{$datas->jabatan}}</td>
                        <td>{{$datas->username}}</td>
                        <td>{{$datas->password}}</td>
                        <td>
                            <form action="/superadmin/deletepengujipost/{{ $datas->id }}" method="post">
                                {{ csrf_field() }}
                                {{ method_field('POST') }}
                                <a href="/superadmin/editpenguji/{{ $datas->id }}" class=" btn btn-sm btn-primary">Edit</a>
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

    </div>
@endsection