<?php
session_start();

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the file was uploaded without errors
    if (isset($_FILES["profile_picture"]) && $_FILES["profile_picture"]["error"] == UPLOAD_ERR_OK) {
        // Define a target directory to save the uploaded file
        $target_dir = "../uploads/";

        // Generate a unique filename to avoid overwriting existing files
        $target_file = $target_dir . uniqid() . "_" . basename($_FILES["profile_picture"]["name"]);

        // Check if the file is an actual image
        $image_info = getimagesize($_FILES["profile_picture"]["tmp_name"]);
        if ($image_info !== false) {
            // Move the uploaded file to the target directory
            if (move_uploaded_file($_FILES["profile_picture"]["tmp_name"], $target_file)) {
                // File uploaded successfully, update user's profile with the file path or other relevant information
                $profile_picture_path = $target_file;

                // Set the session variable to the path of the uploaded profile picture
                $_SESSION['profile_picture'] = $profile_picture_path;

                // Redirect the user back to the profile page or wherever you want
                header("Location: ../profile.php");
                exit(); // Stop further execution
            } else {
                // Failed to move the uploaded file
                echo "Sorry, there was an error uploading your file.";
            }
        } else {
            // Not a valid image file
            echo "File is not an image.";
        }
    } else {
        // No file uploaded or an error occurred during upload
        echo "No file uploaded or an error occurred.";
    }
} else {
    // Redirect the user back to the profile page if they try to access this js directly without submitting the form
    header("Location: ../profile.php");
    exit(); // Stop further execution
}
