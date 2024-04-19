<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $newsletter_email = $_POST["newsletter_email"];

    // Read the existing users from the JSON file
    $users = json_decode(file_get_contents("../json/users.json"), true);

    // Iterate over each user to find the one with the specified email
    foreach ($users["users"] as &$user) {
        if ($user["email"] == $newsletter_email) {
            // Set the "subscribed" value to true for the found user
            $user["subscribed"] = true;
        }
    }
    unset($user); // Unset the reference to avoid potential issues

    // Convert the updated users array back to JSON format
    $json_users = json_encode($users, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);

    // Write the JSON data back to the file
    file_put_contents("../json/users.json", $json_users);

    $subscribed_users = json_decode(file_get_contents("../json/subscribed_users.json"), true);

    // Check if the user already exists in the array
    if ($subscribed_users == null || !in_array($newsletter_email, $subscribed_users)) {
        // If the user does not exist, add them to the array
        $subscribed_users[] = $newsletter_email;

        // Convert the array back to JSON format
        $json_subscribed_users = json_encode($subscribed_users, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);

        // Write the JSON data back to the file
        file_put_contents("../json/subscribed_users.json", $json_subscribed_users);
    }

    // Redirect back to the profile page with a success message
    header("Location: ../profile.php?success=true");
} else {

    // If the form is not submitted, redirect back to the profile page with an error message
    header("Location: ../profile.php?error=Form_not_submitted");
}
exit();
