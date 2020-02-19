@extends('baseadmin')
@section('title','Edit Penguji')
@section('content')

<!-- Main Section -->

<div class="container-fluid">


    
   <section class="main-section">
            <!-- Add Your Content Inside -->
            <div class="content">
                <!-- Remove This Before You Start -->
                <h1>Edit Data Penguji</h1>
                <hr>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @foreach($data as $datas)
                <form  action="{{ url('/superadmin/editpengujipost') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group">
                    <input type="text"  class="form-control" id="id_penguji" name="id_penguji" value="{{ $datas->id }}" hidden="true" >
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama :</label>
                        <input type="text"  class="form-control" id="nama" name="nama" value="{{ $datas->nama }}">
                    </div>
                    <div class="form-group">
                        <label for="jabatan">Jabatan :</label>
                        <input type="text" class="form-control" id="jabatan" name="jabatan" value="{{ $datas->jabatan }}">
                    </div>
                    <div class="form-group">
                        <label for="username">Username :</label>
                        <input type="text" class="form-control" id="username" name="username" value="{{ $datas->username }}">
                    </div>
                    <div class="form-group">
                        <label for="username">Password :</label>
                        <input type="text" class="form-control" id="password" name="password" value="{{ $datas->password }}">
                    </div>
                    <div class="form-group">
                        <label for="username">Confirm Pasword :</label>
                        <input type="text" class="form-control" id="confirmation" name="confirmation" >
                    </div>
                    
            
                    <div class="form-group">
                        <button type="submit" class="btn btn-md btn-primary">Edit Data</button>
                        <a href="/superadmin/listpenguji" class="btn btn-md btn-danger">Cancel</a>
                    </div>
                </form>
                @endforeach
            </div>
            
        </section>
        <!-- /.main-section -->

        

    </div>
        <!-- /.container-fluid -->
@endsection