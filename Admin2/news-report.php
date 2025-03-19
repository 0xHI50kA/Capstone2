<?php
include('includes/connection.php'); // Database connection

// Database connection details
$host = "localhost";
$dbname = "hms_db";
$username = "root";
$password = "";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Fetch all news records
    $sql = "SELECT * FROM news ORDER BY id DESC";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $newsItems = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latest Health News</title>
    <!-- <link rel="stylesheet" href="../messenger/AiHeader.css"> -->
<link rel="stylesheet" type="text/css" href="../css/index1.css">
    	<!--============ FONT AWESOME CSS LINK START ============-->

	 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
     <link rel="stylesheet" href="css/styles.css">
     <link rel="stylesheet" href="css/footer.css">
        <!--============ FONT AWESOME CSS LINK END ============-->
    <style>
        body {
            font-family: 'Times New Roman', serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
            text-align: center;
        }

        .news-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
            margin-top: 40px;
            margin-bottom: 40px;
        }

        .news-item {
            width: 320px;
            height: 200px;
            background-color: #ffffff;
            border: 1px solid #ddd;
            box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.1);
            padding: 15px;
            cursor: pointer;
            transition: 0.2s ease;
            border-radius: 8px;
        }


        .news-item:hover {
            background-color: #f9f9f9;
            box-shadow: 2px 2px 5px rgba(0, 128, 0, 0.7); 
        }

        .news-item h3 {
            font-size: 1.4em;
            color: #333;
        }

        .news-item p {
            font-size: 1.1em;
            color: #555;
        }

        .news-item small {
            color: #777;
            font-style: italic;
        }

        /* Modal Styling */
        .modal {
            display: none;
            position: fixed;
            z-index: 10;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.5);
        }

        .modal-content {
            background-color: white;
            margin: 10% auto;
            padding: 20px;
            width: 60%;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.3);
            border-radius: 8px;
            position: relative;
        }

        .close {
            color: #aaa;
            position: absolute;
            right: 20px;
            top: 10px;
            font-size: 30px;
            cursor: pointer;
        }
        h1{
            margin-top: 100px;
        }
        .close:hover {
            color: red;
        }

        @media (max-width: 768px) {
            .news-container {
                grid-template-columns: 1fr; /* Single column for mobile */
            }

            .modal-content {
                width: 90%;
            }
        }
    </style>
</head>

     <!-- Back Button -->
    

           <!-- Header Section -->
    <header class="headin">


</header>
        
    <h1 >📰 Latest Health News From Atabs Health Care Center</h1>

    <div class="news-container">
        <?php if (!empty($newsItems) && count($newsItems) > 0): ?>
            <?php foreach ($newsItems as $news): ?>
                <div class="news-item" onclick="openModal('<?php echo addslashes($news['title']); ?>', '<?php echo addslashes($news['content']); ?>', '<?php echo htmlspecialchars($news['image']); ?>')">
                    <h3><?php echo htmlspecialchars($news['title']); ?></h3>
                    <p><?php echo htmlspecialchars(substr($news['content'], 0, 80)) . '...'; ?></p>
                    <!-- <small>🗓 Published on: <?php echo date("F j, Y", strtotime($news['created_at'])); ?></small> -->
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No news reports found.</p>
        <?php endif; ?>
    </div>

    <!-- Modal -->
    <div id="newsModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <h2 id="modalTitle"></h2>
            <p id="modalContent"></p>
            <img id="modalImage" src="" alt="News Image" style="width:100%; max-height:100%; object-fit:cover; border-radius:5px;">
        </div>
    </div>
  <!--================= FOOTER START ==================-->
<footer>
    <div class="footer-container">
        <div class="footer-logo">
            <p style="font-weight: bold;font-size: 25px; color: #0061ff; "> <i class="fa-solid fa-notes-medical"></i> SymptoAid</p>
            <p style="font-size: 20px;">SymptoAid is your reliable health companion, providing accurate symptom checks and essential medical guidance.</p>
        </div>

        <div class="footer-links">
            <p class="footheader" style="font-weight: bold;font-size: 25px;">Important Links</p>
            <ul>
                <!-- <li ><a href="../../index.html">Home</a></li> -->
                <li ><a href="/atabs_Health_Care/Admin2/news-report.php">News</a></li>
                <li ><a href="../AAtabHealthCare/Eventss/Event1.html">Events</a></li>
                <!-- <li ><a href="../AAtabHealthCare/Servicess/services.html">Services</a></li> -->
				<li ><a href="../AAtabHealthCare/SymptomAI/AboutAI.html">Symptom Checker</a></li>
				<li ><a href="/atabs_Health_Care/nearby.html">Nearby Healthcare</a></li>
            </ul>
        </div>

        <div class="footer-contact">
            <p class="footheader" style="font-weight: bold;font-size: 25px;">Contact Us</p>
			
			<p  style="font-size: 20px;"><i class="fas fa-envelope"></i> atabhc2019@gmail.com</p>
            <p style="font-size: 20px;"><i class="fas fa-phone" ></i> +4209087 </p>
			
            <p  style="font-size: 20px;"><i class="fas fa-map-marker-alt"></i> Circumferential Road,Baguio City</p>
        </div>

        <div class="footer-social">
            <p class="footheader" style="font-weight: bold;font-size: 25px;">Follow Us</p>
            <a href="https://web.facebook.com/atab.healthcenter" style="font-size: 35px; color: #3b5998;"><i class="fab fa-facebook"></i></a>
			<a href="https://web.facebook.com/messages/t/100068026195085" style="font-size: 35px;color: #0084ff;"><i class="fab fa-facebook-messenger"></i></a>
            <!-- <a href="#"><i class="fab fa-twitter"></i></a>
            <a href="#"><i class="fab fa-instagram"></i></a> -->
			<br>
			<p class="footheader" style="font-weight: bold;font-size: 25px;">Reference</p>
			<a href="https://doh.gov.ph" >Department of Health</a>
			<br>
			<a href="https://www.who.int/" >World Health Organization</a>
			
			
			
			
			<!-- Email Icon -->
			<!-- <a href="" style="font-size: 35px;">
				<i class="fas fa-envelope"></i>
			</a> -->
        </div>
		
    </div>
	<button id="backToTop"   class="back-to-top">↑ </button>
    <!-- <div class="footer-bottom">
        <p>&copy; 2024 Health Center. All rights reserved.</p>
    </div> -->
</footer>
    <script>
        function openModal(title, content, image) {
            document.getElementById('modalTitle').innerText = title;
            document.getElementById('modalContent').innerText = content;
            document.getElementById('modalImage').src = "uploads/" + image;
            document.getElementById('newsModal').style.display = "block";
        }

        function closeModal() {
            document.getElementById('newsModal').style.display = "none";
        }
    </script>
    <script type="text/javascript" src="../javascript/header1.js"></script>
    <script type="text/javascript" src="../javascript/index.js"></script>
</body>
</html>
