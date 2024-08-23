<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Field Spark Agricultural Portal | Plants Info</title>
    <meta name="keywords" content="Germinate Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
    <link href="css/style-new.css" rel="stylesheet" type="text/css" media="all" />
    <link rel="stylesheet" href="assest/plantinfo.css">
    <link href="css/lsb.css" rel="stylesheet" type="text/css">
    <link href="css/font-awesome.css" rel="stylesheet">
    <link href="http://fonts.googleapis.com/css?family=Bree+Serif&amp;subset=latin-ext" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
    <script src="js/jquery-2.1.4.min.js"></script>
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
                        <div class="clearfix"></div>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>

    <!-- Breadcrumbs Section -->
    <div class="breadcrumbs">
        <div class="container">
            <div class="w3layouts_breadcrumbs_left">
                <ul>
                    <li><i class="fa fa-home" aria-hidden="true"></i><a href="{{ route('dashboard') }}">Dashboard</a><span>/</span></li>
                    <li><i class="fa fa-picture-o" aria-hidden="true"></i>Plants</li>
                </ul>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>

    <!-- Search Container -->
    <div class="search-container">
        <input type="text" id="searchInput" placeholder="Search by name or origin">
        <button id="searchButton">Search</button>
    </div>

    <!-- Plants Collection Section -->
    <div class="welcome">
        <div class="container">
            <h3 class="agileits_w3layouts_head">Our <span>Plants Collection</span></h3>
            <div class="w3_agile_image">
                <img src="images/1.png" alt=" " class="img-responsive" />
            </div>
            <p class="agile_para">Discover the beauty of nature with our diverse plant collection. Perfect for every space, bringing life and tranquility to your home</p>

            <div class="w3layouts_gallery_grids">
                @foreach($plants as $index => $plant)
                <div class="col-md-4 w3layouts_gallery_grid" data-index="{{ $index }}" data-origin="{{ $plant->origin }}">
                    <a href="{{ $plant->image ? asset('storage/' . $plant->image) : 'assest/plantt.png' }}" class="lsb-preview" data-lsb-group="header">
                        <div class="w3layouts_news_grid">
                            <img src="{{ $plant->image ? asset('storage/' . $plant->image) : 'assest/plantt.png' }}" alt="{{ $plant->name }}" class="img-responsive image-grid">
                            <div class="w3layouts_news_grid_pos">
                                <div class="wthree_text">
                                    <h3>{{ $plant->name }}</h3>
                                </div>
                                <button class="learn-more" data-index="{{ $index }}">Read more</button>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Modal Structure -->
    <div id="plantModal" class="modal" style="display: none;">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2 id="modalName"></h2>
            <p id="modalOrigin"></p>
            <p id="modalCare"></p>
            <p id="modalDescription"></p>
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
                    <div class="clearfix"></div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <div class="w3_agileits_footer_copy">
            <div class="container">
                <p>Field Spark 2024</p>
                <p>&copy; Powered by 4GBx</p>
            </div>
        </div>
    </div>

    <!-- External Scripts -->
    <script src="js/lsb.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/move-top.js"></script>
    <script src="js/easing.js"></script>

    <!-- Custom Scripts -->
    <script>
        // Initialize LightSpeedBox
        $(window).load(function () {
            $.fn.lightspeedBox();
        });

        // Initialize Dropdown Menus
        $(function () {
            initDropDowns($("div.shy-menu"));
        });

        function initDropDowns(allMenus) {
            allMenus.children(".shy-menu-hamburger").on("click", function () {
                var thisTrigger = jQuery(this),
                    thisMenu = thisTrigger.parent(),
                    thisPanel = thisTrigger.next();

                if (thisMenu.hasClass("is-open")) {
                    thisMenu.removeClass("is-open");
                } else {
                    allMenus.removeClass("is-open");
                    thisMenu.addClass("is-open");
                    thisPanel.on("click", function (e) {
                        e.stopPropagation();
                    });
                }
                return false;
            });
        }

        // Document Ready Function
        $(document).ready(function () {
            // "Learn More" Button Click Event
            $('.learn-more').click(function () {
                var index = $(this).data('index');
                var plant = @json($plants);

                if (plant[index]) {
                    $('#modalName').text(plant[index].name);
                    $('#modalOrigin').text('Origin: ' + plant[index].origin);
                    $('#modalCare').text('Care: ' + plant[index].care);
                    $('#modalDescription').text('Description: ' + plant[index].description);

                    $('#plantModal').show();
                }
            });

            // Close Modal
            $('.close').click(function () {
                $('#plantModal').hide();
            });

            // Close Modal on Outside Click
            $(window).click(function (event) {
                if (event.target == $('#plantModal')[0]) {
                    $('#plantModal').hide();
                }
            });

            // Filter Plants Function
            function filterPlants() {
                var query = $('#searchInput').val().toLowerCase();

                $('.w3layouts_gallery_grid').each(function () {
                    var plantName = $(this).find('img').attr('alt').toLowerCase();
                    var plantOrigin = $(this).data('origin').toLowerCase();

                    var nameMatch = plantName.includes(query);
                    var originMatch = plantOrigin.includes(query);

                    if (nameMatch || originMatch) {
                        $(this).show();
                    } else {
                        $(this).hide();
                    }
                });
            }

            // Filter Plants on Keyup Event
            $('#searchInput').on('keyup', filterPlants);

            // Filter Plants on Button Click
            $('#searchButton').on('click', filterPlants);
        });

        // Crisp Chat Integration
        window.$crisp = [];
        window.CRISP_WEBSITE_ID = "b48ca7c7-c3fc-4bf5-acf7-c6bbc1bc1e37";
        (function () {
            d = document;
            s = d.createElement("script");
            s.src = "https://client.crisp.chat/l.js";
            s.async = 1;
            d.getElementsByTagName("head")[0].appendChild(s);
        })();
    </script>
</body>

</html>
