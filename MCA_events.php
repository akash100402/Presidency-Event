<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MCA Events</title>
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

    <div class="heading">
        <h1>MCA Events</h1>
        <a href="add_event.php"><button>Add Event</button></a>
    </div>
    <div class="event-container">
        <?php
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

        // Retrieve all events from the database
        $sql = "SELECT id, name, date, organizer, image_url FROM mca_events";
        $result = $conn->query($sql);

        // Check if there are any events
        if ($result->num_rows > 0) {
            // Output data of each row
            while ($row = $result->fetch_assoc()) {
        ?>
                <div class="event" onclick="location.href='event_detail.php?id=<?php echo $row["id"]; ?>'">
                    <img src="<?php echo $row["image_url"]; ?>" alt="<?php echo $row["name"]; ?>">
                    <h2><?php echo $row["name"]; ?></h2>
                    <p>Date: <span id="date-text"><?php echo $row["date"]; ?></span></p>
                    <p>Presenter: <span id="org-text"><?php echo $row["organizer"]; ?></span></p>

                </div>

        <?php
            }
        } else {
            echo "No events found";
        }

        // Close database connection
        $conn->close();
        ?>
    </div>
</body>

</html>