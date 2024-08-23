<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="Germinate Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design">
    <title>Field Spark Agricultural Portal | Plants</title>
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all">
    <link rel="stylesheet" href="assest/plantinfo.css">
    <link href="css/lsb.css" rel="stylesheet" type="text/css">
    <link href="css/font-awesome.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Bree+Serif&subset=latin-ext" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic" rel="stylesheet" type="text/css">
    <script src="js/jquery-2.1.4.min.js"></script>
</head>
<body>
    <!-- Banner -->
    <div class="banner1">
        <div class="container">
            <div class="w3_agileits_banner_main_grid">
                <div class="w3_agile_logo">
                    <h1><a href="/"><span>F</span>ieldSpark<i>Grow healthy products</i></a></h1>
                </div>
                <div class="agile_social_icons_banner">
                    <ul class="agileits_social_list">
                        <li><a href="#" class="w3_agile_facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                        <li><a href="#" class="agile_twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                        <li><a href="#" class="w3_agile_dribble"><i class="fa fa-dribbble" aria-hidden="true"></i></a></li>
                        <li><a href="#" class="w3_agile_vimeo"><i class="fa fa-vimeo" aria-hidden="true"></i></a></li>
                    </ul>
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
                                    <li class="active"><a href="/">Home</a></li>
                                    <li><a href="/aboutus">About Us</a></li>
                                    <li><a href="/services">Services</a></li>
                                    <li><a href="/plants">Plants</a></li>
                                    <li><a href="/contactus">Contact Us</a></li>
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Account <span class="caret"></span></a>
                                        <ul class="dropdown-menu">
                                            <li><a href="/login">Login</a></li>
                                            <li><a href="/register">Signup</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Breadcrumbs -->
    <div class="breadcrumbs">
        <div class="container">
            <div class="w3layouts_breadcrumbs_left">
                <ul>
                    <li><i class="fa fa-home" aria-hidden="true"></i><a href="/">Home</a><span>/</span></li>
                    <li><i class="fa fa-picture-o" aria-hidden="true"></i>Plants</li>
                </ul>
            </div>
            <div class="w3layouts_breadcrumbs_right">
                <h2>Plants</h2>
            </div>
        </div>
    </div>

    <!-- Gallery -->
    <div class="welcome">
        <div class="container">
            <h3 class="agileits_w3layouts_head">Our <span>Plants Collection</span></h3>
            <div class="w3_agile_image">
                <img src="images/1.png" alt=" " class="img-responsive">
            </div>
            <p class="agile_para">Discover the beauty of nature with our diverse plant collection. Perfect for every space, bringing life and tranquility to your home</p>
            <div class="w3layouts_gallery_grids">
                @foreach($plants as $newpage => $plant)
                <div class="col-md-4 w3layouts_gallery_grid" data-index="{{ $newpage }}">
                    <a href="{{ $plant->image ? asset('storage/' . $plant->image) : 'assest/plantt.png' }}" class="lsb-preview" data-lsb-group="header">
                        <div class="w3layouts_news_grid">
                            <img src="{{ $plant->image ? asset('storage/' . $plant->image) : 'assest/plantt.png' }}" alt="{{ $plant->name }}" class="img-responsive image-grid">
                            <div class="w3layouts_news_grid_pos">
                                <div class="wthree_text"><h3>{{ $plant->name }}</h3></div>
                                @if(Auth::check())
                                    <a href="{{ route('pages.plantinfo') }}"><button class="learn-more">Read more</button></a>
                                @else
                                    <a href="{{ route('login') }}"><button class="learn-more">Read more</button></a>
                                @endif
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

    <!-- Footer -->
    <div class="footer">
        <div class="container">
            <div class="w3agile_footer_grids">
                <div class="col-md-3 agileinfo_footer_grid">
                    <div class="agileits_w3layouts_footer_logo">
					     <h2><a href="/"><span>F</span>eildSpark<i>Grow healthy products</i></a></h2>
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
                        <a href="#" data-toggle="modal" data-target="#myModal"><img src="images/6.jpg" alt=" " class="img-responsive"></a>
                    </div>
                    <div class="agileinfo_footer_grid_left">
                        <a href="#" data-toggle="modal" data-target="#myModal"><img src="images/2.jpg" alt=" " class="img-responsive"></a>
                    </div>
                    <div class="agileinfo_footer_grid_left">
                        <a href="#" data-toggle="modal" data-target="#myModal"><img src="images/5.jpg" alt=" " class="img-responsive"></a>
                    </div>
                    <div class="agileinfo_footer_grid_left">
                        <a href="#" data-toggle="modal" data-target="#myModal"><img src="images/3.jpg" alt=" " class="img-responsive"></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="w3_agileits_footer_copy">
            <div class="container">
                <p>Field Spark 2024</p>
                <p>&copy; Powered by 4GBx</p>
            </div>
        </div>
    </div>

	<!-- Menu Script -->
    <script>
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
    </script>
    <!-- End Menu Script -->

    <!-- External JS -->
    <script src="js/lsb.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/move-top.js"></script>
    <script src="js/easing.js"></script>
    <script src="js/custom.js"></script>
    <script>
        $(window).load(function() {
            $.fn.lightspeedBox();
        });

        $(document).ready(function() {
            $(".scroll").click(function(event) {
                event.preventDefault();
                $('html,body').animate({scrollTop: $(this.hash).offset().top}, 1000);
            });

            $().UItoTop({ easingType: 'easeOutQuart' });

            $('.learn-more').click(function() {
                var newpage = $(this).data('newpage');
                var plant = @json($plants);

                if (plant[newpage]) {
                    $('#modalName').text(plant[newpage].name);
                    $('#modalOrigin').text('Origin: ' + plant[newpage].origin);
                    $('#modalCare').text('Care: ' + plant[newpage].care);
                    $('#modalDescription').text('Description: ' + plant[newpage].description);

                    $('#plantModal').show();
                }
            });

            $('.close').click(function() {
                $('#plantModal').hide();
            });

            $(window).click(function(event) {
                if (event.target == $('#plantModal')[0]) {
                    $('#plantModal').hide();
                }
            });
        });
    </script>
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
