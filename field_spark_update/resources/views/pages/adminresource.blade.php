@extends('Layout.adminresourcelayout')

@section('navbar')
            <div class="w3_agileits_banner_main_grid">
                <div class="w3_agile_logo">
					<h1><a href="{{ route('pages.instructordashboard') }}"><span>F</span>ieldSpark<i>Grow healthy products</i></a></h1>
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
									<li class="active"><a href="{{ route('pages.instructordashboard') }}">Home</a></li>
									<li><a href="{{ route('pages.adminappoint') }}">Appointments</a></li> 
									<li><a href="{{ route('pages.idiscussion') }}">Discussion Forum</a></li>
									<li><a href="{{ route('pages.instructorplant') }}">Plants</a></li> 
									<li><a href="{{ route('pages.adminresource') }}">Resources</a></li>
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
@endsection


@section('form')
<main>
    <h2>Add a New Resource</h2>
    <form action="{{ route('resources.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-row">
        <div class="form-group">
            <input type="text" id="resource-title" name="title" placeholder="Resource title" required>
        </div>
    </div>
    <div class="form-group">
        <textarea id="resource-description" name="description" placeholder="Resource description" required></textarea>
    </div>
    <div class="form-group">
        <input type="file" id="resource-image" name="image" accept="image/*">
    </div>
    <button type="submit" class="btn-new">Submit</button>
    </form>

</main>
@endsection

@section('ResourceTable')
<main>
<h2>Manage Resources</h2>
    <table id="resourcesTable">
        <thead>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <!-- AJAX will populate this -->
        </tbody>
    </table>
</main>
<!-- Edit Plant Modal -->
<div id="editResourceModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h2>Edit Plant</h2>
        <form id="editResourceForm">
            <input type="hidden" id="editResourceId">
            <div class="form-group">
                <label for="editTitle">Title</label>
                <input type="text" id="editName" required>
            </div>
            <div class="form-group">
                <label for="editDescription">Description</label>
                <textarea id="editDescription" required></textarea>
            </div>
            <div class="form-group">
                <label for="editImage">Image</label>
                <input type="file" id="editImage" accept="image/*">
                <img id="currentImage" src="" alt="Current Image" style="display:none; width: 100px;"/>
            </div>
            <button type="submit">Save Changes</button>
        </form>
    </div>
</div>
@endsection

@section('footer')
<div class="container3">
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
			<div class="container3">
				<p><a target="_blank" href="https://www.templateshub.net">Templates Hub</a></p>
		</div>
@endsection




