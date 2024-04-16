<?php
session_start();
include_once "inc/functions.inc.php";

$accounts = load_users("json/admins.json"); // betöltjük a regisztrált felhasználók adatait, és eltároljuk őket a $fiokok változóban
$errors = [];

// Check if the admin is already logged in
if (isset($_SESSION['admin_id'])) {
    // Redirect to the admin panel
    header("Location: admin_panel.php");
    exit();
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
</header>
<main>
    <form action="#" class="white_background background-form margin-30-px form" method="post"><!--admin.php-->
        <fieldset>
            <legend>Enter the super confidential secret admin password</legend>
            <label for="admin_password">Admin password:</label>
            <input id="admin_password" name="admin_password" placeholder="Password" required
                   type="password">
            <button type="submit">Enter</button>
        </fieldset>
    </form>
    <section class=" interests white_background background-form-but-wider-for-profile-section">
        <?php
        // Check if the form is submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            @$password = $_POST["admin_password"];

            if ($password === "meowuwuka") {
                echo "<h2>Welcome admin!</h2>";
                echo "<p>You have successfully entered the admin password.</p>";

                // Add additional admin functionalities here, such as database queries, content management, etc.
                echo "<p>You can now access confidential data and manage the website's content.</p>";

                // Read and display the content of the JSON file
                $jsonContent = file_get_contents("json/users.json");
                $userData = json_decode($jsonContent, true);

                echo "<h3>User Data:</h3>";
                echo "<pre class='no-margin-no-padding code left'>";
                print_r($userData);
                echo "</pre>";

                // Admin functionalities
                echo "<h3>Admin Panel:</h3>";
                echo "<form action='admin.php' method='post' class='form'>";
                echo "Current session ID: <code class='lightgray-background'>" . session_id() . "</code><br><br>";
                echo "<fieldset>";
                echo "<legend>Admin Functions</legend>";
                echo "<label for='username'>Username:</label>";
                echo "<input type='text' name='username' id='username' placeholder='Username' required><br>";
                echo "<label for='password'>Password:</label>";
                echo "<input type='password' name='password' id='password' placeholder='Password' required><br>";
                echo "<button type='submit' name='admin_signup'>Register</button>";
                echo "<button type='submit' name='admin_login'>Login</button>";
                echo "</fieldset>";
                echo "</form>";

                // Handle admin registration and login
                if (isset($_POST["admin_signup"])) {
                    // Process registration logic
                    $username = htmlspecialchars(trim($_POST["username"]));
                    $password = $_POST["password"];

                    if (!isset($_POST["username"]) || trim($_POST["username"]) === "") {
                        $errors[] = "The username is required! Please fill it!";
                        $echo_errors = true;
                    }
                    // Check if username already exists
                    foreach ($accounts as $account) {
                        if ($account["username"] === $username) {
                            $errors[] = "The username is already taken!";
                            $echo_errors = true;
                            break;// No need to continue checking if username already exists
                        }
                    }

                    if (!isset($_POST["password"]) || trim($_POST["password"]) === "") {
                        $errors[] = "The password and password confirmation are required! Please fill it!";
                        $echo_errors = true;
                    }

                    if (count($errors) === 0) { // Successful registration
                        // Hash the password
                        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

                        // Create a new user object
                        $new_admin = [
                            "username" => $username,
                            "password" => $hashed_password,
                        ];

                        // Add the new user to the array of accounts
                        $accounts["admins"][] = $new_admin;

                        // Save the updated array of accounts to the JSON file
                        save_users("json/admins.json", $accounts);

                        // Redirect the user to the login page
//                        header("Location: admin.php?signup=true");
                        exit();
                    }
                }
                if (isset($_POST["admin_login"])) {
                    // Process login logic
                    if (!isset($_POST["username"]) || trim($_POST["username"]) === "" || !isset($_POST["password"]) || trim($_POST["password"]) === "") {
                        // ha a kötelezően kitöltendő űrlapmezők valamelyike üres, akkor hibaüzenetet jelenítünk meg
                        $errors[] = "<strong>Error:</strong> Please fill in all fields!";
                    } else {
                        $username = $_POST["username"];
                        $password = $_POST["password"];

                        $authenticated = false;
                        foreach ($accounts["admins"] as $account) {
                            if (@$account["username"] === $username && password_verify($password, $account["password"])) {
                                $authenticated = true;
                                $_SESSION["username"] = $username;
                                $_SESSION['user_id'] = $username;
//                                header("Location: admin.php?login=true");
                                exit(); // Stop further execution after redirect
                            }
                        }
                        $errors[] = "Login failed! Check if the username and password you've given are correct!";
                    }
                    $echo_errors = true;
                }
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
