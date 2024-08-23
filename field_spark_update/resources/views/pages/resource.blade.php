<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <title>Field Spark Agricultural Portal | Resource</title>
    <!-- Meta tags for responsive design and character set -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Germinate Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
    Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <!-- CSS links -->
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
    <link href="css/style-new.css" rel="stylesheet" type="text/css" media="all" />
    <link rel="stylesheet" href="assest/plantinfo.css">
    <link href="css/lsb.css" rel="stylesheet" type="text/css">
    <link href="css/font-awesome.css" rel="stylesheet">
    <link href="http://fonts.googleapis.com/css?family=Bree+Serif&amp;subset=latin-ext" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
</head>

<body>
    <!-- Banner Section -->
    <div class="banner1">
        <div class="container">
            <div class="w3_agileits_banner_main_grid">
                <div class="w3_agile_logo">
                    <h1><a href="{{ route('dashboard') }}"><span>F</span>ieldSpark<i>Grow healthy products</i></a></h1>
                </div>
                <div class="agileits_w3layouts_menu">
                    <div class="shy-menu">
                        <a class="shy-menu-hamburger">
                            <span class="layer top"></span>
                            <span class="layer mid"></span>
                            <span class="layer btm"></span>
                        </a>
                        <div class="shy-menu-panel">
                            <nav class="menu menu--horatio link-effect-8" id="link-effect-8">
                                <ul class="w3layouts_menu__list">
                                    <li class="active"><a href="{{ route('dashboard') }}">Home</a></li>
                                    <li><a href="{{ route('pages.appointment') }}">Appointments</a></li>
                                    <li><a href="{{ route('pages.discussion') }}">Discussion Forum</a></li>
                                    <li><a href="{{ route('pages.plantinfo') }}">Plants</a></li>
                                    <li><a href="{{ route('pages.resource') }}">Resources</a></li>
                                    <li class="dropdown">
                                        @auth
                                        <div class="profile-dropdown">
                                            <button class="profile-button">{{ Auth::user()->name }}</button>
                                            <div class="profile-menu">
                                                <a href="{{ route('profile.show') }}">Profile</a>
                                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                    @csrf
                                                </form>
                                            </div>
                                        </div>
                                        @endauth
                                    </li>
                                </ul>
                            </nav>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap Pop-up Modal -->
    <div class="modal video-modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    Germinate
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <section>
                    <div class="modal-body">
                        <img src="images/4.jpg" alt=" " class="img-responsive" />
                        <p>Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur.
                            <i>" Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur.</i>
                        </p>
                    </div>
                </section>
            </div>
        </div>
    </div>
    <!-- Breadcrumbs -->
    <div class="breadcrumbs">
        <div class="container">
            <div class="w3layouts_breadcrumbs_left">
                <ul>
                    <li><i class="fa fa-home" aria-hidden="true"></i><a href="{{ route('dashboard') }}">Dashboard</a><span>/</span></li>
                    <li><i class="fa fa-picture-o" aria-hidden="true"></i>Resources</li>
                </ul>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
    <!-- Search Box -->
    <div class="search-container">
        <input type="text" id="search-box" placeholder="Search by title..." />
        <button id="search-btn">Search</button>
    </div>
    <!-- News Section -->
    <div class="welcome">
        <div class="container">
            <h3 class="agileits_w3layouts_head">Latest <span>Resources</span> List</h3>
            <div class="w3_agile_image">
                <img src="images/1.png" alt=" " class="img-responsive">
            </div>
            <p class="agile_para">Discover your Knowledge with our diverse Resource collection. Perfect for every space, bringing life and tranquility to your home</p>
            <div class="w3ls_news_grids" id="newsContainer">
                <!-- Resources will be dynamically added here -->
            </div>
        </div>
    </div>
    <!-- Footer Section -->
    <div class="footer">
        <div class="container">
            <div class="w3agile_footer_grids">
                <div class="col-md-3 agileinfo_footer_grid">
                    <div class="agileits_w3layouts_footer_logo">
                        <h2><a href="{{ route('dashboard') }}"><span>F</span>eildSpark<i>Grow healthy products</i></a></h2>
                    </div>
                </div>
                <div class="col-md-4 agileinfo_footer_grid">
                    <h3>Contact Info</h3>
                    <h4>Call Us <span>+94 713300619</span></h4>
                    <p>Field Spark, No.78, Main Road, Kegalle. <span>71000 Sri Lanka.</span></p>
                    <ul class="agileits_social_list">
                        <li><a href="#" class="w3_agile_facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                        <li><a href="#" class="agile_twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                        <li><a href="#" class="w3_agile_dribble"><i class="fa fa-dribbble" aria-hidden="true"></i></a></li>
                        <li><a href="#" class="w3_agile_vimeo"><i class="fa fa-vimeo" aria-hidden="true"></i></a></li>
                    </ul>
                </div>
                <div class="col-md-2 agileinfo_footer_grid agileinfo_footer_grid1">
                    <h3>Navigation</h3>
                    <ul class="w3layouts_footer_nav">
                        <li><a href="/"><i class="fa fa-long-arrow-right" aria-hidden="true"></i>Home</a></li>
                        <li><a href="/aboutus"><i class="fa fa-long-arrow-right" aria-hidden="true"></i>About Us</a></li>
                        <li><a href="/services"><i class="fa fa-long-arrow-right" aria-hidden="true"></i>Services</a></li>
                        <li><a href="/contactus"><i class="fa fa-long-arrow-right" aria-hidden="true"></i>Contact Us</a></li>
                    </ul>
                </div>
                <div class="col-md-3 agileinfo_footer_grid">
                    <h3>Blog Posts</h3>
                    <div class="agileinfo_footer_grid_left">
                        <a href="#" data-toggle="modal" data-target="#myModal"><img src="images/6.jpg" alt=" " class="img-responsive" /></a>
                    </div>
                    <div class="agileinfo_footer_grid_left">
                        <a href="#" data-toggle="modal" data-target="#myModal"><img src="images/2.jpg" alt=" " class="img-responsive" /></a>
                    </div>
                    <div class="agileinfo_footer_grid_left">
                        <a href="#" data-toggle="modal" data-target="#myModal"><img src="images/5.jpg" alt=" " class="img-responsive" /></a>
                    </div>
                    <div class="agileinfo_footer_grid_left">
                        <a href="#" data-toggle="modal" data-target="#myModal"><img src="images/3.jpg" alt=" " class="img-responsive" /></a>
                    </div>
                    <div class="clearfix"> </div>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
        <div class="w3_agileits_footer_copy">
            <div class="container">
                <p>Field Spark 2024</p>
                <p>&copy; Powered by 4GBx</p>
            </div>
        </div>
    </div>

	<!-- JS links -->
    <script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>

	<!-- External Scripts-->
	<script type="application/x-javascript">
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <!-- Menu Script -->
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
    <!-- Smooth Scrolling -->
    <script type="text/javascript" src="js/move-top.js"></script>
    <script type="text/javascript" src="js/easing.js"></script>
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            $(".scroll").click(function(event) {
                event.preventDefault();
                $('html,body').animate({
                    scrollTop: $(this.hash).offset().top
                }, 1000);
            });
        });
    </script>
    <!-- Bootstrap JS -->
    <script src="js/bootstrap.js"></script>
    <!-- Scroll to Top -->
    <script type="text/javascript">
        $(document).ready(function() {
            $().UItoTop({
                easingType: 'easeOutQuart'
            });
        });
    </script>
    <!-- Resource Fetching and Rendering Script -->
    <script>
        $(document).ready(function() {
            // Function to fetch and render resources
            function fetchResources() {
                $.ajax({
                    url: '/api/resources',
                    method: 'GET',
                    success: function(resources) {
                        renderResources(resources);

                        // Handle search functionality
                        $('#search-btn').click(function() {
                            const searchTerm = $('#search-box').val().toLowerCase();
                            filterResources(searchTerm, resources);
                        });

                        // Optional: Add a keyup event to search as you type
                        $('#search-box').on('keyup', function() {
                            $('#search-btn').click();
                        });
                    },
                    error: function(error) {
                        console.error('Error fetching resources:', error);
                    }
                });
            }

            // Function to render resources
            function renderResources(resources) {
                const container = $('#newsContainer');
                container.empty(); // Clear existing content

                resources.forEach(resource => {
                    const resourceHTML = `
                        <div class="col-md-4 w3ls_news_grid ">
                            <div class="w3layouts_news_grid">
                                <img src="${resource.image ? '/storage/' + resource.image : 'images/placeholder.jpg'}" alt=" " class="img-responsive image-grid"/>
                                <div class="w3layouts_news_grid_pos">
                                    <div class="wthree_text"><h3>${resource.title}</h3></div>
                                </div>
                            </div>
                            <div class="agileits_w3layouts_news_grid">
                                <ul>
                                    <li><i class="fa fa-calendar" aria-hidden="true"></i>${new Date(resource.created_at).toLocaleDateString()}</li>
                                    <li><i class="fa fa-user" aria-hidden="true"></i><a href="#">Instructor</a></li>
                                </ul>
                                <h4><a href="#" data-toggle="modal" data-target="#myModal">${resource.title}</a></h4>
                                <p>${resource.description}</p>
                            </div>
                        </div>
                    `;
                    container.append(resourceHTML);
                });
            }

            // Function to filter resources based on search term
            function filterResources(searchTerm, resources) {
                const filteredResources = resources.filter(resource =>
                    resource.title.toLowerCase().includes(searchTerm)
                );
                renderResources(filteredResources);
            }

            // Call the function to fetch and render resources on page load
            fetchResources();
        });
    </script>
    <!-- Crisp Chat Integration -->
    <script type="text/javascript">
        window.$crisp = [];
        window.CRISP_WEBSITE_ID = "b48ca7c7-c3fc-4bf5-acf7-c6bbc1bc1e37";
        (function() {
            d = document;
            s = d.createElement("script");
            s.src = "https://client.crisp.chat/l.js";
            s.async = 1;
            d.getElementsByTagName("head")[0].appendChild(s);
        })();
    </script>
</body>

</html>
