@extends('baseadmin')
@section('title','Edit Siswa')
@section('content')

<!-- Main Section -->

<div class="container-fluid">
   <section class="main-section">
            <!-- Add Your Content Inside -->
            <div class="content">
                <!-- Remove This Before You Start -->
                <h1>Edit Data Siswa</h1>
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
                <form  action="{{ url('/superadmin/editsiswapost') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="nama">Nama Siswa :</label>
                        <input type="text"  class="form-control" id="nama" name="nama" values="{{ $datas->nama }}">
                    </div>
                    <div class="form-group">
                        <label for="notest">No Test :</label>
                        <input type="text" class="form-control" id="notest" name="notest" values="{{ $datas->notest }}">
                    </div>
                    
                    <div class="form-group">
                        <button type="submit" class="btn btn-md btn-primary">Edit Data</button>
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