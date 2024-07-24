@extends('Layout.plantinfolayout')

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
    <div class="search-container">
          <input type="text" id="searchInput" placeholder="Search for plants...">
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
@endsection

@section('product')
    <div class="card-container">
        @foreach($plants as $index => $plant)
        <div class="card" data-index="{{ $index }}">
            <img src="{{ $plant->image ? asset('storage/' . $plant->image) : 'assest/plantt.png' }}" alt="{{ $plant->name }}">
            <h3>{{ $plant->name }}</h3>
            <button class="learn-more">Read more</button>
        </div>
        @endforeach
    </div>

   <!-- Modal Structure -->
<div id="plantModal" class="modal" style="display: none;">
    <div class="modal-content">
        <span class="close">&times;</span>
        <img id="modalImage" src="" alt="Plant Image">
        <h2 id="modalName"></h2>
        <p id="modalOrigin"></p>
        <p id="modalCare"></p>
        <p id="modalDescription"></p>
    </div>
</div>

@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Extract plant data from JSON
        const plants = @json($plants);

        const modal = document.getElementById('plantModal');
        const span = document.getElementsByClassName('close')[0];

        document.querySelectorAll('.card .learn-more').forEach((button, index) => {
            button.addEventListener('click', function () {
                const plant = plants[index]; // Access the plant by index
                document.getElementById('modalImage').src = plant.image ? `/storage/${plant.image}` : 'assest/plantt.png';
                document.getElementById('modalName').textContent = plant.name;
                document.getElementById('modalOrigin').innerHTML = `<strong>Origin:</strong> ${plant.origin}`;
                document.getElementById('modalCare').innerHTML = `<strong>Care:</strong> ${plant.care}`;
                document.getElementById('modalDescription').innerHTML = `<strong>Description:</strong> ${plant.description}`;

                modal.style.display = 'block';
            });
        });

        span.onclick = function () {
            modal.style.display = 'none';
        };

        window.onclick = function (event) {
            if (event.target == modal) {
                modal.style.display = 'none';
            }
        };
    });
</script>
@endpush

@push('search')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const searchInput = document.getElementById('searchInput');
        const cardContainer = document.getElementById('cardContainer');
        const cards = cardContainer.getElementsByClassName('card');

        searchInput.addEventListener('input', function () {
            const query = searchInput.value.toLowerCase();

            for (let card of cards) {
                const plantName = card.getAttribute('data-name').toLowerCase();

                if (plantName.includes(query)) {
                    card.style.display = '';
                } else {
                    card.style.display = 'none';
                }
            }
        });
    });
</script>
@endpush
