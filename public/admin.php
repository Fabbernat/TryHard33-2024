<?php
session_start();
include_once "inc/functions.inc.php";

$accounts = load_users("json/admins.json"); // betöltjük a regisztrált felhasználók adatait, és eltároljuk őket az $accounts változóban
$errors = [];
$already_logged_in = false;

// Check if the admin is already logged in
if (isset($_SESSION['admin_id'])) {
    $already_logged_in = true;

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> TryHard - Admin</title>
    <link href="css/style.css" rel="stylesheet">
</head>
<body>
<?php
include_once "inc/navbar.inc.php";
?>
<header>
    <h1 class="signup-and-login-caption">Admin (secret website)</h1>
    <?php
    if (isset($_SESSION["user_id"]) || isset($_SESSION["user"]["username"])) {
        echo "<h1>Welcome " . $_SESSION["user_id"] . "! </h1>
";
    }
    ?>
</header>
<main>
    <form action="#" class="white_background background-form margin-30-px form" method="post"><!--admin.php-->
        <fieldset>
            <legend>Let's see if you're really an admin!</legend>
            <p style="font-size: 16px; margin-top: 0;"> If you want to become one, contact us through the links at the
                bottom of the page.</p>
            <label for="id">Enter your reference number:
                <input id="id" name="id" placeholder="Id" required type="text">
            </label>
            <label for="code">Enter the code:
                <input id="code" name="code" placeholder="Code" required type="text">
            </label>
            <label for="animal_name">Enter your favorite animal:
                <input id="animal_name" name="animal_name" placeholder="Animal name" required type="text">
            </label>
            <label for="admin_password">Enter the super confidential secret admin password:
                <input id="admin_password" name="admin_password" placeholder="Password" required type="password">
            </label>
            <button type="submit">Enter</button>
        </fieldset>
    </form>
    <section class=" interests white_background background-form-but-wider-that-looks-cool">
        <?php
        // Check if the form is submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            @$id = $_POST["id"];
            @$code = $_POST["code"];
            @$animal_name = $_POST["animal_name"];
            @$password = $_POST["admin_password"];

            $everything_is_ok =
                isset($id) && $id >= 0 && $id < 10 &&
                isset($code) && ($code == 17 || $code == 107 || $code == 217) &&
                isset($animal_name) && ($animal_name == "cat" || $animal_name == "kitten") &&
                isset($password) && trim($password) !== "" && $password === "meowuwuka";

            if ($already_logged_in || $everything_is_ok) {
                echo "<h2>Welcome admin!</h2>";
                echo "<p>You have successfully entered the admin password.</p>";

                // Add additional admin functionalities here, such as database queries, content management, etc.
                echo "<p>You can now access confidential data and manage the website's content.</p>";

                // Read and display the content of the JSON file
                $users_data = json_decode(file_get_contents("json/users.json"), true);

                echo "<h3>User Data:</h3>";
                echo "<pre class='no-margin-no-padding code left'>";
                print_r($users_data);
                echo "</pre>";

                $jsonContent = file_get_contents("json/feedback.json");
                $feedbacks_data = json_decode($jsonContent, true);

                echo "<h3>User feedback (their star ratings 1-5 and their comments):</h3>";
                echo "<pre class='no-margin-no-padding code left'>";
                print_r($feedbacks_data);
                echo "</pre>";

                // Admin functionalities
                echo "<h3>Admin Panel:</h3>";
                echo "REQUEST_METHOD: " . $_SERVER["REQUEST_METHOD"] . "<br>";
                echo "quiz_submit isset: " . (isset($_POST["quiz_submit"]) ? 'true' : 'false') . "<br>";
                echo "user_id isset: " . (isset($_SESSION["user_id"]) ? 'true' : 'false') . "<br>";
                echo "Current session ID: <code class='lightgray-background'>" . session_id() . "</code><br><br>";
                echo "<h1>People subscribed to the newsletter:</h1>";
                echo "<fieldset class='code'>";
                $jsonContent = file_get_contents("json/subscribed_users.json");
                // fill out only the usernames from this file
                $subscribed_users = json_decode($jsonContent, true);
                echo "<pre class='no-margin-no-padding code left'>";
                print_r($subscribed_users);
                echo "</pre>";
                echo "</fieldset>";
                echo '
                    <section class="background-form-but-wider-that-looks-cool white_background">
        <h3>Delete Every User Data</h3>
        <form action="inc/delete_every_data.inc.php" method="POST">
            <p>Are you sure you want to delete every user data?</p>
            <?php $_POST["user_id"] = $_SESSION["user_id"];?>
            <button type="submit" name="delete">Delete Data</button>
        </form>
    </section>

                ';
            } else {
                echo "<h2>Something went wrong =( =(</h2>";
                echo "<p>Please try again.</p>";
            }
        }
        ?>
    </section>
</main>
<?php include_once "inc/footer.inc.html"; ?>
</body>
</html>
