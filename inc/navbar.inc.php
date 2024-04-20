<?php

// File: inc/navbar.inc.php
/**
 * The echo href paths below intentionally don't have ../, because the only place this include file should be used is in the root. Otherwise, the paths won't work.
 */
$current_file = basename($_SERVER['PHP_SELF']);


if (isset($_SESSION['user_id'])) {
    $isLoggedIn = true;
} else {
    $isLoggedIn = false;
}
?>
<nav class="nav-left">
    <a class="nav <?php echo ($current_file == 'index.php') ? 'current_page' : ''; ?>"
       href="index.php"><p class="yellow">Home</p></a>
    <a class="nav <?php echo ($current_file == 'feedback.php') ? 'current_page' : ''; ?>"
       href="feedback.php"><p class="yellow">Feedback</p></a>
    <?php
    echo ($current_file == 'admin.php') ? ' <a class="nav current_page" href="admin.php"><p class="yellow">Admin</p></a>' : '';
    ?>
</nav>
<nav class="nav-right">
    <!-- Display "Log in and Sign up" link only if the user is logged in -->
    <?php if (!$isLoggedIn): ?>

        <a class="nav <?php echo ($current_file == 'signup.php') ? 'current_page' : ''; ?>"
           href="signup.php"><p class="yellow">Sign up</p></a>
        <a class="nav <?php echo ($current_file == 'login.php') ? 'current_page' : ''; ?>"
           href="login.php"><p class="yellow">Log in</p></a>
    <?php endif; ?>
    <!-- Display "Log out" link only if the user is logged in -->
    <?php if ($isLoggedIn): ?>
        <a class="nav <?php echo ($current_file == 'logout.php') ? 'current_page' : ''; ?>"
           href="logout.php"><p class="yellow">Log out</p></a>
        <a class="nav <?php echo ($current_file == 'profile.php') ? 'current_page' : ''; ?>"
           href="profile.php">
            <?php
            if (isset($_SESSION['profile_picture'])) {
                echo "<img src='" . $_SESSION['profile_picture'] . "' alt='Your Current Profile Picture' class=\"code border-radius-px fifty-fixel-height\">";
            } else {
                echo "<img alt=\"Default profile picture\" src=\"img/profile_icon.jpg\" class=\"code border-radius-px fifty-fixel-height\">";
            }
            ?>
            <p class="yellow">Profile</p>
        </a>

        <!-- Add the profile picture element here -->

        <a class="nav <?php echo ($current_file == 'progress.php') ? 'current_page' : ''; ?>"
           href="progress.php"><p class="yellow">Progress</p></a>
    <?php endif; ?>
</nav>
<nav class="two-px-border">
    <h1 class="choose-a-lesson-to-learn">Choose a lesson to learn:</h1>
    <a class="nav <?php echo ($current_file == 'html.php') ? 'current_page' : ''; ?>" href="html.php"><p class="yellow">
            HTML</p></a>
    <a class="nav <?php echo ($current_file == 'css.php') ? 'current_page' : ''; ?>" href="css.php"><p class="yellow">
            CSS</p></a>
    <a class="nav <?php echo ($current_file == 'javascript.php') ? 'current_page' : ''; ?>" href="javascript.php"><p
                class="yellow">JAVASCRIPT</p></a>
    <a class="nav <?php echo ($current_file == 'php.php') ? 'current_page' : ''; ?>" href="php.php"><p class="yellow">
            PHP</p></a>
    <a class="nav <?php echo ($current_file == 'python.php') ? 'current_page' : ''; ?>" href="python.php"><p
                class="yellow">PYTHON</p></a>
</nav>
