<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Manage Appointments</title>
    <link rel="stylesheet" href="instrucotrappoinment.css">
</head>
<body data-instructor-id="{{ Auth::guard('instructor')->user()->id }}">
    @include('Libraries.adminappointstyle')

    <div class="banner">
        <div class="container">
            @yield('navbar')
        </div>
    </div>

    <!-- Breadcrumbs -->
    <div class="breadcrumbs">
        <div class="container">
            <div class="w3layouts_breadcrumbs_left">
                <ul>
                    <li><i class="fa fa-home" aria-hidden="true"></i><a href="{{ route('pages.instructordashboard') }}">Dashboard</a><span>/</span></li>
                    <li><i class="fa fa-picture-o" aria-hidden="true"></i>Appointments</li>
                </ul>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>

    <main>
        <div class="container">
            <div class="card">
                @yield('table')
            </div>
        </div>
    </main>

    @yield('transfer')

    <div class="footer">
        @yield('footer')
    </div>

    @include('scripts.dashscripts')

    <script>
        // Initialize dropdown menus
        document.addEventListener('DOMContentLoaded', function() {
            initDropDowns(document.querySelectorAll("div.shy-menu"));
        });

        function initDropDowns(allMenus) {
            allMenus.forEach(menu => {
                menu.querySelector(".shy-menu-hamburger").addEventListener("click", function() {
                    const thisMenu = this.parentElement;
                    const thisPanel = this.nextElementSibling;

                    if (thisMenu.classList.contains("is-open")) {
                        thisMenu.classList.remove("is-open");
                    } else {
                        allMenus.forEach(menu => menu.classList.remove("is-open"));
                        thisMenu.classList.add("is-open");
                        thisPanel.addEventListener("click", function(e) {
                            e.stopPropagation();
                        });
                    }
                });
            });
        }
    </script>

    <script>
        // Fetch and display appointments
        document.addEventListener('DOMContentLoaded', function() {
            const instructorId = document.body.getAttribute('data-instructor-id');

            fetch(`/api/instructors/${instructorId}/appointments`)
                .then(response => response.json())
                .then(data => {
                    const appointmentsTableBody = document.querySelector('#appointmentsTable tbody');
                    appointmentsTableBody.innerHTML = '';

                    data.forEach(appointment => {
                        const row = document.createElement('tr');
                        row.innerHTML = `
                            <td>${appointment.first_name}</td>
                            <td>${appointment.last_name}</td>
                            <td>${appointment.contact_number}</td>
                            <td>${appointment.date} at ${appointment.time}</td>
                            <td class="action-cell">
                                <button class="start-meeting">Start Meeting</button>
                                <button class="transfer">Transfer</button>
                                <button class="delete" data-id="${appointment.id}">Delete</button>
                            </td>
                        `;
                        appointmentsTableBody.appendChild(row);
                    });
                })
                .catch(error => console.error('Error fetching appointment data:', error));
        });
    </script>

    <script>
        // Handle delete appointment
        document.addEventListener('DOMContentLoaded', function() {
            const appointmentsTableBody = document.querySelector('#appointmentsTable tbody');

            appointmentsTableBody.addEventListener('click', function(event) {
                if (event.target.classList.contains('delete')) {
                    const appointmentId = event.target.getAttribute('data-id');

                    if (confirm('Are you sure you want to delete this appointment?')) {
                        fetch(`/api/appointments/${appointmentId}`, {
                            method: 'DELETE',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                            }
                        })
                        .then(response => {
                            if (response.ok) {
                                event.target.closest('tr').remove();
                                alert('Appointment deleted successfully.');
                            } else {
                                throw new Error('Error deleting appointment.');
                            }
                        })
                        .catch(error => console.error('Error:', error));
                    }
                }
            });
        });
    </script>

    <script>
        // Handle transfer appointment
        document.addEventListener('DOMContentLoaded', function() {
            const appointmentsTableBody = document.querySelector('#appointmentsTable tbody');
            const transferModal = document.getElementById('transferModal');
            const instructorList = document.getElementById('instructorList');
            let selectedAppointmentId = null;

            appointmentsTableBody.addEventListener('click', function(event) {
                if (event.target.classList.contains('transfer')) {
                    selectedAppointmentId = event.target.closest('tr').querySelector('.delete').getAttribute('data-id');
                    showTransferModal();
                }
            });

            function showTransferModal() {
                fetch('/api/instructors')
                    .then(response => response.json())
                    .then(instructors => {
                        instructorList.innerHTML = '';
                        instructors.forEach(instructor => {
                            const li = document.createElement('li');
                            li.classList.add('instructor-item');
                            li.setAttribute('data-id', instructor.id);
                            li.innerHTML = `
                                ${instructor.name}
                                <span class="checkmark">&#10003;</span>
                            `;
                            instructorList.appendChild(li);
                        });
                        transferModal.style.display = 'flex';
                    })
                    .catch(error => console.error('Error fetching instructors:', error));
            }

            instructorList.addEventListener('click', function(event) {
                const selected = document.querySelector('.instructor-item.selected');
                if (selected) {
                    selected.classList.remove('selected');
                }
                if (event.target.classList.contains('instructor-item')) {
                    event.target.classList.add('selected');
                }
            });

            document.getElementById('confirmTransfer').addEventListener('click', function() {
                const selectedInstructor = document.querySelector('.instructor-item.selected');
                if (selectedInstructor && selectedAppointmentId) {
                    const instructorId = selectedInstructor.getAttribute('data-id');

                    fetch(`/api/appointments/${selectedAppointmentId}/transfer`, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        },
                        body: JSON.stringify({ instructor_id: instructorId })
                    })
                    .then(response => {
                        if (response.ok) {
                            alert('Appointment transferred successfully.');
                            transferModal.style.display = 'none';
                            location.reload();
                        } else {
                            throw new Error('Error transferring appointment.');
                        }
                    })
                    .catch(error => console.error('Error:', error));
                } else {
                    alert('Please select an instructor.');
                }
            });

            document.getElementById('closeModal').addEventListener('click', function() {
                transferModal.style.display = 'none';
            });
        });
    </script>

    <script type="text/javascript">
        window.$crisp = [];
        window.CRISP_WEBSITE_ID = "b48ca7c7-c3fc-4bf5-acf7-c6bbc1bc1e37";
        (function() {
            const d = document;
            const s = d.createElement("script");
            s.src = "https://client.crisp.chat/l.js";
            s.async = 1;
            d.getElementsByTagName("head")[0].appendChild(s);
        })();
    </script>

    <script>
        // Handle start meeting
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.start-meeting').forEach(button => {
                button.addEventListener('click', function() {
                    axios.post('/api/appointments/start-meeting', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        alert(data.message);
                    })
                    .catch(error => {
                        console.error('Error:', error);
                    });
                });
            });
        });
    </script>
</body>
</html>
