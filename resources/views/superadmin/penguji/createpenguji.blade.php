@extends('baseadmin')
@section('title','Input Penguji')
@section('content')

<!-- Main Section -->

<div class="container-fluid">


    
   <section class="main-section">
            <!-- Add Your Content Inside -->
            <div class="content">
                <!-- Remove This Before You Start -->
                <h1>Input Penguji</h1>
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
                <form  action="{{ url('/superadmin/createpengujipost') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="nama">Nama :</label>
                        <input type="text"  class="form-control" id="nama" name="nama">
                    </div>
                    <div class="form-group">
                        <label for="jabatan">Jabatan :</label>
                        <input type="text" class="form-control" id="jabatan" name="jabatan">
                    </div>
                    <div class="form-group">
                        <label for="username">Username :</label>
                        <input type="text" class="form-control" id="username" name="username">
                    </div>
                   
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                    <div class="form-group">
                        <label for="psw">Password Confirmation:</label>
                        <input type="password" class="form-control" id="confirmation" name="confirmation">
                    </div>
                    
                
                    <div class="form-group">
                        <button type="submit" class="btn btn-md btn-primary">Submit</button>
                        <a href="/" class="btn btn-md btn-danger">Cancel</a>
                        
                    </div>
                </form>
            </div>
            <!-- /.content -->
        </section>
        <!-- /.main-section -->

        

    </div>
        <!-- /.container-fluid -->
@endsection