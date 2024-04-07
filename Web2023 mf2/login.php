<?php
session_start();
?>
<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <title> TryHard - Log in</title>
    <link href="css/style.css" rel="stylesheet">
</head>
<body>
<?php include 'inc/navbar.inc.php';?>
<main>
    <header>
        <h1 class="signup-and-login-caption">Log in</h1>
        <a href="signup.php">Don't have an account yet? Click here to sign up!</a>
    </header>
    <form action="inc/login.inc.php" class="background-form white form" method="post"> <!--inc/login.inc.php-->
        <fieldset>
            <legend> Log in credentials</legend>
            <label for="username"> Username
                <input id="username" name="username" placeholder="Username" required type="text">
            </label>
            <br>
            <label for="password"> Password
                <input id="password" name="password" placeholder="Password" required type="password">
            </label>
        </fieldset>
        <br>
        <button class="button" type="submit">Log in</button>
    </form>
</main>
<?php include_once "inc/footer.inc.php"; ?>
</body>