<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Field Spark Discussion Forum - Farmers</title>
   
</head>

<body>
    @include('Libraries.discussionstyle') 
	<div class="banner1">
		<div class="container3">
           @yield('navbar')
        </div>
</div>
<!-- breadcrumbs -->
<div class="breadcrumbs">
		<div class="container">
			<div class="w3layouts_breadcrumbs_left">
				<ul>
					<li><i class="fa fa-home" aria-hidden="true"></i><a href="{{ route('pages.instructordashboard') }}">Dashboard</a><span>/</span></li>
					<li><i class="fa fa-picture-o" aria-hidden="true"></i>Instructor Discussion Forum</li>
				</ul>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>

    <div class="forum-container">
       @yield('forum')
    </div>

    <div id="question-detail" class="question-detail hidden">
        @yield('question')
    </div>
    <!-- banner-bottom -->
	<div class="footer">
		@yield('footer')
	</div>
<!-- //banner-bottom -->
    
     <!-- JavaScript Libraries -->
     @include('scripts.instructorscripts') 
    <script>
		$(function() {
			
			initDropDowns($("div.shy-menu"));

		});

		function initDropDowns(allMenus) {

			allMenus.children(".shy-menu-hamburger").on("click", function() {
				
				var thisTrigger = jQuery(this),
					thisMenu = thisTrigger.parent(),
					thisPanel = thisTrigger.next();

				if (thisMenu.hasClass("is-open")) {

					thisMenu.removeClass("is-open");

				} else {			
					
					allMenus.removeClass("is-open");	
					thisMenu.addClass("is-open");
					thisPanel.on("click", function(e) {
						e.stopPropagation();
					});
				}
				
				return false;
			});
		}
	</script>
<!-- //menu -->
</body>
</html>
