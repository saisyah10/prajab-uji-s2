@extends('basepenguji')
@section('title','Form Penguji')
@section('content')
<script src= "https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"> </script> 


<div class="container-fluid">
<!-- Main Section -->
<section class="main-section">
        <!-- Add Your Content Inside -->
        <div class="content">
        <form action="{{ url('/user/StoreNilai') }}" method="POST">
              {{ csrf_field() }}
            <!-- Remove This Before You Start -->
            <div class="form-group">
          <br>
          
            <h3 class="m-0 font-weight-bold " ><center>Selamat Datang di Halaman Penilaian Uji Akhir Pembelajaran Prajabatan s2</center></h3>  
            <a href="/user/lihathasil/{{Session::get('id_penguji')}}" class="btn btn-md btn-primary">LIHAT HASIL</a>
            <br>
            <div class="row">
            <div class="col-md-6">            
            <div class="form-group">
              
                <label for="nama">Penguji : </label>
                <input type="text"  class="form-control" id="nama" name="nama" value="{{Session::get('nama_penguji')}}" disabled>

                <label for="status">Kelas : </label>
                <!-- <input type="text"  class="form-control" id="status" name="status" value="{{Session::get('status')}}" disabled> -->
                <select name="status" id="status" class="custom-select" style="width:700px;">
                <option value="" selected>Pilih Kelas</option>
                <option value="A">A</option>
                <option value="B">B</option>
                </select>
            </div>
            </div>
            <div class="col-md-6">  
              <div class="form-group">
              
              <label for="namasiswa">Nama Siswa : </label>
                  <select name="namasiswa" id="namasiswa" class="custom-select" style="width:700px;">
                  <option value="#" selected>Nama Siswa</option>
                  @foreach($data_siswa as $datas)
                  <option value="{{$datas->id}}" data-note="{{$datas->notest}}">{{$datas->nama}}</option>
                  @endforeach 
                  </select>
                  <!-- <input type="text"  class="form-control" id="namasiswa" name="namasiswa" value="" disabled>   -->

              <label for="notest_siswa">No Test Siswa : </label>
                   <!-- <select name="notest_siswa" id="notest_siswa" class="custom-select mb-2 mr-sm-2 mb-sm-2"style="width:700px;">
                   
                </select>  -->
                  <input type="text"  class="form-control" id="no_test" name="no_test" value="" disabled>

                  <script type="text/javascript">
                      $("#namasiswa").change(function(){
                      var idValue = $(this).val();
                      var noTest = $('#namasiswa option:selected').data("note");
                      $('#id_siswa').val(idValue);
                      $('#no_test').val(noTest);
                      $('#skategori1').val("");
                      $('#skategori2').val("");
                      $('#skategori3').val("");
                      $('#skategori4').val("");
                      $('#skategori5').val("");
                      $('#skategori6').val("");
                      $('#skategori7').val("");
                      $('#skategori8').val("");
                      $('#skategori9').val("");
                      $('#skategori10').val("");
                      $('#skategori11').val("");
                      $('#skategori12').val("");
                  });
                  </script>
                  
              
              </div>
              
          </div>
         </div>
            <div class="card shadow mb-4">
            <div class="card-header py-3">
            <div class="row">
            <div class="col-md-6"
              <h6 class="m-0 font-weight-bold " style="color:#000000;">Form Penilaian Uji Akhir Pembelajaran Prajabatan s2</h6>
            </div>
            <div class="col-md-6">
              <h6 class="m-0 font-weight-bold " style="color:#000000;" align="right">Max Nilai 100</h6>
            </div>
            </div>
            </div>
            <div class="card-body">
            @if ($message = Session::get('success'))
              <div class="alert alert-success alert-block" style="background-color:#00FF00;"> 
                  <center><strong>{{ $message }}</strong><br>
                  <button type="button" class="close" data-dismiss="alert">×</button>
                  </center>
              </div>
            @endif

            @if ($message = Session::get('error'))
              <div class="alert alert-danger alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button> 
                <strong>{{ $message }}</strong>
              </div>
            @endif

            @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="form-group">
                  <input type="text" id="id_siswa" class="form-control" name="id_siswa" value="" hidden="true" > 
              </div>
              <div class="form-group">
                <input type="text"  class="form-control" id="id_penguji" name="id_penguji" value="{{Session::get('id_penguji')}}" hidden="true" > 
              </div>
              <div class="table-responsive">
              
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th style="color:#000000;">Kategori</th>
                    <th style="color:#000000;">No</th>
                    <th style="color:#000000;">Sub Kategori</th>
                    
                    <th style="color:#000000;">Keterangan</th>
                    <th style="color:#000000;">Nilai</th>
                </tr>
                
                </thead>
                
                <tbody>
                
                  <tr>
                  <td style="color:#000000;" rowspan="2" >Strategist (Ahli strategi) </td>
                    <td style="color:#000000;">1.</td>
                    <td style="color:#000000;" > <b>Issue Strategis (2,5%)</b></td>
                    
                    <td style="color:#000000;" class="text-justify">Mampu menjelaskan latar belakang permasalahan yang diangkat dari sudut pandang yang lebih luas (kenegaraan/korporasi) menjadi permasalahan yang lebih spesifik (unit/organisasi). <br>Mampu mengembangkan paradigma untuk melihat detail permasalahan tanpa kehulangan sudut pandang strategis.</td>
                    <td style="color:#000000;">
                    <input type="text" class="form-control" style="background-color:#D3D3D3" id="skategori1" name="skategori1" Minlength="2" Maxlength="3" min="1" max="100">
                  </td>
                  </tr>
                  <tr>
                    <td style="color:#000000;">2.</td>
                    <!-- <td style="color:#000000;">Strategist (Ahli strategi) </td> -->
                    <td style="color:#000000;" ><b>Kedalaman Analisa dan Keilmuan (2,5%)</b></td>
                    <td style="color:#000000;" class="text-justify">Mampu menjelaskan teori-teori yang menjadi dasar dalam analisa, termasuk best practice yang sudah dilaksanakan di perusahaan/unit lain. <br>Mampu menemukan akar permasaahan/key success factor yang memiliki peran signifikan dalam perbaikan proses bisnis. <br>Mampu menyusun argumentasi yang kuat untuk menghubungkan antara teori yang digunakan dengan kerangka berpikir peserta. Proses analisa sudah dilakukan secara komperhensif dengan perangkat analisa yang sesuai.</td>
                    <td style="color:#000000;"><div class="form-group">
                    <input type="text"  class="form-control" id="skategori2" style="background-color:#D3D3D3" name="skategori2" Minlength="2" Maxlength="3">
                    </div>
                    </td>
                  </tr>
                  <tr>
                  <td style="color:#000000;" rowspan="2" >Perencanaan dan Eksekusi /td>
                    <td style="color:#000000;">3.</td>
                    <td style="color:#000000;" ><b>Perencanaan Eksekusi Program Terobosan/Breakthrough (10%)</b></td>
                    
                    <td style="color:#000000;" class="text-justify">Peserta dapat menggunakan perencanaankerja dalam menginisiasi dan mengeksekusi Program yang telah dibuat. <br>Peserta dapat menyusun workplan sesuai target yang dituju.</td>
                    <td style="color:#000000;"><div class="form-group">
                    <input type="text"  class="form-control" id="skategori3" style="background-color:#D3D3D3" name="skategori3" Minlength="2" Maxlength="3">
                    </div>
                    </td>
                  </tr>
                  <tr>
                    <td style="color:#000000;">4.</td>
                    <!-- <td style="color:#000000;">Strategist (Ahli strategi) </td> -->
                    <td style="color:#000000;" ><b>Eksekusi dan Monitoring Program Terobosan/Breakthrough (10%)</b></td>
                    <td style="color:#000000;" class="text-justify">Peserta dapat memastikan tahapan eksekusi program berjalan sesuai workplan, target dan proses yang telah ditetapkan.</td>
                    <td style="color:#000000;"><div class="form-group">
                    <input type="text"  class="form-control" id="skategori4" style="background-color:#D3D3D3" name="skategori4" Minlength="2" Maxlength="3">
                    </div>
                    </td>
                  </tr>
                  <tr>
                  <td style="color:#000000;" rowspan="2" >Team Work </td>
                    <td style="color:#000000;">5.</td>
                    <td style="color:#000000;" ><b>Komunikasi Pelaksanaan Program (10%)</b></td>
                    
                    <td style="color:#000000;" class="text-justify">Menunjukkan kemampuan berkomunikasi yang efektif kepada seluruh anggota tim maupun stakeholder yang terkait dengan program. Mulai dariinisiasi, pelaksanaan hingga membina hubungan baik. <br>Mencari dan memastikan ketersediaan sumber daya untuk mendukung keberhasilan program.</td>
                    <td style="color:#000000;"><div class="form-group">
                    <input type="text"  class="form-control" id="skategori5" style="background-color:#D3D3D3" name="skategori5" Minlength="2" Maxlength="3">
                    </div>
                    </td>
                  </tr>
                  <tr>
                    <td style="color:#000000;">6.</td>
                    <!-- <td style="color:#000000;">Strategist (Ahli strategi) </td> -->
                    <td style="color:#000000;" ><b>Kerja sama tim (10%)</b></td>
                    <td style="color:#000000;" class="text-justify">Mengambil tindakan yang dapat menyelaraskan kepentingan anggota tim dengan pencapaian tujuan program. <br>Memotivasi anggota timnya untuk dapat menjalankan peran dalam Program Terobosan/Breakthrough.</td>
                    <td style="color:#000000;"><div class="form-group">
                    <input type="text"  class="form-control" id="skategori6" style="background-color:#D3D3D3" name="skategori6" Minlength="2" Maxlength="3">
                    </div>
                    </td>
                  </tr>
                  <tr>
                  <td style="color:#000000;" >Human Capital Developer (Pengembangan Sumber Daya Manusia)</td>
                    <td style="color:#000000;">7.</td>
                    <td style="color:#000000;" ><b>Pengembangan Kompetensi (5%)</b></td>
                    
                    <td style="color:#000000;" class="text-justify">Memastikan bahwa Peserta menjalankan peran sebagaimana sebutan jabatan pertama.</td>
                    <td style="color:#000000;"><div class="form-group">
                    <input type="text"  class="form-control" id="skategori7" style="background-color:#D3D3D3" name="skategori7" Minlength="2" Maxlength="3">
                    </div>
                    </td>
                  </tr>
                  <tr>
                  <td style="color:#000000;" rowspan="2" >Personal Proficiency (Panutan Peningkatan Diri)</td>
                    <td style="color:#000000;">8.</td>
                    <td style="color:#000000;" ><b>Kesesuaian Mistar Kompetensi (10%)</b></td>
                   
                    <td style="color:#000000;" class="text-justify">Mampu melakukan analisa sesuai dengan mistar kompetensi jabatan proyeksi.</td>
                    <td style="color:#000000;"><div class="form-group">
                    <input type="text"  class="form-control" id="skategori8" style="background-color:#D3D3D3" name="skategori8" Minlength="2" Maxlength="3">
                    </div>
                    </td>
                  </tr>
                  <tr>
                    <td style="color:#000000;">9.</td>
                    <!-- <td style="color:#000000;">Strategist (Ahli strategi) </td> -->
                    <td style="color:#000000;" ><b>Potansi Dampak Program (10%)</b></td>
                    <td style="color:#000000;" class="text-justify">Mampu menunjukan Potensi Dampak atas program yang dilaksanakan.</td>
                    <td style="color:#000000;"><div class="form-group">
                    <input type="text"  class="form-control" id="skategori9" style="background-color:#D3D3D3" name="skategori9" Minlength="2" Maxlength="3">
                    </div>
                    </td>
                  </tr>
                  <tr>
                  <td style="color:#000000;" rowspan="3" >Future Competency</td>
                    <td style="color:#000000;">10.</td>
                    <td style="color:#000000;" ><b>Finance (5%)</b></td>
                   
                    <td style="color:#000000;" class="text-justify">Peserta melakukan tracking biaya dan efisiensi biaya program</td>
                    <td style="color:#000000;"><div class="form-group">
                    <input type="text"  class="form-control" id="skategori10" style="background-color:#D3D3D3" name="skategori10" Minlength="2" Maxlength="3">
                    </div>
                    </td>
                  </tr>
                  <tr>
                    <td style="color:#000000;">11.</td>
                    <!-- <td style="color:#000000;">Strategist (Ahli strategi) </td> -->
                    <td style="color:#000000;" ><b>Global Competency (10%)</b></td>
                    <td style="color:#000000;" >Peserta menggunakan Best Practice yang ada dan menggunakan untuk menyelesaikan.</td>
                    <td style="color:#000000;"><div class="form-group">
                    <input type="text"  class="form-control" id="skategori11" style="background-color:#D3D3D3" name="skategori11" Minlength="2" Maxlength="3">
                    </div>
                    </td>
                  </tr>
                  <tr>
                    <td style="color:#000000;">12.</td>
                    <!-- <td style="color:#000000;">Strategist (Ahli strategi) </td> -->
                    <td style="color:#000000;" ><b>Digital Competency (15%)</b></td>
                    <td style="color:#000000;" >Peserta menggunakanbig data dan melakukan digitalisasi proses manual pada project yang dilakukan.</td>
                    <td style="color:#000000;"><div class="form-group">
                    <input type="text"  class="form-control" id="skategori12" style="background-color:#D3D3D3" name="skategori12" Minlength="2" Maxlength="3">
                    </div>
                    </td>
                  </tr>
                </tbody>
                
                </table>
                
                
              </div>
            </div>
          </div>
          <div class="form-group">
                <center><button type="submit" class="btn btn-md btn-primary">SUBMIT NILAI</button>
                </br></br>
                    <a href="/user/logout" class="btn btn-md btn-primary">LOGOUT</a>
                </center>
            </div>
        </div>
</div>
</form>
</div>
        <!-- /.content -->
</section>
    <!-- /.main-section -->
    

</div>
@endsection