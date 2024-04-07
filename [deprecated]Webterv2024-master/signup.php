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
        <a href="login.html">Already registered? Click here to log in!</a>
    </header>
    <form action="#" class="background-form white" method="POST"><!--inc/signup.inc.php-->
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
</main>
<?php include_once "inc/footer.inc.php";?>
</body>