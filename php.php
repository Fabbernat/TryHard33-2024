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
include_once "inc/navbar.inc.php";?>
<main class="lesson-container white left-align">
    <h2>PHP tutorial</h2>
    <div class="lesson-content">
        <section class="lesson-content">
            <h2>PHP Basics</h2>
            <h3>Introduction</h3>
            <p>PHP is a server-side scripting language used for web development. It is widely used for creating dynamic web
                pages and interacting with databases.</p>
        </section>
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
    </div>
</main>

<div>
    <a class="left btn" href="index.php">&#10094;&#10094; Home</a>
    <br>
    <a class="left btn" href="javascript.php">&#10094; Previous</a>
    <a class="right btn" href="python.php">Next &#10095;</a>
</div>
<?php include_once "inc/footer.inc.php"; ?>
</body>
</html>