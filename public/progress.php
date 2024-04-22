<?php
session_start();
$max = 20;
$learned = false;
include_once "inc/functions.inc.php";

// var init
$users = load_users("json/users.json");
$solved_tasks = []; // retrieve data from users
$numCorrectAnswers = 0; // Count the number of correct answers
$quiz_message = "Submit after you answered the questions to see how many questions you got right.";
global $html_completed, $css_completed, $javascript_completed, $php_completed, $python_completed;

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["quiz_submit"]) && isset($_SESSION["user_id"])) {
//    echo "awofjoawoaawf";
    $userId = $_SESSION["user_id"];
    $userData = json_decode(file_get_contents("json/users.json"), true);

    // Check if user data exists for the current user


    $answers = $_POST;

    $correctAnswers = [
        "html" => "A",
        "html-essential" => "B",
        "html-output" => "B",
        "html-definition" => "D",

        "css" => "A",
        "css-bgcolor" => "A",
        "css-textsize" => "B",
        "css-border" => "C",

        "javascript" => "A",
        "javascript-2" => "A",
        "javascript-3" => "C",
        "javascript-4" => "D",

        "php" => "C",
        "php-2" => "A",
        "php-3" => "C",
        "php-4" => "D",

        "python" => "B",
        "python-2" => "C",
        "python-3" => "C",
        "python-4" => "D",
    ];

    foreach ($_POST as $question => $userAnswer) {
        if (isset($correctAnswers[$question]) && $userAnswer === $correctAnswers[$question]) {
            $numCorrectAnswers++;
        }
    }

    // Save the number of correct answers for the current user
    $userData[$userId]["correct_answers"] = $numCorrectAnswers;
    file_put_contents("json/users.json", json_encode($userData, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

    // Display success message
    $quiz_message = "Number of correct answers saved for user $userId: $numCorrectAnswers.";

    if ($numCorrectAnswers > 2) {
        $learned = true;
        $html_completed = true;
        $css_completed = true;
        $javascript_completed = true;
        $php_completed = true;
        $python_completed = true;
        $quiz_message .= " Congratulations! You did a great job!";
    }
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
} elseif (!isset($_SESSION["user_id"])) {
    header("Location:index.php");
    exit();
}
// 4x5 grid to display task
// white or green color based on whether it is completed or not


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
    <script src="js/script.js"></script>
    <link href="css/style.css" rel="stylesheet">
</head>
<body>
<?php
$progress = null;
include_once "inc/navbar.inc.php";
$user_id = @$_SESSION["user_id"];
if (isset($user_id) && $user_id != null) {
    if ($user["user_id"] = $user_id) {
        $progress = @$user["solved_tasks"];
    }
} else {
    header("Location:index.php?redirected=true&user_id=false");
    exit();
}
?>
<header class="yellow-font gray-background">
    <h1 class="signup-and-login-caption">Progress and Quiz</h1>
    <div class="html-css-nav">
        <ul class="left black-font">
            <li><a href="#quiz">Quiz</a></li>
            <li><a href="#end_of_quiz">Quiz submit button and results</a></li>
            <li><a href="#progress_in_quizzes">Your Progress in the Quizzes</a></li>
            <li><a href="#progress_in_lessons">Your progress in lessons</a></li>
            <li><a href="#progress_in_lessons">Reset Progress</a></li>
            <li><a href="#contact">Contact Us</a></li>

        </ul>
    </div>
</header>

<main>

    <section class="white_background background-form-but-wider-that-looks-cool" id="final-quiz">

        <form action="progress.php" method="post" id="quiz">
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
                    <button type="button" id="html-feedback-1-button" onclick="showCorrectAnswer('html-feedback-1')">
                        Show
                        Correct
                        Answer!
                    </button>
                    <p class="feedback" id="html-feedback-1" style="display: none;"><strong>Correct Answer:</strong> A)
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
                    <button type="button" id="html-feedback-2-button" onclick="showCorrectAnswer('html-feedback-2')">
                        Show Correct Answer!
                    </button>
                    <p class="feedback" id="html-feedback-2" style="display: none;"><strong>Correct Answer:</strong> B)
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
                    <button type="button" id="html-feedback-3-button" onclick="showCorrectAnswer('html-feedback-3')">
                        Show
                        Correct
                        Answer!
                    </button>
                    <p class="feedback" id="html-feedback-3" style="display: none;"><strong>Correct Answer:</strong> B)
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
                    <button type="button" id="html-feedback-4-button" onclick="showCorrectAnswer('html-feedback-4')">
                        Show
                        Correct
                        Answer!
                    </button>
                    <p class="feedback" id="html-feedback-4" style="display: none;"><strong>Correct Answer:</strong> D)
                        A
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
                    <button type="button" id="css-feedback-1-button" onclick="showCorrectAnswer('css-feedback-1')">Show
                        Correct
                        Answer!
                    </button>
                    <p class="feedback" id="css-feedback-1" style="display: none;"><strong>Correct Answer:</strong> A)
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
                    <button type="button" id="css-feedback-2-button" onclick="showCorrectAnswer('css-feedback-2')">Show
                        Correct
                        Answer!
                    </button>
                    <p class="feedback" id="css-feedback-2" style="display: none;"><strong>Correct Answer:</strong> A)
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
                    <button type="button" id="css-feedback-3-button" onclick="showCorrectAnswer('css-feedback-3')">Show
                        Correct
                        Answer!
                    </button>
                    <p class="feedback" id="css-feedback-3" style="display: none;"><strong>Correct Answer:</strong> B)
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
                    <button type="button" id="css-feedback-4-button" onclick="showCorrectAnswer('css-feedback-4')">Show
                        Correct
                        Answer!

                    </button>
                    <p class="feedback" id="css-feedback-4" style="display: none;"><strong>Correct Answer:</strong> C)
                        border
                    </p>
                </div>
            </div>

            <div class="container" id="javascript-quiz">
                <h1>JavaScript Tutorial Quiz</h1>
                <hr>
                <div class="left">
                    <h2>What does DOM stand for?</h2>
                    <ul class="answers">
                        <li class="answer">
                            <input type="radio" id="javascript-1-a" name="javascript" value="A">
                            <label for="javascript-1-a">A) Document Object Model</label>
                        </li>
                        <li class="answer">
                            <input type="radio" id="javascript-1-b" name="javascript" value="B">
                            <label for="javascript-1-b">B) Document Oriented Model</label>
                        </li>
                        <li class="answer">
                            <input type="radio" id="javascript-1-c" name="javascript" value="C">
                            <label for="javascript-1-c">C) Data Object Model</label>
                        </li>
                        <li class="answer">
                            <input type="radio" id="javascript-1-d" name="javascript" value="D">
                            <label for="javascript-1-d">D) Document Order Model</label>
                        </li>
                    </ul>

                    <button type="button" id="js-feedback-1-button" onclick="showCorrectAnswer('js-feedback-1')">
                        Show Correct Answer!
                    </button>

                    <p class="feedback" id="js-feedback-1" style="display: none;"><strong>Correct Answer:</strong>
                        Correct Answer: A) Document Object Model
                    </p>


                </div>

                <div class="left">
                    <h2>What function is used to schedule a function to run after a certain amount of time?</h2>
                    <ul class="answers">
                        <li class="answer">
                            <input type="radio" id="javascript-2-a" name="javascript-2" value="A">
                            <label for="javascript-2-a">A) setTimeout()</label>
                        </li>
                        <li class="answer">
                            <input type="radio" id="javascript-2-b" name="javascript-2" value="B">
                            <label for="javascript-2-b">B) setInterval()</label>
                        </li>
                        <li class="answer">
                            <input type="radio" id="javascript-2-c" name="javascript-2" value="C">
                            <label for="javascript-2-c">C) sleep()</label>
                        </li>
                        <li class="answer">
                            <input type="radio" id="javascript-2-d" name="javascript-2" value="D">
                            <label for="javascript-2-d">D) wait()</label>
                        </li>
                    </ul>

                    <button type="button" id="js-feedback-2-button" onclick="showCorrectAnswer('js-feedback-2')">
                        Show Correct Answer!
                    </button>

                    <p class="feedback" id="js-feedback-2" style="display: none;"><strong>Correct Answer:</strong>
                        Correct Answer: A) setTimeout()
                    </p>
                </div>

                <div class="left">
                    <h2>What does the method Array.prototype.map() do?</h2>
                    <ul class="answers">
                        <li class="answer">
                            <input type="radio" id="javascript-3-a" name="javascript-3" value="A">
                            <label for="javascript-3-a">A) Modifies the original array</label>
                        </li>
                        <li class="answer">
                            <input type="radio" id="javascript-3-b" name="javascript-3" value="B">
                            <label for="javascript-3-b">B) Creates a new array with the results of calling a provided function on every element in the calling array</label>
                        </li>
                        <li class="answer">
                            <input type="radio" id="javascript-3-c" name="javascript-3" value="C">
                            <label for="javascript-3-c">C) Sorts the elements of the array in place and returns the sorted array</label>
                        </li>
                        <li class="answer">
                            <input type="radio" id="javascript-3-d" name="javascript-3" value="D">
                            <label for="javascript-3-d">D) Removes the first element from the array and returns that removed element</label>
                        </li>
                    </ul>

                    <button type="button" id="js-feedback-3-button" onclick="showCorrectAnswer('js-feedback-3')">
                        Show Correct Answer!
                    </button>

                    <p class="feedback" id="js-feedback-3" style="display: none;"><strong>Correct Answer:</strong>
                        Correct Answer: B) Creates a new array with the results of calling a provided function on every element in the calling array
                    </p>
                </div>

                <div class="left">
                    <h2>What does the keyword 'let' do in JavaScript?</h2>
                    <ul class="answers">
                        <li class="answer">
                            <input type="radio" id="javascript-4-a" name="javascript-4" value="A">
                            <label for="javascript-4-a">A) Declares a variable with block scope</label>
                        </li>
                        <li class="answer">
                            <input type="radio" id="javascript-4-b" name="javascript-4" value="B">
                            <label for="javascript-4-b">B) Declares a variable with global scope</label>
                        </li>
                        <li class="answer">
                            <input type="radio" id="javascript-4-c" name="javascript-4" value="C">
                            <label for="javascript-4-c">C) Declares a constant variable</label>
                        </li>
                        <li class="answer">
                            <input type="radio" id="javascript-4-d" name="javascript-4" value="D">
                            <label for="javascript-4-d">D) Declares a variable that cannot be reassigned</label>
                        </li>
                    </ul>

                    <button type="button" id="js-feedback-4-button" onclick="showCorrectAnswer('js-feedback-4')">
                        Show Correct Answer!
                    </button>

                    <p class="feedback" id="js-feedback-4" style="display: none;"><strong>Correct Answer:</strong>
                        Correct Answer: A) Declares a variable with block scope
                    </p>
                </div>

            </div>

            <div class="container" id="php-quiz">
                <h1>PHP Tutorial Quiz</h1>
                <hr>
                <div class="left">
                    <h2>Which keyword is used to declare a function in PHP?</h2>
                    <ul class="answers">
                        <li class="answer">
                            <input type="radio" id="php-1-a" name="php" value="A">
                            <label for="php-1-a">A) func</label>
                        </li>
                        <li class="answer">
                            <input type="radio" id="php-1-b" name="php" value="B">
                            <label for="php-1-b">B) method</label>
                        </li>
                        <li class="answer">
                            <input type="radio" id="php-1-c" name="php" value="C">
                            <label for="php-1-c">C) function</label>
                        </li>
                        <li class="answer">
                            <input type="radio" id="php-1-d" name="php" value="D">
                            <label for="php-1-d">D) def</label>
                        </li>


                    </ul>
                    <button type="button" id="php-feedback-1-button" onclick="showCorrectAnswer('php-feedback-1')">
                        Show Correct Answer!
                    </button>
                    <p class="feedback" id="php-feedback-1" style="display: none;"><strong>Correct Answer:</strong>
                        Correct Answer: C) function
                    </p>
                </div>
                <div class="left">
                    <h2>How do you start a PHP session?</h2>
                    <ul class="answers">
                        <li class="answer">
                            <input type="radio" id="php-2-a" name="php-2" value="A">
                            <label for="php-2-a">A) session_start()</label>
                        </li>
                        <li class="answer">
                            <input type="radio" id="php-2-b" name="php-2" value="B">
                            <label for="php-2-b">B) start_session()</label>
                        </li>
                        <li class="answer">
                            <input type="radio" id="php-2-c" name="php-2" value="C">
                            <label for="php-2-c"> C) session()</label>
                        </li>
                        <li class="answer">
                            <input type="radio" id="php-2-d" name="php-2" value="D">
                            <label for="php-2-d">D) begin_session()</label>
                        </li>


                    </ul>
                    <button type="button" id="php-feedback-2-button" onclick="showCorrectAnswer('php-feedback-2')">
                        Show Correct Answer!
                    </button>
                    <p class="feedback" id="php-feedback-2" style="display: none;"><strong>Correct Answer:</strong>
                        Correct Answer: A) session_start()
                    </p>
                </div>
                <div class="left">
                    <h2> What is the correct way to concatenate two strings in PHP?</h2>
                    <ul class="answers">
                        <li class="answer">
                            <input type="radio" id="php-3-a" name="php-3" value="A">
                            <label for="php-3-a">A) str_concat()</label>
                        </li>
                        <li class="answer">
                            <input type="radio" id="php-3-b" name="php-3" value="B">
                            <label for="php-3-b">B) concat()</label>
                        </li>
                        <li class="answer">
                            <input type="radio" id="php-3-c" name="php-3" value="C">
                            <label for="php-3-c"> C) .</label>
                        </li>
                        <li class="answer">
                            <input type="radio" id="php-3-d" name="php-3" value="D">
                            <label for="php-3-d">D) +</label>
                        </li>


                    </ul>
                    <button type="button" id="php-feedback-3-button" onclick="showCorrectAnswer('php-feedback-3')">
                        Show Correct Answer!
                    </button>
                    <p class="feedback" id="php-feedback-3" style="display: none;"><strong>Correct Answer:</strong>
                        Correct Answer: C) .
                    </p>
                </div>
                <div class="left">
                    <h2>Which function is used to read a file in PHP?</h2>
                    <ul class="answers">
                        <li class="answer">
                            <input type="radio" id="php-4-a" name="php-4" value="A">
                            <label for="php-4-a">A) read_file()</label>
                        </li>
                        <li class="answer">
                            <input type="radio" id="php-4-b" name="php-4" value="B">
                            <label for="php-4-b">B) file_get_contents()</label>
                        </li>
                        <li class="answer">
                            <input type="radio" id="php-4-c" name="php-4" value="C">
                            <label for="php-4-c">C) readfile()</label>
                        </li>
                        <li class="answer">
                            <input type="radio" id="php-4-d" name="php-4" value="D">
                            <label for="php-4-d">D) fopen()</label>
                        </li>


                    </ul>
                    <button type="button" id="php-feedback-4-button" onclick="showCorrectAnswer('php-feedback-4')">
                        Show Correct Answer!
                    </button>
                    <p class="feedback" id="php-feedback-4" style="display: none;"><strong>Correct Answer:</strong>
                        Correct Answer: B) file_get_contents()
                    </p>
                </div>
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
                        <li class="answer">
                            <input type="radio" id="python-b" name="python" value="B">
                            <label for="python-b">B) def</label>
                        </li>
                        <li class="answer">
                            <input type="radio" id="python-c" name="python" value="C">
                            <label for="python-c">C) define</label>
                        </li>
                        <li class="answer">
                            <input type="radio" id="python-d" name="python" value="D">
                            <label for="python-d">D) function</label>
                        </li>
                    </ul>
                    <button type="button" id="python-feedback-1-button"
                            onclick="showCorrectAnswer('python-feedback-1')">
                        Show Correct Answer!
                    </button>
                    <p class="feedback" id="python-feedback-1" style="display: none;"><strong>Correct Answer:</strong>
                        Correct Answer: B) def
                    </p>
                </div>

                <div class="left">
                    <h2>What is the correct syntax to open a file in Python?</h2>
                    <ul class="answers">
                        <li class="answer">
                            <input type="radio" id="python-2-a" name="python-2" value="A">
                            <label for="python-2-a">A) open_file("filename.txt")</label>
                        </li>
                        <li class="answer">
                            <input type="radio" id="python-2-b" name="python-2" value="B">
                            <label for="python-2-b">B) file.open("filename.txt")</label>
                        </li>
                        <li class="answer">
                            <input type="radio" id="python-2-c" name="python-2" value="C">
                            <label for="python-2-c">C) open("filename.txt")</label>
                        </li>
                        <li class="answer">
                            <input type="radio" id="python-2-d" name="python-2" value="D">
                            <label for="python-2-d">D) fopen("filename.txt")</label>
                        </li>
                    </ul>
                    <button type="button" id="python-feedback-2-button" onclick="showCorrectAnswer('python-feedback-2')">
                        Show Correct Answer!
                    </button>
                    <p class="feedback" id="python-feedback-2" style="display: none;"><strong>Correct Answer:</strong>
                        Correct Answer: C) open("filename.txt")
                    </p>
                </div>

                <div class="left">
                    <h2>How do you comment multiple lines in Python?</h2>
                    <ul class="answers">
                        <li class="answer">
                            <input type="radio" id="python-3-a" name="python-3" value="A">
                            <label for="python-3-a">A) /* */</label>
                        </li>
                        <li class="answer">
                            <input type="radio" id="python-3-b" name="python-3" value="B">
                            <label for="python-3-b">B) //</label>
                        </li>
                        <li class="answer">
                            <input type="radio" id="python-3-c" name="python-3" value="C">
                            <label for="python-3-c">C) &lt;!-- --&gt;</label>
                        </li>
                        <li class="answer">
                            <input type="radio" id="python-3-d" name="python-3" value="D">
                            <label for="python-3-d">D) ''' '''</label>
                        </li>
                    </ul>
                    <button type="button" id="python-feedback-3-button" onclick="showCorrectAnswer('python-feedback-3')">
                        Show Correct Answer!
                    </button>
                    <p class="feedback" id="python-feedback-3" style="display: none;"><strong>Correct Answer:</strong>
                        Correct Answer: D) ''' '''
                    </p>
                </div>

                <div class="left">
                    <h2>What does the len() function return in Python?</h2>
                    <ul class="answers">
                        <li class="answer">
                            <input type="radio" id="python-4a" name="python-4" value="A">
                            <label for="python-4-a">A) Total lines in a file</label>
                        </li>
                        <li class="answer">
                            <input type="radio" id="python-4-b" name="python-4" value="B">
                            <label for="python-4-b">B) Total characters in a string</label>
                        </li>
                        <li class="answer">
                            <input type="radio" id="python-4-c" name="python-4" value="C">
                            <label for="python-4-c">C) Total items in a list</label>
                        </li>
                        <li class="answer">
                            <input type="radio" id="python-4-d" name="python-4" value="D">
                            <label for="python-4-d">D) Total elements in a tuple</label>
                        </li>
                    </ul>
                    <button type="button" id="python-feedback-4-button" onclick="showCorrectAnswer('python-feedback-4')">
                        Show Correct Answer!
                    </button>
                    <p class="feedback" id="python-feedback-4" style="display: none;"><strong>Correct Answer:</strong>
                        Correct Answer: C) Total items in a list
                    </p>
                </div>

                <button type="submit" name="quiz_submit" onclick="saveProgress()" id="end_of_quiz">Submit</button>
                <?php if (isset($quiz_message) && trim($quiz_message) !== "") {
                    echo "<p>$quiz_message</p>";
                }
                echo "Number of correct answers: $numCorrectAnswers" . "<br>";
                //                echo "REQUEST_METHOD: " . $_SERVER["REQUEST_METHOD"] . "<br>";
                //                echo "quiz_submit isset: " . isset($_POST["quiz_submit"]) . "<br>";
                //                echo "user_id isset: " . isset($_SESSION["user_id"]) . "<br>";
                ?>
            </div>
        </form>

    </section>
    <section class="white_background background-form-but-wider-that-looks-cool" id="progress_in_quizzes">
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
                    if (!$html_completed) {
                        echo "🟢";
                    } else {
                        echo "❌";
                    }
                    ?>
                </td>
                <td>
                    <?php
                    if (!$html_completed) {
                        echo "🟢";
                    } else {
                        echo "❌";
                    }
                    ?>
                </td>
                <td>
                    <?php
                    if (!$html_completed) {
                        echo "🟢";
                    } else {
                        echo "❌";
                    }
                    ?>
                </td>
                <td>
                    <?php
                    if (!$html_completed) {
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
                    if (!$css_completed) {
                        echo "🟢";
                    } else {
                        echo "❌";
                    }
                    ?>
                </td>
                <td>
                    <?php
                    if (!$css_completed) {
                        echo "🟢";
                    } else {
                        echo "❌";
                    }
                    ?>
                </td>
                <td>
                    <?php
                    if (!$css_completed) {
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
                    if (!$javascript_completed) {
                        echo "🟢";
                    } else {
                        echo "❌";
                    }
                    ?>
                </td>
                <td>
                    <?php
                    if (!$javascript_completed) {
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
                    if (!$php_completed) {
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
    <section class="progress-tracker" id="progress_in_lessons">
        <h2>Your progress in lessons:</h2>
        <div class="progress-item">
            <div class="progress-label">HTML</div>
            <div class="progress-bar">
                <div class="progress-bar-inner <?php echo isset($_POST['html_completed']) ? 'bar--higher' : 'bar--lowest'; ?>"></div>
            </div>
        </div>
        <div class="progress-item">
            <div class="progress-label">CSS</div>
            <div class="progress-bar">
                <div class="progress-bar-inner <?php echo isset($_POST['css_completed']) ? 'bar--higher' : 'bar--lowest'; ?>"></div>
            </div>
        </div>
        <div class="progress-item">
            <div class="progress-label">JavaScript</div>
            <div class="progress-bar">
                <div class="progress-bar-inner <?php echo isset($_POST['javascript_completed']) ? 'bar--higher' : 'bar--lowest'; ?>"></div>
            </div>
        </div>
        <div class="progress-item">
            <div class="progress-label">PHP</div>
            <div class="progress-bar">
                <div class="progress-bar-inner <?php echo isset($_POST['php_completed']) ? 'bar--higher' : 'bar--lowest'; ?>"></div>
            </div>
        </div>
        <div class="progress-item">
            <div class="progress-label">Python</div>
            <div class="progress-bar">
                <div class="progress-bar-inner <?php echo isset($_POST['python_completed']) ? 'bar--higher' : 'bar--lowest'; ?>"></div>
            </div>
        </div>
        <form action="progress.php" method="post">
            <label>I have completed HTML
                <input type="checkbox" name="html_completed">
            </label>
            <label>I have completed CSS
                <input type="checkbox" name="css_completed">
            </label>
            <label>I have completed Javascript
                <input type="checkbox" name="javascript_completed">
            </label>
            <label>I have completed PHP
                <input type="checkbox" name="php_completed">
            </label>
            <label>I have completed Python
                <input type="checkbox" name="python_completed">
            </label>
            <input type="submit" name="progress" value="Submit">
        </form>
        <?php
        if (isset($_POST["progress"])) {
            echo "<p>Saved!</p>";
        }
        ?>
    </section>
    <form class="white_background two-px-border border-radius-px" action="progress.php" method="post">
        <h1>Reset Progress</h1>
        <br>
        <label for="reset_progress">
            <button type="reset" name="reset_progress" id="reset_progress" class="bigger-letters" style="width: 80%">
                Warning! This action
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