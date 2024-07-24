@extends('Layout.instructorplantlayout')

@section('nav')
<nav>
    <a href="{{ route('pages.instructordashboard') }}"><img src="assest/logo34.png" alt="logo"></a>
    <div class="nav-links">
            <ul>
                <li><a href="{{ route('pages.instructordashboard') }}">Home</a></li>
                <li><a href="Turtle categories.html">Appoinments</a></li>
                <li><a href="{{ route('pages.idiscussion') }}">Discussion forum</a></li>
                <li><a href="{{ route('pages.instructorplant') }}">plant information</a></li>
                <li><a href="threats.html">Resources</a></li>
            </ul>
    </div>
    @auth('instructor')
    <div class="profile-dropdown">
        <button class="profile-button">{{ Auth::guard('instructor')->user()->name }}</button>
        <div class="profile-menu">
            <a href="{{ route('profile.show') }}">Profile</a>
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none">
                @csrf
            </form>
        </div>
    </div>
    @endauth
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



