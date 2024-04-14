<?php
session_start();
include_once "inc/functions.inc.php";

$fiokok = load_users("json/users.json"); // betöltjük a regisztrált felhasználók adatait, és eltároljuk őket a $fiokok változóban

$uzenet = "";                     // az űrlap feldolgozása után kiírandó üzenet

if (isset($_POST["login"])) {    // miután az űrlapot elküldték...
if (!isset($_POST["username"]) || trim($_POST["username"]) === "" || !isset($_POST["password"]) || trim($_POST["password"]) === "") {
    // ha a kötelezően kitöltendő űrlapmezők valamelyike üres, akkor hibaüzenetet jelenítünk meg
    $uzenet = "<strong>Error:</strong> Please fill in all fields!";
} else {
    // ha megfelelően kitöltötték az űrlapot, lementjük az űrlapadatokat egy-egy változóba
    $felhasznalonev = $_POST["username"];
    $jelszo = $_POST["password"];

    // bejelentkezés sikerességének ellenőrzése
    $uzenet = "Login failed! Check if the username and password you've given are correct!";  // alapból azt feltételezzük, hogy a bejelentkezés sikertelen

    foreach ($fiokok["users"] as $fiok) {              // végigmegyünk a regisztrált felhasználókon
        // a bejelentkezés pontosan akkor sikeres, ha az űrlapon megadott felhasználónév-jelszó páros megegyezik egy regisztrált felhasználó belépési adataival
        // a jelszavakat hash alapján, a password_verify() függvénnyel hasonlítjuk össze
        if (key_exists("username", $fiok["users"]) && $fiok["users"]["username"] === $felhasznalonev && password_verify($jelszo, $fiok["password"])) {
            $_SESSION["username"] = $felhasznalonev;
            header("Location: index.php");
            exit(); // Stop further execution after redirect
            }
        }
    }
}

// Elv ez akkor nem is kell, mert a fenti kód megcsinálja
/*
   if(isset($_POST["login"])){
      if(isset($_POST["username"]) && isset($_POST["password"])){
          $users=load_users("json/users.json");
          foreach ($users["users"] as $user) {
              if($user["username"] === $_POST["username"] && password_verify($_POST["password"], $user["password"])){
                  echo "You have logged in succesfully.";
              }
          }
      }
      echo "Login failed. Please try again.";
  }
*/
?>
<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <title> TryHard - Log in</title>
    <link href="css/style.css" rel="stylesheet">
</head>
<body>
<?php include 'inc/navbar.inc.php'; ?>
<main>
    <header>
        <h1 class="signup-and-login-caption">Log in</h1>
        <a href="signup.php">Don't have an account yet? Click here to sign up!</a>
    </header>
    <form action="login.php     " class="background-form white form" method="post"> <!--inc/login.inc.php-->
        <fieldset>
            <legend> Log in credentials</legend>
            <label for="username"> Username
                <input id="username" name="username" placeholder="Username" required type="text" value="meowuwuka">
            </label>
            <br>
            <label for="password"> Password
                <input id="password" name="password" placeholder="Password" required type="password" value="password">
            </label>
        </fieldset>
        <br>
        <button class="button" type="submit" name="login">Log in</button>
        <?php
        if ($uzenet) {
            echo "<p>$uzenet</p>";
        }
        ?>
    </form>
</main>
<?php include_once "inc/footer.inc.php"; ?>
</body>