<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Penguji;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Siswa;

class PengujiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!Session::get('status')){
            return redirect('/user/login')->with('alert','Kamu harus login dulu');
        }
        else{
            $data_siswa = Siswa::all();
            
            return view('user/formpenilaian',compact('data_siswa'));
        }
    }

    public function siswaDropdown($id){
        $siswa = Siswa::select('notest')->where('id',$id)->get();
        return Response::json(['success'=>true, 'info'=>$siswa]);
    }

    public function login()
    {
        return view('user/loginpenguji');
    }

    public function loginPost(Request $request){

        $username = $request->username;
        $password = $request->password;

        $data = Penguji::where('username',$username)->first();
        if($data){ //apakah email tersebut ada atau tidak
            if(Hash::check($password,$data->password)){
                Session::put('nama_penguji',$data->nama);
                Session::put('id_penguji',$data->id);
                Session::put('login',TRUE);
                Session::put('status','login');
                return redirect('/user');
            }
            else{
                return redirect('/user/login')->with('alert','Password atau Email, Salah !');
            }
        }
        else{
            return redirect('/user/login')->with('alert','Password atau Email, Salah!');
        }
    }

    public function logout(){
        Session::flush();
        return redirect('/user/login')->with('alert','Kamu sudah logout');
    }

    public function listpenguji()
    {
        //$data = DB::table('penguji')->get();
        $data = Penguji::all();

        //ddump($data);
        
        return view('superadmin/penguji/listpenguji', compact('data'));
    }

    public function createpenguji(){
        return view('superadmin/penguji/createpenguji');
    }

    public function createPengujiPost(Request $request){
        $this->validate($request, [
            'nama' => 'required|min:4',
            'jabatan' => 'required|min:4',
            'username' => 'required|min:5|unique:penguji',
            'password' => 'required',
            'confirmation' => 'required|same:password',
        ]);

        $data =  new Penguji();
        $data->nama = $request->nama;
        $data->jabatan = $request->jabatan;
        $data->username = $request->username;
        $data->password = bcrypt($request->password);
        $data->save();
        return redirect('/superadmin/listpenguji')->with('alert-success','Berhasil Menambah Data Penguji');
    }

    public function editPenguji($id)
    {
        $data = Penguji::where('id',$id)->get();

        return view('superadmin/penguji/editpenguji',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $data = Penguji::where('id',$request->id_penguji)->first();
        $data->nama = $request->nama;
        $data->jabatan = $request->jabatan;
        $data->username = $request->username;
        //$data->password = bcrypt($request->password);
        $data->save();
        return redirect('/superadmin/listpenguji')->with('alert-success','Data berhasil diubah!');
    }

    public function updatePassPenguji(Request $request)
    {
        $data = Penguji::where('id',$request->id_penguji)->first();
        if($request->password == $request->confirmation)
        {
            $data->password = bcrypt($request->password);
        }
        $data->save();
        return redirect()->route('/superadmin/listpenguji')->with('alert-success','Password berhasil diubah!');
    }

    public function deletePengujiPost($id)
    {
        $data = Penguji::where('id',$id)->first();
        $data->delete();
        return redirect('/superadmin/listpenguji')->with('alert-success','Data berhasi dihapus!');
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
}
