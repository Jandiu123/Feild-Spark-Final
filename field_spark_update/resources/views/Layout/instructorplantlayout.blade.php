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
        @yield('navbar')
    </div>
    <div class="container">
        @yield('form')
    </div>

    @include('scripts.plantscript') 
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
<script>
$(document).ready(function () {
    // "Edit" Button
    $('.edit-plant').click(function () {
        var plantId = $(this).data('plant-id');
        
        // Redirect to the edit page for the selected plant
        window.location.href = '/plants/' + plantId + '/edit';
    });

    // "Delete" Button
    $('.delete-plant').click(function () {
        var plantId = $(this).data('plant-id');

        // Confirm deletion
        if (confirm('Are you sure you want to delete this plant?')) {
            // Send DELETE request via AJAX
            $.ajax({
                url: '/plants/' + plantId,
                type: 'POST',
                data: {
                    _method: 'DELETE',
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    alert('Plant deleted successfully!');
                    // Optionally, remove the plant row from the table
                    $('tr[data-plant-id="' + plantId + '"]').remove();
                },
                error: function(xhr) {
                    alert('Failed to delete the plant.');
                }
            });
        }
    });
});
</script>

</body>
</html>