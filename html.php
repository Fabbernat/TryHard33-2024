<?php
session_start();
$learned = false;
if (isset($_POST["save_input"])) {
    $learned = true;
}

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
    <title>HTML Tutorial</title>
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
            <!-- more navigation links for other sections -->
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
<div>
    <br>
    <form action="html.php" method="post" class="yellow-font gray-background progress-form">
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
<!-- JavaScript to toggle the circle -->
<script>
    function toggleCircle(checkbox) {
        var circle = document.getElementById('circle');
        if (checkbox.checked) {
            circle.classList.add('green-circle');
        } else {
            circle.classList.remove('green-circle');
        }
    }

    function saveProgress(event) {
        // Prevent the default form submission behavior
        event.preventDefault();

        // Get the form element
        const form = document.getElementById('progressForm');

        // Submit the form using AJAX or perform any other necessary actions
        // Example: form.submit();
    }
</script>
<div>
    <a class="left btn" href="index.php">&#10094;&#10094; Home</a>
    <br>
    <a class="left btn" href="html.php">&#10094; Previous</a>
    <a class="right btn" href="css.php">Next &#10095;</a>
</div>
<?php include_once "inc/footer.inc.html"; ?>
</body>
</html>
