<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Field Spark Discussion Forum - Farmers</title>
    <script>
        window.authUser = @json(auth()->user());
    </script>
</head>
<body>
    @include('Libraries.discussionstyle') 
    <div>
        @yield('nav')
    </div>
    <div class="forum-container">
       @yield('forum')
    </div>

    <div id="question-detail" class="question-detail hidden">
        @yield('question')
    </div>
    <footer>
       @yield('footer')
    </footer>
     <!-- JavaScript Libraries -->
     @include('scripts.scripts') 
</body>
</html>
