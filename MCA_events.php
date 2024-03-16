<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MCA Events</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        /* Modal */
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.5);
        }

        /* Modal content */
        .modal-content {
            background-color: #fefefe;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 30%;
            border-radius: 5px;
        }

        /* Close button */
        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        /* Input fields and labels */
        input[type=text],
        input[type=password] {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        label {
            font-weight: bold;
        }

        /* Submit button */
        input[type=submit] {
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
        }

        input[type=submit]:hover {
            background-color: #45a049;
        }
    </style>

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
        <div class="home-btns">
            <a href="index.php"><button> Go to Home</button></a>
            <a><button id="add-btn" onclick="openModal()">Add Event </button></a>


        </div>
        <!-- The Modal -->
        <div id="myModal" class="modal">
            <!-- Modal content -->
            <div class="modal-content">
                <span class="close" onclick="closeModal()">&times;</span>
                <h2>Enter Credentials</h2>
                <form action="authenticate.php" method="post">
                    <label for="username">Username:</label><br>
                    <input type="text" id="username" name="username" required><br>
                    <label for="password">Password:</label><br>
                    <input type="password" id="password" name="password" required><br><br>
                    <input type="submit" value="Submit">
                </form>
            </div>
        </div>








    </div>
    <script>
        // Get the modal
        var modal = document.getElementById("myModal");

        // Function to open the modal
        function openModal() {
            modal.style.display = "block";
        }

        // Function to close the modal
        function closeModal() {
            modal.style.display = "none";
        }

        // Close the modal if the user clicks outside of it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>

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