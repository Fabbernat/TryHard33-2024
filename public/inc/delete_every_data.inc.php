<?php

session_start();

include_once "functions.inc.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" || isset($_POST['delete'])) {
    $user_id = $_POST["user_id"];
    echo $user_id . "<br>";

    // Create an empty array
    $empty_data = ["users" => []];
    $empty_data2 = [];

    // Encode the empty array to JSON format
    $empty_json = json_encode($empty_data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    $empty_json2 = json_encode($empty_data2, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);

    // Write the empty JSON data back to the file, effectively deleting its contents
    file_put_contents('../json/users.json', $empty_json);
    file_put_contents('../json/subscribed_users.json', $empty_json2);
    file_put_contents('../json/feedback.json', $empty_json2);


    header("Location: ../admin.php");
} else {
    header("Location: ../admin.php?delete=false");
}
exit();