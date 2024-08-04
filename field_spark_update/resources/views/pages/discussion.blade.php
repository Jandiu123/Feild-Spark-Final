@extends('Layout.discussionlayout')


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
        </nav>
@endsection
   
@section('breadcrumbs')
            <div class="w3layouts_breadcrumbs_left">
				<ul>
					<li><i class="fa fa-home" aria-hidden="true"></i><a href="{{ route('dashboard') }}">Dashboard</a><span>/</span></li>
					<li><i class="fa fa-picture-o" aria-hidden="true"></i>Farmer's Discussion Forum</li>
				</ul>
			</div>
			
			<div class="clearfix"> </div>
@endsection

@section('forum')
        <div class="forum-header">
            <h1>Farmers Discussion forum</h1>
            <input type="text" placeholder="Find your solutions" id="search">
            <button onclick="searchQuestions()">Search</button>
        </div>
        <div class="forum-content">
            <div class="tabs">
                <button onclick="showTab('all')">All</button>
                <button onclick="showTab('solved')">Solved</button>
                <button onclick="showTab('popular')">Popular</button>
            </div>
            <div id="questions-container" class="questions-container">
                <!-- Questions will be inserted here by JavaScript -->
            </div>
        </div>
        <div class="ask-question">
            <h2>Ask a question</h2>
            <textarea placeholder="Your Question" id="new-question"></textarea>
            <button onclick="addQuestion()">Submit</button>
        </div>
@endsection



@section('question')
        <button class="btn_new" onclick="backToQuestions()">Back</button>
        <div id="question-detail-content">
            <!-- Detailed question content and replies will be inserted here by JavaScript -->
        </div>
        <!-- <div class="reply-section">
        <h2>Reply to this question</h2>
        <textarea placeholder="Your Reply" id="new-reply"></textarea>
        <button onclick="addReply()">Submit Reply</button> -->
    </div>
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

