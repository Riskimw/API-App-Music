@extends('layout/auth')
@section('konten')

{{-- <div class="alert-sukses">Registrasi berhasil</div> --}}
@if (session('sukses'))
<div class="alert-sukses">
    {{ session('sukses') }}
</div>
@endif
<div class="main">
    <div class="content">
        <h2 class="text-center">Login</h2>
        <form method="POST" action="{{ url('proses') }}">
            @csrf
            <div class="form-group">
                <label for="email" >Email</label>
                <input type="text" name="email" class="form-control" required placeholder="Masukan Email..." value="{{ old('email') }}">
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control" id="password" placeholder="Masukan password..." required>
            </div>
            <button type="submit" name="submit" class="btn btn-primary btn-block">Login</button>
            <div>
                <a href="{{ url('register') }}">Belum punya akun?</a>
            </div>
            @if ($errors->has('login'))
            <li style="list-style: none; text-align:center; color:red">
                {{ $errors->first('login') }}
            </li>
                    @endif
                </div>
            </div>
        </form>

        <script>
            $(document).ready(function(){
                setTimeout(function(){
                    $(".alert-sukses").fadeOut("slow");
                }, 3000); // 3000ms = 3 detik
            });
        </script>


@endsection




