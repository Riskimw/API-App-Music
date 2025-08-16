<?php

namespace App\Http\Controllers;

use App\Models\mahasiswa;
use App\Models\favorit;
use Illuminate\Http\Request;

class mahasisw_controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $katakunci=request('katakunci');
        $data=mahasiswa::where('nama_musik','like', "%$katakunci%") ->orderby('nama_musik','asc')->paginate(10);
        return view('mahasiswa.index')->with('data',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('mahasiswa.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_musik'=>'required|unique:mahasiswa,id_musik',
            'nama_musik'=>'required',
            'nama_artis'=>'required',
            'foto'=>'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'file_musik' => 'nullable|mimes:mp3,wav|max:10240' // max 10MB
        ],[
            'id_musik'=>'nim tidak boleh duplikat',
            'nama_musik'=>'nama tidak boleh kosong',
            'nama_artis'=>'jurusan tidak boleh kosong',
            'foto'=>'isian fotona',
            'file_musik'=>'isian fotona'
        ]);

         // Simpan foto ke folder public/gambar
        $fotoPath = $request->file('foto')->store('gambar', 'public');
        $musikPath = $request->file('file_musik')->store('musik', 'public');

        $data=[
            'id_musik'=>$request->id_musik,
            'file_musik'=>$request->file_musik,
            'nama_musik'=>$request->nama_musik,
            'nama_artis'=>$request->nama_artis,
            'foto'=>$fotoPath,
            'file_musik'=>$musikPath
        ];
        $data=mahasiswa::create($data);
        return redirect('index')->with('data',$data);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data=mahasiswa::find($id);
        return view('mahasiswa.edit')->with('data',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         $data=[
        'nama_artis'=>$request->nama_artis,
        'nama_musik'=>$request->nama_musik
         ];
         $data=mahasiswa::find($id)->update($data);
         return redirect('index')->with('sukses','berhasil mengupdate');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data= mahasiswa::find($id)->delete();
        return redirect('index')->with('data',$data);
    }
}
