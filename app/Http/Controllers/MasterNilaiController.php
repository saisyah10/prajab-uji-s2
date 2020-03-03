<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Masternilai;
use App\Siswa;
use App\Penguji;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Exports\NilaiExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;

class MasterNilaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datasiswa = Siswa::all();
        
        return view('superadmin/report', compact('datasiswa'));
    }

    public function printprv()
    {
        $siswaprint = Siswa::all();
        return view('superadmin/printsiswa')->with('siswaprint', $siswaprint);
    }

    public function printprvdtl($id)
    {
        $datad = Masternilai::where('id_siswa',$id)->get();
        $dataq = DB::table('masternilai')
            ->join('siswa', 'masternilai.id_siswa', '=', 'siswa.id')
            ->join('penguji', 'masternilai.id_penguji', '=', 'penguji.id')
            ->select('masternilai.*', 'siswa.nama as s_nama', 'penguji.nama as p_nama')->where('id_siswa',$id)
            ->get();

        $semuanilai = 0;
        foreach( $datad as $datadetail)
        {
            $nilai_1 = $datadetail->nilai_subkat_1 * 2.5/100;
            $nilai_2 = $datadetail->nilai_subkat_2 * 2.5/100;
            $nilai_3 = $datadetail->nilai_subkat_3 * 10/100;
            $nilai_4 = $datadetail->nilai_subkat_4 * 10/100;
            $nilai_5 = $datadetail->nilai_subkat_5 * 10/100;
            $nilai_6 = $datadetail->nilai_subkat_6 * 10/100;
            $nilai_7 = $datadetail->nilai_subkat_7 * 5/100;
            $nilai_8 = $datadetail->nilai_subkat_8 * 10/100;
            $nilai_9 = $datadetail->nilai_subkat_9 * 10/100;
            $nilai_10 = $datadetail->nilai_subkat_10 * 5/100;
            $nilai_11 = $datadetail->nilai_subkat_11 * 10/100;
            $nilai_12 = $datadetail->nilai_subkat_12 * 15/100;

            $total_nilai = $nilai_1+$nilai_2+$nilai_3+$nilai_4+$nilai_5+$nilai_6+$nilai_7+$nilai_8+$nilai_9+$nilai_10+$nilai_11+$nilai_12;
                 
        }

        return view('superadmin/printdetail',compact('datad','dataq'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messages = [
            'skategori1.required' => 'harap isi nilai sub kategori 1',     
            'skategori2.required' => 'harap isi nilai sub kategori 2',
            'skategori3.required' => 'harap isi nilai sub kategori 3',
            'skategori4.required' => 'harap isi nilai sub kategori 4',
            'skategori5.required' => 'harap isi nilai sub kategori 5',
            'skategori6.required' => 'harap isi nilai sub kategori 6',
            'skategori7.required' => 'harap isi nilai sub kategori 7',
            'skategori8.required' => 'harap isi nilai sub kategori 8',
            'skategori9.required' => 'harap isi nilai sub kategori 9',
            'skategori10.required' => 'harap isi nilai sub kategori 10',
            'skategori11.required' => 'harap isi nilai sub kategori 11',
            'skategori12.required' => 'harap isi nilai sub kategori 12',
            'skategori1.between' => 'harap isi nilai pada sub kategori 1 antara 10 sampai 100',     
            'skategori2.between' => 'harap isi nilai pada sub kategori 2 antara 10 sampai 100',
            'skategori3.between' => 'harap isi nilai pada sub kategori 3 antara 10 sampai 100',
            'skategori4.between' => 'harap isi nilai pada sub kategori 4 antara 10 sampai 100',
            'skategori5.between' => 'harap isi nilai pada sub kategori 5 antara 10 sampai 100',
            'skategori6.between' => 'harap isi nilai pada sub kategori 6 antara 10 sampai 100',
            'skategori7.between' => 'harap isi nilai pada sub kategori 7 antara 10 sampai 100',
            'skategori8.between' => 'harap isi nilai pada sub kategori 8 antara 10 sampai 100',
            'skategori9.between' => 'harap isi nilai pada sub kategori 9 antara 10 sampai 100',
            'skategori10.between' => 'harap isi nilai pada sub kategori 10 antara 10 sampai 100',
            'skategori11.between' => 'harap isi nilai pada sub kategori 11 antara 10 sampai 100',
            'skategori12.between' => 'harap isi nilai pada sub kategori 12 antara 10 sampai 100',
            'id_siswa.required' => 'harap pilih siswa terlebih dahulu',
            'status.required' => 'harap pilih kelas terlebih dahulu',
          ];

        $request->validate([  
            'id_siswa' => 'required',
            'id_penguji' => 'required',
            'status' => 'required',
            'skategori1' => 'required|min:2|numeric|integer|between:10,100',
            'skategori2' => 'required|min:2|numeric|integer|between:10,100',
            'skategori3' => 'required|min:2|numeric|integer|between:10,100',
            'skategori4' => 'required|min:2|numeric|integer|between:10,100',
            'skategori5' => 'required|min:2|numeric|integer|between:10,100',
            'skategori6' => 'required|min:2|numeric|integer|between:10,100',
            'skategori7' => 'required|min:2|numeric|integer|between:10,100',
            'skategori8' => 'required|min:2|numeric|integer|between:10,100',
            'skategori9' => 'required|min:2|numeric|integer|between:10,100',
            'skategori10' => 'required|min:2|numeric|integer|between:10,100',
            'skategori11' => 'required|min:2|numeric|integer|between:10,100',
            'skategori12' => 'required|min:2|numeric|integer|between:10,100',
        ],$messages);

        

        $data =  new Masternilai();
        $data->id_siswa = $request->id_siswa;
        $data->id_penguji = $request->id_penguji;
        $data->kelas_penguji = $request->status;
        $data->nilai_subkat_1 = $request->skategori1;
        $data->nilai_subkat_2 = $request->skategori2;
        $data->nilai_subkat_3 = $request->skategori3;
        $data->nilai_subkat_4 = $request->skategori4;
        $data->nilai_subkat_5 = $request->skategori5;
        $data->nilai_subkat_6 = $request->skategori6;
        $data->nilai_subkat_7 = $request->skategori7;
        $data->nilai_subkat_8 = $request->skategori8;
        $data->nilai_subkat_9 = $request->skategori9;
        $data->nilai_subkat_10 = $request->skategori10;
        $data->nilai_subkat_11 = $request->skategori11;
        $data->nilai_subkat_12 = $request->skategori12;

        $data->save();

        $datad = Masternilai::where('id_siswa',$request->id_siswa)->get();
        
        $datas = Siswa::where('id',$request->id_siswa)->first();
        $semuanilai = 0;

        foreach( $datad as $datadetail)
        {
            $nilai_1 = $datadetail->nilai_subkat_1 * 2.5/100;
            $nilai_2 = $datadetail->nilai_subkat_2 * 2.5/100;
            $nilai_3 = $datadetail->nilai_subkat_3 * 10/100;
            $nilai_4 = $datadetail->nilai_subkat_4 * 10/100;
            $nilai_5 = $datadetail->nilai_subkat_5 * 10/100;
            $nilai_6 = $datadetail->nilai_subkat_6 * 10/100;
            $nilai_7 = $datadetail->nilai_subkat_7 * 5/100;
            $nilai_8 = $datadetail->nilai_subkat_8 * 10/100;
            $nilai_9 = $datadetail->nilai_subkat_9 * 10/100;
            $nilai_10 = $datadetail->nilai_subkat_10 * 5/100;
            $nilai_11 = $datadetail->nilai_subkat_11 * 10/100;
            $nilai_12 = $datadetail->nilai_subkat_12 * 15/100;

            $total_nilai = $nilai_1+$nilai_2+$nilai_3+$nilai_4+$nilai_5+$nilai_6+$nilai_7+$nilai_8+$nilai_9+$nilai_10+$nilai_11+$nilai_12;
            
            $datadetail->total_subkat_1 = $nilai_1;
            $datadetail->total_subkat_2 = $nilai_2;
            $datadetail->total_subkat_3 = $nilai_3;
            $datadetail->total_subkat_4 = $nilai_4;
            $datadetail->total_subkat_5 = $nilai_5;
            $datadetail->total_subkat_6 = $nilai_6;
            $datadetail->total_subkat_7 = $nilai_7;
            $datadetail->total_subkat_8 = $nilai_8;
            $datadetail->total_subkat_9 = $nilai_9;
            $datadetail->total_subkat_10 = $nilai_10;
            $datadetail->total_subkat_11 = $nilai_11;
            $datadetail->total_subkat_12 = $nilai_12;
            $datadetail->total_nilai_subkat = $total_nilai;
            $datadetail->save();

            $semuanilai += $total_nilai/3;
        }
        
        if($semuanilai >= 70 ){
            $datas->nilai = $semuanilai;
            $datas->status = "LULUS";
            
        }
        elseif($semuanilai < 70){
            $datas->nilai = $semuanilai;
            $datas->status = "TIDAK LULUS";
            
        }
        else {
            $datas->nilai = $semuanilai;
            $datas->status = "TIDAK ADA DATA";
            
        }
        $datas->save();
        if($datas){
            return redirect('/user')->with(['success' => 'Berhasil Menginput Nilai Mentee']);
        }
        else{
            return redirect('/user')->with(['error' => 'Gagal Menginput Nilai Mentee. Harap Periksa data kembali']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $datad = Masternilai::where('id_siswa',$id)->get();

        $dataq = DB::table('masternilai')
            ->join('siswa', 'masternilai.id_siswa', '=', 'siswa.id')
            ->join('penguji', 'masternilai.id_penguji', '=', 'penguji.id')
            ->select('masternilai.*', 'siswa.nama as s_nama', 'penguji.nama as p_nama')->where('id_siswa',$id)
            ->get();

        $datasis = Siswa::where('id',$id)->first();
        $semuanilai = 0;
        $id_siswa = "";
        $id_penguji = "";
        foreach( $datad as $datadetail)
        {
            $nilai_1 = $datadetail->nilai_subkat_1 * 2.5/100;
            $nilai_2 = $datadetail->nilai_subkat_2 * 2.5/100;
            $nilai_3 = $datadetail->nilai_subkat_3 * 10/100;
            $nilai_4 = $datadetail->nilai_subkat_4 * 10/100;
            $nilai_5 = $datadetail->nilai_subkat_5 * 10/100;
            $nilai_6 = $datadetail->nilai_subkat_6 * 10/100;
            $nilai_7 = $datadetail->nilai_subkat_7 * 5/100;
            $nilai_8 = $datadetail->nilai_subkat_8 * 10/100;
            $nilai_9 = $datadetail->nilai_subkat_9 * 10/100;
            $nilai_10 = $datadetail->nilai_subkat_10 * 5/100;
            $nilai_11 = $datadetail->nilai_subkat_11 * 10/100;
            $nilai_12 = $datadetail->nilai_subkat_12 * 15/100;

            $total_nilai = $nilai_1+$nilai_2+$nilai_3+$nilai_4+$nilai_5+$nilai_6+$nilai_7+$nilai_8+$nilai_9+$nilai_10+$nilai_11+$nilai_12;
            
            $datadetail->total_subkat_1 = $nilai_1;
            $datadetail->total_subkat_2 = $nilai_2;
            $datadetail->total_subkat_3 = $nilai_3;
            $datadetail->total_subkat_4 = $nilai_4;
            $datadetail->total_subkat_5 = $nilai_5;
            $datadetail->total_subkat_6 = $nilai_6;
            $datadetail->total_subkat_7 = $nilai_7;
            $datadetail->total_subkat_8 = $nilai_8;
            $datadetail->total_subkat_9 = $nilai_9;
            $datadetail->total_subkat_10 = $nilai_10;
            $datadetail->total_subkat_11 = $nilai_11;
            $datadetail->total_subkat_12 = $nilai_12;
            $datadetail->total_nilai_subkat = $total_nilai;
            $datadetail->save();

            // DB::table('masternilai')
            // ->where('id_siswa',$id)
            // ->update(['total_subkat_1' => $nilai_1,
            // 'total_subkat_2' => $nilai_2,
            // 'total_subkat_3' => $nilai_3,
            // 'total_subkat_4' => $nilai_4,
            // 'total_subkat_5' => $nilai_5,
            // 'total_subkat_6' => $nilai_6,
            // 'total_subkat_7' => $nilai_7,
            // 'total_subkat_8' => $nilai_8,
            // 'total_subkat_9' => $nilai_9,
            // 'total_subkat_10' => $nilai_10,
            // 'total_subkat_11' => $nilai_11,
            // 'total_subkat_12' => $nilai_12,
            // 'total_nilai_subkat' => $total_nilai
            // ]);

            $semuanilai += $total_nilai/3;     

            
        }
        
        if($semuanilai >= 70 ){
            $datasis->nilai = $semuanilai;
            $datasis->status = "LULUS";
            
        }
        elseif($semuanilai < 70){
            $datasis->nilai = $semuanilai;
            $datasis->status = "TIDAK LULUS";
            
        }
        else {
            $datasis->nilai = $semuanilai;
            $datasis->status = "TIDAK ADA DATA";
            
        }
        $datasis->save();
        
        if($dataq){
            return view('superadmin/detailreport',compact('datad','dataq'));
        }
        else
        {
            return view('superadmin/detailreport')->with(['error' => 'Data belum diisi']);
        }
    }

    public function showhasil($id){

        $dataHasil = Masternilai::where('id_penguji',$id)->get();

        $dataq = DB::table('masternilai')
            ->join('siswa', 'masternilai.id_siswa', '=', 'siswa.id')
            ->join('penguji', 'masternilai.id_penguji', '=', 'penguji.id')
            ->select('masternilai.*', 'siswa.nama as s_nama', 'penguji.nama as p_nama')->where('id_penguji',$id)
            ->get();

        $semuanilai = 0;

        foreach( $dataq as $datadetail)
        {
            $nilai_1 = $datadetail->nilai_subkat_1 * 2.5/100;
            $nilai_2 = $datadetail->nilai_subkat_2 * 2.5/100;
            $nilai_3 = $datadetail->nilai_subkat_3 * 10/100;
            $nilai_4 = $datadetail->nilai_subkat_4 * 10/100;
            $nilai_5 = $datadetail->nilai_subkat_5 * 10/100;
            $nilai_6 = $datadetail->nilai_subkat_6 * 10/100;
            $nilai_7 = $datadetail->nilai_subkat_7 * 5/100;
            $nilai_8 = $datadetail->nilai_subkat_8 * 10/100;
            $nilai_9 = $datadetail->nilai_subkat_9 * 10/100;
            $nilai_10 = $datadetail->nilai_subkat_10 * 5/100;
            $nilai_11 = $datadetail->nilai_subkat_11 * 10/100;
            $nilai_12 = $datadetail->nilai_subkat_12 * 15/100;

            $total_nilai = $nilai_1+$nilai_2+$nilai_3+$nilai_4+$nilai_5+$nilai_6+$nilai_7+$nilai_8+$nilai_9+$nilai_10+$nilai_11+$nilai_12;
            
            $semuanilai += $total_nilai/3;     

            
        }

        return view('user/formlihathasil',compact('dataHasil','dataq'));
    }
    
    public function updatehasil(Request $request,$id)
    {

        $messages = [
            'skategori1.required' => 'harap isi nilai sub kategori 1',     
            'skategori2.required' => 'harap isi nilai sub kategori 2',
            'skategori3.required' => 'harap isi nilai sub kategori 3',
            'skategori4.required' => 'harap isi nilai sub kategori 4',
            'skategori5.required' => 'harap isi nilai sub kategori 5',
            'skategori6.required' => 'harap isi nilai sub kategori 6',
            'skategori7.required' => 'harap isi nilai sub kategori 7',
            'skategori8.required' => 'harap isi nilai sub kategori 8',
            'skategori9.required' => 'harap isi nilai sub kategori 9',
            'skategori10.required' => 'harap isi nilai sub kategori 10',
            'skategori11.required' => 'harap isi nilai sub kategori 11',
            'skategori12.required' => 'harap isi nilai sub kategori 12',
            'skategori1.between' => 'harap isi nilai pada sub kategori 1 antara 10 sampai 100',     
            'skategori2.between' => 'harap isi nilai pada sub kategori 2 antara 10 sampai 100',
            'skategori3.between' => 'harap isi nilai pada sub kategori 3 antara 10 sampai 100',
            'skategori4.between' => 'harap isi nilai pada sub kategori 4 antara 10 sampai 100',
            'skategori5.between' => 'harap isi nilai pada sub kategori 5 antara 10 sampai 100',
            'skategori6.between' => 'harap isi nilai pada sub kategori 6 antara 10 sampai 100',
            'skategori7.between' => 'harap isi nilai pada sub kategori 7 antara 10 sampai 100',
            'skategori8.between' => 'harap isi nilai pada sub kategori 8 antara 10 sampai 100',
            'skategori9.between' => 'harap isi nilai pada sub kategori 9 antara 10 sampai 100',
            'skategori10.between' => 'harap isi nilai pada sub kategori 10 antara 10 sampai 100',
            'skategori11.between' => 'harap isi nilai pada sub kategori 11 antara 10 sampai 100',
            'skategori12.between' => 'harap isi nilai pada sub kategori 12 antara 10 sampai 100',
            
          ];

        $request->validate([  
            
            'skategori1' => 'required|min:2|numeric|integer|between:10,100',
            'skategori2' => 'required|min:2|numeric|integer|between:10,100',
            'skategori3' => 'required|min:2|numeric|integer|between:10,100',
            'skategori4' => 'required|min:2|numeric|integer|between:10,100',
            'skategori5' => 'required|min:2|numeric|integer|between:10,100',
            'skategori6' => 'required|min:2|numeric|integer|between:10,100',
            'skategori7' => 'required|min:2|numeric|integer|between:10,100',
            'skategori8' => 'required|min:2|numeric|integer|between:10,100',
            'skategori9' => 'required|min:2|numeric|integer|between:10,100',
            'skategori10' => 'required|min:2|numeric|integer|between:10,100',
            'skategori11' => 'required|min:2|numeric|integer|between:10,100',
            'skategori12' => 'required|min:2|numeric|integer|between:10,100',
        ],$messages);

       $data = Masternilai::where('id',$id)->first();
       

        $data->nilai_subkat_1 = $request->skategori1;
        $data->nilai_subkat_2 = $request->skategori2;
        $data->nilai_subkat_3 = $request->skategori3;
        $data->nilai_subkat_4 = $request->skategori4;
        $data->nilai_subkat_5 = $request->skategori5;
        $data->nilai_subkat_6 = $request->skategori6;
        $data->nilai_subkat_7 = $request->skategori7;
        $data->nilai_subkat_8 = $request->skategori8;
        $data->nilai_subkat_9 = $request->skategori9;
        $data->nilai_subkat_10 = $request->skategori10;
        $data->nilai_subkat_11 = $request->skategori11;
        $data->nilai_subkat_12 = $request->skategori12;

            $nilai_1 = $request->skategori1 * 2.5/100;
            $nilai_2 = $request->skategori2 * 2.5/100;
            $nilai_3 = $request->skategori3 * 10/100;
            $nilai_4 = $request->skategori4 * 10/100;
            $nilai_5 = $request->skategori5 * 10/100;
            $nilai_6 = $request->skategori6 * 10/100;
            $nilai_7 = $request->skategori7 * 5/100;
            $nilai_8 = $request->skategori8 * 10/100;
            $nilai_9 = $request->skategori9 * 10/100;
            $nilai_10 = $request->skategori10 * 5/100;
            $nilai_11 = $request->skategori11 * 10/100;
            $nilai_12 = $request->skategori12 * 15/100;

            $total_nilai = $nilai_1+$nilai_2+$nilai_3+$nilai_4+$nilai_5+$nilai_6+$nilai_7+$nilai_8+$nilai_9+$nilai_10+$nilai_11+$nilai_12;
            
            $data->total_subkat_1 = $nilai_1;
            $data->total_subkat_2 = $nilai_2;
            $data->total_subkat_3 = $nilai_3;
            $data->total_subkat_4 = $nilai_4;
            $data->total_subkat_5 = $nilai_5;
            $data->total_subkat_6 = $nilai_6;
            $data->total_subkat_7 = $nilai_7;
            $data->total_subkat_8 = $nilai_8;
            $data->total_subkat_9 = $nilai_9;
            $data->total_subkat_10 = $nilai_10;
            $data->total_subkat_11 = $nilai_11;
            $data->total_subkat_12 = $nilai_12;
            $data->total_nilai_subkat = $total_nilai;
            $data->save();
        
        $data->save($request->all());

        // DB::table('masternilai')
        //     ->where('id', $request->id_nilai)
        //     ->update(['nilai_subkat_1' => $request->skategori1,
        //     'nilai_subkat_2' => $request->skategori2,
        //     'nilai_subkat_3' => $request->skategori3,
        //     'nilai_subkat_4' => $request->skategori4,            
        //     'nilai_subkat_5' => $request->skategori5,
        //     'nilai_subkat_6' => $request->skategori6,
        //     'nilai_subkat_7' => $request->skategori7,
        //     'nilai_subkat_8' => $request->skategori8,
        //     'nilai_subkat_9' => $request->skategori9,
        //     'nilai_subkat_10' => $request->skategori10,
        //     'nilai_subkat_11' => $request->skategori11,
        //     'nilai_subkat_12' => $request->skategori12
        //     ]);

        return redirect()->action(
            'MasterNilaiController@showhasil', ['id' => $request->id_penguji]
        )->with('alert-success','Update Berhasil');

        // return redirect()->route('/user/lihathasil/', ['id' => $request->id_penguji])->with('alert-success','Update Berhasil');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edithasil($id)
    {
        

        $datanilai= DB::table('masternilai')
        ->join('siswa', 'masternilai.id_siswa', '=', 'siswa.id')
        ->join('penguji', 'masternilai.id_penguji', '=', 'penguji.id')
        ->select('masternilai.*', 'siswa.nama as s_nama','siswa.notest as s_notest' ,'penguji.nama as p_nama')->where('masternilai.id',$id)
        ->get();

        return view('/user/editnilai',compact('datanilai'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //update nilai total pada report
        $data = Siswa::where('id',$id)->first();
        $data->nama = $request->nilai;
        //$data->password = bcrypt($request->password);
        $data->save();
    }

    public function export_excel() 
    {

    }

    public function exportdetail_excel($id)
	{
        $data = DB::table('masternilai')
        ->join('siswa', 'masternilai.id_siswa', '=', 'siswa.id')
        ->join('penguji', 'masternilai.id_penguji', '=', 'penguji.id')
        ->select('masternilai.*', 'siswa.nama as s_nama', 'penguji.nama as p_nama')->where('id_siswa',$id)
        ->get()->toArray();
		//$data = Masternilai::get()->toArray();
        return Excel::create('laporanDetail', function($excel) use ($data) {
            $excel->sheet('mySheet', function($sheet) use ($data)
            {
                $sheet->cell('A1', function($cell) {$cell->setValue('Nomor');   });
                $sheet->cell('B1', function($cell) {$cell->setValue('Nama Siswa');   });
                $sheet->cell('C1', function($cell) {$cell->setValue('Nama Penguji');   });
                $sheet->cell('D1', function($cell) {$cell->setValue('Kelas Penguji');   });
                $sheet->cell('E1', function($cell) {$cell->setValue('Nilai Sub Kategori 1');   });
                $sheet->cell('F1', function($cell) {$cell->setValue('Nilai Sub Kategori 2');   });
                $sheet->cell('G1', function($cell) {$cell->setValue('Nilai Sub Kategori 3');   });
                $sheet->cell('H1', function($cell) {$cell->setValue('Nilai Sub Kategori 4');   });
                $sheet->cell('I1', function($cell) {$cell->setValue('Nilai Sub Kategori 5');   });
                $sheet->cell('J1', function($cell) {$cell->setValue('Nilai Sub Kategori 6');   });
                $sheet->cell('K1', function($cell) {$cell->setValue('Nilai Sub Kategori 7');   });
                $sheet->cell('L1', function($cell) {$cell->setValue('Nilai Sub Kategori 8');   });
                $sheet->cell('M1', function($cell) {$cell->setValue('Nilai Sub Kategori 9');   });
                $sheet->cell('N1', function($cell) {$cell->setValue('Nilai Sub Kategori 10');   });
                $sheet->cell('O1', function($cell) {$cell->setValue('Nilai Sub Kategori 11');   });
                $sheet->cell('P1', function($cell) {$cell->setValue('Nilai Sub Kategori 12');   });
                $sheet->cell('Q1', function($cell) {$cell->setValue('Total Nilai Sub Kategori');   });


                if (!empty($data)) {
                    foreach ($data as $key => $value) {
                        $i= $key++;
                        $sheet->cell('A'.$i, $i++); 
                        $sheet->cell('B'.$i, $value['s_nama']); 
                        $sheet->cell('C'.$i, $value['p_nama']);
                        $sheet->cell('D'.$i, $value['kelas_penguji']);
                        $sheet->cell('E'.$i, $value['total_subkat_1']);  
                        $sheet->cell('F'.$i, $value['total_subkat_2']);  
                        $sheet->cell('G'.$i, $value['total_subkat_3']);  
                        $sheet->cell('H'.$i, $value['total_subkat_4']);  
                        $sheet->cell('I'.$i, $value['total_subkat_5']);  
                        $sheet->cell('J'.$i, $value['total_subkat_6']);  
                        $sheet->cell('K'.$i, $value['total_subkat_7']);  
                        $sheet->cell('L'.$i, $value['total_subkat_8']);  
                        $sheet->cell('M'.$i, $value['total_subkat_9']);  
                        $sheet->cell('N'.$i, $value['total_subkat_10']);  
                        $sheet->cell('O'.$i, $value['total_subkat_11']);  
                        $sheet->cell('P'.$i, $value['total_subkat_12']);  
                        $sheet->cell('Q'.$i, $value['total_nilai_subkat']);  
                    }
                }
            });
        })->download('xlsx');
	}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
