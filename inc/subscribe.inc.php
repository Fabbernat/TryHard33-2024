<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $newsletter_email = $_POST["newsletter_email"];

    // Read the existing feedbacks from the JSON file
    $subscribed_users = json_decode(file_get_contents("../json/subscribed_users.json"), true);


    // Convert the array back to JSON format
    $json_subscribed_users = json_encode($subscribed_users, JSON_PRETTY_PRINT);

    // Write the JSON data back to the file
    file_put_contents("../json/subscribed_users.json", $json_subscribed_users);

    // Redirect back to the feedback form page
    header("Location: ../profile.php?success=true");
    exit();
} else {
    // If the form is not submitted, redirect back to the feedback form page
    header("Location: ../profile.php?success=false");
    exit();
}