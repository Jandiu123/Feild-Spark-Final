<!-- resources/views/enter_contact_number.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Enter Contact Number</title>
</head>
<body>
    <form action="{{ route('sendMeetingLink') }}" method="POST">
        @csrf
        <input type="hidden" name="meeting_link" value="{{ $meetingLink }}">
        <label for="contact_number">Contact Number:</label>
        <input type="text" id="contact_number" name="contact_number" required>
        <button type="submit">Send Meeting Link</button>
    </form>
</body>
</html>