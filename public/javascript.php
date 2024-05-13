<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>TryHard</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<?php
include_once "inc/navbar.inc.php"; ?>
<header class="yellow-font gray-background">
    <h1>Javascript tutorial</h1>
    <div class="html-css-nav">

        <ul class="left  black-font">
            <li><a href="#introduction">Introduction</a></li>
            <li><a href="#variables">Variables and Data Types</a></li>
            <li><a href="#operators">Operators and Expressions</a></li>
            <li><a href="#control-flow">Control Flow</a></li>
            <li><a href="#functions">Functions</a></li>
            <li><a href="#objects-arrays">Objects and Arrays</a></li>
            <li><a href="#dom-manipulation">DOM Manipulation</a></li>
            <li><a href="#event-handling">Event Handling</a></li>
            <li><a href="#contact">Contact Us</a></li>

        </ul>
    </div>
</header>
<main class="lesson-container white_background left-align">
    <h2>Javascript tutorial</h2>
    <section class="lesson-content white_background" id="introduction">
        <h2>Introduction to JavaScript</h2>
        <p>JavaScript is a high-level programming language that is widely used for creating interactive web pages. It
            allows
            you to add dynamic behavior to your websites, making them more engaging and user-friendly.</p>
        <p>In this tutorial, you will learn the basics of JavaScript, including:</p>
        <ul>
            <li>Variables and Data Types</li>
            <li>Operators and Expressions</li>
            <li>Control Flow (if-else statements, loops)</li>
            <li>Functions</li>
            <li>Objects and Arrays</li>
            <li>DOM Manipulation</li>
            <li>Event Handling</li>
        </ul>
    </section>

    <section class="lesson-content white_background" id="variables">
        <h2>Variables and Data Types</h2>
        <p>In JavaScript, variables are used to store data values. There are several data types in JavaScript:</p>
        <ul>
            <li>Number: Represents numeric values.</li>
            <li>String: Represents text values.</li>
            <li>Boolean: Represents true or false values.</li>
            <li>Object: Represents a collection of key-value pairs.</li>
            <li>Array: Represents a list of values.</li>
            <li>Undefined: Represents a variable that has been declared but not assigned a value.</li>
            <li>Null: Represents the absence of any value.</li>
        </ul>
        <p>Example:</p>
        <pre><code>
// Declaring variables
var num = 10;
var name = "John";
var isStudent = true;
var person = { firstName: "John", lastName: "Doe" };
var colors = ["Red", "Green", "Blue"];
var x; // Declaring a variable without assigning a value (results in undefined)
var y = null; // Assigning a null value to a variable
    </code></pre>
    </section>

    <div class="lesson-content white_background" id="operators">
        <article>
            <h2>Operators and Expressions</h2>
            <p>In JavaScript, operators are symbols that perform operations on operands. They can be classified into
                different
                categories:</p>
            <ul>
                <li>Arithmetic operators (+, -, *, /, %)</li>
                <li>Assignment operators (=, +=, -=, *=, /=, %=)</li>
                <li>Comparison operators (==, ===, !=, !==, &gt;, &lt;, &gt;=, &lt;=)</li>
                <li>Logical operators (&&, ||, !)</li>
                <li>Bitwise operators (&, |, ^, ~, &gt;&gt;, &lt;&lt;, &gt;&gt;&gt;)</li>
                <li>Ternary operator (condition ? expr1 : expr2)</li>
                <li>Unary operators (++x, --x, +x, -x, !x)</li>
            </ul>
            <p>Expressions are combinations of values, variables, and operators that are evaluated to produce a result.
                For
                example:</p>
            <pre><code>
var x = 10;
var y = 20;
var z = x + y; // z is assigned the value 30
        </code></pre>
        </article>
    </div>

    <div class="lesson-content white_background" id="control-flow">
        <article>
            <h2>Control Flow</h2>
            <p>Control flow refers to the order in which statements are executed in a program. JavaScript provides
                several
                control flow statements to control the execution flow:</p>
            <ul>
                <li>if statement: Executes a block of code if a specified condition is true.</li>
                <li>if...else statement: Executes a block of code if a condition is true, and another block of code if
                    the
                    condition is false.
                </li>
                <li>else if statement: Allows you to specify a new condition to test if the first condition is false.
                </li>
                <li>switch statement: Evaluates an expression and executes a block of code depending on the value of the
                    expression.
                </li>
                <li>for loop: Executes a block of code a specified number of times.</li>
                <li>while loop: Executes a block of code as long as a specified condition is true.</li>
                <li>do...while loop: Executes a block of code once, and then repeats the loop as long as a specified
                    condition
                    is true.
                </li>
                <li>break statement: Terminates the current loop, switch, or label statement.</li>
                <li>continue statement: Jumps to the next iteration of a loop.</li>
            </ul>
        </article>
    </div>

    <div class="lesson-content white_background" id="functions">
        <article>
            <h2>Functions</h2>
            <p>A function is a block of reusable code that performs a specific task. Functions allow you to organize
                your code
                into logical units, making it easier to understand, debug, and maintain. In JavaScript, you can define
                functions
                using the function keyword:</p>
            <pre><code>
function functionName(parameters) {
    // Function body
    // Code to be executed
    return value; // Optional return statement
}
        </code></pre>
            <p>Functions can take parameters (input values) and return a value as output. They can also be assigned to
                variables, passed as arguments to other functions, and returned from other functions.</p>
        </article>
    </div>

    <div class="lesson-content white_background" id="objects-arrays">
        <article>
            <h2>Objects and Arrays</h2>
            <p>Objects and arrays are two fundamental data structures in JavaScript:</p>
            <h3>Objects:</h3>
            <p>An object is a collection of key-value pairs. Each key is a unique identifier for a property, and each
                value is
                the data associated with that property. Objects are used to represent complex data structures and are
                central to
                JavaScript programming.</p>
            <h3>Arrays:</h3>
            <p>An array is an ordered collection of values. Each value in an array is called an element, and each
                element is
                associated with an index starting from 0. Arrays are used to store lists of data, such as a list of
                numbers or a
                list of objects.</p>
        </article>
    </div>

    <div class="lesson-content white_background" id="dom-manipulation">
        <article>
            <h2>DOM Manipulation</h2>
            <p>The Document Object Model (DOM) is a programming interface for web documents. It represents the structure
                of
                HTML and XML documents as a tree-like structure, where each node represents an element in the
                document.</p>
            <p>DOM manipulation refers to the process of programmatically interacting with the DOM tree to dynamically
                update
                the content, structure, and style of web pages. JavaScript provides methods and properties for
                accessing,
                creating, modifying, and deleting elements in the DOM.</p>
        </article>
    </div>

    <div class="lesson-content white_background" id="event-handling">
        <article>
            <h2>Event Handling</h2>
            <p>Event handling is the process of responding to user interactions with a web page, such as clicks, mouse
                movements, keyboard input, and form submissions. In JavaScript, you can handle events by attaching event
                listeners to HTML elements and specifying the code to execute when the event occurs.</p>
            <p>Common events in web development include click, mouseover, mouseout, keydown, keyup, submit, and many
                more. By
                handling events, you can create interactive and dynamic web applications that respond to user actions in
                real-time.</p>
        </article>
    </div>


    <div class="container" id="quiz">
        <h1>Javascript Tutorial Quiz</h1>

        <div class="left">
            <h2 style="text-align: center">What does CSS stand for?</h2>
            <ul class="answers">
                <li class="answer">
                    <input type="radio" id="js-a" name="js" value="A">
                    <label for="js-a">A) Cascading Style Sheets</label>
                </li>
                <li class="answer">
                    <input type="radio" id="js-b" name="js" value="B">
                    <label for="js-b">B) Computer Style Sheets</label>
                </li>
                <li class="answer">
                    <input type="radio" id="js-c" name="js" value="C">
                    <label for="js-c">C) Creative Style Sheets</label>
                </li>
                <li class="answer">
                    <input type="radio" id="js-d" name="js" value="D">
                    <label for="js-d">D) Colorful Style Sheets</label>
                </li>
            </ul>
            <button type="button" id="feedback-1-button" onclick="showCorrectAnswer('feedback-1')">Show Correct Answer!
            </button>
            <p class="feedback" id="feedback-1" style="display: none;"><strong>Correct Answer:</strong> A) Cascading
                Style
                Sheets</p>
        </div>

        <div class="left">
            <h2 style="text-align: center">Which property is used to change the background color of an element?</h2>
            <ul class="answers">
                <li class="answer">
                    <input type="radio" id="js-bgcolor-a" name="js-bgcolor" value="A">
                    <label for="js-bgcolor-a">A) background-color</label>
                </li>
                <li class="answer">
                    <input type="radio" id="js-bgcolor-b" name="js-bgcolor" value="B">
                    <label for="js-bgcolor-b">B) color</label>
                </li>
                <li class="answer">
                    <input type="radio" id="js-bgcolor-c" name="js-bgcolor" value="C">
                    <label for="js-bgcolor-c">C) background</label>
                </li>
                <li class="answer">
                    <input type="radio" id="js-bgcolor-d" name="js-bgcolor" value="D">
                    <label for="js-bgcolor-d">D) bgcolor</label>
                </li>
            </ul>
            <button type="button" id="feedback-2-button" onclick="showCorrectAnswer('feedback-2')">Show Correct Answer!
            </button>
            <p class="feedback" id="feedback-2" style="display: none;"><strong>Correct Answer:</strong> A)
                background-color
            </p>

        </div>

        <div class="left">
            <h2 style="text-align: center">Which CSS property is used to control the text size?</h2>
            <ul class="answers">
                <li class="answer">
                    <input type="radio" id="js-textsize-a" name="js-textsize" value="A">
                    <label for="js-textsize-a">A) text-size</label>
                </li>
                <li class="answer">
                    <input type="radio" id="js-textsize-b" name="js-textsize" value="B">
                    <label for="js-textsize-b">B) font-size</label>
                </li>
                <li class="answer">
                    <input type="radio" id="js-textsize-c" name="js-textsize" value="C">
                    <label for="js-textsize-c">C) size</label>
                </li>
                <li class="answer">
                    <input type="radio" id="js-textsize-d" name="js-textsize" value="D">
                    <label for="js-textsize-d">D) font</label>
                </li>
            </ul>
            <button type="button" id="feedback-3-button" onclick="showCorrectAnswer('feedback-3')">Show Correct Answer!
            </button>
            <p class="feedback" id="feedback-3" style="display: none;"><strong>Correct Answer:</strong> B) font-size</p>
        </div>

        <div class="left">
            <h2 style="text-align: center">Which CSS property is used to create a border around an element?</h2>
            <ul class="answers">
                <li class="answer">
                    <input type="radio" id="js-border-a" name="js-border" value="A">
                    <label for="js-border-a">A) border-radius</label>
                </li>
                <li class="answer">
                    <input type="radio" id="js-border-b" name="js-border" value="B">
                    <label for="js-border-b">B) border-color</label>
                </li>
                <li class="answer">
                    <input type="radio" id="js-border-c" name="js-border" value="C">
                    <label for="js-border-c">C) border</label>
                </li>
                <li class="answer">
                    <input type="radio" id="js-border-d" name="js-border" value="D">
                    <label for="js-border-d">D) border-width</label>
                </li>
            </ul>
            <button type="button" id="feedback-4-button" onclick="showCorrectAnswer('feedback-4')">Show Correct Answer!
            </button>
            <button type="submit" name="quiz_submit" onclick="saveProgress()">Submit</button>

            <p class="feedback" id="feedback-4" style="display: none;"><strong>Correct Answer:</strong> C) border</p>
        </div>
        <div id="progress_tracker">
            <br>
            <form action="javascript.php" method="post" class="progress-form">
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
                    $javascript_completed = true;
                }
                ?>
            </form>
        </div>
    </div>
</main>


<div class="two-px-border white_background" style="border-radius: 20px; width: 30%; margin: 0 auto">
    <br>
    <a class="btn" href="#">↑ Jump to the top</a>
    <br>
    <br>
    <a class="left btn" href="index.php">&#10094;&#10094; Home</a>
    <br>
    <a class="left btn" href="css.php">&#10094; Previous</a>
    <a class="right btn" href="php.php">Next &#10095;</a>
</div>
<?php include_once "inc/footer.inc.html"; ?>
</body>
</html>
