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
        $this->validate($request, [

            
            'skategori1' => 'required|min:2',
            'skategori2' => 'required|min:2',
            'skategori3' => 'required|min:2',
            'skategori4' => 'required|min:2',
            'skategori5' => 'required|min:2',
            'skategori6' => 'required|min:2',
            'skategori7' => 'required|min:2',
            'skategori8' => 'required|min:2',
            'skategori9' => 'required|min:2',
            'skategori10' => 'required|min:2',
            'skategori11' => 'required|min:2',
            'skategori12' => 'required|min:2',
        ]);

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
        
        $datas = Siswa::where('id',$id)->first();
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
        
            return redirect('/user')->with(['success' => 'Berhasil Menginput Nilai Mentee']);
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

        $datas = Siswa::where('id',$id)->first();
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
        

        return view('superadmin/detailreport',compact('datad','dataq'));
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
