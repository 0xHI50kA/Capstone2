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

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News Reports</title>
    <link rel="stylesheet" type="text/css" href="./css/index.css">
    <style>
        /* General Body Styles */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        header {
            background-color: #333;
            color: #fff;
            padding: 15px 0;
            text-align: center;
            font-size: 24px;
            width: 100%;
            position: absolute;
            top: 0;
        }

        /* Main Container */
        main {
            max-width: 800px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
            padding: 40px;
            text-align: center;
            box-sizing: border-box;
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
            padding: 12px 25px;
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
    <header class="headin">


</header>

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
                <textarea id="content" name="content" rows="6" required></textarea>
            </div>

            <div>
                <button type="submit">Submit Report</button>
            </div>
            
        </form>
        <a href="dashboard.php">
    <button style="
        padding: 10px 20px;
        border: none;
        background-color: #555;
        color: white;
        cursor: pointer;
        border-radius: 5px;
        font-size: 16px;
    ">Back to Home</button>
</a>
    </main>
    
</body>

</html>


