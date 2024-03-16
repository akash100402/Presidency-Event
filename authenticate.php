<?php
// Check if username and password are set and not empty
if (isset($_POST['username']) && isset($_POST['password']) && !empty($_POST['username']) && !empty($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Replace these with your actual credentials verification logic
    $correctUsername = "admin";
    $correctPassword = "admin123";

    // Check if the entered credentials match the correct ones
    if ($username === $correctUsername && $password === $correctPassword) {
        // Redirect to add_event.php if credentials are correct
        header("Location: add_event.php");
        exit();
    } else {
        // Display error message if credentials are incorrect
        echo "Incorrect username or password. Please try again.";
    }
} else {
    // Display error message if username or password is not provided
    echo "Username and password are required.";
}
