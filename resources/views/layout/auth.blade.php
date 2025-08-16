<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
    <title>Login Page</title>
    <style>
        body, html {
            height: 100%;
            margin: 0;
        }
        .main {
            position: relative;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .back-video {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            z-index: -1;
        }
        .content {
            background: rgba(255, 255, 255, 0.322);
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
            z-index: 1;
            width: 60vh;
        }
    </style>
</head>
<body>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        @yield('konten')

        <video autoplay loop muted plays-inline class="back-video">
            <source src={{ asset ("gambar/waw.mp4") }} type="video/mp4">
        </video>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
