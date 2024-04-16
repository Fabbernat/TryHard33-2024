<?php
session_start();

// Check if the checkbox is checked
if(isset($_POST['trackProgress']) && $_POST['trackProgress'] === 'on') {
    // Set the progress for HTML to 1 in the session
    $_SESSION['progress']['html'] = 1;
} else {
    // If the checkbox is unchecked, remove the progress for HTML from the session
    unset($_SESSION['progress']['html']);
}
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
include_once "inc/navbar.inc.php";
include_once "inc/functions.inc.php";
$userProgress = @getUserProgress($_SESSION['user_id']);
?>
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
            <div class="<?php if (isset($userProgress['html']) && $userProgress['html'] === 1) echo 'completed'; else echo 'progress-bar' ?>">
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
    <section class="white_background two-px-border border-radius-px">
        <h1>Track Progress</h1>
        <label for="trackProgress">I have learned this lesson:</label>
        <input type="checkbox" id="trackProgress" name="trackProgress">
    </section>
</main>
<?php include_once "inc/footer.inc.html"; ?>
</body>
</html>