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
            <div class="alert alert-success" style="background-color:#00FF00;">
                    <strong>{{ \Illuminate\Support\Facades\Session::get('alert-success') }}</strong>
                </div>
            @endif
            <div class="card-body">
              <div class="table-responsive">
              <form action="user/edithasil/" method="POST">
              {{ csrf_field() }}
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
                        <td><input type="text"  class="form-control" id="tsk1" name="tsk1" Minlength="2" Maxlength="3" value="{{number_format($datas->nilai_subkat_1,3)}}" disabled> </td>
                        <td><input type="text"  class="form-control" id="tsk2" name="tsk2" Minlength="2" Maxlength="3" value="{{$datas->nilai_subkat_2}}" disabled> </td>
                        <td><input type="text"  class="form-control" id="tsk3" name="tsk3" Minlength="2" Maxlength="3" value="{{$datas->nilai_subkat_3}}" disabled> </td>
                        <td><input type="text"  class="form-control" id="tsk4" name="tsk4" Minlength="2" Maxlength="3" value="{{$datas->nilai_subkat_4}}" disabled> </td>
                        <td><input type="text"  class="form-control" id="tsk5" name="tsk5" Minlength="2" Maxlength="3" value="{{$datas->nilai_subkat_5}}" disabled> </td>
                        <td><input type="text"  class="form-control" id="tsk6" name="tsk6" Minlength="2" Maxlength="3" value="{{$datas->nilai_subkat_6}}" disabled> </td>
                        <td><input type="text"  class="form-control" id="tsk7" name="tsk7" Minlength="2" Maxlength="3" value="{{$datas->nilai_subkat_7}}" disabled></td>
                        <td><input type="text"  class="form-control" id="tsk8" name="tsk8" Minlength="2" Maxlength="3" value="{{$datas->nilai_subkat_8}}" disabled> </td>
                        <td><input type="text"  class="form-control" id="tsk9" name="tsk9" Minlength="2" Maxlength="3" value="{{$datas->nilai_subkat_9}}" disabled></td>
                        <td><input type="text"  class="form-control" id="tsk10" name="tsk10" Minlength="2" Maxlength="3" value="{{$datas->nilai_subkat_10}}" disabled> </td>
                        <td><input type="text"  class="form-control" id="tsk11" name="tsk11" Minlength="2" Maxlength="3" value="{{$datas->nilai_subkat_11}}" disabled></td>
                        <td><input type="text"  class="form-control" id="tsk12" name="tsk12" Minlength="2" Maxlength="3" value="{{$datas->nilai_subkat_12}}"disabled></td>
                        <!-- <td>{{$datas->total_nilai_subkat}}</td> -->
                        <td>
                        <a href="/user/edithasil/{{$datas->id}}" id="btn_edit" onclick="enable()" class=" btn btn-sm btn-primary">Edit Nilai</a>
                        <!-- <Button id="btn_submit" type="submit" class=" btn btn-sm btn-primary" onclick="disable()" hidden="true">Submit</Button> -->
                        <br>
                        <br>
                        <!-- <a href="#" id="btn_cancel" class=" btn btn-sm btn-primary" onclick="cancel()" hidden="true">Cancel</a> -->
                        </td>
                    </tr>         
                @endforeach
                  </tbody>
                </table>
                
              </form>
                <div class="form-group">
                <center>
                    <a href="/user" class="btn btn-md btn-primary">KEMBALI</a>
                    <a href="/user/logout" class="btn btn-md btn-primary">LOGOUT</a>
                </center>

                <script>
                  function enable(){
                    
                    document.getElementById("tsk1").disabled = false;
                    document.getElementById("tsk2").disabled = false;
                    document.getElementById("tsk3").disabled = false;
                    document.getElementById("tsk4").disabled = false;
                    document.getElementById("tsk5").disabled = false;
                    document.getElementById("tsk6").disabled = false;
                    document.getElementById("tsk7").disabled = false;
                    document.getElementById("tsk8").disabled = false;
                    document.getElementById("tsk9").disabled = false;
                    document.getElementById("tsk10").disabled = false;
                    document.getElementById("tsk11").disabled = false;
                    document.getElementById("tsk12").disabled = false;
                    document.getElementById("btn_edit").hidden = true;
                    document.getElementById("btn_submit").hidden = false;
                    document.getElementById("btn_cancel").hidden = false;
                  }

                  function disable(){
                    document.getElementById("btn_submit").hidden = true;
                    document.getElementById("btn_cancel").hidden = true;
                    document.getElementById("btn_edit").hidden = false;
                    document.getElementById("tsk1").disabled = true;
                    document.getElementById("tsk2").disabled = true;
                    document.getElementById("tsk3").disabled = true;
                    document.getElementById("tsk4").disabled = true;
                    document.getElementById("tsk5").disabled = true;
                    document.getElementById("tsk6").disabled = true;
                    document.getElementById("tsk7").disabled = true;
                    document.getElementById("tsk8").disabled = true;
                    document.getElementById("tsk9").disabled = true;
                    document.getElementById("tsk10").disabled = true;
                    document.getElementById("tsk11").disabled = true;
                    document.getElementById("tsk12").disabled = true;
                    document.getElementById("btn_edit").hidden = true;
                  }

                  function cancel()
                  {
                    document.getElementById("btn_submit").hidden = true;
                    document.getElementById("btn_cancel").hidden = true;
                    document.getElementById("btn_edit").hidden = false;
                    document.getElementById("tsk1").disabled = true;
                    document.getElementById("tsk2").disabled = true;
                    document.getElementById("tsk3").disabled = true;
                    document.getElementById("tsk4").disabled = true;
                    document.getElementById("tsk5").disabled = true;
                    document.getElementById("tsk6").disabled = true;
                    document.getElementById("tsk7").disabled = true;
                    document.getElementById("tsk8").disabled = true;
                    document.getElementById("tsk9").disabled = true;
                    document.getElementById("tsk10").disabled = true;
                    document.getElementById("tsk11").disabled = true;
                    document.getElementById("tsk12").disabled = true;
                    document.getElementById("btn_edit").hidden = false;
                  }


                </script>    


              </div>
        </div>
              </div>
            </div>
            </div>
            
            </div>
            
    </section>
</div>
@endsection

