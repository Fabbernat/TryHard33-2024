<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

setcookie("user", "meowuwuka", time() + 3600, "/");
include "inc/functions.inc.php";              // beágyazzuk a load_users() és save_users() függvényeket tartalmazó PHP fájlt
$accounts = load_users("json/users.json"); // betöltjük a regisztrált felhasználók adatait, és eltároljuk őket az $accounts változóban

$errors = [];
$echo_errors = false;

if (isset($_POST["signup"])) {
    $username = htmlspecialchars(trim($_POST["username"]));
    $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $birthdate = $_POST["birthdate"];
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];

    $birthdate_timestamp = strtotime($_POST["birthdate"]);
    $current_timestamp = time();

    $age_in_seconds = $current_timestamp - $birthdate_timestamp;

    $age = floor($age_in_seconds / (60 * 60 * 24 * 365));

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

    if (!isset($_POST["firstname"]) || trim($_POST["firstname"]) === "") {
        $errors[] = "The first name is required! Please fill it!";
        $echo_errors = true;
    }

    if (!isset($_POST["lastname"]) || trim($_POST["lastname"]) === "") {
        $errors[] = "The last name is required! Please fill it!";
        $echo_errors = true;
    }

    if (!isset($_POST["password"]) || trim($_POST["password"]) === "" || !isset($_POST["confirm_password"]) || trim($_POST["confirm_password"]) === "") {
        $errors[] = "The password and password confirmation are required! Please fill it!";
        $echo_errors = true;
    }

    if (!isset($_POST["birthdate"]) || trim($_POST["birthdate"]) === "") {
        $errors[] = "The birthdate is required! Please fill it!";
        $echo_errors = true;
    }

    if (strlen($password) < 5) {
        $errors[] = "The password must be at least 5 characters long!";
        $echo_errors = true;
    }

    if ($password !== $confirm_password) {
        $errors[] = "The password and confirmation password do not match!";
        $echo_errors = true;
    }
    if ($age < 18) {
        $errors[] = "You must be at least 18 years old to register!";
        $echo_errors = true;
    }

// If no errors, add the new user

    if (count($errors) === 0) { // Successful registration
        // Hash the password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Create a new user object
        $new_user = [
            "username" => $username,
            "email" => $email,
            "password" => $hashed_password,
            "birthdate" => $birthdate,
            "registration_age" => $age,
            "solved_tasks" => []
        ];

        // Add the new user to the array of accounts
        $accounts["users"][] = $new_user;

        // Save the updated array of accounts to the JSON file
        save_users("json/users.json", $accounts);

        // Redirect the user to the login page
        header("Location: login.php");
        exit();
    }
} else {
    // Store input values in session variables
    $_SESSION['username'] = @$_POST['username'];
    $_SESSION['email'] = @$_POST['email'];
    $_SESSION['firstname'] = @$_POST['firstname'];
    $_SESSION['lastname'] = @$_POST['lastname'];
    $_SESSION['birthdate'] = @$_POST['birthdate'];
}
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
    <form action="signup.php" class="background-form white_background form" method="POST"><!--includes/signup.inc.php-->
        <fieldset>
            <legend> Registration</legend>
            <label for="username">Username
                <input id="username" name="username" placeholder="Username" required type="text"
                       value="<?php echo $_SESSION['username'] ?? ''; ?>">
            </label>
            <br>
            <label for="email">Email address
                <input id="email" name="email" placeholder="Email address" required type="email"
                       value="<?php echo $_SESSION['email'] ?? ''; ?>">
            </label>
            <p class="note">
                Format: <em>example@domainname.com</em>
            </p>
            <br>
            <label for="firstname">First name
                <input id="firstname" name="firstname" placeholder="First name" required type="text"
                       value="<?php echo $_SESSION['firstname'] ?? ''; ?>">
            </label>
            <p class="note">
                You may include any UTF-8 characters
            </p>
            <br>
            <label for="lastname">Last name
                <input id="lastname" name="lastname" placeholder="Last name" required type="text"
                       value="<?php echo $_SESSION['lastname'] ?? ''; ?>">
            </label>
            <p class="note">
                You may include any UTF-8 characters
            </p>
            <br>
            <label for="birthdate">Birth date
                <input id="birthdate" name="birthdate" required type="date"
                       value="<?php echo $_SESSION['birthdate'] ?? ''; ?>">
            </label>
            <br>
            <label for="password">Password
                <input id="password" name="password" placeholder="Password" required type="password"
                       value="<?php echo $_SESSION['password'] ?? ''; ?>">
            </label>
            <p class="note">
                The password must contain at least 5 characters</p>
            <br>
            <label for="confirm_password">Confirm Password
                <input id="confirm_password" name="confirm_password" placeholder="Confirm Password" required
                       type="password" value="<?php echo $_SESSION['confirm_password'] ?? ''; ?>">
            </label>
            <p class="note">
                Re-enter the password you chose </p>
        </fieldset>
        <br>
        <!-- Submit button for registration -->
        <button class="button" type="submit" name="signup">Sign up</button>
        <div>

            <?php
            if ($echo_errors) {
                echo "<p>Registration failed!</p>";
                echo "<p class='left'>Error(s):</p><ul>"; // Start unordered list
                foreach ($errors as $error) {
                    echo "<li>" . $error . "</li>"; // Display each error as a list item
                }
                echo "</ul>"; // End unordered list
            }
            ?>
        </div>
    </form>
</main>
<?php include_once "inc/footer.inc.html"; ?>
</body>