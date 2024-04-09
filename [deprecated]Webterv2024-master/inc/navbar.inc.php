<?php
// File: inc/navbar.inc.php
/**
 * The echo href paths below intentionally don't have ../, because the only place this include file should be used is in the root. Otherwise, the paths won't work.
 */
$current_file = basename($_SERVER['PHP_SELF']);
?>
<nav>
    <a class="nav <?php echo ($current_file == 'index.php') ? 'current_page' : ''; ?>"
       href="index.php">Home<i class="yellow"></i></a> |
    <a class="nav <?php echo ($current_file == 'signup.php') ? 'current_page' : ''; ?>"
       href="signup.php">Sign up<i class="yellow"></i></a> |
    <a class="nav <?php echo ($current_file == 'login.php') ? 'current_page' : ''; ?>"
       href="login.php">Log in<i class="yellow"></i></a> |
    <a class="nav <?php echo ($current_file == 'profile.php') ? 'current_page' : ''; ?>"
       href="profile.php">Profile <i class="yellow"></i></a>
    <a class="nav <?php echo ($current_file == 'profile.php') ? 'current_page' : ''; ?>"
       href="progress.php"> Progress <i class="yellow"></i></a>
    <a class="nav <?php echo ($current_file == 'feedback.php') ? 'current_page' : ''; ?>"
       href="feedback.php">Feedback <i class="yellow"></i></a>
    <a class="nav <?php echo ($current_file == 'admin.php') ? 'current_page' : ''; ?>"
       href="admin.php">Admin <i class="yellow"></i></a>

</nav>
<nav>
    <h1 class="choose-a-lesson-to-learn">Choose a lesson to learn:</h1>
    <a class="nav <?php echo ($current_file == 'html.php') ? 'current_page' : ''; ?>" href="html.php">HTML</a>
    <a class="nav <?php echo ($current_file == 'css.php') ? 'current_page' : ''; ?>" href="css.php">CSS</a>
    <a class="nav <?php echo ($current_file == 'javascript.php') ? 'current_page' : ''; ?>" href="javascript.php">JAVASCRIPT</a>
    <a class="nav <?php echo ($current_file == 'php.php') ? 'current_page' : ''; ?>" href="php.php">PHP</a>
    <a class="nav <?php echo ($current_file == 'python.php') ? 'current_page' : ''; ?>" href="python.php">PYTHON</a>
</nav>
