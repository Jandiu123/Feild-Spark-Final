<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body >

@include('Libraries.style') 
<div class="background23">
      @yield('nav')
</div>

<div class="background99">
      @yield('background')
</div>

<footer>
      @yield('footer')
</footer>

</body>
</html>