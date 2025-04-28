<!DOCTYPE html>
<html lang="en">
<head>
  @include ('user/head')
</head>
<body>

  @include ('user/header')

  @yield('content')

  @include ('user/footer')
</body>
</html>