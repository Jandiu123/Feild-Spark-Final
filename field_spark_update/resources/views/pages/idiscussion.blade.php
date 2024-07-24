@extends('Layout.idiscussionlayout')

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

@section('forum')
        <div class="forum-header">
            <h1>Instructor Discussion forum</h1>
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
        <div class="container23">
            <div class="footer-content">
                <h3>
                    Contact us
                </h3>
                <p>
                    Email:Fieldspark@gmail.com
                </p>
                <p>
                    phone:+94 81 234 2378
                </p>
                <p>
                    Address: 2000,Kandy,Peradeniye.
                </p>
            </div>
            <div class="footer-content">
                <h3>
                    Quick Links
                </h3>
                <ul class="list23">
                    <li><a href="">Home</a></li>
                    <li><a href="">Appoinment</a></li>
                    <li><a href="">Discussion forum</a></li>
                    <li><a href="">Plant information</a></li>
                    <li><a href="">Resources</a></li>
        
                </ul>
        
            </div>
            <div class="footer-content">
            <h3>
                Follow us
            </h3>
           
            <ul class="list23">
                <li><a href="">Instagrame</a></li>
                <li><a href="">Facebook</a></li>
                <li><a href="">Twitter</a></li>
                <li><a href="">Linkedln</a></li>
                
        
            </ul>
           
        
            </div>
        </div>
        
        
        <div class="bottom-bar">
        <p>
            &copy;2024 field spark. All right reserved.
        </p>
        
        </div>
@endsection