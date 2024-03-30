<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> TryHard - Admin</title>
    <link href="css/style.css" rel="stylesheet">
</head>
<body>
<?php
session_start();

// Check if the admin is already logged in
if(isset($_SESSION['admin_id'])) {
    // Redirect to the admin panel
    header("Location: admin_panel.php");
    exit();
}
include_once "inc/navbar.inc.php"; ?>
<main>
    <form action="#" class="white background-form margin-30-px" method="post"><!--admin.html-->
        <fieldset>
            <legend>Enter the super confidential secret admin password</legend>
            <label for="admin_password">Admin password:</label>
            <input id="admin_password" name="admin_password" placeholder="Password" required
                   type="password">
            <button type="submit">Enter</button>
        </fieldset>
    </form>
    <section>
        <?php
        // Check if the form is submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            @$password = $_POST["admin_password"];

            // TODO mf2: replace this with actual authentication logic and hashed password
            if ($password === "meowuwuka") {
                echo "<h2>Welcome, Admin!</h2>";
                echo "<p>You have successfully entered the admin password.</p>";

                // Add additional admin functionalities here, such as database queries, content management, etc.
                echo "<p>You can now access confidential data and manage the website's content.</p>";

                // Admin functionalities
                echo "<h3>Admin Panel:</h3>";
                echo "<form action='admin.php' method='post'>";
                echo "<fieldset>";
                echo "<legend>Admin Functions</legend>";
                echo "<label for='username'>Username:</label>";
                echo "<input type='text' name='username' id='username' placeholder='Username' required><br>";
                echo "<label for='password'>Password:</label>";
                echo "<input type='password' name='password' id='password' placeholder='Password' required><br>";
                echo "<button type='submit' name='register'>Register</button>";
                echo "<button type='submit' name='login'>Login</button>";
                echo "</fieldset>";
                echo "</form>";

                // Handle admin registration and login
                if (isset($_POST['register'])) {
                    // Process registration logic
                    echo "<p>Admin registration logic goes here.</p>";
                }
                if (isset($_POST['login'])) {
                    // Process login logic
                    echo "<p>Admin login logic goes here.</p>";
                }
            } else {
                echo "<h2>Wrong Password</h2>";
                echo "<p>Please try again.</p>";
            }
        }
        ?>
    </section>
</main>
<?php include_once "inc/footer.inc.php"; ?>
</body>
</html>
