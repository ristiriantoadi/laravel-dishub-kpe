<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>LOGIN</title>
    <link rel="stylesheet" href="HalLogin/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="HalLogin/fonts/ionicons.min.css">
    <link rel="stylesheet" href="HalLogin/css/Footer-Basic.css">
    <link rel="stylesheet" href="HalLogin/css/Login-Form-Clean.css">
    <link rel="stylesheet" href="HalLogin/css/styles.css">
</head>

<body>
    <div class="login-clean"
        style="background:url('home/img/tesaja.jpg')no-repeat center center;background-size:cover;">
        <form method="post" action="/postlogin">
            <h2 class="sr-only">Login Form</h2>
            <div class="illustration">
                <img src="HalLogin/img/loglogin.png" width="140px" height="140px">
            </div>
            @csrf
            <div class="form-group"><input class="form-control" type="email" name="email" placeholder="Email">
            </div>
            <div class="form-group"><input class="form-control" type="password" name="password" placeholder="Password">
            </div>
            <div class="form-group">
                <button class="btn btn-primary btn-block" type="submit">Log In</button>
            </div>
            <a class="forgot" href="{{ url('/') }}">Kembali</a>
        </form>
    </div>
    <div class="footer-basic">
        <footer>
            <ul class="list-inline">
                <li class="list-inline-item"><a href="mailto:dishub@ntbprov.go.id">Email</a></li>
                <li class="list-inline-item"><a href="https://goo.gl/maps/7U3hXEdQuvwH77VC8">Alamat</a></li>
            </ul>
            <p class="copyright">Dinas Perhubungan NTB © 2020</p>
        </footer>
    </div>
    <script src="HalLogin/js/jquery.min.js"></script>
    <script src="HalLogin/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>