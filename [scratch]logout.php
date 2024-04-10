<?php
session_start();
if(PHP_SESSION_ACTIVE && isset($_POST["logout"])) {
    session_unset();          // munkamenet-változók kiürítése ($_SESSION egy üres tömb lesz)
    session_destroy();
}
?>
<form action="[scratch]logout.php" method="post">
    <input type="submit" name="logout" value="Log out">
</form>