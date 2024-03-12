<?php
// Check if the event ID is provided in the URL
if (isset($_GET['id'])) {
    // Retrieve event details based on the ID
    $event_id = $_GET['id'];

    // Database connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "event_database";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Retrieve event details from the database
    $sql = "SELECT * FROM mca_events WHERE id = $event_id"; // Assuming MCA event
    $result = $conn->query($sql);

    // Check if the event exists in MCA events
    if ($result->num_rows > 0) {
        // Display MCA event details
        $row = $result->fetch_assoc();
?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title><?php echo $row["name"]; ?> - Event Details</title>
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
            <div class="single-event">
                <h1><?php echo $row["name"]; ?></h1>

                <div class="date-org">
                    <p id="date--org">Date: <span id="dis-date"><?php echo $row["date"]; ?></span></p>
                    <p id="date--org">By: <span id="dis-org"><?php echo $row["organizer"]; ?></span></p>
                </div>
                <img id="img-event" src="<?php echo $row["image_url"]; ?>" alt="<?php echo $row["name"]; ?>">
                <p id="discription-para">Description: <?php echo $row["description"]; ?></p>

            </div>
        </body>

        </html>
        <?php
    } else {
        // If the event does not exist in MCA events, check BCA events
        $sql = "SELECT * FROM bca_events WHERE id = $event_id"; // Assuming BCA event
        $result = $conn->query($sql);

        // Check if the event exists in BCA events
        if ($result->num_rows > 0) {
            // Display BCA event details
            $row = $result->fetch_assoc();
        ?>
            <!DOCTYPE html>
            <html lang="en">

            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title><?php echo $row["name"]; ?> - Event Details</title>
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
                <div class="single-event">
                    <h1><?php echo $row["name"]; ?></h1>

                    <div class="date-org">
                        <p id="date--org">Date: <span id="dis-date"><?php echo $row["date"]; ?></span></p>
                        <p id="date--org">By: <span id="dis-org"><?php echo $row["organizer"]; ?></span></p>
                    </div>
                    <img id="img-event" src="<?php echo $row["image_url"]; ?>" alt="<?php echo $row["name"]; ?>">
                    <p id="discription-para">Description: <?php echo $row["description"]; ?></p>

                </div>
            </body>

            </html>
<?php
        } else {
            echo "Event not found";
        }
    }

    // Close database connection
    $conn->close();
} else {
    echo "Event ID not provided";
}
?>