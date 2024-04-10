<?php
session_start();
setcookie("user", "meowuwuka", time() + 3600, "/");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
// Retrieve data from form
    $username = $_POST['username'];

// Save data into session variables
    $_SESSION['username'] = $username;
}
$user = @$_COOKIE["user"];
include "inc/functions.inc.php";              // beágyazzuk a load_users() és save_users() függvényeket tartalmazó PHP fájlt
$fiokok = load_users("json/users.json"); // betöltjük a regisztrált felhasználók adatait, és eltároljuk őket a $fiokok változóban

$hibak = [];

if (isset($_POST["regiszt"])) {
    if (!isset($_POST["felhasznalonev"]) || trim($_POST["felhasznalonev"]) === "")
        $hibak[] = "A felhasználónév megadása kötelező!";

    if (!isset($_POST["jelszo"]) || trim($_POST["jelszo"]) === "" || !isset($_POST["jelszo2"]) || trim($_POST["jelszo2"]) === "")
        $hibak[] = "A jelszó és az ellenőrző jelszó megadása kötelező!";

    if (!isset($_POST["eletkor"]) || trim($_POST["eletkor"]) === "")
        $hibak[] = "Az életkor megadása kötelező!";

    if (!isset($_POST["nem"]) || trim($_POST["nem"]) === "")
        $hibak[] = "A nem megadása kötelező!";

    if (!isset($_POST["hobbik"]) || count($_POST["hobbik"]) < 2)
        $hibak[] = "Legalább 2 hobbit kötelező kiválasztani!";

    $felhasznalonev = $_POST["felhasznalonev"];
    $jelszo = $_POST["jelszo"];
    $jelszo2 = $_POST["jelszo2"];
    $eletkor = $_POST["eletkor"];
    $nem = NULL;
    $hobbik = NULL;

    if (isset($_POST["nem"]))
        $nem = $_POST["nem"];
    if (isset($_POST["hobbik"]))
        $hobbik = $_POST["hobbik"];

    foreach ($fiokok as $fiok) {
        if ($fiok["felhasznalonev"] === $felhasznalonev)
        $hibak[] = "A felhasználónév már foglalt!";
    }

    if (strlen($jelszo) < 5)
        $hibak[] = "A jelszónak legalább 5 karakter hosszúnak kell lennie!";

    if ($jelszo !== $jelszo2)
        $hibak[] = "A jelszó és az ellenőrző jelszó nem egyezik!";

    if ($eletkor < 18)
        $hibak[] = "Csak 18 éves kortól lehet regisztrálni!";

    if (count($hibak) === 0) {   // sikeres regisztráció
        $jelszo = password_hash($jelszo, PASSWORD_DEFAULT);       // jelszó hashelése
        // hozzáfűzzük az újonnan regisztrált felhasználó adatait a rendszer által ismert felhasználókat tároló tömbhöz
        $fiok[] = [
            "username" => $felhasznalonev,
            "password" => $jelszo,
            "age" => $eletkor,
            "gender" => $nem,
            "hobbies" => $hobbik
        ];
        // elmentjük a kibővített $fiokok tömböt a users.json fájlba
        save_users("json/users.json", $fiok);
        $siker = TRUE;
        header("Location: login.php"); // Does not redirect fsr
    } else {                    // sikertelen regisztráció
        $siker = FALSE;
    }
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
    <form action="signup.php" class="background-form white form" method="POST"><!--includes/signup.inc.php-->
        <fieldset>
            <legend> Registration</legend>
            <label for="username">Username
                <input id="username" name="username" placeholder="Username" required type="text" value="<?php echo $_SESSION['username'] ?? ''; ?>">
            </label>
            <br>
            <label for="email">Email address
                <input id="email" name="email" placeholder="Email address" required type="email" value="<?php echo $_SESSION['email'] ?? ''; ?>">
            </label>
            <p class="note">
                Format: <em>example@domainname.com</em>
            </p>
            <br>
            <label for="firstname">First name
                <input id="firstname" name="firstname" placeholder="First name" required type="text" value="<?php echo $_SESSION['firstname'] ?? ''; ?>">
            </label>
            <p class="note">
                You may include any UTF-8 characters
            </p>
            <br>
            <label for="lastname">Last name
                <input id="lastname" name="lastname" placeholder="Last name" required type="text" value="<?php echo $_SESSION['lastname'] ?? ''; ?>">
            </label>
            <p class="note">
                You may include any UTF-8 characters
            </p>
            <br>
            <label for="birthdate">Birth date
                <input id="birthdate" name="birthdate" required type="date" value="<?php echo $_SESSION['birthdate'] ?? ''; ?>">
            </label>
            <br>
            <label for="password">Password
                <input id="password" name="password" placeholder="Password" required type="password" value="<?php echo $_SESSION['password'] ?? ''; ?>">
            </label>
            <p class="note">
                The password must contain at least 8 characters, including at least one uppercase letter, one lowercase letter,
                and one number </p>
            <br>
            <label for="confirm_password">Confirm Password
                <input id="confirm_password" name="confirm_password" placeholder="Confirm Password" required type="password" value="<?php echo $_SESSION['confirm_password'] ?? ''; ?>">
            </label>
            <p class="note">
                Re-enter the password you chose </p>
        </fieldset>
        <br>
        <!-- Submit button for registration -->
        <button class="button" type="submit">Sign up</button>
    </form>
    <?php
    if (isset($_GET['success']) && $_GET['success'] == 1) {
        echo "<p>Registration successful!</p>";
    } elseif (isset($_GET['error'])) {
        $errors = explode('<br>', $_GET['error']); // Explode the error message into an array
        echo "<p>Errors:</p><ul>"; // Start unordered list
        foreach ($errors as $error) {
            echo "<li>" . $error . "</li>"; // Display each error as a list item
        }
        echo "</ul>"; // End unordered list
    }
    ?>
</main>
<?php include_once "inc/footer.inc.php"; ?>
</body>