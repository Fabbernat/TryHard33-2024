<?php
session_start();
$max = 20;
$learned = false;
if (isset($_POST["save_input"])) {
    $learned = true;
}
include_once "inc/functions.inc.php";

$users = load_users("json/users.json");

$solved_tasks = []; // retrieve data from users
$numCorrectAnswers = 0; // Count the number of correct answers


$userId = $_SESSION["user_id"];
if (!isset($userData[$userId])) {
    $userData[$userId] = [];
}

if (isset($_SESSION["user_id"])) {
    // Get the user ID

    // Load existing user data from JSON file
    $userData = json_decode(@file_get_contents("json/users.json"), true);


    // Check if user data exists for the current user


    $answers = @$_POST;

    $correctAnswers = [
        "html" => "A",
        "html-essential" => "B",
        "html-output" => "B",
        "html-definition" => "D",

        "css" => "A",
        "css-bgcolor" => "A",
        "css-textsize" => "B",
        "css-border" => "C",

        "js1" => "A",
        "js2" => "B",
        "js3" => "C",
        "js4" => "D",

        "php1" => "A",
        "php2" => "B",
        "php3" => "C",
        "php4" => "D",

        "python1" => "A",
        "python2" => "B",
        "python3" => "C",
        "python4" => "D",

    ];

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["quiz_submit"])) {
        foreach ($answers as $question => $userAnswer) {
            if (isset($_POST[$question]) && isset($userAnswer) && isset($correctAnswers[$question]) && $userAnswer === $correctAnswers[$question]) {
                // Increment the number of correct answers if the user's answer is correct
                $numCorrectAnswers++;
            }
        }

        // Save the number of correct answers for the current user
        $userData[$userId]["correct_answers"] = $numCorrectAnswers;

        // Save updated user data back to the JSON file
        file_put_contents("json/users.json", json_encode($userData, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

        // Display success message
        $learned = true;
        $quiz_message = "Number of correct answers saved for user $userId: $numCorrectAnswers.";

        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    }
} else {
    // Display error message if user is not logged in
    $quiz_message = "Number of correct answers saved for user $userId: 0";
}
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
<!--    <script src="js/script.js"></script>-->
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
?>

<header>
    <h1 class="signup-and-login-caption">Progress</h1>
</header>


<main>

    <section class="white_background background-form-but-wider-that-looks-cool" id="final-quiz">

        <form action="progress.php" method="post">
            <h1>Final quiz!</h1>
            <p>In this final quiz you have to answer 20 questions in total, 4 in each lesson </p>

            <div class="container" id="html-quiz">
                <h1>HTML Tutorial Quiz</h1>
                <hr>
                <div class="left">
                    <h2 style="text-align: center">What does HTML stand for?</h2>
                    <ul class="answers">
                        <li class="answer">
                            <input type="radio" id="html-a" name="html" value="A">
                            <label for="html-a">A) HyperText Markup Language</label>
                        </li>
                        <li class="answer">
                            <input type="radio" id="html-b" name="html" value="B">
                            <label for="html-b">B) Hyperlink Textual Markup Language</label>
                        </li>
                        <li class="answer">
                            <input type="radio" id="html-c" name="html" value="C">
                            <label for="html-c">C) Hyperlink and Text Markup Language</label>
                        </li>
                        <li class="answer">
                            <input type="radio" id="html-d" name="html" value="D">
                            <label for="html-d">D) High-Level Markup Language</label>
                        </li>
                    </ul>
                    <button type="button" id="feedback-1-button" onclick="showCorrectAnswer('feedback-1')">Show
                        Correct
                        Answer!
                    </button>
                    <p class="feedback" id="feedback-1" style="display: none;"><strong>Correct Answer:</strong> A)
                        HyperText
                        Markup
                        Language</p>
                </div>

                <div class="left">
                    <h2 style="text-align: center">Why is learning HTML essential for web development?</h2>
                    <ul class="answers">
                        <!-- Add more questions and answers here -->
                        <li class="answer">
                            <input type="radio" id="html-essential-a" name="html-essential" value="A">
                            <label for="html-essential-a">A) It's not essential</label>
                        </li>
                        <li class="answer">
                            <input type="radio" id="html-essential-b" name="html-essential" value="B">
                            <label for="html-essential-b">B) It serves as the foundation for creating web
                                pages</label>
                        </li>
                        <li class="answer">
                            <input type="radio" id="html-essential-c" name="html-essential" value="C">
                            <label for="html-essential-c">C) It's only necessary for designers</label>
                        </li>
                        <li class="answer">
                            <input type="radio" id="html-essential-d" name="html-essential" value="D">
                            <label for="html-essential-d">D) It's required for database management</label>
                        </li>
                    </ul>
                    <button type="button" id="feedback-2-button" onclick="showCorrectAnswer('feedback-2')">Show
                        Correct
                        Answer!
                    </button>
                    <p class="feedback" id="feedback-2" style="display: none;"><strong>Correct Answer:</strong> B)
                        It
                        serves as
                        the
                        foundation for creating web pages</p>

                </div>
                <div class="left">
                    <h2 style="text-align: center">What is the correct output of the following HTML code?</h2>
                    <pre class="code left">
&lt;html&gt;
  &lt;head&gt;
    &lt;title&gt;Example&lt;/title&gt;
  &lt;/head&gt;
  &lt;body&gt;
    &lt;h1&gt;Hello, World!&lt;/h1&gt;
  &lt;/body&gt;
&lt;/html&gt;
    </pre>
                    <ul class="answers">
                        <li class="answer">
                            <input type="radio" id="html-output-a" name="html-output" value="A">
                            <label for="html-output-a">A) It will display "Example"</label>
                        </li>
                        <li class="answer">
                            <input type="radio" id="html-output-b" name="html-output" value="B">
                            <label for="html-output-b">B) It will display "Hello, World!"</label>
                        </li>
                        <li class="answer">
                            <input type="radio" id="html-output-c" name="html-output" value="C">
                            <label for="html-output-c">C) It will display both "Example" and "Hello, World!"</label>
                        </li>
                        <li class="answer">
                            <input type="radio" id="html-output-d" name="html-output" value="D">
                            <label for="html-output-d">D) It will display nothing</label>
                        </li>
                    </ul>
                    <button type="button" id="feedback-3-button" onclick="showCorrectAnswer('feedback-3')">Show
                        Correct
                        Answer!
                    </button>
                    <p class="feedback" id="feedback-3" style="display: none;"><strong>Correct Answer:</strong> B)
                        It
                        will
                        display
                        "Hello, World!"</p>
                </div>
                <div class="left">
                    <h2 style="text-align: center">What is HTML?</h2>
                    <ul class="answers">
                        <li class="answer">
                            <input type="radio" id="html-definition-a" name="html-definition" value="A">
                            <label for="html-definition-a">A) programming language</label>
                        </li>
                        <li class="answer">
                            <input type="radio" id="html-definition-b" name="html-definition" value="B">
                            <label for="html-definition-b">B) A framework</label>
                        </li>
                        <li class="answer">
                            <input type="radio" id="html-definition-c" name="html-definition" value="C">
                            <label for="html-definition-c">C) An internet protocol</label>
                        </li>
                        <li class="answer">
                            <input type="radio" id="html-definition-d" name="html-definition" value="D">
                            <label for="html-definition-d">D) A markup language</label>
                        </li>
                    </ul>
                    <button type="button" id="feedback-4-button" onclick="showCorrectAnswer('feedback-4')">Show
                        Correct
                        Answer!
                    </button>
                    <p class="feedback" id="feedback-4" style="display: none;"><strong>Correct Answer:</strong> D) A
                        markup
                        language
                    </p>
                </div>
            </div>


            <div class="container" id="css-quiz">
                <h1>CSS Tutorial Quiz</h1>
                <hr>
                <div class="left">
                    <h2 style="text-align: center">What does CSS stand for?</h2>
                    <ul class="answers">
                        <li class="answer">
                            <input type="radio" id="css-a" name="css" value="A">
                            <label for="css-a">A) Cascading Style Sheets</label>
                        </li>
                        <li class="answer">
                            <input type="radio" id="css-b" name="css" value="B">
                            <label for="css-b">B) Computer Style Sheets</label>
                        </li>
                        <li class="answer">
                            <input type="radio" id="css-c" name="css" value="C">
                            <label for="css-c">C) Creative Style Sheets</label>
                        </li>
                        <li class="answer">
                            <input type="radio" id="css-d" name="css" value="D">
                            <label for="css-d">D) Colorful Style Sheets</label>
                        </li>
                    </ul>
                    <button type="button" id="feedback-1-button" onclick="showCorrectAnswer('feedback-1')">Show
                        Correct
                        Answer!
                    </button>
                    <p class="feedback" id="feedback-1" style="display: none;"><strong>Correct Answer:</strong> A)
                        Cascading
                        Style
                        Sheets</p>
                </div>

                <div class="left">
                    <h2 style="text-align: center">Which property is used to change the background color of an
                        element?</h2>
                    <ul class="answers">
                        <li class="answer">
                            <input type="radio" id="css-bgcolor-a" name="css-bgcolor" value="A">
                            <label for="css-bgcolor-a">A) background-color</label>
                        </li>
                        <li class="answer">
                            <input type="radio" id="css-bgcolor-b" name="css-bgcolor" value="B">
                            <label for="css-bgcolor-b">B) color</label>
                        </li>
                        <li class="answer">
                            <input type="radio" id="css-bgcolor-c" name="css-bgcolor" value="C">
                            <label for="css-bgcolor-c">C) background</label>
                        </li>
                        <li class="answer">
                            <input type="radio" id="css-bgcolor-d" name="css-bgcolor" value="D">
                            <label for="css-bgcolor-d">D) bgcolor</label>
                        </li>
                    </ul>
                    <button type="button" id="feedback-2-button" onclick="showCorrectAnswer('feedback-2')">Show
                        Correct
                        Answer!
                    </button>
                    <p class="feedback" id="feedback-2" style="display: none;"><strong>Correct Answer:</strong> A)
                        background-color
                    </p>

                </div>

                <div class="left">
                    <h2 style="text-align: center">Which CSS property is used to control the text size?</h2>
                    <ul class="answers">
                        <li class="answer">
                            <input type="radio" id="css-textsize-a" name="css-textsize" value="A">
                            <label for="css-textsize-a">A) text-size</label>
                        </li>
                        <li class="answer">
                            <input type="radio" id="css-textsize-b" name="css-textsize" value="B">
                            <label for="css-textsize-b">B) font-size</label>
                        </li>
                        <li class="answer">
                            <input type="radio" id="css-textsize-c" name="css-textsize" value="C">
                            <label for="css-textsize-c">C) size</label>
                        </li>
                        <li class="answer">
                            <input type="radio" id="css-textsize-d" name="css-textsize" value="D">
                            <label for="css-textsize-d">D) font</label>
                        </li>
                    </ul>
                    <button type="button" id="feedback-3-button" onclick="showCorrectAnswer('feedback-3')">Show
                        Correct
                        Answer!
                    </button>
                    <p class="feedback" id="feedback-3" style="display: none;"><strong>Correct Answer:</strong> B)
                        font-size
                    </p>
                </div>

                <div class="left">
                    <h2 style="text-align: center">Which CSS property is used to create a border around an
                        element?</h2>
                    <ul class="answers">
                        <li class="answer">
                            <input type="radio" id="css-border-a" name="css-border" value="A">
                            <label for="css-border-a">A) border-radius</label>
                        </li>
                        <li class="answer">
                            <input type="radio" id="css-border-b" name="css-border" value="B">
                            <label for="css-border-b">B) border-color</label>
                        </li>
                        <li class="answer">
                            <input type="radio" id="css-border-c" name="css-border" value="C">
                            <label for="css-border-c">C) border</label>
                        </li>
                        <li class="answer">
                            <input type="radio" id="css-border-d" name="css-border" value="D">
                            <label for="css-border-d">D) border-width</label>
                        </li>
                    </ul>
                    <button type="button" id="feedback-4-button" onclick="showCorrectAnswer('feedback-4')">Show
                        Correct
                        Answer!
                    </button>
                    <p class="feedback" id="feedback-4" style="display: none;"><strong>Correct Answer:</strong> C)
                        border
                    </p>
                </div>
            </div>

            <div class="container" id="javascript-quiz">
                <form action="progress.php" method="post">
                    <h1>JavaScript Tutorial Quiz</h1>
                    <hr>
                    <div class="left">
                        <h2>What does DOM stand for?</h2>
                        <ul class="answers">
                            <li class="answer">
                                <input type="radio" id="javascript-a" name="javascript" value="A">
                                <label for="javascript-a">A) Document Object Model</label>
                            </li>
                            <li class="answer">
                                <input type="radio" id="javascript-b" name="javascript" value="B">
                                <label for="javascript-b">B) Document Oriented Model</label>
                            </li>
                            <li class="answer">
                                <input type="radio" id="javascript-c" name="javascript" value="C">
                                <label for="javascript-c">C) Data Object Model</label>
                            </li>
                            <li class="answer">
                                <input type="radio" id="javascript-d" name="javascript" value="D">
                                <label for="javascript-d">D) Document Order Model</label>
                            </li>
                        </ul>
                        Correct Answer: A) Document Object Model

                    </div>
                    What function is used to schedule a function to run after a certain amount of time?
                    A) setTimeout()
                    B) setInterval()
                    C) sleep()
                    D) wait()
                    Correct Answer: A) setTimeout()
                    Which symbol is used for comments in JavaScript?
                    A) //
                    B) #
                    C) --
                    D) /* */
                    Correct Answer: A) //
                    What method is used to remove the last element of an array in JavaScript?
                    A) pop()
                    B) shift()
                    C) splice()
                    D) slice()
                    Correct Answer: A) pop()
                </form>
            </div>

            <div class="container" id="php-quiz">
                <form action="progress.php" method="post">
                    <h1>PHP Tutorial Quiz</h1>
                    <hr>
                    <div class="left">
                        <h2>Which keyword is used to declare a function in PHP?</h2>
                        <ul class="answers">
                            <li class="answer">
                                <input type="radio" id="php-a" name="php" value="A">
                                <label for="php-a">A) func</label>
                            </li>
                            B) method
                            C) function
                            D) def
                        </ul>
                        Correct Answer: C) function
                    </div>
                    How do you start a PHP session?
                    A) session_start()
                    B) start_session()
                    C) session()
                    D) begin_session()
                    Correct Answer: A) session_start()
                    What is the correct way to concatenate two strings in PHP?
                    A) str_concat()
                    B) concat()
                    C) .
                    D) +
                    Correct Answer: C) .
                    Which function is used to read a file in PHP?
                    A) read_file()
                    B) file_get_contents()
                    C) readfile()
                    D) fopen()
                    Correct Answer: B) file_get_contents()
                </form>
            </div>

            <div class="container" id="python-quiz">
                <h1>Python Tutorial Quiz</h1>
                <hr>
                <div class="left">
                    <h2>Which keyword is used to define a function in Python?</h2>
                    <ul class="answers">
                        <li class="answer">
                            <input type="radio" id="python-a" name="python" value="A">
                            <label for="python-a">A) func</label>
                        </li>
                        B) def
                        C) define
                        D) function
                        Correct Answer: B) def
                    </ul>
                    What is the correct syntax to open a file in Python?
                    A) open_file("filename.txt")
                    B) file.open("filename.txt")
                    C) open("filename.txt")
                    D) fopen("filename.txt")
                    Correct Answer: C) open("filename.txt")
                    How do you comment multiple lines in Python?
                    A) /* */
                    B) //
                    C) <!-- -->
                    D) ''' '''
                    Correct Answer: D) ''' '''
                    What does the len() function return in Python?
                    A) Total lines in a file
                    B) Total characters in a string
                    C) Total items in a list
                    D) Total elements in a tuple
                    Correct Answer: C) Total items in a list
                </div>
                <!-- Add more questions and answers following a similar structure -->

                <?php if (isset($quiz_message) && trim($quiz_message) !== "") {
                    echo "<p>$quiz_message</p>";
                }
                ?>
                <?php
                if ($learned) {
                    echo '<div id="progress_tracker">
        <br>
        <form action="html.php" method="post" class="progress-form">
            <h1>Your progress:</h1>
            <!-- Use a span to create a circle -->
            <label for="trackProgress">
                <input type="checkbox" id="trackProgress" name="trackProgress" onclick="toggleCircle(this)">
                <span class="checkmark"></span>
                I have learned this lesson
            </label>
            <?php
            if (isset($_POST["save_progress"])) {
                $html_completed = true;
            }
            ?>
        ';
                }
                ?>
                <button type="submit" name="quiz_submit" onclick="saveProgress()">Submit</button>
            </div>
        </form>
        <?php
        echo '<div id="progress_tracker">
        <br>
        <form action="progress.php" method="post" class="progress-form">
            <h1>Your progress:</h1>
            <!-- Use a span to create a circle -->
            <label for="trackProgress">
                <input type="checkbox" id="trackProgress" name="trackProgress" onclick="toggleCircle(this)">
                <span class="checkmark"></span>
                <button type="submit">I have learned this lesson</button>
            </label>
            ';
        if (isset($_POST["save_progress"])) {
            $html_completed = true;
            $css_completed = true;
            $javascript_completed = true;
            $php_completed = true;
            $python_completed = true;

        }

        ?>

    </section>
    <section class="white_background background-form-but-wider-that-looks-cool">
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
                <td>
                    <?php
                    if ($html_completed) {
                        echo "🟢";
                    } else {
                        echo "❌";
                    }
                    ?>
                </td>
                <td>
                    <?php
                    if ($html_completed) {
                        echo "🟢";
                    } else {
                        echo "❌";
                    }
                    ?>
                </td>
                <td>
                    <?php
                    if ($html_completed) {
                        echo "🟢";
                    } else {
                        echo "❌";
                    }
                    ?>
                </td>
                <td>
                    <?php
                    if ($html_completed) {
                        echo "🟢";
                    } else {
                        echo "❌";
                    }
                    ?>
                </td>
            </tr>
            <tr>
                <td>CSS</td>
                <td>
                    <?php
                    if ($css_completed) {
                        echo "🟢";
                    } else {
                        echo "❌";
                    }
                    ?>
                </td>
                <td>
                    <?php
                    if ($css_completed) {
                        echo "🟢";
                    } else {
                        echo "❌";
                    }
                    ?>
                </td>
                <td>
                    <?php
                    if ($css_completed) {
                        echo "🟢";
                    } else {
                        echo "❌";
                    }
                    ?>
                </td>
                <td>
                    <?php
                    if ($css_completed) {
                        echo "🟢";
                    } else {
                        echo "❌";
                    }
                    ?>
                </td>
            </tr>
            <tr>
                <td>Javascript</td>
                <td>
                    <?php
                    if ($javascript_completed) {
                        echo "🟢";
                    } else {
                        echo "❌";
                    }
                    ?>
                </td>
                <td>
                    <?php
                    if ($javascript_completed) {
                        echo "🟢";
                    } else {
                        echo "❌";
                    }
                    ?>
                </td>
                <td>
                    <?php
                    if ($javascript_completed) {
                        echo "🟢";
                    } else {
                        echo "❌";
                    }
                    ?>
                </td>
                <td>
                    <?php
                    if ($javascript_completed) {
                        echo "🟢";
                    } else {
                        echo "❌";
                    }
                    ?>
                </td>
            </tr>
            <tr>
                <td>PHP</td>
                <td>
                    <?php
                    if ($php_completed) {
                        echo "🟢";
                    } else {
                        echo "❌";
                    }
                    ?>
                </td>
                <td>
                    <?php
                    if ($php_completed) {
                        echo "🟢";
                    } else {
                        echo "❌";
                    }
                    ?>
                </td>
                <td>
                    <?php
                    if ($php_completed) {
                        echo "🟢";
                    } else {
                        echo "❌";
                    }
                    ?>
                </td>
                <td>
                    <?php
                    if ($php_completed) {
                        echo "🟢";
                    } else {
                        echo "❌";
                    }
                    ?>
                </td>
            </tr>
            <tr>
                <td>Python</td>
                <td>
                    <?php
                    if ($python_completed) {
                        echo "🟢";
                    } else {
                        echo "❌";
                    }
                    ?>
                </td>
                <td>
                    <?php
                    if ($python_completed) {
                        echo "🟢";
                    } else {
                        echo "❌";
                    }
                    ?>
                </td>
                <td>
                    <?php
                    if ($python_completed) {
                        echo "🟢";
                    } else {
                        echo "❌";
                    }
                    ?>
                </td>
                <td>
                    <?php
                    if ($python_completed) {
                        echo "🟢";
                    } else {
                        echo "❌";
                    }
                    ?>
                </td>
            </tr>
        </table>
        <?php
        if (isset($_SESSION["user_id"])) {
            if ($numCorrectAnswers === $max) {
                echo '<p>Congratulations! You have answered right for evey question!</p>';
            }
        }
        ?>

    </section>
    <section class="progress-tracker">
        <h2>Your progress in lessons:</h2>
        <div class="progress-item">
            <div class="progress-label">HTML</div>
            <div class="progress-bar">
                <div class="progress-bar-inner bar--lowest"></div>
            </div>
        </div>
        <div class="progress-item">
            <div class="progress-label">CSS</div>
            <div class="progress-bar">
                <div class="progress-bar-inner bar--lowest"></div>
            </div>
        </div>
        <div class="progress-item">
            <div class="progress-label">JavaScript</div>
            <div class="progress-bar">
                <div class="progress-bar-inner  bar--lowest"></div>
            </div>
        </div>
        <div class="progress-item">
            <div class="progress-label">PHP</div>
            <div class="progress-bar">
                <div class="progress-bar-inner bar--lowest"></div>
            </div>
        </div>
        <div class="progress-item">
            <div class="progress-label">Python</div>
            <div class="progress-bar">
                <div class="progress-bar-inner bar--lowest"></div>
            </div>
        </div>
    </section>
    <form class="white_background two-px-border border-radius-px" action="progress.php" method="post">
        <h1>Reset progress</h1>
        <label for="reset_progress">
            <br>
            <button type="reset" name="reset_progress" class="bigger-letters" style="width: 80%">Warning! This action
                cannot be undone!
            </button>
        </label>
    </form>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["reset_progress"])) {
        resetUserProgress($user_id);
        header("Location: progress.php?successful_delete=true");
        exit();
    }
    ?>

</main>


<?php include_once "inc/footer.inc.html"; ?>
</body>
</html>