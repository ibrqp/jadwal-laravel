<?php

namespace App\Http\Controllers;

use Validator;
use pagination;
use App\Models\guru;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GuruController extends Controller
{
    public function index()
    {
        $gurus = guru::paginate(10);
        return view("guru.index", compact("gurus"));
    }

    public function create()
    {
        return view("guru.create");
    }
    public function destroy(Guru $guru)
    {
        $guru->delete();
        return redirect(route('guru.index'))->with("success", "Data Berhasil Di Hapus");
    }

    public function edit(Guru $guru)
    {
        return view("guru.edit", compact("guru"));
    }
    public function update(Request $request, Guru $guru)
    {
        $this->validate($request, [
            'no_hp' => 'required|min:10',
            'nama' => 'required|min:5',
            'foto' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        

        //check if image is uploaded
        if ($request->hasFile('foto')) {
            
            $image = $request->file('foto');
            $image->storeAs('public/guru', $image->hashName());

            //delete old image
            Storage::delete('public/guru/' . $guru->foto);

            //update post with new image
            $guru->update([
                'foto' => $image->hashName(),
                'nama' => $request->nama,
                'no_hp' => $request->no_hp
            ]);

        } else {
            //update post without image
            $guru->update([
                'nama' => $request->nama,
                'no_hp' => $request->no_hp
            ]);
        }

        //redirect to index
        return redirect()->route('guru.index')->with(['success' => 'Data Berhasil Diubah!']);

    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'no_hp' => 'required|min:10',
            'nama' => 'required|min:5',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        $image = $request->file('foto');
        $image->storeAs('public/guru', $image->hashName());

        //create post
        guru::create([
            'foto' => $image->hashName(),
            'nama' => $request->nama,
            'no_hp' => $request->no_hp
        ]);

        //redirect to index
        return redirect()->route('guru.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }


}





















