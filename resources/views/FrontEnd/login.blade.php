<!DOCTYPE html>
<html lang="en" >
<head>
    <meta charset="utf-8" />
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Admin Dashboard" name="description" />
    <meta content="Decent Web Services LLP" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ url('/') }}/public/assets/images/favicon.ico">
    <link rel="stylesheet" href="{{ url('/') }}/public/assets/login/style.css">

</head>
<body>
<!-- partial:index.partial.html -->
<section>

  <div class="box">

    <div class="square" style="--i:0;"></div>
    <div class="square" style="--i:1;"></div>
    <div class="square" style="--i:2;"></div>
    <div class="square" style="--i:3;"></div>
    <div class="square" style="--i:4;"></div>
    <div class="square" style="--i:5;"></div>

   <div class="container">
    <div class="form">
    <img src="{{ url('/') }}/public/assets/uploads/master/logo/logo.png" style="width:251px">
      <h2 style="text-align:center;">LOGIN</h2>

      <form action="{{ route("login.FrontEnd_login") }}" name="loginForm" id="loginForm" method="post">
        @csrf
        <div class="inputBx">
          <input type="text" name="email" id="username" required="required">
          <span>Login</span>
          <img src="{{ url('/') }}/public/assets/user.png" alt="user">
        </div>
        <div class="inputBx password">
          <input id="password-input" type="password" name="password" required="required">
          <span>Password</span>
          <a href="#" class="password-control" onclick="return show_hide_password(this);"></a>
          <img src="{{ url('/') }}/public/assets/reset-password.png" alt="lock">
        </div>
        <div class="inputBx">
          <input type="submit" value="Log in" >
        </div>
        <div class="px-3 py-0 my-0">
                </div>
      </form>
    </div>
  </div>

  </div>
</section>
<!-- partial -->
  <script  src="{{ url('/') }}/public/assets/login/script.js"></script>

</body>
</html>
