<?php
session_start();
if (empty($_SESSION['name'])) {
    header('location:index.php');
    exit;
}

include('header2.php');
include('includes/connection.php');

// Database connection
$host = "localhost";
$dbname = "hms_db";
$username = "root";
$password = "";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Create the news table if not exists
    $createTableSQL = "
        CREATE TABLE IF NOT EXISTS news (
            id INT AUTO_INCREMENT PRIMARY KEY,
            title VARCHAR(255) NOT NULL,
            content TEXT NOT NULL,
            image VARCHAR(255) NOT NULL
        );
    ";
    $pdo->exec($createTableSQL);

} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST["title"];
    $content = $_POST["content"];

    // File upload handling
    $targetDir = "uploads/"; // Directory to save images

    // Create 'uploads' folder if it doesn't exist
    if (!file_exists($targetDir)) {
        mkdir($targetDir, 0777, true);
    }

    // Generate a unique filename to prevent overwrites
    $imageName = time() . "_" . basename($_FILES["image"]["name"]);
    $targetFile = $targetDir . $imageName;

    // Validate file upload
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
        // Insert data into the database
        $sql = "INSERT INTO news (title, content, image) VALUES (:title, :content, :image)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":title", $title);
        $stmt->bindParam(":content", $content);
        $stmt->bindParam(":image", $imageName);

        if ($stmt->execute()) {
            $successMessage = "News report added successfully!";
        } else {
            $errorMessage = "Failed to add news report.";
        }
    } else {
        $errorMessage = "Error: Could not move the uploaded file.";
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
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        .page-wrapper {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px;
            background-color: #f4f4f4;
            min-height: 100vh;
        }

        .news-container {
            width: 90%;
            max-width: 1000px;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            margin-top: 70px;
            margin-bottom: 20px;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        label {
            font-weight: bold;
            margin-bottom: 5px;
            display: block;
        }

        input, textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        textarea {
            resize: vertical;
        }

        button {
            padding: 12px;
            font-size: 16px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: 0.3s;
        }

        button:hover {
            background-color: #0056b3;
        }

        .image-preview {
            text-align: center;
            margin-top: 10px;
        }

        .image-preview img {
            max-width: 100%;
            max-height: 300px;
            border-radius: 5px;
            display: none; /* Hidden until an image is selected */
        }
    </style>
</head>

<body>

    <div class="page-wrapper">
        <h1>Add News Report</h1>
        <div class="news-container">
            <?php if (!empty($errorMessage)) echo "<p style='color: red;'>$errorMessage</p>"; ?>
            <?php if (!empty($successMessage)) echo "<p style='color: green;'>$successMessage</p>"; ?>

            <form method="POST" action="" enctype="multipart/form-data">
                <div>
                    <label for="title">Title:</label>
                    <input type="text" id="title" name="title" required>
                </div>

                <div>
                    <label for="content">Content:</label>
                    <textarea id="content" name="content" rows="8" required></textarea>
                </div>

                <div>
                    <label for="image">Upload Image:</label>
                    <input type="file" id="image" name="image" accept="image/*"  onchange="previewImage(event)">
                </div>

                <!-- Image Preview -->
                <div class="image-preview">
                    <img id="preview" alt="Image Preview">
                </div>

                <div>
                    <button type="submit">Submit Update</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function previewImage(event) {
            const preview = document.getElementById("preview");
            const file = event.target.files[0];

            if (file) {
                const reader = new FileReader();
                reader.onload = function () {
                    preview.src = reader.result;
                    preview.style.display = "block";
                }
                reader.readAsDataURL(file);
            } else {
                preview.src = "";
                preview.style.display = "none";
            }
        }
    </script>

</body>
 <?php 
 include('footer.php');
?>