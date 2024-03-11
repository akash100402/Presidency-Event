<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "event_database";

// Attempt to establish a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if all form fields are set
    if (isset($_POST['name']) && isset($_POST['date']) && isset($_POST['description']) && isset($_POST['organizer']) && isset($_FILES['image'])) {
        // Check if the file upload was successful
        if ($_FILES['image']['error'] === UPLOAD_ERR_OK) {
            // Move the uploaded file to the destination directory
            $image_path = "uploads/" . basename($_FILES["image"]["name"]);
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $image_path)) {
                // Sanitize user inputs to prevent SQL injection
                $name = mysqli_real_escape_string($conn, $_POST['name']);
                $date = mysqli_real_escape_string($conn, $_POST['date']);
                $description = mysqli_real_escape_string($conn, $_POST['description']);
                $organizer = mysqli_real_escape_string($conn, $_POST['organizer']);

                // Insert into database
                $sql = "INSERT INTO events (name, date, description, organizer, image_url)
                        VALUES ('$name', '$date', '$description', '$organizer', '$image_path')";

                if ($conn->query($sql) === TRUE) {
                    // Redirect to index.php after adding event
                    header("Location: index.php");
                    exit(); // Ensure script execution stops after redirection
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            } else {
                echo "Error: Failed to move uploaded file.";
            }
        } else {
            echo "Error: File upload failed with error code " . $_FILES['image']['error'];
        }
    } else {
        echo "Error: One or more form fields are missing.";
    }
}

// Close database connection
$conn->close();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Event</title>
    <link rel="stylesheet" href="styles.css">
    
</head>

<body>
    <header class="header_pres">
        <img src="./assets/logo.png" alt="">
        <div class="header-text">
            <h2>PRESIDENCY COLLEGE (Autonomous), Chennai - 600 005</h2>
            <h3>Reaccredited by the National Assessment and Accreditation Council with Grade "B+"</h3>
            <h4>All India Rank 3 by National Istitutional Ranking Framework (NIRF 2023)</h4>
        </div>
        <img src="./assets/185.png" alt="">
    </header>

    <div class="main">
        <div class="form">
            <h1>Add Event</h1>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" enctype="multipart/form-data">
                <div class="fields">
                    <label for="name">Event Name:</label>
                    <input type="text" placeholder="Enter event name" name="name" id="name" required><br>
                </div>
                <div class="fields">
                    <label for="date">Event Date:</label>
                    <input type="date" name="date" id="date" required><br>
                </div>
                <div class="fields">
                    <label for="description">Event Description:</label>
                    <textarea name="description" id="description" required></textarea><br>
                </div>
                <div class="fields">
                    <label for="organizer">Presenter:</label>
                    <input type="text" name="organizer" id="organizer" placeholder="Enter presenter name" required><br>
                </div>
                <div class="fields">
                    <label for="image">Event Invitation:</label>
                    <input type="file" name="image" id="image" required><br>
                </div>
                <div class="submit-btn"><input type="submit" id="submit-btn" value="Add Event"></div>
            </form>
        </div>
    </div>

   
</body>

</html>