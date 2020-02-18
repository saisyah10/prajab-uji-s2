@extends('baseadmin')
@section('title','Home Admin')
@section('content')

<div class="container-fluid">
<!-- Main Section -->
<section class="main-section">
        <!-- Add Your Content Inside -->
        <div class="content">
            <!-- Remove This Before You Start -->
            <h3>Hallo, admin {{Session::get('nama')}}. Apa kabar?</h3>
            <h3>Selamat datang di menu admin Uji Bisnis Improvement Prajabatan Tingkat S2 PLN Group</h3>

            @if(Session::has('alert-success'))
                <div class="alert alert-success">
                    <strong>{{ \Illuminate\Support\Facades\Session::get('alert-success') }}</strong>
                </div>
            @endif

        </div>
        <!-- /.content -->
    </section>
    <!-- /.main-section -->

</div>

@endsection