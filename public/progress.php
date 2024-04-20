<?php
session_start();

include_once "inc/functions.inc.php";

$users = load_users("json/users.json");

$solved_tasks = [];// retrieve data from users

// 4x5 grid to display task
// white or green color based on whether it is completed or not

$html_completed = false;
$css_completed = false;
$javascript_completed = false;
$php_completed = false;
$python_completed = false;

// Check if the checkbox is checked
if (isset($_POST['trackProgress']) && $_POST['trackProgress'] === 'on') {
    // Set the progress for HTML to 1 in the session
    $_SESSION['progress']['html'] = 1;
} else {
    // If the checkbox is unchecked, remove the progress for HTML from the session
    unset($_SESSION['progress']['html']);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title> TryHard - Progress</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
        }

    </style>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link href="css/style.css" rel="stylesheet">
</head>
<body>
<?php
$progress = null;
include_once "inc/navbar.inc.php";
$user_id = @$_SESSION["user_id"];
if (isset($user_id) && $user_id != null) {
    foreach ($users as $user) {
        if ($user["user_id"] = $user_id) {
            $progress = @$user["solved_tasks"];
            break;
        }
    }
} else {
    header("Location:index.php?redirected=true&user_id=false");
    exit();
}
//    echo "<p>It seems like something went wrong with signing you in. Please sign in again.</p>"
?>

<header>
    <h1 class="signup-and-login-caption">Progress</h1>
    <div>
        It seems like you're not logged in.
        <br>
        <br>
        <a href="signup.php">Click here to sign up if you don't have an account yet</a>
        <br>
        <br>
        <a href="login.php">Click here to log in if you already have an account</a>
    </div>
</header>
<main>
    <section class="white_background background-form-but-wider-for-profile-section">
        <h2>Your Progress in the Quizzes</h2>

        <table>
            <tr>
                <th></th>
                <th>Task 1</th>
                <th>Task 2</th>
                <th>Task 3</th>
                <th>Task 4</th>
            </tr>
            <tr>
                <td>HTML</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>CSS</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>Javascript</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>PHP</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>Python</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </table>

    </section>
    <section class="progress-tracker">
        <h2>Your progress in lessons:</h2>
        <div class="progress-item">
            <div class="progress-label">HTML</div>
            <div class="<?php if (isset($userProgress['html']) && $userProgress['html'] == 1) echo 'completed'; else echo 'progress-bar' ?>">
                <div class="progress-bar-inner bar--higher"></div>
            </div>
        </div>
        <div class="progress-item">
            <div class="progress-label">CSS</div>
            <div class="<?php if (isset($userProgress['html']) && $userProgress['html'] == 1) echo 'completed'; else echo 'progress-bar' ?>">
                <div class="progress-bar-inner bar--high"></div>
            </div>
        </div>
        <div class="progress-item">
            <div class="progress-label">JavaScript</div>
            <div class="<?php if (isset($userProgress['html']) && $userProgress['html'] == 1) echo 'completed'; else echo 'progress-bar' ?>">
                <div class="progress-bar-inner  bar--medium"></div>
            </div>
        </div>
        <div class="progress-item">
            <div class="progress-label">PHP</div>
            <div class="<?php if (isset($userProgress['html']) && $userProgress['html'] == 1) echo 'completed'; else echo 'progress-bar' ?>">
                <div class="progress-bar-inner bar--low"></div>
            </div>
        </div>
        <div class="progress-item">
            <div class="progress-label">Python</div>
            <div class="<?php if (isset($userProgress['html']) && $userProgress['html'] == 1) echo 'completed'; else echo 'progress-bar' ?>">
                <div class="progress-bar-inner bar--lower"></div>
            </div>
        </div>
    </section>
    <section class="white_background two-px-border border-radius-px">
        <h1>Track Progress</h1>
        <label for="trackProgress">I have learned all lessons:</label>
        <input type="checkbox" id="trackProgress" name="trackProgress">
        <br>
        <br>
        <button type="reset" name="reset_progress" class="bigger-letters">Reset progress <br><span
                    class="smaller-letters">(Warning! This action cannot be undone!</span></button>

    </section>

</main>
<?php include_once "inc/footer.inc.html"; ?>
</body>
</html>