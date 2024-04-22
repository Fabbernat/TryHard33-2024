<?php
session_start();

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
    <meta charset="UTF-8">
    <title>TryHard</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<?php
include_once "inc/navbar.inc.php"; ?>
<header class="yellow-font gray-background">
    <h1>Python basics</h1>
    <div class="html-css-nav">
        <ul class="left black-font">
            <li><a href="#variables-data-types">Variables and Data Types</a></li>
            <li><a href="#operators-expressions">Operators and Expressions</a></li>
            <li><a href="#control-flow">Control Flow</a> (if-else statements, loops)</li>
            <li><a href="#functions">Functions</a></li>
            <li><a href="#data-structures">Data Structures</a> (lists, tuples, dictionaries)</li>
            <li><a href="#file-handling">File Handling</a></li>
            <li><a href="#error-handling">Error Handling</a></li>
            <li><a href="#contact">Contact Us</a></li>
        </ul>
    </div>
</header>
<main class="lesson-container white_background left-align">
    <section>
        <h2>Python tutorial</h2>
        <p>Python is a high-level, interpreted programming language known for its simplicity and readability. It is
            widely used for various purposes, including web development, data analysis, artificial intelligence, and
            scientific computing.</p>
        <p>In this tutorial, you will learn the fundamentals of Python programming, including:</p>
        <ul>

        </ul>
    </section>
    <section id="variables-data-types">
        <h3>Variables and Data Types</h3>
        <p>In Python, variables are used to store data values. Unlike some other programming languages, Python does not
            require explicit declaration of variables before they are used. You can simply assign a value to a variable
            and start using it. For example:</p>

        <p><code>age = 25</code></p>

        <p>In this example, <code>age</code> is a variable storing the value <code>25</code>.</p>

        <p>Python supports various data types, including:</p>

        <ul>
            <li><strong>Numeric Types:</strong> Integers (<code>int</code>), floating-point numbers (<code>float</code>),
                and complex numbers (<code>complex</code>).
            </li>
            <li><strong>Sequence Types:</strong> Lists (<code>list</code>), tuples (<code>tuple</code>), and range
                objects (<code>range</code>).
            </li>
            <li><strong>Text Type:</strong> Strings (<code>str</code>).</li>
            <li><strong>Mapping Type:</strong> Dictionaries (<code>dict</code>).</li>
            <li><strong>Set Types:</strong> Sets (<code>set</code>) and frozen sets (<code>frozenset</code>).</li>
            <li><strong>Boolean Type:</strong> Boolean (<code>bool</code>).</li>
            <li><strong>Binary Types:</strong> Bytes (<code>bytes</code>), byte arrays (<code>bytearray</code>), and
                memory views (<code>memoryview</code>).
            </li>
            <li><strong>None Type:</strong> None (<code>None</code>), which represents the absence of a value.</li>
        </ul>

        <p>Each variable in Python has a data type associated with it, but you don't need to explicitly specify the data
            type when declaring a variable. Python dynamically assigns the data type based on the value assigned to the
            variable. For example:</p>

        <p><code>name = "John"</code> <em># name is now of type str (string)</em></p>

        <p><code>price = 19.99</code> <em># price is now of type float (floating-point number)</em></p>

        <p><code>is_valid = True</code> <em># is_valid is now of type bool (boolean)</em></p>

        <p>This dynamic typing feature makes Python flexible and easy to use.</p>

    </section>
    <section id="operators-expressions">
        <h3>Operators and Expressions</h3>
        <p>In Python, operators are symbols that perform operations on operands or variables. An expression is a
            combination of variables, values, and operators that evaluates to a single value.</p>

        <p>Python supports various types of operators:</p>

        <ul>
            <li><strong>Arithmetic Operators:</strong> Perform mathematical operations such as addition (<code>+</code>),
                subtraction (<code>-</code>), multiplication (<code>*</code>), division (<code>/</code>), exponentiation
                (<code>**</code>), and modulus (<code>%</code>).
            </li>
            <li><strong>Comparison Operators:</strong> Compare values and return boolean results, including equal to
                (<code>==</code>), not equal to (<code>!=</code>), greater than (<code>&gt;</code>), less than (<code>&lt;</code>),
                greater than or equal to (<code>&gt;=</code>), and less than or equal to (<code>&lt;=</code>).
            </li>
            <li><strong>Logical Operators:</strong> Combine conditional statements, including logical AND
                (<code>and</code>), logical OR (<code>or</code>), and logical NOT (<code>not</code>).
            </li>
            <li><strong>Assignment Operators:</strong> Assign values to variables, such as simple assignment
                (<code>=</code>), addition assignment (<code>+=</code>), subtraction assignment (<code>-=</code>), and
                so on.
            </li>
            <li><strong>Bitwise Operators:</strong> Perform bitwise operations on binary numbers, including AND (<code>&amp;</code>),
                OR (<code>|</code>), XOR (<code>^</code>), left shift (<code>&lt;&lt;</code>), and right shift (<code>&gt;&gt;</code>).
            </li>
            <li><strong>Identity Operators:</strong> Compare the memory locations of two objects, including
                <code>is</code> and <code>is not</code>.
            </li>
            <li><strong>Membership Operators:</strong> Test whether a value or variable is found in a sequence,
                including <code>in</code> and <code>not in</code>.
            </li>
        </ul>

        <p>Expressions in Python can be simple or complex, involving combinations of operators and operands. For
            example:</p>

        <ul>
            <li><code>result = 5 + 3</code> <em># Simple arithmetic expression</em></li>
            <li><code>is_valid = (age &gt;= 18) and (age &lt;= 65)</code> <em># Compound logical expression</em></li>
            <li><code>total_cost = price * quantity - discount</code> <em># Expression involving arithmetic and
                    subtraction</em></li>
        </ul>

        <p>Python evaluates expressions according to operator precedence and associativity rules. You can use
            parentheses to specify the order of operations and override the default precedence.</p>
    </section>

    <section id="control-flow">
        <h3>Control Flow</h3>
        <p>In Python, control flow statements allow you to control the flow of execution in your program based on
            certain conditions or criteria. These statements help you to make decisions, loop over sequences, and
            execute code blocks selectively.</p>

        <p>Python provides several types of control flow statements:</p>

        <ul>
            <li><strong>Conditional Statements:</strong> Conditional statements, such as <code>if</code>,
                <code>elif</code> (short for "else if"), and <code>else</code>, allow you to execute different blocks of
                code based on whether certain conditions are true or false.
            </li>
            <li><strong>Looping Statements:</strong> Looping statements, including <code>for</code> loops and <code>while</code>
                loops, enable you to execute a block of code repeatedly. With a <code>for</code> loop, you iterate over
                a sequence (such as a list or tuple), while a <code>while</code> loop continues executing as long as a
                specified condition remains true.
            </li>
            <li><strong>Control Transfer Statements:</strong> Control transfer statements, such as <code>break</code>,
                <code>continue</code>, and <code>pass</code>, provide additional control over the flow of execution
                within loops and conditional blocks. <code>break</code> terminates the loop prematurely,
                <code>continue</code> skips the rest of the loop iteration and moves to the next one, and
                <code>pass</code> is a placeholder that does nothing.
            </li>
            <li><strong>Exception Handling:</strong> Exception handling statements, such as <code>try</code>, <code>except</code>,
                <code>finally</code>, and <code>raise</code>, allow you to handle errors and exceptions gracefully,
                ensuring that your program doesn't crash unexpectedly.
            </li>
        </ul>

        <p>Here's an example of using control flow statements in Python:</p>

        <pre><code>age = 25

if age &lt; 18:
    print("You are underage.")
elif age &lt;= 65:
    print("You are an adult.")
else:
    print("You are a senior citizen.")
</code></pre>

        <p>In this example, the program checks the value of the <code>age</code> variable and prints a different message
            based on whether the age is less than 18, between 18 and 65 (inclusive), or greater than 65.</p>

        <p>By using control flow statements effectively, you can create programs that respond dynamically to different
            situations and conditions, making your code more robust and versatile.</p>

    </section>

    <section id="functions">
        <h3>Functions</h3>
        <p>In Python, a function is a block of reusable code that performs a specific task when called. Functions help
            to organize code, promote reusability, and make programs easier to understand and maintain.</p>

        <p>Key features of Python functions include:</p>

        <ul>
            <li><strong>Defining Functions:</strong> You define a function using the <code>def</code> keyword followed
                by the function name and parentheses containing any parameters the function takes. The function body,
                which contains the code to be executed when the function is called, is indented.
            </li>
            <li><strong>Parameters and Arguments:</strong> Parameters are variables listed in a function's definition,
                while arguments are the values passed into a function when it's called. Python functions can accept any
                number of parameters, including default values and variable-length argument lists.
            </li>
            <li><strong>Return Values:</strong> Functions can optionally return a value using the <code>return</code>
                statement. This allows functions to produce output that can be used elsewhere in the program.
            </li>
            <li><strong>Scope:</strong> Python has local, global, and built-in scopes for variables. Variables defined
                inside a function are local to that function by default, while variables defined outside any function
                are global.
            </li>
            <li><strong>Anonymous Functions:</strong> Python supports the creation of anonymous functions using the
                <code>lambda</code> keyword. These functions are often used for simple tasks and are defined inline.
            </li>
            <li><strong>Recursion:</strong> Python supports recursive functions, which are functions that call
                themselves. Recursion is a powerful technique for solving problems that can be broken down into smaller,
                similar subproblems.
            </li>
        </ul>

        <p>Here's an example of a simple Python function:</p>

        <pre><code>def greet(name):
    return f"Hello, {name}!"

# Call the function
message = greet("Alice")
print(message)  # Output: Hello, Alice!
</code></pre>

        <p>In this example, the <code>greet</code> function takes one parameter (<code>name</code>) and returns a
            greeting message containing the provided name. The function is then called with the argument
            <code>"Alice"</code>, and the resulting message is printed.</p>

        <p>By using functions effectively, you can modularize your code, improve its readability, and promote code
            reuse, leading to more maintainable and efficient programs.</p>

    </section>

    <section id="data-structures">
        <h3>Data Structures</h3>
        <p>Python provides several built-in data structures to store and manipulate collections of data efficiently.
            These data structures offer different ways to organize and manage data based on specific requirements.</p>

        <p>Key Python data structures include:</p>

        <ul>
            <li><strong>Lists:</strong> Lists are ordered collections of items that can contain elements of different
                data types. They are mutable, allowing elements to be added, removed, or modified after creation. Lists
                are defined using square brackets <code>[]</code> and support various built-in methods for manipulation.
            </li>
            <li><strong>Tuples:</strong> Tuples are similar to lists but are immutable, meaning their elements cannot be
                changed after creation. They are defined using parentheses <code>()</code> and are often used to
                represent fixed collections of related values.
            </li>
            <li><strong>Dictionaries:</strong> Dictionaries are unordered collections of key-value pairs, where each key
                is associated with a corresponding value. They are mutable and are often used to store data in a way
                that allows for fast lookup and retrieval based on keys. Dictionaries are defined using curly braces
                <code>{}</code> and key-value pairs separated by colons <code>:</code>.
            </li>
            <li><strong>Sets:</strong> Sets are unordered collections of unique elements, meaning they cannot contain
                duplicate values. Sets support mathematical set operations such as union, intersection, difference, and
                symmetric difference. Sets are defined using curly braces <code>{}</code> with elements separated by
                commas.
            </li>
        </ul>

        <p>Python also provides built-in support for more advanced data structures, such as:</p>

        <ul>
            <li><strong>Arrays:</strong> Arrays are similar to lists but are optimized for numerical operations and
                contain elements of the same data type. They are provided by the <code>array</code> module.
            </li>
            <li><strong>Deque:</strong> Deques (double-ended queues) are versatile data structures that support
                efficient insertion and deletion operations from both ends. They are provided by the
                <code>collections</code> module.
            </li>
            <li><strong>NamedTuple:</strong> NamedTuples are immutable, tuple-like objects that also allow accessing
                elements by name as well as by index. They are provided by the <code>collections</code> module.
            </li>
        </ul>

        <p>Choosing the right data structure for your application is essential for efficient data manipulation and
            algorithm design. Understanding the characteristics and performance implications of each data structure can
            help you make informed decisions when solving problems and designing software.</p>
    </section>

    <section id="file-handling">
        <h3>File Handling</h3>
        <p>Python provides powerful capabilities for working with files, allowing you to read from and write to files on
            your computer's file system. File handling in Python involves opening, reading, writing, and closing files
            using built-in functions and methods.</p>

        <p>Key concepts and operations in Python file handling include:</p>

        <ul>
            <li><strong>Opening Files:</strong> You can open files using the built-in <code>open()</code> function,
                specifying the file path and the mode (e.g., read mode, write mode, append mode, etc.).
            </li>
            <li><strong>Reading from Files:</strong> Once a file is opened in read mode, you can read its contents using
                methods like <code>read()</code>, <code>readline()</code>, or <code>readlines()</code>. These methods
                allow you to read the entire file, individual lines, or all lines at once, respectively.
            </li>
            <li><strong>Writing to Files:</strong> When a file is opened in write mode, you can write data to it using
                the <code>write()</code> method. You can write strings or binary data to the file, and if the file
                doesn't exist, Python will create it.
            </li>
            <li><strong>Appending to Files:</strong> If you want to add content to an existing file without overwriting
                its contents, you can open the file in append mode and use the <code>write()</code> method to append
                data to the end of the file.
            </li>
            <li><strong>Closing Files:</strong> It's essential to close files after you're done working with them using
                the <code>close()</code> method. Closing files releases system resources and ensures that any buffered
                data is written to the file.
            </li>
            <li><strong>Handling Exceptions:</strong> File operations can raise exceptions, especially when dealing with
                I/O errors or file permissions. It's crucial to handle these exceptions using <code>try</code> and
                <code>except</code> blocks to gracefully manage errors and prevent program crashes.
            </li>
        </ul>

        <p>Python also provides higher-level abstractions for file handling, such as context managers using the <code>with</code>
            statement. Context managers automatically handle the opening and closing of files, ensuring proper resource
            management and exception handling.</p>

        <p>File handling in Python is a fundamental aspect of working with data and files, enabling you to read, write,
            and manipulate data stored in files efficiently and effectively.</p>
    </section>

    <section id="error-handling">
        <h3>Error Handling</h3>
        <p>Python provides robust mechanisms for handling errors and exceptions, allowing you to gracefully manage
            unexpected situations and prevent your programs from crashing. Error handling in Python involves using
            try-except blocks to catch and handle exceptions that may occur during program execution.</p>

        <p>Key concepts and operations in Python error handling include:</p>

        <ul>
            <li><strong>try-except Blocks:</strong> You can use try-except blocks to handle exceptions that may occur
                within a specific block of code. The try block contains the code that you want to execute, and the
                except block specifies how to handle exceptions that occur within the try block.
            </li>
            <li><strong>Handling Specific Exceptions:</strong> You can catch specific types of exceptions by specifying
                the exception type in the except block. This allows you to handle different types of errors differently,
                based on their specific characteristics.
            </li>
            <li><strong>Multiple Except Blocks:</strong> You can use multiple except blocks to handle different types of
                exceptions separately. Python will sequentially check each except block and execute the first one that
                matches the raised exception.
            </li>
            <li><strong>Handling Multiple Exceptions:</strong> You can handle multiple exceptions within a single except
                block by specifying a tuple of exception types. This allows you to provide a common error-handling
                strategy for multiple types of exceptions.
            </li>
            <li><strong>try-except-else Blocks:</strong> You can use try-except-else blocks to execute additional code
                only if no exceptions occur within the try block. The else block is executed if no exceptions are
                raised, providing an opportunity to perform cleanup or follow-up actions.
            </li>
            <li><strong>try-except-finally Blocks:</strong> You can use try-except-finally blocks to ensure that certain
                cleanup actions are performed regardless of whether an exception occurs. The finally block is executed
                whether an exception is raised or not, allowing you to release resources or perform cleanup tasks.
            </li>
            <li><strong>Raising Exceptions:</strong> You can raise exceptions manually using the <code>raise</code>
                keyword, allowing you to signal errors or exceptional conditions within your code. You can raise
                built-in exception types or create custom exception classes to represent specific error scenarios.
            </li>
        </ul>

        <p>Effective error handling is crucial for writing robust and reliable Python programs. By anticipating and
            handling potential errors gracefully, you can improve the stability and resilience of your applications,
            ensuring a better user experience and facilitating easier debugging and maintenance.</p>

    </section>
    <div id="progress_tracker">
        <br>
        <form action="python.php" method="post" class="progress-form">
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

<div class="two-px-border white_background" style="border-radius: 20px; width: 30%; margin: 30px auto 0;">
    <a class="btn" href="#">↑ Jump to the top</a>
    <br>
    <br>
    <a class="left btn" href="index.php">&#10094;&#10094; Home</a>
    <br>
    <a class="left btn" href="php.php">&#10094; Previous</a>
    <a class="right btn" href="html.php">Restart Course &#10095;</a>
</div>

<?php
include_once "inc/footer.inc.html";
?>
</body>
</html>
