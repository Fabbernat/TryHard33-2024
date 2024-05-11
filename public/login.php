<?php
session_start();
include_once "inc/functions.inc.php";

$accounts = load_users("json/users.json"); // betöltjük a regisztrált felhasználók adatait, és eltároljuk őket a $fiokok változóban

$errors = [];
$message = "";
$echo_errors = false;

if (isset($_POST["login"])) {    // miután az űrlapot elküldték...
    if (!isset($_POST["username"]) || trim($_POST["username"]) === "" || !isset($_POST["password"]) || trim($_POST["password"]) === "") {
        // ha a kötelezően kitöltendő űrlapmezők valamelyike üres, akkor hibaüzenetet jelenítünk meg
        $errors[] = "<strong>Error:</strong> Please fill in all fields!";
    } else {
        $username = $_POST["username"];
        $password = $_POST["password"];

        $authenticated = false;
        foreach ($accounts["users"] as $account) {
            if ($account["username"] === $username && password_verify($password, $account["password"])) {
                $message = "You have logged in successfully! Go to the Home Page!";
                $authenticated = true;
                $_SESSION["username"] = $username;
                $_SESSION['user_id'] = $username; // ezt használja a kód inkább
                header("Location: index.php");
                exit(); // Stop further execution after redirect
            }
        }
        $errors[] = "Login failed! Check if the username and password you've given are correct!";
    }
    $echo_errors = true;
}
?>
<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <title> TryHard - Log in</title>
    <link href="css/style.css" rel="stylesheet">
</head>
<body>
<?php include_once 'inc/navbar.inc.php'; ?>
<main>
    <header>
        <h1 class="signup-and-login-caption">Log in</h1>
        <a href="signup.php">Don't have an account yet? Click here to sign up!</a>
    </header>
    <header>
        <h1 class="signup-and-login-caption">Admin Mode</h1>
        <a href="admin.php">Are you an admin or would you like to become one? Click here to log in or sign up!</a>
    </header>

    <form action="login.php" class="background-form white_background form" method="post"> <!--inc/login.inc.php-->
        <fieldset>
            <legend> Log in credentials</legend>
            <label for="username"> Username
                <input id="username" name="username" placeholder="Username" required type="text"
                       value="<?php echo $_SESSION['username'] ?? ''; ?>">
            </label>
            <br>
            <label for="password"> Password
                <input id="password" name="password" placeholder="Password" required type="password"
                       value="<?php echo $_SESSION['username'] ?? ''; ?>">
            </label>
        </fieldset>
        <br>
        <button class="button" type="submit" name="login">Log in</button>
        <?php
        if ($echo_errors) {
            echo "<ul>";
            foreach ($errors as $error) {
                echo "<li>" . $error . "</li>";
            }
            echo "</ul>";
        } elseif (isset($message) && trim($message) != "") {
            echo $message;
        }
        ?>
    </form>
</main>
<?php include_once "inc/footer.inc.html"; ?>
</body>