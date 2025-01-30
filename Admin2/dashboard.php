<?php
session_start();
if(empty($_SESSION['name']))
{
	header('location:index.php');
}
include('header.php');
include('includes/connection.php');
?>
        <!-- <div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                        <div class="dash-widget">
							<span class="dash-widget-bg1"><i class="fa fa-stethoscope" aria-hidden="true"></i></span>
							<?php
							$fetch_query = mysqli_query($connection, "select count(*) as total from tbl_employee where status=1 and role=2"); 
							$doc = mysqli_fetch_row($fetch_query);
							?>
							<div class="dash-widget-info text-right">
								<h3><?php echo $doc[0]; ?></h3>
								<span class="widget-title1">Doctors <i class="fa fa-check" aria-hidden="true"></i></span>
							</div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                        <div class="dash-widget">
                            <span class="dash-widget-bg2"><i class="fa fa-user-o"></i></span>
                            <?php
							$fetch_query = mysqli_query($connection, "select count(*) as total from tbl_patient where status=1"); 
							$patient = mysqli_fetch_row($fetch_query);
							?>
                            <div class="dash-widget-info text-right">
                                <h3><?php echo $patient[0]; ?></h3>
                                <span class="widget-title2">Patients <i class="fa fa-check" aria-hidden="true"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                        <div class="dash-widget">
                            <span class="dash-widget-bg3"><i class="fa fa-user-md" aria-hidden="true"></i></span>
                            <?php
							$fetch_query = mysqli_query($connection, "select count(*) as total from tbl_appointment where status=1"); 
							$attend = mysqli_fetch_row($fetch_query);
							?>
                            <div class="dash-widget-info text-right">
                                <h3><?php echo $attend[0]; ?></h3>
                                <span class="widget-title3">Attend <i class="fa fa-check" aria-hidden="true"></i></span>
                            </div>
                        </div>
                    </div>
                 
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                        <div class="dash-widget">
                            <span class="dash-widget-bg4"><i class="fa fa-heartbeat" aria-hidden="true"></i></span>
                            <?php
							$fetch_query = mysqli_query($connection, "select count(*) as total from tbl_patient where patient_type='InPatient' and status=1"); 
							$inpatient = mysqli_fetch_row($fetch_query);
							?>
                            <div class="dash-widget-info text-right">
                                <h3><?php echo $inpatient[0]; ?></h3>
                                <span class="widget-title4">Active <i class="fa fa-check" aria-hidden="true"></i></span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                        <div class="dash-widget">
                            <span class="dash-widget-bg4"><i class="fa fa-heartbeat" aria-hidden="true"></i></span>
                            <?php
							$fetch_query = mysqli_query($connection, "select count(*) as total from tbl_patient where patient_type='OutPatient' and status=1"); 
							$outpatient = mysqli_fetch_row($fetch_query);
							?>
                            <div class="dash-widget-info text-right">
                                <h3><?php echo $outpatient[0]; ?></h3>
                                <span class="widget-title4">On Queue <i class="fa fa-check" aria-hidden="true"></i></span>
                            </div>
                        </div>
                    </div>
				
				<div class="row">
                       <div class="col-12 col-md-6 col-lg-8 col-xl-8">
						<div class="card">
							<div class="card-header">
								<h4 class="card-title d-inline-block">New Patients </h4> <a href="patients.php" class="btn btn-primary float-right">View all</a>
							</div>
							<div class="card-block">
								<div class="table-responsive">
									<table class="table mb-0 new-patient-table">
										<tbody>
											<?php 
											$fetch_query = mysqli_query($connection, "select * from tbl_patient limit 5");
                                        while($row = mysqli_fetch_array($fetch_query))
                                        { ?>
											<tr>
												<td>
													<img width="28" height="28" class="rounded-circle" src="assets/img/user.jpg" alt=""> 
													<h2><?php echo $row['first_name']." ".$row['last_name']; ?></h2>
												</td>
												<td><?php echo $row['email']; ?></td>
												<td><?php echo $row['phone']; ?></td>
												<?php if($row['patient_type']=="InPatient") { ?>
                                            <td><span class="custom-badge status-red"><?php echo $row['patient_type']; ?></span></td>
                                        <?php } else {?>
                                            <td><span class="custom-badge status-green"><?php echo $row['patient_type']; ?></span></td>
                                        <?php } ?>
												
											</tr>
											<?php } ?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
					  <div class="col-12 col-md-6 col-lg-4 col-xl-4">
                        <div class="card member-panel">
							<div class="card-header bg-white">
								<h4 class="card-title mb-0">Doctors</h4>
							</div>
                            <div class="card-body">
                                <ul class="contact-list">
                                	<?php 
                                	$fetch_query = mysqli_query($connection, "select * from tbl_employee where status=1 and role=2 limit 5");
                                        while($row = mysqli_fetch_array($fetch_query))
                                        {
                                        ?>
                                    <li>
                                        <div class="contact-cont">
                                            <div class="float-left user-img m-r-10">
                                                <a href="profile.html" title="John Doe"><img src="assets/img/user.jpg" alt="" class="w-40 rounded-circle"><span class="status online"></span></a>
                                            </div>
                                            <div class="contact-info">
                                                <span class="contact-name text-ellipsis"><?php echo $row['first_name']." ".$row['last_name']; ?></span>
                                                <span class="contact-date"><?php echo $row['bio']; ?></span>
                                            </div>
                                        </div>
                                    </li>
                                    <?php } ?>
                                </ul>
                            </div>
                            <div class="card-footer text-center bg-white">
                                <a href="doctors.php" class="text-muted">View all Doctors</a>
                            </div>
                        </div>
                    </div>
				</div>
				
            </div>
            
        </div>
     -->
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
      style="border: 0; width: 90%; height: 400px;" frameborder="0"></iframe>
  </section>

  <!-- Section: Admin Actions -->
  <section style="text-align: center;">
    <h3>Admin Actions</h3>
    <div>
      <button onclick="redirectToGoogleCalendar()">Sign In to Google</button>

      <br><br>
      <!-- <button onclick="createEvent()">Create Event</button> -->
      <br><br>
      <!-- Back Button -->
      <!-- <button onclick="goToDashboard()">Back to Dashboard</button> -->
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

  <!-- <script>
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
  </script> -->
</body>
<script>
  function redirectToGoogleCalendar() {
    window.location.href = "https://calendar.google.com/calendar/u/0/r";
  }
</script>
</html>

 <?php 
 include('footer.php');
?>