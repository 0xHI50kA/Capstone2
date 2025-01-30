<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us | News Report</title>
    <style>
        /* General Body Styling */
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
            color: #333;
        }

        /* Section Styling */
        .about-us {
            display: flex;
            flex-wrap: wrap;
            background-color: #ffffff;
            border: 1px solid #ddd;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin: 20px auto;
            max-width: 1200px;
            border-radius: 8px;
            overflow: hidden;
        }

   
        /* Right Content Section */
        .abut-yoiu {
            flex: 1;
            padding: 30px;
        }

        .abut-yoiu h3 {
            font-size: 28px;
            margin-bottom: 20px;
            color: #0056b3;
            border-left: 5px solid #0056b3;
            padding-left: 10px;
        }

        .abut-yoiu p {
            line-height: 1.6;
            font-size: 16px;
            margin-bottom: 15px;
            color: #555;
        }

        .abut-yoiu p:first-letter {
            font-size: 22px;
            font-weight: bold;
            color: #333;
        }

        /* Button Styling */
        .home-button {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #0056b3;
            color: #ffffff;
            text-decoration: none;
            font-size: 16px;
            font-weight: bold;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .home-button:hover {
            background-color: #003d82;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .about-us {
                flex-direction: column;
            }

            .image-bg {
                height: 200px;
            }
        }
    </style>
</head>
<body>
    
    
    <!--  ************************* About Us Starts Here ************************** -->
        
    <section id="about_us" class="about-us">
        <div class="row no-margin">
            <!-- Left Image Section -->
            <div class="col-sm-6 image-bg no-padding"></div>
            
            <!-- Right Content Section -->
            <div class="col-sm-6 abut-yoiu">
                <h3>ANNOUNCEMENT AREA</h3>

<?php
include('include/config.php');
$ret = mysqli_query($con, "SELECT * FROM tblpage WHERE PageType='aboutus'");
while ($row = mysqli_fetch_array($ret)) {
?>

                <p><?php echo $row['PageDescription']; ?>.</p>

<?php } ?>
                <a href="../index.html" class="home-button">Go to Home</a>
            </div>
        </div>
    </section>    

</body>
</html>
