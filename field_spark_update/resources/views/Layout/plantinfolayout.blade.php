<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Field Spark</title>
</head>
<body>
@include('Libraries.plantstyle') 
    <div>
        @yield('nav')
    </div>
    <main>
        @yield('product')
    </main>

    @stack('scripts')

    @stack('search')
</body>
</html>


