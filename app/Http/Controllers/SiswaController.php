<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Siswa;
use Illuminate\Support\Facades\Hash;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Siswa::all();
        
        return view('superadmin/siswa/listsiswa', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        return view('superadmin/siswa/createsiswa');
    }

    public function createPost(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required|min:4',
            'notest' => 'required|min:4|unique:siswa' 
        ]);

        $data =  new Siswa();
        $data->nama = $request->nama;
        $data->notest = $request->notest;
        $data->save();
        return redirect('/superadmin/listsiswa')->with('alert-success','Berhasil menambah data');
    }

    public function update($id)
    {
        $data = Siswa::where('id',$id)->get();

        return view('superadmin/siswa/editsiswa',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updatePost(Request $request, $id)
    {
        $data = Siswa::where('id',$id)->first();
        $data->nama = $request->nama;
        $data->notest = $request->notest;
        $data->save();
        return redirect()->route('/superadmin/listsiswa')->with('alert-success','Data berhasil diubah!');
    }

    public function deletesiswaPost($id)
    {
        $data = Siswa::where('id',$id)->first();
        $data->delete();
        return redirect('/superadmin/listsiswa')->with('alert-success','Data berhasi dihapus!');
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
        //
    }

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
    public function destroy($id)
    {
        //
    }
}
