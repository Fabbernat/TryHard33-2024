<?php
session_start();

include_once "functions.inc.php";

if ($_POST["user_id"] === $_SESSION["user_id"] || $_SERVER["REQUEST_METHOD"] == "POST" || isset($_POST['delete'])) {
    $user_id = $_POST["user_id"];
//    echo $user_id . "<br>";

    $files = glob('../uploads/*');

    foreach ($files as $file) {
        if (is_file($file)) {
            unlink($file);
        }
    }

    // Create an empty array
    $empty_data = ["users" => []];

    // Encode the empty array to JSON format
    $empty_json = json_encode($empty_data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);

    // Write the empty JSON data back to the file, effectively deleting its contents
    file_put_contents('../json/users.json', $empty_json);

    session_unset();

    session_destroy();

    header("Location: ../index.php");
} else {
    header("Location: ../profile.php?delete=false");
}
exit();