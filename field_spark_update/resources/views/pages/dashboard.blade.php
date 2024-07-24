@extends('Layout.dashboardlayout')

@section('nav')
<nav>
    <a href="index.html"><img src="assest/logo34.png" alt="logo"></a>
    <div class="nav-links">
        <ul>
            <li><a href="{{ route('dashboard') }}">Home</a></li>
            <li><a href="Turtle categories.html">Appointments</a></li>
            <li><a href="{{ route('pages.discussion') }}">Discussion forum</a></li>
            <li><a href="{{ route('pages.plantinfo') }}">Plant information</a></li>
            <li><a href="threats.html">Resources</a></li>
        </ul>
    </div>
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
</nav>
    <div class="content">
        <h1>Welcome To The Place Where Natural Beauty Born</h1>
        <p>Field Spark empowers farmers with cutting-edge technology, offering real-time data, expert guidance,<br> and sustainable solutions to boost agricultural productivity.</p>
        <div>
            <button type="button"><span></span>Make a Appoinment</button>
            <button type="button"><span></span>Search plants</button>
        </div> 

    </div>
@endsection

@section('background')
<div class="les">
        <h1>
           OUR SERVICES
        </h1>
        <p>Following are can use from our website</p>
</div> 
    <br>
    <br>
    <br>
<div class="cards">
    <div class="card card1">
        <div class="container">
            <img src="assest/field2.jpg" alt="cleaning">
        </div>
        <div class="details">
            <h3>Interactive Discussion Forums for Farmers</h3>
            <p>Field Spark offers a vibrant and interactive discussion forum tailored specifically for farmers. This platform allows farmers to connect, share experiences, and seek advice from their peers and experts in the agricultural community. Whether you’re dealing with crop diseases, looking for sustainable farming techniques, or simply want to share your success stories, Field Spark's discussion forums provide a supportive and knowledgeable environment. Farmers can post questions, engage in meaningful discussions, and access a wealth of collective wisdom. The forum is moderated to ensure respectful and productive conversations, making it an invaluable resource for both novice and experienced farmers.</p>
        </div>
    </div>
    <div class="card card2">
        <div class="container">
            <img src="assest/field.jpg" alt="nesting">
        </div>
        <div class="details">
            <h3>Comprehensive Plant Information Resources</h3>
            <p>Field Spark’s extensive plant information resources are a cornerstone of its services, offering detailed and scientifically backed data on a wide variety of crops. Farmers can access crucial information on plant species, growth requirements, pest management, and nutrient needs, helping them make informed decisions about their agricultural practices. The database is regularly updated to reflect the latest research and agricultural trends, ensuring that users have access to the most current and relevant information. Whether you're looking to optimize your yield, try out new crops, or combat specific agricultural challenges, Field Spark’s plant information resources provide the knowledge needed to succeed</p>
        </div>
    </div>
    <div class="card card3">
        <div class="container">
            <img src="assest/field2.jpg" alt="moon">
        </div>
        <div class="details">
            <h3>Appointment Scheduling with Agricultural Experts</h3>
            <p>Field Spark makes it easy for farmers to connect with agricultural experts through its convenient appointment scheduling service. This feature allows users to book one-on-one consultations with specialists in various fields of agriculture, from soil health and crop management to agricultural technology and sustainable practices. Farmers can choose experts based on their specific needs and schedule appointments at times that fit their busy schedules. This personalized advice can help address unique challenges, improve farm efficiency, and implement innovative techniques. By facilitating direct access to expert guidance, Field Spark ensures that farmers receive tailored support, helping them to enhance their operations and achieve better outcomes in their agricultural endeavors.</p>
        </div>
    </div>
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