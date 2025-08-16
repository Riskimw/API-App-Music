@extends('layout/tampil')
@section('konten')

@if (session('suksesl'))
<div class="alert-sukses">
    {{ session('suksesl') }}
</div>
@endif
        <!-- START DATA -->
        <div class="my-3 p-3 bg-body rounded shadow-sm">
            <form action="{{ url('logout') }}" method="POST">
                @csrf
                <button name="logout" class="btn btn-danger">Logout</button>
            </form>


                <!-- FORM PENCARIAN -->
                <div class="pb-3">
                  <form class="d-flex" action="" method="get">
                      <input class="form-control me-1" type="search" name="katakunci" value="{{ Request::get('katakunci') }}" placeholder="Masukkan kata kunci" aria-label="Search">
                      <button class="btn btn-secondary" type="submit">Cari</button>
                  </form>
                </div>

                <!-- TOMBOL TAMBAH DATA -->
                <div class="pb-3">
                  <a href='{{ url('create') }}' class="btn btn-primary">+ Tambah Data</a>
                </div>

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th class="col-md-1">No</th>
                            <th class="col-md-1">Id Musik</th>
                            <th class="col-md-3">file</th>
                            <th class="col-md-3">Musik</th>
                            <th class="col-md-2">Artis</th>
                            <th class="col-md-2">Foto</th>
                            <th class="col-md-1">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $i=1;
                        @endphp
                        @foreach ($data as $item)
                        @method('PUT')

                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $item->id_musik }}</td>
                            <td>{{ $item->file_musik }}</td>
                            <td>{{ $item->nama_musik }}</td>
                            <td>{{ $item->nama_artis }}</td>
                            <td>
                                <img src="{{asset('storage/' . $item->foto) }}" width="100">
                            </td>
                            <td>
                                <a href='{{ url('edit'.$item->id) }}' class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ url('delete'.$item->id) }}" class="d-inline" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm">
                                        Del
                                    </button>
                                </form>
                            </td>
                        </tr>

                        @endforeach
                    </tbody>
                </table>

          </div>
          <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
          <script>
            $(document).ready(function(){
                setTimeout(function(){
                    $(".alert-sukses").fadeOut();
                }, 3000);
            })
          </script>
          @endsection
