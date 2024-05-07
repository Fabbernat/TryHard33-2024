<?php
session_start();
$learned = false;
if (isset($_POST["save_input"])) {
    $learned = true;
}

// Check if the user is logged in
if (isset($_SESSION["user_id"])) {
    // Get the user ID
    $userId = $_SESSION["user_id"];

    // Load existing user data from JSON file
    $userData = json_decode(@file_get_contents("json/users.json"), true);


    // Check if user data exists for the current user
    if (!isset($userData[$userId])) {
        $userData[$userId] = [];
    }

    // Count the number of correct answers
    $numCorrectAnswers = 0;

    $answers = @$_POST;

    $correctAnswers = [
        "html" => "A",
        "html-essential" => "B",
        "html-output" => "B",
        "html-definition" => "D"
    ];

    if (isset($_POST["quiz_submit"])) {
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
    }
} else {
    // Display error message if user is not logged in
    $quiz_message = "User is not logged in. Sign up or log in to save your progress.";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>HTML Tutorial</title>
    <style>
        /* Add your CSS styles here */
        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .answers {
            list-style-type: none;
        }

        .answer {
            margin-bottom: 10px;
        }

        .answer input[type="radio"] {
            margin-right: 10px;
        }

        .answer label {
            cursor: pointer;
        }

        .answer label:hover {
            background-color: #f5f5f5;
        }

        .feedback {
            font-weight: bold;
        }
    </style>
    <meta charset="UTF-8">
    <link rel="script" href="js/script.js">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<?php
include_once "inc/navbar.inc.php";
?>
<header class="yellow-font gray-background">
    <h1 class="yellow-font">HTML Tutorial</h1>
    <section class="html-css-nav">
        <ul class="left black-font">
            <li><a href="#introduction">Introduction</a></li>
            <li><a href="#basics">HTML Basics</a></li>
            <li><a href="#elements">HTML Elements</a></li>
            <li><a href="#attributes">HTML Attributes</a></li>
            <li><a href="#quiz">Quiz</a></li>

            <?php
            if ($learned) {
                echo '<li><a href="#progress_tracker">Progress tracker</a></li>';
            }
            ?>
            <li><a href="#contact">Contact Us</a></li>
        </ul>
    </section>
</header>
<main class="lesson-container white_background left-align">
    <section id="introduction">
        <div class="html-intro">
            <hr>
            <h2 class="darkcyan">Introduction to HTML</h2>
            <p>HTML stands for HyperText Markup Language. It is the standard markup language for creating web pages.</p>
            <p>HTML is the standard markup language for Web pages.</p>
            <p>With HTML you can create your own Website.</p>
            <p>HTML is easy to learn - You will enjoy it!</p>
            <img src="img/img_chrome.png" alt="image of a website demonstrating h1 and p tags">
            <hr>
            <h3 class="darkcyan">Why Learn HTML?</h3>
            <p>Learning HTML is essential for anyone interested in web development. It serves as the foundation for
                creating web pages and understanding how content is structured on the internet.</p>
            <p>HTML provides the structure and semantics necessary for search engines to understand and index your
                content, which is crucial for search engine optimization (SEO).</p>
            <hr>
            <h3 class="darkcyan">What Can You Do with HTML?</h3>
            <p>With HTML, you can create various types of web content, including:</p>
            <ul>
                <li>Static web pages</li>
                <li>Dynamic web pages</li>
                <li>Forms</li>
                <li>Tables</li>
                <li>Lists</li>
                <li>And much more!</li>
            </ul>
        </div>
    </section>

    <section id="basics" class="html-intro">
        <hr>
        <h2 class="darkcyan">HTML Basics</h2>
        <p>HTML consists of a series of elements that define the structure of a webpage.</p>
    </section>

    <section id="elements" class="html-intro">
        <hr>
        <h2 class="darkcyan">HTML Elements</h2>
        <p>HTML elements are the building blocks of HTML pages.</p>
        <article>
            <section>
                <h2>Semantic Structure of HTML Elements</h2>
                <p>
                    HTML elements are the building blocks of web pages, defining the structure and content of the
                    document. Understanding the semantic structure of HTML elements is essential for creating
                    well-organized and accessible web content.
                </p>
                <h3>Basic Syntax</h3>
                <p>
                    HTML elements are defined using tags enclosed in angle brackets (<code>&lt;</code> and
                    <code>&gt;</code>). The basic syntax of an HTML element is <code>&lt;tagname&gt;content&lt;/tagname&gt;</code>,
                    where <code>tagname</code> represents the name of the element and <code>content</code> is the
                    information enclosed within the tags.
                </p>
                <h3>Attributes</h3>
                <p>
                    HTML elements can have attributes, providing additional information about the element. Attributes
                    are placed within the opening tag and written as name-value pairs. For example, <code>&lt;img
                        src="image.jpg" alt="Image"&gt;</code> is an img element with src and alt attributes.
                </p>
                <h3>Nested Elements</h3>
                <p>
                    HTML elements can be nested within each other to create hierarchical structures, allowing developers
                    to organize content meaningfully. For instance, a <code>&lt;div&gt;</code> element can contain
                    multiple <code>&lt;p&gt;</code> elements, which in turn can include other elements such as <code>&lt;strong&gt;</code>,
                    <code>&lt;em&gt;</code>, etc.
                </p>
                <h3>Semantic Meaning</h3>
                <p>
                    Semantic HTML elements provide valuable information about the role of each section in the webpage,
                    aiding search engines and web crawlers in understanding the content structure. Elements like <code>&lt;header&gt;</code>,
                    <code>&lt;footer&gt;</code>, <code>&lt;nav&gt;</code>, <code>&lt;article&gt;</code>, <code>&lt;section&gt;</code>,
                    and <code>&lt;aside&gt;</code> convey semantic meaning.
                </p>
                <h3>Block vs. Inline Elements</h3>
                <p>
                    HTML elements are categorized as either block-level or inline-level. Block-level elements start on a
                    new line and occupy the full width available, while inline-level elements do not start on a new line
                    and only take up as much width as necessary.
                </p>
                <h3>Common HTML Elements</h3>
                <p>
                    Standard HTML elements serve various purposes, including headings (<code>&lt;h1&gt;</code> to <code>&lt;h6&gt;</code>),
                    paragraphs (<code>&lt;p&gt;</code>), links (<code>&lt;a&gt;</code>), images
                    (<code>&lt;img&gt;</code>), lists (<code>&lt;ul&gt;</code>, <code>&lt;ol&gt;</code>, <code>&lt;li&gt;</code>),
                    forms (<code>&lt;form&gt;</code>, <code>&lt;input&gt;</code>, <code>&lt;button&gt;</code>), tables (<code>&lt;table&gt;</code>,
                    <code>&lt;tr&gt;</code>, <code>&lt;td&gt;</code>), and more.
                </p>
                <h4>Examples:</h4>
                <div class="reset-this-root">
                    <div class="show">
                        <h1 style="font-size: xx-large">This is what a h1 heading looks like</h1>
                        <h2>This is what a h2 heading looks like</h2>
                        <h3>This is what a h3 heading looks like</h3>
                        <h4>This is what a h4 heading looks like</h4>
                        <h5>This is what a h5 heading looks like</h5>
                        <h6>This is what a h6 heading looks like</h6>
                        <p>This is what a paragraph looks like</p>
                    </div>
                    <pre class="code">
&lt;h1&gt;This is what a h1 heading looks like&lt;/h1&gt;
&lt;h2&gt;This is what a h2 heading looks like&lt;/h2&gt;
&lt;h3&gt;This is what a h3 heading looks like&lt;/h3&gt;
&lt;h4&gt;This is what a h4 heading looks like&lt;/h4&gt;
&lt;h5&gt;This is what a h5 heading looks like&lt;/h5&gt;
&lt;h6&gt;This is what a h6 heading looks like&lt;/h6&gt;
&lt;p&gt;This is what a paragraph looks like&lt;/p&gt;</pre>
                </div>

                <h3>Custom Elements</h3>
                <p>
                    Developers can create custom elements using the <code>&lt;div&gt;</code> or
                    <code>&lt;span&gt;</code> tags and apply custom styles and behavior using CSS and JavaScript,
                    extending the functionality of standard HTML elements.
                </p>
            </section>

        </article>
    </section>

    <section id="attributes" class="html-intro">
        <hr>
        <h2 class="darkcyan">HTML Attributes</h2>
        <p>HTML attributes provide additional information about HTML elements.</p>
    </section>
</main>

<div class="container" id="quiz">
    <form action="html.php" method="post">
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
            <button type="button" id="feedback-1-button" onclick="showCorrectAnswer('feedback-1')">Show Correct Answer!
            </button>
            <p class="feedback" id="feedback-1" style="display: none;"><strong>Correct Answer:</strong> A) HyperText
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
                    <label for="html-essential-b">B) It serves as the foundation for creating web pages</label>
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
            <button type="button" id="feedback-2-button" onclick="showCorrectAnswer('feedback-2')">Show Correct Answer!
            </button>
            <p class="feedback" id="feedback-2" style="display: none;"><strong>Correct Answer:</strong> B) It serves as
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
            <button type="button" id="feedback-3-button" onclick="showCorrectAnswer('feedback-3')">Show Correct Answer!
            </button>
            <p class="feedback" id="feedback-3" style="display: none;"><strong>Correct Answer:</strong> B) It will
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
            <button type="button" id="feedback-4-button" onclick="showCorrectAnswer('feedback-4')">Show Correct Answer!
            </button>
            <p class="feedback" id="feedback-4" style="display: none;"><strong>Correct Answer:</strong> D) A markup
                language
            </p>
        </div>
        <button type="submit" name="quiz_submit" onclick="saveProgress()">Submit</button>
        <?php if (isset($quiz_message) && trim($quiz_message) !== "") {
            echo "<p>$quiz_message</p>";
        }
        ?>
    </form>
    <div id="progress_tracker">
        <br>
        <form action="html.php" method="post" class="progress-form">
            <h1>Track your progress!</h1>
            <!-- Use a span to create a circle -->
            <label for="trackProgress">
                <input type="checkbox" id="trackProgress" name="trackProgress" onclick="toggleCircle(this)">
                <span class="checkmark"></span>
                I have learned this lesson
            </label>
            <button type="submit" name="save_progress" onclick="saveProgress(event)">Save</button>
            <?php
            if (isset($_POST["save_progress"])) {
                $html_completed = true;
            }
            ?>
        </form>
    </div>
</div>

<div class="two-px-border" style="border-radius: 20px; width: 30%; margin: 0 auto">
    <br>
    <a class="btn" href="#">↑ Jump to the top</a>
    <br>
    <br>
    <a class="left btn" href="index.php">&#10094;&#10094; Home</a>
    <br>
    <a class="right btn" href="css.php">Next &#10095;</a>
</div>

<?php include_once "inc/footer.inc.html"; ?>

</body>
</html>
