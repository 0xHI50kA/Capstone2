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
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

// Fetch all news items
$sql = "SELECT * FROM news ORDER BY created_at DESC";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$newsItems = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News Report Table</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f4f4f9;
        }

        h1 {
            color: #333;
        }

        table {
            width: 100%;
            margin: 20px 0;
            border-collapse: collapse;
        }

        table th,
        table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }

        table th {
            background-color: #333;
            color: #fff;
        }

        button.delete-btn {
            background: red;
            color: white;
            padding: 5px 10px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        button.delete-btn:hover {
            background: darkred;
        }

        /* Confirmation popup style */
        .confirm-popup {
            background-color: #fff;
            border: 1px solid #333;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
            padding: 10px;
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 1000;
        }

        .confirm-popup button {
            margin-top: 10px;
            padding: 5px 10px;
            cursor: pointer;
        }

        .overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 999;
        }
    </style>
</head>

<body>
    <h1>News Reports</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Content</th>
                <th>Published Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($newsItems)): ?>
                <?php foreach ($newsItems as $news): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($news['id']); ?></td>
                        <td><?php echo htmlspecialchars($news['title']); ?></td>
                        <td><?php echo htmlspecialchars(substr($news['content'], 0, 50)) . '...'; ?></td>
                        <td><?php echo htmlspecialchars($news['created_at']); ?></td>
                        <td>
                            <button class="delete-btn" onclick="confirmDelete(<?php echo $news['id']; ?>)">Delete</button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5">No news reports found.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

    <!-- Delete Confirmation Popup -->
    <div class="overlay" id="overlay"></div>
    <div class="confirm-popup" id="confirmPopup">
        <p>Are you sure you want to delete this news report?</p>
        <button onclick="performDelete()">Yes, Delete</button>
        <button onclick="cancelDelete()">Cancel</button>
    </div>

    <script>
        let newsToDelete = null;

        function confirmDelete(newsId) {
            newsToDelete = newsId; // Store the news ID to delete
            document.getElementById('overlay').style.display = 'block';
            document.getElementById('confirmPopup').style.display = 'block';
        }

        function cancelDelete() {
            newsToDelete = null;
            document.getElementById('overlay').style.display = 'none';
            document.getElementById('confirmPopup').style.display = 'none';
        }

        function performDelete() {
            if (newsToDelete) {
                window.location.href = `delete.php?delete_id=${newsToDelete}`;
            }
        }
    </script>
</body>

</html>
