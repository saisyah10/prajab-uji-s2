@extends('baseadmin')
@section('title','Edit Profile Admin')
@section('content')

<!-- Main Section -->

<div class="container-fluid">


    
   <section class="main-section">
            <!-- Add Your Content Inside -->
            <div class="content">
                <!-- Remove This Before You Start -->
                <h1>Edit Data Admin</h1>
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
                <form  action="{{ url('/superadmin/update/') }}" method="POST">
                    {{ csrf_field() }}
                    <input type="text"  class="form-control" id="id_admin" name="id_admin" value="{{ $datas->id }}" hidden="true">
                    <div class="form-group">
                        <label for="nama">Nama :</label>
                        <input type="text"  class="form-control" id="nama" name="nama" value="{{$datas->nama}}">
                    </div>
                    <div class="form-group">
                        <label for="jabatan">Email :</label>
                        <input type="text" class="form-control" id="email" name="email" value="{{$datas->email}}">
                    </div>
                    
                   
                    <!-- <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="text" class="form-control" id="password" name="password" value="{{ $datas->password }}">
                    </div>
                    <div class="form-group">
                        <label for="psw">Password Confirmation:</label>
                        <input type="password" class="form-control" id="confirmation" name="confirmation">
                    </div> -->
                    
                
                    <div class="form-group">
                        <button type="submit" class="btn btn-md btn-primary">Edit Data</button>
                        <button type="reset" class="btn btn-md btn-danger">Cancel</button>
                    </div>
                </form>
                @endforeach
            </div>
            <br>
            <hr>
            <br>
            <div class="content">
            <h1>Edit Password Admin</h1>
                <hr>
                @foreach($data as $datas)
                <form  action="{{ url('/superadmin/updatePass') }}" method="POST">
                    {{ csrf_field() }}
                    <input type="text"  class="form-control" id="id_admin" name="id_admin" value="{{ $datas->id }}" hidden="true">
                    <div class="form-group">
                        <label for="password">Password Baru:</label>
                        <input type="password" class="form-control" id="password" name="password" value="">
                    </div>
                    <div class="form-group">
                        <label for="psw">Konfirmasi Password :</label>
                        <input type="password" class="form-control" id="confirmation" name="confirmation">
                    </div>
                    
                
                    <div class="form-group">
                        <button type="submit" class="btn btn-md btn-primary">Submit</button>
                        <button type="reset" class="btn btn-md btn-danger">Cancel</button>
                    </div>
                </form>
                @endforeach
            </div>
            <!-- /.content -->
        </section>
        <!-- /.main-section -->

        

    </div>
        <!-- /.container-fluid -->
@endsection