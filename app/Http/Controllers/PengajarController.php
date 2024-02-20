<?php

namespace App\Http\Controllers;

use App\Models\guru;
use App\Models\mapel;
use App\Models\pengajar;
use Illuminate\Http\Request;

class PengajarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengajars = pengajar::paginate(10);
        return view("pengajar.indexs", compact("pengajars"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $guru = guru::all();
        $mapel = mapel::all();
        return view("pengajar.creates", compact("guru", "mapel"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate form
        $this->validate($request, [

            'id_mapel' => 'required',
            'id_guru' => 'required',
            'kelas' => 'required',
            'jam_pelajaran' => 'required'
        ]);

        //create post
        pengajar::create([
            'id_mapel' => $request->id_mapel,
            'id_guru' => $request->id_guru,
            'kelas' => $request->kelas,
            'jam_pelajaran' => $request->jam_pelajaran
        ]);

        //redirect to index
        return redirect()->route('pengajar.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show($id)
    // {
    //     $pengajar = pengajar::paginate(10);
    //     return view("pengajar.indexs", compact("pengajar"));
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(pengajar $pengajar)
    {
        $guru = guru::all();
        $mapel = mapel::all();
        return view("pengajar.edit", compact("pengajar", "guru", "mapel"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pengajar $pengajar)
    {
        $pengajar->update([
            'id_guru' => $request->id_guru,
            'id_mapel' => $request->id_mapel,
            'kelas' => $request->kelas,
            'jam_pelajaran' => $request->jam_pelajaran,
        ]);
    

    //redirect to index
    return redirect()->route('pengajar.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pengajar $pengajar)
    {
        $pengajar->delete();
        return redirect()->route("pengajar.index")->with(["success" => "Data Berhasil Di Hapus"]);
    }
}
