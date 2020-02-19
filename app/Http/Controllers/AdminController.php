<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *r
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!Session::get('login')){
            return redirect('/superadmin/login')->with('alert','Kamu harus login dulu');
        }
        else{
            return view('superadmin/index');
        }
    }

    public function login()
    {
        return view('superadmin/admin/loginadmin');
    }

    public function loginPost(Request $request){

        $email = $request->email;
        $password = $request->password;

        $data = Admin::where('email',$email)->first();
        if($data){ //apakah email tersebut ada atau tidak
            if(($data->password) == ($password) ){
                Session::put('nama',$data->nama);
                Session::put('email',$data->email);
                Session::put('id_admin',$data->id);
                Session::put('login',TRUE);

                return redirect('/');
            }
            else{
                return redirect('/superadmin/login')->with('alert','Password atau Email, Salah !');
            }
        }
        else{
            return redirect('/superadmin/login')->with('alert','Password atau Email, Salah!');
        }
    }

    public function logout(){
        Session::flush();
        return redirect('/superadmin/login')->with('alert','Kamu sudah logout');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        return view('superadmin/admin/createadmin');
    }

    public function createPost(Request $request){
        $this->validate($request, [
            'nama' => 'required|min:4',
            'email' => 'required|min:4|email|unique:users',
            'password' => 'required',
            'confirmation' => 'required|same:password',
        ]);

        $data =  new Admin();
        $data->nama = $request->nama;
        $data->email = $request->email;
        $data->password = $request->password;
        $data->save();
        return redirect('/')->with('alert-success','Kamu berhasil Register');
    }

    public function report(){
        return view('superadmin/report');
    }

    public function detailreport(){
        return view('superadmin/detailreport');
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
    public function edit($id)
    {
        $data = Admin::where('id',$id)->get();

        return view('superadmin/admin/profileadmin',compact('data'));
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
        $this->validate($request, [
            'nama' => 'required|min:4',
            'email' => 'required|min:4|email',
            'password' => 'required',
            'confirmation' => 'required|same:password',
        ]);
        $data = Admin::where('id',$request->id_admin)->first();
        $data->nama = $request->nama;
        $data->email = $request->email;
        $data->password = $request->password;
        $data->save();
        return redirect('/')->with('alert-success','Data berhasil diubah!');
    }

    // public function updatePass(Request $request)
    // {
    //     $data = Admin::where('id',$request->id_admin)->first();
    //     if($request->password == $request->confirmation)
    //     {
    //         $data->password = bcrypt($request->password);
    //     }
    //     $data->save();
    //     return redirect('/')->with('alert-success','Password berhasil diubah!');
    // }

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
