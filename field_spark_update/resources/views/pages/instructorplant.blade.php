@extends('Layout.instructorplantlayout')

@section('navbar')
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
									<li><a href="{{ route('pages.discussion') }}">Discussion Forum</a></li>
									<li><a href="{{ route('pages.plantinfo') }}">Plants</a></li> 
									<li><a href="/contactus">Resources</a></li>
									<li class="dropdown">
                                    @auth('instructor')
                                    <div class="profile-dropdown">
                                         <button class="profile-button">{{ Auth::guard('instructor')->user()->name }}</button>
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
@endsection


@section('form')
<main>
    <h2>Add a new plant</h2>
    <form action="{{ route('plants.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-row">
        <div class="form-group">
            <input type="text" id="plant-name" name="name" placeholder="Plant name" required>
        </div>
        <div class="form-group">
            <input type="text" id="plant-origin" name="origin" placeholder="Plant Origin" required>
        </div>
        <div class="form-group">
            <input type="text" id="plant-care" name="care" placeholder="Plant Care" required>
        </div>
    </div>
    <div class="form-group">
        <textarea id="plant-description" name="description" placeholder="Plant description" required></textarea>
    </div>
    <div class="form-group">
        <input type="file" id="plant-image" name="image" accept="image/*">
    </div>
    <button type="submit">Submit</button>
    </form>

</main>
@endsection

@section('footer')
<div class="container">
			<div class="w3agile_footer_grids">
				<div class="col-md-3 agileinfo_footer_grid">
					<div class="agileits_w3layouts_footer_logo">
						<h2><a href="index.html"><span>G</span>erminate<i>Grow healthy products</i></a></h2>
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
@endsection




