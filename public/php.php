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
include_once "inc/navbar.inc.php";
?>
<header class="yellow-font gray-background">
    <h1>PHP tutorial</h1>
    <div class="html-css-nav">
        <ul class="left  black-font">
            <li><a href="#introduction">Introduction</a></li>
            <li><a href="#variables">Variables and Data Types</a></li>
            <li><a href="#conditionals">Conditional Statements</a></li>
            <li><a href="#loops">Loops</a></li>
            <li><a href="#functions">Functions</a></li>
            <li><a href="#arrays">Arrays</a></li>
            <li><a href="#forms">Forms Handling</a></li>
            <li><a href="#contact">Contact Us</a></li>

        </ul>
    </div>
</header>

<main class="lesson-container white_background left-align">
    <section class="lesson-content">
        <h1>PHP Basics</h1>
        <hr>
        <section>
            <h3 id="introduction" class="blue">Introduction</h3>
            <p>PHP is a server-side scripting language used for web development. It is widely used for creating dynamic
                web
                pages and interacting with databases.</p>
            <section>
                <h3>Example 1: Hello World</h3>
                <div class="php-code">
      <pre class="left-align">
      &lt;?php
      // PHP code to display "Hello, World!"
      echo "Hello, World!";
      ?></pre>
                </div>
                <h4>Output:</h4>
                <div class="output">
      <pre>
      Hello, World!
      </pre>
                </div>
            </section>
            <section>
                <h3>Example 2: Variables and Data Types</h3>
                <div class="php-code">
      <pre class="left-align">

      &lt;?php
      // PHP code to declare variables and display their values
      $name = "John";
      $age = 25;
      echo "Name: " . $name . "&lt;br&gt;";
      echo "Age: " . $age;
      ?>
      </pre>
                </div>
                <h4>Output:</h4>
                <div class="output">
      <pre class="left-align">
      Name: John
      Age: 25
      </pre>
                </div>
            </section>
            <section>
                <h3>Example 3: Conditional Statements</h3>
                <div class="php-code">
      <pre class="left-align">

      &lt;?php
      // PHP code to demonstrate conditional statements
      $num = 10;
      if ($num > 0) {
      echo "Positive number";
      } elseif ($num &lt; 0) {
      echo "Negative number";
      } else {
      echo "Zero";
      }
      ?>
      </pre>
                </div>
                <h4>Output:</h4>
                <div class="output">
    <pre class="left-align">
      Positive number
    </pre>
                </div>
            </section>
            <section>
                <h3>Example 4: Loops</h3>
                <div class="php-code">
    <pre class="left-align">
      &lt;?php
      // PHP code to demonstrate loops
      for ($i = 1; $i &lt;= 5; $i++) {
          echo $i . "&lt;br&gt;";
      }
      ?&gt;
    </pre>
                </div>
                <h4>Output:</h4>
                <div class="output">
    <pre class="left-align">
      1
      2
      3
      4
      5
    </pre>
                </div>
            </section>
        </section>
    </section>
    <section>
        <h3 id="variables" class="blue">Variables and Data Types</h3>
        <p>...</p>
    </section>
    <section>
        <h3 id="conditionals" class="blue">Conditional Statements</h3>
        <p>...</p>
    </section>
    <section>
        <h3 id="loops" class="blue">Loops</h3>
        <p>...</p>
    </section>
    <section>
        <h3 id="functions">Example 5: Functions</h3>
        <div class="php-code">
                <pre class="left-align">
                &lt;?php
                // PHP code to demonstrate functions
                function greet($name) {
                    echo "Hello, $name!";
                }
                greet("Alice");
                ?>
                </pre>
        </div>
        <h4>Output:</h4>
        <div class="output">
                <pre class="left-align">
                Hello, Alice!
                </pre>
        </div>
    </section>

    <section>
        <h3 id="arrays">Example 6: Arrays</h3>
        <div class="php-code">
                <pre class="left-align">
                &lt;?php
                // PHP code to demonstrate arrays
                $colors = array("Red", "Green", "Blue");
                echo "Colors: " . implode(", ", $colors);
                ?>
                </pre>
        </div>
        <h4>Output:</h4>
        <div class="output">
                <pre class="left-align">
                Colors: Red, Green, Blue
                </pre>
        </div>
    </section>

    <section>
        <h3 id="forms">Example 7: Forms Handling</h3>
        <div class="php-code">
                <pre class="left-align">
                &lt;?php
                // PHP code to handle form submission
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $name = $_POST["name"];
                    echo "Hello, $name!";
                }
                ?>
                </pre>
        </div>
        <h4>Output:</h4>
        <div class="output">
                <pre class="left-align">
                (Output will vary based on form input)
                </pre>
        </div>
    </section>
    <div id="progress_tracker">
        <br>
        <form action="php.php" method="post" class="progress-form">
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
</main>

<div class="two-px-border white_background" style="border-radius: 20px; width: 30%; margin: 0 auto">
    <br>
    <a class="btn" href="#">↑ Jump to the top</a>
    <br>
    <br>
    <a class="left btn" href="index.php">&#10094;&#10094; Home</a>
    <br>
    <a class="left btn" href="javascript.php">&#10094; Previous</a>
    <a class="right btn" href="python.php">Next &#10095;</a>
</div>

<?php include_once "inc/footer.inc.html"; ?>
</body>
</html>