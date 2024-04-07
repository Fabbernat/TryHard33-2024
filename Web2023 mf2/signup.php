<?php
session_start();
setcookie("user", "meowuwuka", time() + 3600, "/");
$user = $_COOKIE["user"];

?>
<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <title> TryHard - Sign up</title>
    <link href="css/style.css" rel="stylesheet">
</head>
<body>
<?php
// File: signup.php
include 'inc/navbar.inc.php';
?>
<main class="signup">
    <header>
        <h1 class="signup-and-login-caption">Sign up</h1>
        <a href="login.php">Already registered? Click here to log in!</a>
    </header>
    <form action="inc/signup.inc.php" class="background-form white form" method="POST"><!--includes/signup.inc.php-->
        <fieldset>
            <legend> Registration</legend>
            <label for="username">Username
                <input id="username" name="username" placeholder="Username" required type="text">
            </label>
            <br>
            <label for="email">Email address
                <input id="email" name="email" placeholder="Email address" required type="email">
            </label>
            <br>

            <label for="firstname">First name
                <input id="firstname" name="firstname" placeholder="First name" required type="text">
            </label>
            <br>
            <label for="lastname">Last name
                <input id="lastname" name="lastname" placeholder="Last name" required type="text">
            </label>
            <br>
            <label for="birthdate">Birth date
                <input id="birthdate" name="birthdate" required type="date">
            </label>
            <br>
            <label for="password">Password
                <input id="password" name="password" placeholder="Password" required type="password">
            </label>
            <br>
            <label for="confirm_password">Confirm Password
                <input id="confirm_password" name="confirm_password" placeholder="Confirm Password" required
                       type="password">
            </label>
        </fieldset>
        <br>
        <!-- Submit button for registration -->
        <button class="button" type="submit">Sign up</button>
    </form>
    <?php
    if (isset($_GET['success']) && $_GET['success'] == 1) {
        echo "<p>Registration successful!</p>";
    } elseif (isset($_GET['error'])) {
        $errors = explode('<br>', $_GET['error']); // Explode the error message into an array
        echo "<p>Errors:</p><ul>"; // Start unordered list
        foreach ($errors as $error) {
            echo "<li>" . $error . "</li>"; // Display each error as a list item
        }
        echo "</ul>"; // End unordered list
    }
    ?>
</main>
<?php include_once "inc/footer.inc.php";?>
</body>