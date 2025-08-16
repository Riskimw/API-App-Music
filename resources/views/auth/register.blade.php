@extends('layout/auth')
@section('konten')


<div class="main">

    <div class="content">
        <h2 class="text-center">Register</h2>
        <form method="post" action="{{ url('prosesreg') }}">
            @csrf
            <div class="form-group">
                <label for="username">Nama Lengkap</label>
                <input type="text" name="name" class="form-control" id="username" placeholder="buat username" required value="{{ old('name') }}">
            </div>

            <div class="form-group">
                <label for="email" >Email</label>
                <input type="text" name="email" class="form-control" required placeholder="Buat email..." value="{{ old('email') }}">
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control" id="password" placeholder="Buat password" required>
            </div>
            <button type="submit" name="submit" class="btn btn-primary btn-block">Login</button>
            <div>
                <a href="{{ url('login') }}">Sudah punya akun?</a>
            </div>
        </form>
        @if ($errors->any())
<li style="list-style: none; text-align:center; color:red">
    {{ $errors->first() }}
</li>
        @endif
    </div>
</div>
@endsection
