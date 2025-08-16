 @extends('layout/tampil')
 @section('konten')

 <!-- START FORM -->
  <form action='{{ url('store') }}' method='post' enctype="multipart/form-data">
    @csrf

    @if ($errors)
        <div>
            @foreach ($errors->all() as $error)
                <ul>
                    <li>
                        {{ $error }}
                    </li>
                </ul>
            @endforeach
        </div>
    @endif
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <div class="mb-3 row">
            <label for="nim" class="col-sm-2 col-form-label">NIM</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" name='id_musik' id="nim" value="{{ old('id_musik') }}">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="nama" class="col-sm-2 col-form-label">Nama</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='nama_musik' id="nama">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="jurusan" class="col-sm-2 col-form-label">Jurusan</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='nama_artis' id="jurusan">
            </div>
        </div>

        <div class="mb-3 row">
            <label for="jurusan" class="col-sm-2 col-form-label">Foto</label>
            <div class="col-sm-10">
                <input type="file" name="foto" accept="image/*" required>
            </div>
        </div>

        <div class="mb-3 row">
            <label for="jurusan" class="col-sm-2 col-form-label">file musik
            </label>
            <div class="col-sm-10">
                <input type="file" name="file_musik" required>
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
