@extends('layout/tampil')
@section('konten')

<!-- START FORM -->
 <form action='{{ url('update'.$data->id) }}' method='post'>

@method('PUT')
   @csrf
   <div class="my-3 p-3 bg-body rounded shadow-sm">
       <div class="mb-3 row">
           <label for="nim" class="col-sm-2 col-form-label">NIM</label>
           <div class="col-sm-10">
               <input type="number" class="form-control" value="{{ $data->nim }}" name='nim' id="nim">
           </div>
       </div>
       <div class="mb-3 row">
           <label for="nama" class="col-sm-2 col-form-label">Nama</label>
           <div class="col-sm-10">
               <input type="text" class="form-control" value="{{ $data->nama }}" name='nama' id="nama">
           </div>
       </div>
       <div class="mb-3 row">
           <label for="jurusan" class="col-sm-2 col-form-label">Jurusan</label>
           <div class="col-sm-10">
               <input type="text" class="form-control" value="{{ $data->jurusan }}" name='jurusan' id="jurusan">
           </div>
       </div>
       <div class="mb-3 row">
           <label for="jurusan" class="col-sm-2 col-form-label"></label>
           <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">SIMPAN</button></div>
       </div>
     </form>
   </div>
   <!-- AKHIR FORM -->

   @endsection
