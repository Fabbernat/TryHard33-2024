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
    <h1 style="font-size: 60px">Welcome to TryHard33</h1>
    <p style="font-size: 28px">An interactive website where you can learn about web development and some of the most
        important scripting languages.</p>
    <p class="left black-font">There are 5 lessons: HTML, CSS, Javascript, PHP and Python. There are 20 tasks in quizzes
        related to them. Make an account and solve all of them to win a prize! You can track your progress in your
        progress page after signing up.</p>

</header>
<main>
    <img alt="image of a person learning html js and php" src="img/person_learns_programming.jpg"
         class="seventy-five-percent-width">
    <section class="white_background seventy-five-percent-width">
        <!-- main content goes here -->
        <a class="btn margin-bottom" href="html.php">Study
            our free HTML Tutorial &#187;</a><br>
    </section>
</main>

<?php
include_once "inc/footer.inc.html";
?>

</body>
</html>
