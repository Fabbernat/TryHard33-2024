<?php
session_start();
include_once "inc/functions.inc.php";

$fiokok = load_users("json/users.json"); // betöltjük a regisztrált felhasználók adatait, és eltároljuk őket a $fiokok változóban

if(PHP_SESSION_ACTIVE && isset($_POST["logout"])) {
    session_unset();          // munkamenet-változók kiürítése ($_SESSION egy üres tömb lesz)
    session_destroy();
    header("Location: login.php?logout=1");

}

?>
<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <title> TryHard - Log out</title>
    <link href="css/style.css" rel="stylesheet">
</head>
<body>
<?php include 'inc/navbar.inc.php'; ?>
<main>
    <form action="logout.php" class="white form" method="post"> <!--inc/login.inc.php-->
        <br>
        <button class="button" type="submit" name="logout">Log out</button>
    </form>
</main>
<?php include_once "inc/footer.inc.php"; ?>
</body>