<?php

namespace App\Http\Controllers;

use App\Models\mapel;
use Illuminate\Http\Request;

class MapelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mapels = mapel::paginate(10);
        return view("mapel.index", compact("mapels"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("mapel.create");
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

            'nama_mapel'   => 'required'
        ]);

        //create post
        mapel::create([
            'nama_mapel'   => $request->nama_mapel
        ]);

        //redirect to index
        return redirect()->route('mapel.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mapels = mapel::paginate(10);
        return view("mapel.index", compact("mapels"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit( Mapel $mapel)
    {
        return view("mapel.edit", compact("mapel"));
    }                

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mapel $mapel)
    {
        $mapel->update([
            'nama_mapel' => $request->nama_mapel,
        ]);
    

    //redirect to index
    return redirect()->route('mapel.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mapel $mapel)
    {
       $mapel ->delete();
       return redirect()->route("mapel.index")->with(["success"=> "Data Berhasil Di Hapus"]);
    }
}
