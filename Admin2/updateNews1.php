<?php
session_start();
if(empty($_SESSION['name']))
{
	header('location:index.php');
}
include('header2.php');
include('includes/connection.php');
?>
<?php
// Database connection details
$host = "localhost";
$dbname = "hms_db";
$username = "root";
$password = "";

try {
    // Create a PDO instance
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Create the table if it doesn't exist
    $createTableSQL = "
        CREATE TABLE IF NOT EXISTS news (
            id INT AUTO_INCREMENT PRIMARY KEY,
            title VARCHAR(255) NOT NULL,
            content TEXT NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        );
    ";
    $pdo->exec($createTableSQL);

} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST["title"];
    $content = $_POST["content"];

    // Validate inputs
    if (empty($title) || empty($content)) {
        $errorMessage = "Both fields are required.";
    } else {
        $sql = "INSERT INTO news (title, content) VALUES (:title, :content)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":title", $title);
        $stmt->bindParam(":content", $content);

        if ($stmt->execute()) {
            $successMessage = "News report added successfully.";
        } else {
            $errorMessage = "Failed to add news report.";
        }
    }
}
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
    <title>News Reports</title>
    <style>
        /* General Body Styles */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
            height: 60vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        /* header {
            background-color: #333;
            color: #fff;
            padding: 15px 0;
            text-align: center;
            font-size: 24px;
            width: 100%;
            position: absolute;
            top: 0;
        } */

        /* Main Container */
        main {
            max-width: 800px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
            padding: 40px;
            text-align: center;
            box-sizing: border-box;
            margin-top: 260px;
        }

        h1 {
            margin-bottom: 20px;
            color: #333;
            font-size: 26px;
        }

        /* Form Styling */
        form {
            display: flex;
            flex-direction: column;
            gap: 25px;
            margin-bottom: 20px;
            align-items: center;
        }

        label {
            font-weight: bold;
            width: 100%;
        }

        input,
        textarea {
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            width: 100%;
            max-width: 600px;
            transition: border-color 0.2s ease;
            box-sizing: border-box;
        }

        input:focus,
        textarea:focus {
            border-color: #555;
            outline: none;
        }

        button {
            padding: 12px 15px;
            border: none;
            background-color: #333;
            color: white;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.2s ease;
            font-size: 16px;
        }

        button:hover {
            background-color: #555;
        }

        /* Success/Error Message Box */
        .message {
            margin-bottom: 20px;
            padding: 10px;
            border-radius: 5px;
            font-size: 16px;
            text-align: center;
            color: #fff;
            width: 100%;
            max-width: 600px;
        }

        .error {
            background-color: #e74c3c;
        }

        .success {
            background-color: #2ecc71;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            form {
                gap: 20px;
            }

            main {
                padding: 30px;
            }
        }
    </style>
</head>

<body>
    <!-- Header Section -->
    <!-- <header>
        News Management System
    </header> -->

    <!-- Main Content -->
    <main>
        <h1>Add News Report</h1>

        <!-- Display Success/Error Messages -->
        <?php if (isset($errorMessage)): ?>
            <div class="message error"><?php echo htmlspecialchars($errorMessage); ?></div>
        <?php endif; ?>

        <?php if (isset($successMessage)): ?>
            <div class="message success"><?php echo htmlspecialchars($successMessage); ?></div>
        <?php endif; ?>

        <!-- Form Section -->
        <form method="POST" action="">
            <div>
                <label for="title">Title:</label>
                <input type="text" id="title" name="title" required>
            </div>

            <div>
                <label for="content">Content:</label>
                <textarea id="content" name="content" rows="8" required></textarea>
            </div>

            <div>
                <button type="submit">Submit update</button>
            </div>
            
        </form>
        <!-- <a href="dashboard.php">
    <button style="
        padding: 10px 20px;
        border: none;
        background-color: #555;
        color: white;
        cursor: pointer;
        border-radius: 5px;
        font-size: 16px;
    ">Back to Home</button>
</a> -->
    </main>

 <?php 
 include('footer.php');
?>