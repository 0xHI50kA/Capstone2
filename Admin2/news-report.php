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

    // Fetch news from the database
    $sql = "SELECT * FROM news ORDER BY created_at DESC";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    // Fetch all rows into $newsItems
    $newsItems = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="en">
<!-- <link rel="stylesheet" href="../messenger/AiHeader.css"> -->
<link rel="stylesheet" type="text/css" href="../css/index1.css">
    	<!--============ FONT AWESOME CSS LINK START ============-->

	 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
     <link rel="stylesheet" href="css/styles.css">
 
        <!--============ FONT AWESOME CSS LINK END ============-->

<head>
    <!-- Header Section -->
  
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News Reports</title>
    <style>
        /* General body styles */
        /* body {
            font-family: 'Poppins', sans-serif;
            background-color: #fdfdfd;
            margin: 0;
            padding: 10px;
        } */

        h2 {
            text-align: center;
            color: #333;
            font-size: 26px;
            margin-top: 100px;
        }

        /* Back Button Styling */
        .back-btn {
            display: inline-block;
            padding: 10px 15px;
            font-size: 16px;
            background-color: #555;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            cursor: pointer;
            margin-bottom: 10px;
            transition: background-color 0.2s ease;
        }

        .back-btn:hover {
            background-color: #333;
        }

        /* News container styles */
        .news-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
            margin-top: 20px;
        }

        .news-item {
            width: 320px;
            background-color: #ffffff;
            border: 1px solid #ddd;
            box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.1);
            padding: 15px;
            cursor: pointer;
            transition: 0.2s ease;
            border-radius: 8px;
        }

        .news-item:hover {
            background-color: #f1f1f1;
            transform: scale(1.05);
        }

        .news-item h3 {
            font-size: 18px;
            margin-bottom: 8px;
            color: #333;
        }

        .news-item p {
            font-size: 14px;
            color: #555;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
            margin-bottom: 8px;
        }

        /* Modal styles for newspaper-like view */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: #fff;
            z-index: 1000;
            overflow-y: auto;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.2);
        }

        .modal-content {
            max-width: 1200px;
            margin: 30px auto;
            padding: 20px;
            border: 1px solid #ddd;
            box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            font-size: 16px;
            line-height: 1.8;
        }

        /* Newspaper-like columns layout */
        .newspaper-view {
            display: flex;
            gap: 20px;
            column-count: 2;
            column-gap: 20px;
            column-rule: 1px solid #aaa;
            text-align: justify;
        }

        /* Header styles */
        .news-header {
            text-align: center;
            font-size: 22px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .news-footer {
            font-size: 12px;
            color: gray;
            text-align: center;
            margin: 15px 0;
        }

        /* Close button */
        .close-btn {
            position: absolute;
            top: 15px;
            right: 20px;
            background: #e74c3c;
            border: none;
            color: white;
            font-size: 16px;
            padding: 5px 10px;
            cursor: pointer;
            border-radius: 5px;
        }

        /* Responsive Breakpoints */
        @media (max-width: 768px) {
            .news-container {
                flex-direction: column;
                gap: 10px;
            }

            .newspaper-view {
                column-count: 1;
            }
        }
    </style>
</head>

<body>
    <!-- Back Button -->
    <button style="
    position: absolute;
padding: 10px 20px; 
margin-top: 10px;
background-color: #6c757d; 
color: white; 
border: none; 
border-radius: 5px; 
cursor: pointer; 
font-size: 16px;
transition: background-color 0.2s ease; margin-left: 40px;margin-top: 100px;
" onclick="window.location.href='../index.html#mainpage'">← Back</button>

           <!-- Header Section -->
    <header class="headin">


</header>

    <h2>Latest Health News From Atabs Health Care Center </h2>
    
    <div class="news-container">
        <?php if (!empty($newsItems) && count($newsItems) > 0): ?>
            <?php foreach ($newsItems as $news): ?>
                <div class="news-item" onclick="openModal('<?php echo addslashes($news['title']); ?>', '<?php echo addslashes($news['content']); ?>', '<?php echo $news['created_at']; ?>')">
                    <h3><?php echo htmlspecialchars($news['title']); ?></h3>
                    <p><?php echo htmlspecialchars(substr($news['content'], 0, 50)) . '...'; ?></p>
                    <small>Published on: <?php echo $news['created_at']; ?></small>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No news reports found.</p>
        <?php endif; ?>
    </div>

    <!-- Modal for newspaper-like reading -->
    <div class="modal" id="newsModal">
        <button class="close-btn" onclick="closeModal()">Close</button>
        <div class="modal-content">
            <div class="news-header" id="modalTitle"></div>
            <div class="newspaper-view" id="modalContent"></div>
            <div class="news-footer" id="modalDate"></div>
        </div>
    </div>

    <script>
        function openModal(title, content, date) {
            document.getElementById('modalTitle').innerText = title;
            document.getElementById('modalContent').innerHTML = `<p>${content}</p>`;
            document.getElementById('modalDate').innerText = "Published on: " + date;
            document.getElementById('newsModal').style.display = "block";
        }

        function closeModal() {
            document.getElementById('newsModal').style.display = "none";
        }
    </script>
    <script type="text/javascript" src="../javascript/header.js"></script>
</body>

</html>
