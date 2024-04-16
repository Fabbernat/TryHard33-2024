<?php
session_start();

// Check if the delete button is clicked
if (isset($_POST['delete'])) {
    // Read the JSON file contents
    $file_contents = file_get_contents('json/users.json');

    // Decode the JSON data
    $data = json_decode($file_contents, true);

    // Find and remove the user's data from the JSON array
    foreach ($data['users'] as $key => $user) {
        if ($user['username'] === $_SESSION['username']) {
            unset($data['users'][$key]);
            break;
        }
    }

    // Encode the modified data back to JSON format
    $new_file_contents = json_encode($data, JSON_PRETTY_PRINT);

    // Write the updated JSON data back to the file
    file_put_contents('json/users.json', $new_file_contents);

    // Unset all session variables
    session_unset();

    // Destroy the session
    session_destroy();

    // Redirect the user to a confirmation page or any other appropriate page
    header("Location: ../index.php");
    exit();
}
