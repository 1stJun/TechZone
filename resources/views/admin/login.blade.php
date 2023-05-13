<!DOCTYPE html>
<html lang="en">

<head>
    <base href="{{ asset('/') }}">
    <link rel="stylesheet" href="admin/assets/css/login.css">
    <title>Login | Dashboard</title>
</head>

<body>
    <section style="background-image: url(admin/assets/img/background.png);">
        <div class="form-box">
            <div class="form-value">
                <form method="POST" action="">
                    @csrf
                    <h2>Login</h2>
                    @if (Session::has('fail'))
                        <p>{{ Session::get('fail') }}</p>
                    @endif
                    <div class="inputbox">
                        <ion-icon name="mail-outline"></ion-icon>
                        <input type="text" autocomplete="off" required name="username" value="{{ old('username') }}">
                        <label for="">Username</label>
                    </div>
                    <div class="inputbox">
                        <ion-icon name="lock-closed-outline"></ion-icon>
                        <input type="password" required name="password">
                        <label for="">Password</label>
                    </div>
                    <button type="submit">Log in</button>
                </form>
            </div>
        </div>
    </section>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>
