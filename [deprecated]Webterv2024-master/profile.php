<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> TryHard - Profile</title>
    <link href="css/style.css" rel="stylesheet">
</head>
<body>
<?php
include_once "inc/navbar.inc.php"; ?>
<main>
    <header>
        <h1 class="signup-and-login-caption">Profile</h1>
        <div>
            It seems like you're not logged in.
            <br>
            <br>
            <a href="signup.html">Click here to sign up if you don't have an account yet</a>
            <br>
            <br>
            <a href="login.html">Click here to log in if you already have an account</a>
        </div>
    </header>
    <section class="interests white background-form-but-wider-for-profile-section">
        <h1>Welcome, Visitor!</h1><!--TODO mf2 change to the actual name of the user when logged in-->
        <div class="left">
            <h3>Profile Information</h3>
            <p>Username:</p>
            <p>Email:</p>
            <p>Birthdate:</p>
            <p>Interests:</p>
            <form class="choose-your-interests" action="#">Choose Your Interests (only works when logged in):
                <label class="custom-checkbox"><input name="interests" type="checkbox" value="frontend"><span
                            class="checkmark"></span>Frontend Development</label>
                <label class="custom-checkbox"><input name="interests" type="checkbox" value="backend"><span
                            class="checkmark"></span>Backend Development</label>
                <label class="custom-checkbox"><input name="interests" type="checkbox" value="devops"><span
                            class="checkmark"></span>DevOps</label>
                <label class="custom-checkbox"><input name="interests" type="checkbox" value="fullstackdev"><span
                            class="checkmark"></span>Full Stack Development</label>

                <label class="custom-checkbox"><input name="interests" type="checkbox" value="html"><span
                            class="checkmark"></span>HTML "programming"</label>
                <label class="custom-checkbox"><input name="interests" type="checkbox" value="css"><span
                            class="checkmark"></span>CSS Tips and Tricks</label>
                <label class="custom-checkbox"><input name="interests" type="checkbox" value="javascript"><span
                            class="checkmark"></span>JavaScript Frameworks</label>
                <label class="custom-checkbox"><input name="interests" type="checkbox" value="php"><span
                            class="checkmark"></span>PHP Database Support</label>
                <label class="custom-checkbox"><input name="interests" type="checkbox" value="python"><span
                            class="checkmark"></span>Python Programming</label>
                <label for="submit"><input id="submit" type="submit" value="Save"></label>
            </form>
        </div>
    </section>
</main>
<?php include_once "inc/footer.inc.php"; ?>
</body>
</html>
