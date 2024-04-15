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
       href="feedback.php"> <p class="yellow">Feedback</p></a>
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
            <img src="../img/profile_icon.jpg" alt="profile picture" height="50px">
             <p class="yellow">Profile</p>
        </a>

        <!-- Add the profile picture element here -->

        <a class="nav <?php echo ($current_file == 'progress.php') ? 'current_page' : ''; ?>"
           href="progress.php"><p class="yellow">Progress</p></a>
    <?php endif; ?>
</nav>
<nav class="two-px-border">
    <h1 class="choose-a-lesson-to-learn">Choose a lesson to learn:</h1>
    <a class="nav <?php echo ($current_file == 'html.php') ? 'current_page' : ''; ?>" href="html.php"><p class="yellow">HTML</p></a>
    <a class="nav <?php echo ($current_file == 'css.php') ? 'current_page' : ''; ?>" href="css.php"><p class="yellow">CSS</p></a>
    <a class="nav <?php echo ($current_file == 'javascript.php') ? 'current_page' : ''; ?>" href="javascript.php"><p class="yellow">JAVASCRIPT</p></a>
    <a class="nav <?php echo ($current_file == 'php.php') ? 'current_page' : ''; ?>" href="php.php"><p class="yellow">PHP</p></a>
    <a class="nav <?php echo ($current_file == 'python.php') ? 'current_page' : ''; ?>" href="python.php"><p class="yellow">PYTHON</p></a>
</nav>
<script>
    // Add an event listener to the form with the class "form"
    document.querySelector(".form").addEventListener("submit", function (event) {
        var form = event.target;
        var username = form.elements["username"];
        var email = form.elements["email"];
        var isValid = true;

        // Check if username is empty
        if (!username.value) {
            isValid = false;
            username.classList.add("error");
        } else {
            username.classList.remove("error");
        }

        // Check if email is empty
        if (!email.value) {
            isValid = false;
            email.classList.add("error");
        } else {
            email.classList.remove("error");
        }

        // If the form is not valid, prevent submission
        if (!isValid) {
            event.preventDefault();
        }
    });

    // Function to display error messages (called within the event listener)
    function displayError(fieldId, errorMessage) {
        var errorDiv = document.getElementById(fieldId + "Error");
        var fieldInput = document.getElementById(fieldId);

        errorDiv.textContent = errorMessage;
        errorDiv.style.display = "block";
        fieldInput.classList.add("error-border");

        // Remove error message and red border when the field is filled out
        fieldInput.addEventListener("input", function () {
            if (fieldInput.value) {
                errorDiv.textContent = "";
                errorDiv.style.display = "none";
                fieldInput.classList.remove("error-border");
            }
        });
    }
</script>
