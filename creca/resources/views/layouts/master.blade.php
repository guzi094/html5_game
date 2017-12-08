<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
  

  <title>Creca</title>
  <script src="{{ asset('js/jquery.min.js') }}"></script>
  <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">  
  @yield('style')
</head>

<body>  
  <div class="container">
    @yield('content')
  </div>

  @yield('sub_content')
  
  @yield('script')
</body>

</html>