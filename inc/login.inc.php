<?php
include_once "functions.inc.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $username = $_POST['username'];
    $password = $_POST['password'];
    header("Location: ../login.php?success=1");
} else {
    header("Location: ../login.php?login=not_yet_implemented");
}
exit();
