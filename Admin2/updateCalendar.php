<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Google Calendar Dashboard</title>
  <script src="https://apis.google.com/js/api.js"></script>
</head>

<body>
  <header style="text-align: center; font-size: 24px; padding: 10px 0;">
    Admin Google Calendar Dashboard
  </header>

  <!-- Section: Google Calendar Embed -->
  <section style="text-align: center; margin-bottom: 20px;">
    <iframe src="https://calendar.google.com/calendar/embed?src=your_calendar_id@gmail.com&ctz=America/New_York"
      style="border: 0; width: 100%; height: 600px;" frameborder="0"></iframe>
  </section>

  <!-- Section: Admin Actions -->
  <section style="text-align: center;">
    <h3>Admin Actions</h3>
    <div>
      <button onclick="signInWithGoogle()">Sign In to Google</button>
      <br><br>
      <button onclick="createEvent()">Create Event</button>
      <br><br>
      <!-- Back Button -->
      <button onclick="goToDashboard()">Back to Dashboard</button>
    </div>
  </section>

  <!-- Form for Event Creation -->
  <div id="eventForm" style="display: none; text-align: center; margin: 20px;">
    <h4>Event Details</h4>
    <form id="calendarForm">
      <label>
        Event Title:
        <input type="text" id="eventTitle" required>
      </label>
      <br><br>
      <label>
        Event Date:
        <input type="date" id="eventDate" required>
      </label>
      <br><br>
      <label>
        Event Time:
        <input type="time" id="eventTime" required>
      </label>
      <br><br>
      <button type="button" onclick="submitEvent()">Submit</button>
    </form>
  </div>

  <script>
    let gapiAuth; // OAuth instance
    let accessToken; // Store token here

    // Initialize Google APIs
    function initClient() {
      gapi.load('client:auth2', async function () {
        await gapi.client.init({
          apiKey: 'YOUR_GOOGLE_API_KEY',
          clientId: 'YOUR_CLIENT_ID',
          discoveryDocs: ['https://www.googleapis.com/discovery/v1/apis/calendar/v3/rest'],
          scope: 'https://www.googleapis.com/auth/calendar.events',
        });
        gapiAuth = gapi.auth2.getAuthInstance();
      });
    }

    // Sign-In with Google
    async function signInWithGoogle() {
      const authResponse = await gapiAuth.signIn();
      if (authResponse) {
        accessToken = gapiAuth.currentUser.get().getAuthResponse().access_token;
        alert('Signed In Successfully');
        document.getElementById('eventForm').style.display = "block";
      }
    }

    // Show the event creation form
    function createEvent() {
      if (!accessToken) {
        alert("Please sign in first");
        return;
      }
      document.getElementById('eventForm').style.display = "block";
    }

    // Redirect back to the Dashboard
    function goToDashboard() {
      window.location.href = 'dashboard.php';
    }

    // Submit event to Google Calendar API
    async function submitEvent() {
      const title = document.getElementById('eventTitle').value;
      const date = document.getElementById('eventDate').value;
      const time = document.getElementById('eventTime').value;

      if (!title || !date || !time) {
        alert("Please fill out all fields.");
        return;
      }

      const eventStartTime = new Date(`${date}T${time}:00`).toISOString();
      const eventEndTime = new Date(new Date(`${date}T${time}:00`).getTime() + 3600000).toISOString(); // Event lasts for 1 hour

      const event = {
        'summary': title,
        'start': {
          'dateTime': eventStartTime,
        },
        'end': {
          'dateTime': eventEndTime,
        },
      };

      try {
        const response = await fetch('https://www.googleapis.com/calendar/v3/calendars/primary/events', {
          method: 'POST',
          headers: {
            'Authorization': `Bearer ${accessToken}`,
            'Content-Type': 'application/json',
          },
          body: JSON.stringify(event),
        });

        if (response.ok) {
          alert('Event successfully created');
        } else {
          alert('Failed to create event');
        }
      } catch (error) {
        console.error('Error:', error);
      }
    }

    initClient();
  </script>
</body>

</html>
