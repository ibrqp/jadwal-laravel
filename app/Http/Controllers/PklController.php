<?php

namespace App\Http\Controllers;

use App\Models\pkl;
use App\Models\Dudi;
use App\Models\Siswa;
use Illuminate\Http\Request;

class PklController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $siswa = Siswa::latest()->paginate(5);
        $alamat = Dudi::latest()->paginate(5);
        $pkl = pkl::latest()->paginate(5);
        return view('pkl.index', compact('pkl', 'siswa', 'alamat'));
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
        //validate form
        $this->validate($request, [
            'id_siswa' => 'required',
            'id_dudi' => 'required',
            'tgl_masuk' => 'required',
            'tgl_keluar' => 'required'
        ]);

        //upload image

        //create siswa
        pkl::create([
            'id_siswa' => $request->id_siswa,
            'id_dudi' => $request->id_dudi,
            'tgl_masuk' => $request->tgl_masuk,
            'tgl_keluar' => $request->tgl_keluar,
        ]);

        //redirect to index
        return redirect()->route('pkl.index')->with(['success' => 'Data Berhasil Di Tambah!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\pkl  $pkl
     * @return \Illuminate\Http\Response
     */
    public function show(pkl $pkl)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\pkl  $pkl
     * @return \Illuminate\Http\Response
     */
    public function edit(pkl $pkl)
    {
        $siswa = Siswa::latest()->paginate(5);
        $alamat = Dudi::latest()->paginate(5);
        return view('pkl.edit', compact('pkl', 'siswa', 'alamat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\pkl  $pkl
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, pkl $pkl)
    {
        $pkl->update([
            'id_siswa' => $request->id_siswa,
            'id_dudi' => $request->id_dudi,
            'tgl_masuk' => $request->tgl_masuk,
            'tgl_keluar' => $request->tgl_keluar,
        ]);
    

    //redirect to index
    return redirect()->route('pkl.index')->with(['success' => 'Data Berhasil Diubah!']);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\pkl  $pkl
     * @return \Illuminate\Http\Response
     */
    public function destroy(pkl $pkl)
    {
        //delete siswa
        $pkl->delete();

        //redirect to index
        return redirect()->route('pkl.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
