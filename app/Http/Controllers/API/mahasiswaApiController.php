<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\mahasiswa;
use Illuminate\Http\Request;

class mahasiswaApiController extends Controller
{

     // Ambil semua data mahasiswa
     public function index()
     {
         $data = Mahasiswa::all();
         return response()->json($data, 200);
     }


    public function store(Request $request)
    {
        $request->validate([
            'id_musik'=>'required|unique:mahasiswa,id_musik',
            'nama_musik'=>'required',
            'nama_artis'=>'required',
            'foto'=>'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'file_musik' => 'nullable|mimes:mp3,wav|max:20240'
        ],[
            'id_musik'=>'nim tidak boleh duplikat',
            'nama_musik'=>'nama tidak boleh kosong',
            'nama_artis'=>'jurusan tidak boleh kosong',
            'foto'=>'isian fotona',
            'file_musik'=>'isian musikna'
        ]);

          // Simpan foto ke folder public/gambar
          $fotoPath = $request->file('foto')->store('gambar', 'public');

          $musikPath = $request->file('file_musik')->store('musik', 'public');



        $data=[
            'id_musik'=>$request->id_musik,
            'nama_musik'=>$request->nama_musik,
            'nama_artis'=>$request->nama_artis,
            'foto'=>$fotoPath,
            'file_musik'=>$musikPath
        ];
        $data=mahasiswa::create($data);
          // Kembalikan response dalam format JSON
          return response()->json([
            'message' => 'Musik berhasil ditambahkan',
            'data' => $data
        ]);

    }


    public function update(Request $request, string $id)
    {
         $data=[
        'nama_musik'=>$request->nama_musik,
        'nama_artis'=>$request->nama_artis
         ];
         $data=mahasiswa::find($id)->update($data);

         //buat munculin data yang udah di updatenya
         $hasilUpdate=mahasiswa::find($id);

         return response()->json([
            'messege'=>'berhasil di update',
            'data' => $hasilUpdate
         ]);
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data= mahasiswa::find($id)->delete();
        return response()->json([
            'mesege'=>'data berhasil dihapus',
            'data'=>$data
        ]);
    }
}
