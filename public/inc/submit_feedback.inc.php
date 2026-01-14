<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $rating = $_POST["stars"];
    $comment = $_POST["comment"];

    // Create an array to store the feedback
    $feedback = array(
        "rating" => $rating,
        "comment" => $comment
    );

    // Read the existing feedbacks from the JSON file
    $feedbacks = json_decode(file_get_contents("../json/feedback.json"), true);

    // Append the new feedback to the array
    $feedbacks[] = $feedback;

    // Convert the array back to JSON format
    $json_feedbacks = json_encode($feedbacks, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);

    // Write the JSON data back to the file
    file_put_contents("../json/feedback.json", $json_feedbacks);

    // Redirect back to the feedback form page
    header("Location: ../feedback.php?success=true");
} else {
    // If the form is not submitted, redirect back to the feedback form page
    header("Location: ../feedback.php?success=false");
}
exit();