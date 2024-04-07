<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $username = $_POST['username'];
    $email = $_POST['email'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $birthdate = $_POST['birthdate'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Validate form data
    $errors = array();

    // Check if username is not empty
    if (empty($username)) {
        $errors[] = "Username is required";
    }

    // Check if email is not empty and is valid
    if (empty($email)) {
        $errors[] = "Email address is required";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email address format";
    }

    // Check if first name is not empty
    if (empty($firstname)) {
        $errors[] = "First name is required";
    }

    // Check if last name is not empty
    if (empty($lastname)) {
        $errors[] = "Last name is required";
    }

    // Check if birthdate is not empty
    if (empty($birthdate)) {
        $errors[] = "Birth date is required";
    }

    // Check if password is not empty and matches confirm password
    if (empty($password)) {
        $errors[] = "Password is required";
    } elseif ($password != $confirm_password) {
        $errors[] = "Passwords do not match";
    }

    // If there are no errors, proceed with registration
    if (empty($errors)) {
        // Registration successful, redirect back to signup.php with success message
        header("Location: ../signup.php?success=1");
        exit();
    } else {
        // If there are errors, redirect back to signup.php with error messages
        header("Location: ../signup.php?error=" . urlencode(implode('<br>', $errors)));
        exit();
    }
} else {
    // If form is not submitted, redirect back to signup page
    header("Location: ../signup.php");
    exit();
}
?>
