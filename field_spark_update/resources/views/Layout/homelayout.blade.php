
<!DOCTYPE html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
<title>Germinate an Agriculture Category Flat Bootstrap Responsive Website Template | Home </title>
<!-- custom-theme -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Germinate Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
@stack('head')
</head>
	
<body>
@stack('body')
<body>
@include('Libraries.homestyle')
<!-- banner -->
	<div class="banner">
		<div class="container">
			@yield('banner')
		</div>
	</div>
<!-- banner -->
<!---728x90--->

<!-- bootstrap-pop-up -->
	<div class="modal video-modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModal">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				@yield('bootstrap')
			</div>
		</div>
	</div>
<!-- //bootstrap-pop-up -->
<!-- banner-bottom -->
	<div class="banner-bottom">
		@yield('banner-bottom')
	</div>
<!-- //banner-bottom -->
<!---728x90--->

<!-- welcome -->
	<div class="welcome">
		@yield('welcome')
	</div>
<!-- //welcome -->
<!-- welcome-bottom -->
	<div id="welcome_bottom" class="welcome-bottom">
		@yield('welcome-bottom')
	</div>
<!-- //welcome-bottom -->
<!-- news -->
	<div class="welcome">
		<div class="container">
		    @yield('news')
		</div>
	</div>
<!-- //news -->
<!-- newsletter -->
	<div class="newsletter">
		<div class="container">
			@yield('newsletter')
		</div>
	</div>
<!-- //newsletter -->
<!-- footer -->
	<div class="footer">
		@yield('footer')
	</div>
<!-- //footer -->
<!-- stats -->
	
@stack('stats')
<!-- //stats -->
<!-- mislider -->
	
@stack('mislider')
<!-- //mislider -->
<!-- text-effect -->
		
@stack('text')
<!-- //text-effect -->
<!-- menu -->
@stack('menu')
<!-- //menu -->
<!-- start-smoth-scrolling -->

@stack('start-script')
<!-- start-smoth-scrolling -->
<!-- for bootstrap working -->
	
<!-- //for bootstrap working -->
<!-- here stars scrolling icon -->
@stack('scrolling')

@include('scripts.homescript')
<!-- //here ends scrolling icon -->
</body>

</html>