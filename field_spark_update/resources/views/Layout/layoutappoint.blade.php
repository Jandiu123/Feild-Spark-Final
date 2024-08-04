<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment Form</title>
</head>
<body>
    @include('Libraries.appointmentstyle')
    <div class="banner1">
		<div class="container">
           @yield('navbar')
        </div>
    </div>
    <!-- breadcrumbs -->
	<div class="breadcrumbs">
		<div class="container">
			@yield('breadcrumbs')
		</div>
	</div>
    <!-- //breadcrumbs -->
    <div class="container">
        <div class="card">
            @yield('form')
        </div>
    </div>
    <div class="footer">
		@yield('footer')
	</div>
    <!-- JavaScript Libraries -->
    @include('scripts.dashscripts')
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

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Fetch instructors data via AJAX
        fetch('/api/instructors')
            .then(response => response.json())
            .then(instructors => {
                const dropdown = document.getElementById('instructorDropdown');

                // Populate dropdown with instructor data
                instructors.forEach(instructor => {
                    const option = document.createElement('option');
                    option.value = instructor.id;
                    option.textContent = instructor.name;
                    dropdown.appendChild(option);
                });
            })
            .catch(error => {
                console.error('Error fetching instructors:', error);
            });
    });
</script>
</body>
</html>
