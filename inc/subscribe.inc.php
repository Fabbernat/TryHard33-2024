<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $newsletter_email = $_POST["newsletter_email"];

    // Read the existing feedbacks from the JSON file
    $subscribed_users = json_decode(file_get_contents("../json/subscribed_users.json"), true);

    // Check if the user already exists in the array
    if ($subscribed_users == null || !in_array($newsletter_email, $subscribed_users)) {
        // If the user does not exist, add them to the array
        $subscribed_users[] = $newsletter_email;

        // Convert the array back to JSON format
        $json_subscribed_users = json_encode($subscribed_users, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);

        // Write the JSON data back to the file
        file_put_contents("../json/subscribed_users.json", $json_subscribed_users);

        // Redirect back to the feedback form page with a success message
        header("Location: ../profile.php?success=true");
    } else {
        // If the user already exists, redirect back to the feedback form page with an error message
        header("Location: ../profile.php?error=User already subscribed");
    }
    exit();
} else {
    // If the form is not submitted, redirect back to the feedback form page
    header("Location: ../profile.php?success=false");
    exit();
}