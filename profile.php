<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> TryHard - Profile and Career</title>
    <link href="css/style.css" rel="stylesheet">
</head>
<body>
<?php
include_once "inc/navbar.inc.php";
?>
<main>
    <header>
        <h1 class="signup-and-login-caption">Profile and Career</h1>
        <?php

        // Check if the user is logged in
        if (isset($_SESSION["user_id"]) || isset($_SESSION["user"]["username"])) {
            echo "<h1>Welcome " . $_SESSION["user_id"] . "! </h1>
";
        } else {
            header("Location:index.php");
        }
        ?>
    </header>
    <section class="background-form-but-wider-for-profile-section greendiv display-block">
        <form action="inc/subscribe.inc.php" method="post">
            <h1>Subscribe for our newsletter!</h1>
            <label for="newsletter_email">Email address:
                <input id="newsletter_email" name="newsletter_email" placeholder="Email address" required type="email">
            </label>
            <input type="submit" value="Send">
        </form>
    </section>
    <section class="background-form-but-wider-for-profile-section greendiv" style="padding: 20px; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); font-weight: bold;">
        <h1 style="color: #ffff99; font-size: 48px; text-align: center; text-transform: uppercase; font-weight: bold;">Exciting Career Opportunity</h1>
        <h2 style="font-size: 36px; text-align: center;">Join the TryHard33 Team, become an Admin Today!</h2>
        <p style="color: #777; font-size: 24px; text-align: center;">Unlock limitless possibilities and shape the future with us.</p>
        <div style="text-align: center; margin-top: 20px;">
            <a href="admin.php" style="background-color: #ff5722; color: #fff; padding: 15px 40px 15px;margin-bottom: 40px; border-radius: 10px; text-decoration: none; font-size: 36px; font-weight: bold;">Apply Now</a>
        </div>
    </section>

    <section class="interests white_background background-form-but-wider-for-profile-section left">
        <h3>Change profile picture</h3>
        <!-- File uploading -->
        <form enctype="multipart/form-data" action="inc/upload.inc.php" method="POST">
            <input type="file" name="profile_picture" accept="img/*">
            <input type="hidden" name="MAX_FILE_SIZE" value="102400">
            <input type="submit" value="Upload Profile Picture">
        </form>
        <h3>Profile Information</h3>
        <p>Username: <?php echo @$_SESSION["username"] == "" ? "undefined" : @$_SESSION["username"] ?></p>
        <p>Email: <?php echo @$_SESSION["email"] == "" ? "undefined" : @$_SESSION["email"] ?></p>
        <p>Birthdate: <?php echo @$_SESSION["birthdate"] == "" ? "undefined" : @$_SESSION["birthdate"] ?></p>
        <p>Interests: <?php echo @$_SESSION["interests"] == "" ? "undefined" : @$_SESSION["interests"] ?></p>

        <!-- Show current profile picture -->
        <h4>Current Profile Picture:</h4>
        <?php
        // Check if the user has a profile picture
        if (isset($_SESSION['profile_picture'])) {
            echo "<img src='" . $_SESSION['profile_picture'] . "' alt='Your Current Profile Picture'>";
        } else {
            echo '<img alt="Default profile picture" src="img/profile_icon.jpg" class="code border-radius-px">';
        }
        ?>

        <form class="choose-your-interests form" action="inc/process_interests.php">
            <h1 class="bigger-letters">

                Choose Your Interests (only
                works when logged in):
            </h1>
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
            <label for="submit"><input id="submit" type="submit" value="Save" onclick="saveInterests(event)"></label>
        </form>
        <script>
            function toggleCircle(checkbox) {
                const circle = document.getElementById('circle');
                if (checkbox.checked) {
                    circle.classList.add('green-circle');
                } else {
                    circle.classList.remove('green-circle');
                }
            }

            function saveInterests(event) {
                // Prevent the default form submission behavior
                event.preventDefault();

                // Get the form element
                const form = document.getElementById('progressForm');

                // Submit the form using AJAX or perform any other necessary actions
                // Example: form.submit();
            }
        </script>
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
    <section class="background-form-but-wider-for-profile-section white_background">
        <h3>Delete Your Data</h3>
        <form action="inc/delete_data.inc.php" method="POST">
            <p>Are you sure you want to delete all your data?</p>
            <button type="submit" name="delete">Delete Data</button>
        </form>
    </section>
</main>
<?php include_once "inc/footer.inc.html"; ?>
</body>
</html>
