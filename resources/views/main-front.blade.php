<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>@yield('title')</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="" rel="stylesheet">
</head>

<body>
   @yield('content')
</body>


 <footer style="padding: 10px; border-top: 1px solid #ccc; color: #444; text-align: center">

    <strong>Copyright &copy; 2020 IMAN NZ</strong> All rights
    reserved.
  </footer>


<!-- jQuery -->
<script src="/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="/demo.js"></script>

</body>
</html>
