<?php
session_start();
?>
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
        <?php

        $_SESSION["user"] = ["username" => $_SESSION["username"], "age" => 42]; // természetesen összetett adatok is tárolhatók a $_SESSION-ben

        if (isset($_SESSION["user"]["username"])) {
            echo "<h1>Welcome " . $_SESSION["user"]["username"] . "! </h1>
";
        } else {
           header("Location:index.php");
        }
        ?>
    </header>
    <section class="interests white background-form-but-wider-for-profile-section left">
        <h3>Upload a profile picture</h3>
        <!-- Add a field for uploading profile picture -->
        <form enctype="multipart/form-data" action="inc/upload.inc.php" method="POST">
            <input type="file" name="profile_picture" accept="image/*">
            <input type="submit" value="Upload Profile Picture">
        </form>
        <h3>Profile Information</h3>
        <p>Username:</p><?php echo @$_SESSION["username"] == "" ? "undefined" : @$_SESSION["username"] ?>
        <p>Email:</p><?php echo @$_SESSION["email"] == "" ? "undefined" : @$_SESSION["email"] ?>
        <p>Birthdate:</p><?php echo @$_SESSION["birthdate"]  == "" ? "undefined" : @$_SESSION["birthdate"] ?>
        <p>Interests:</p><?php echo @$_SESSION["interests"] == "" ? "undefined" : @$_SESSION["interests"] ?>
        <form class="choose-your-interests form" action="inc/process_interests.php">Choose Your Interests (only
            works when logged in):
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
        <?php
        $uzenet = "";                    // változó az űrlap alatt megjelenő üzenetnek

        if (isset($_POST["submit"])) {  // itt a $_POST szuperglobálist használjuk, hiszen az űrlapunk a method="POST" attribútummal rendelkezik
            if (isset($_POST["interests"])) {
                // ha legalább egy opciót kiválasztottak, akkor eltároljuk a bejelölt értékeket egy változóban
                $chosen = $_POST["interests"];   // ez egy tömb lesz, ami a bejelölt jelölőnégyzetek value értékeit tartalmazza
                $uzenet = "Chosen interests: " . implode(", ", $chosen) . "<br/>"; // tömbelemek egyesítése egy stringgé
            }
        }
        ?>
        <?php echo "<p>" . $uzenet . "</p>"; ?>
    </section>
    <section class="background-form-but-wider-for-profile-section greendiv display-block">
        <h1>Subscribe for our newsletter!</h1>
        <label for="newsletter_email">Email address:
            <input id="newsletter_email" name="newsletter_email" placeholder="Email address" required type="email">
        </label>
        <input type="submit" value="Send">
    </section>
</main>
<?php include_once "inc/footer.inc.php"; ?>
</body>
</html>
