<?php

namespace App\Http\Controllers;

use App\Models\Dudi;
use Illuminate\Http\Request;

class DudiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dudi = Dudi::paginate('10');
        return view('dudi.index', compact('dudi'));
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
            'nama' => 'required',
            'alamat' => 'required'
        ]);

        //upload image

        //create siswa
        Dudi::create([
            'nama' => $request->nama,
            'alamat' => $request->alamat
        ]);

        //redirect to index
        return redirect()->route('dudi.index')->with(['success' => 'Data Berhasil Di Tambah!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Dudi  $dudi
     * @return \Illuminate\Http\Response
     */
    public function show(Dudi $dudi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Dudi  $dudi
     * @return \Illuminate\Http\Response
     */
    public function edit(Dudi $dudi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Dudi  $dudi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dudi $dudi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dudi  $dudi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dudi $dudi)
    {
        //
    }
}
