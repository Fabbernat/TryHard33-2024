<?php
session_start();
?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title> TryHard - Home Page</title>
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
<?php
include_once "inc/navbar.inc.php";
?>
<header>
    <h1>Welcome to TryHard33</h1>
</header>
<main>
    <img alt="image of a person learning html js and php" src="img/person_learns_programming.jpg"
         class="seventy-five-percent-width">
    <section class="white_background seventy-five-percent-width">
        <!-- main content goes here -->
        <h2>Welcome to the TryHard33 website</h2>
        <p>An interactive website where you can learn HTML, CSS, Javascript, PHP and Python</p>
        <a class="btn margin-bottom" href="html.php">Study
            our free HTML Tutorial &#187;</a><br>
    </section>
</main>

<?php include_once "inc/footer.inc.php"; ?>

</body>
</html>
