@extends('Layout.instructordashlayout')

@section('nav')
<nav>
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
									<li><a href="/aboutus">Appointments</a></li> 
									<li><a href="{{ route('pages.idiscussion') }}">Discussion Forum</a></li>
									<li><a href="{{ route('pages.instructorplant') }}">Plants</a></li> 
									<li><a href="/contactus">Resources</a></li>
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
</nav>
    <div class="content">
        <h1>Welcome To The Place Where Natural Beauty Born</h1>
        <p>Field Spark empowers farmers with cutting-edge technology, offering real-time data, expert guidance,<br> and sustainable solutions to boost agricultural productivity.</p>
        <div>
              <button type="button"><span></span>Check Appoinments</button>
              <button type="button"><span></span>Manage plant informations</button>
        </div> 

    </div>
@endsection

@section('background')
			<h3 class="agileits_w3layouts_head agileinfo_head w3_head"><span>What</span> we do</h3>
			<div class="w3_agile_image">
				<img src="images/17.png" alt=" " class="img-responsive-new">
			</div>
			<p class="agile_para agileits_para">Morbi viverra lacus commodo felis semper, eu iaculis lectus nulla at sapien blandit sollicitudin.</p>
			<div class="w3ls_news_grids">
				<div class="col-md-4 w3_agileits_services_bottom_grid">
					<div class="wthree_services_bottom_grid1">
						<img src="images/5.jpg" alt=" " class="img-responsive" />
						<div class="wthree_services_bottom_grid1_pos">
							<h4>Fertilizing</h4>
						</div>
					</div>
					<div class="agileinfo_services_bottom_grid2">
						<p>Quisque faucibus scelerisque eros, molestie tristique lacus posuere in.Quisque faucibus scelerisque eros, molestie tristique lacus posuere in.</p>
						<!-- <div class="agileits_w3layouts_learn_more hvr-radial-out">
							<a href="#" data-toggle="modal" data-target="#myModal">Read More</a>
						</div> -->
					</div>
				</div>
				<div class="col-md-4 w3_agileits_services_bottom_grid">
					<div class="wthree_services_bottom_grid1">
						<img src="images/6.jpg" alt=" " class="img-responsive" />
						<div class="wthree_services_bottom_grid1_pos">
							<h4>Soil Testing</h4>
						</div>
					</div>
					<div class="agileinfo_services_bottom_grid2">
						<p>Quisque faucibus scelerisque eros, molestie tristique lacus posuere in.Quisque faucibus scelerisque eros, molestie tristique lacus posuere in.</p>
						<!-- <div class="agileits_w3layouts_learn_more hvr-radial-out">
							<a href="#" data-toggle="modal" data-target="#myModal">Read More</a>
						</div> -->
					</div>
				</div>
				<div class="col-md-4 w3_agileits_services_bottom_grid">
					<div class="wthree_services_bottom_grid1">
						<img src="images/3.jpg" alt=" " class="img-responsive" />
						<div class="wthree_services_bottom_grid1_pos">
							<h4>Planting</h4>
						</div>
					</div>
					<div class="agileinfo_services_bottom_grid2">
						<p>Quisque faucibus scelerisque eros, molestie tristique lacus posuere in.Quisque faucibus scelerisque eros, molestie tristique lacus posuere in.</p>
						<!-- <div class="agileits_w3layouts_learn_more hvr-radial-out">
							<a href="/" data-toggle="modal" data-target="#myModal">Read More</a>
						</div> -->
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
@endsection

@section('footer')
    <div class="footer">
		<div class="container">
			<div class="w3agile_footer_grids">
				<div class="col-md-3 agileinfo_footer_grid">
					<div class="agileits_w3layouts_footer_logo">
					<a href="/"><img src="assest/logo34.png" alt="logo" class="logo-f"></a>
					</div>
				</div>
				<div class="col-md-4 agileinfo_footer_grid">
					<h3>Contact Info</h3>
					<h4>Call Us <span>+1234 567 891</span></h4>
					<p>My Company, 875 Jewel Road <span>8907 Ukraine.</span></p>
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
						<li><a href="index.html"><i class="fa fa-long-arrow-right" aria-hidden="true"></i>Home</a></li>
						<li><a href="icons.html"><i class="fa fa-long-arrow-right" aria-hidden="true"></i>Web Icons</a></li>
						<li><a href="typography.html"><i class="fa fa-long-arrow-right" aria-hidden="true"></i>Typography</a></li>
						<li><a href="contact.html"><i class="fa fa-long-arrow-right" aria-hidden="true"></i>Contact Us</a></li>
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
				<p><a target="_blank" href="https://www.templateshub.net">Templates Hub</a></p>
		</div>
	</div>
@endsection