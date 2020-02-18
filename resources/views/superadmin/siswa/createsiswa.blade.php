@extends('baseadmin')
@section('title','Input Siswa')
@section('content')

<!-- Main Section -->

<div class="container-fluid">
   <section class="main-section">
            <!-- Add Your Content Inside -->
            <div class="content">
                <!-- Remove This Before You Start -->
                <h1>Input Data Siswa</h1>
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
                <form  action="{{ url('/superadmin/createsiswapost') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="nama">Nama Siswa :</label>
                        <input type="text"  class="form-control" id="nama" name="nama">
                    </div>
                    <div class="form-group">
                        <label for="notest">No Test :</label>
                        <input type="text" class="form-control" id="notest" name="notest">
                    </div>
                    
                    <div class="form-group">
                        <button type="submit" class="btn btn-md btn-primary">Submit</button>
                        <button type="reset" class="btn btn-md btn-danger">Cancel</button>
                    </div>
                </form>
            </div>
            <!-- /.content -->
        </section>
        <!-- /.main-section -->

        

    </div>
        <!-- /.container-fluid -->
@endsection