<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Field Spark - Add a new plant</title>
    <link rel="stylesheet" href="adminplant.css">
</head>
<body>
@include('Libraries.instructorplantstyle') 
    <div>
        @yield('nav')
    </div>
    <div class="container">
        @yield('form')
    </div>

    @include('scripts.plantscript') 
</body>
</html>
