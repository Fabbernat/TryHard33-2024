<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title> TryHard - Progress</title>
    <link href="css/style.css" rel="stylesheet">
</head>
<body>
<?php
include_once "inc/navbar.inc.php";?>
<main>
    <header>
        <h1 class="signup-and-login-caption">Progress</h1>
        <div>
            It seems like you're not logged in.
            <br>
            <br>
            <a href="signup.php">Click here to sign up if you don't have an account yet</a>
            <br>
            <br>
            <a href="login.php">Click here to log in if you already have an account</a>
        </div>
    </header>
    <section class="progress-tracker">
        <h2>Your progress in lessons:</h2>
        <div class="progress-item">
            <div class="progress-label">HTML</div>
            <div class="progress-bar">
                <div class="progress-bar-inner bar--higher"></div>
            </div>
        </div>
        <div class="progress-item">
            <div class="progress-label">CSS</div>
            <div class="progress-bar">
                <div class="progress-bar-inner bar--high"></div>
            </div>
        </div>
        <div class="progress-item">
            <div class="progress-label">JavaScript</div>
            <div class="progress-bar">
                <div class="progress-bar-inner  bar--medium"></div>
            </div>
        </div>
        <div class="progress-item">
            <div class="progress-label">PHP</div>
            <div class="progress-bar">
                <div class="progress-bar-inner bar--low"></div>
            </div>
        </div>
        <div class="progress-item">
            <div class="progress-label">Python</div>
            <div class="progress-bar">
                <div class="progress-bar-inner bar--lower"></div>
            </div>
        </div>
    </section>
</main>
<?php include_once "inc/footer.inc.php"; ?>
</body>
</html>