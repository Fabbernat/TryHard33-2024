<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title> TryHard - CSS Tutorial</title>
  <link href="css/style.css" rel="stylesheet">
</head>
<body>
<?php
include_once "inc/navbar.inc.php"; ?>
<header class="yellow-font gray-background">
  <h1>CSS Tutorial</h1>
  <div class="html-css-nav">
    <ul class="left">
      <li><a href="#introduction">Introduction to CSS</a></li>
      <li><a href="#examples">Interactive Examples</a></li>
      <li><a href="#challenges">Challenges</a></li>
      <li><a href="#resources">Resources</a></li>
    </ul>
  </div>
</header>
<main class="lesson-container white_background left-align">
  <h2>CSS tutorial</h2>
  <section id="introduction">
    <h2>Introduction to CSS</h2>
    <p>CSS, which stands for Cascading Style Sheets, is a language used for describing the presentation of a
      document written in HTML or XML (including XML dialects like SVG or XHTML). It controls the visual aspects
      of a web page, including layout, colors, fonts, and more.</p>

    <h3>Why CSS is Important</h3>
    <p>CSS separates the content of a web page from its presentation, allowing developers to change the look and
      feel of multiple pages by modifying just one file. This makes it easier to maintain and update websites, and
      it also improves accessibility and search engine optimization.</p>

    <h3>How CSS Works</h3>
    <p>CSS works by selecting HTML elements and applying styles to them. Selectors are used to target specific
      elements, and properties are used to define the styles that should be applied. CSS rules consist of a
      selector and one or more declarations enclosed in curly braces.</p>

    <h3>CSS Versions</h3>
    <p>CSS has evolved over the years, with several versions released to add new features and improve existing ones.
      The current version is CSS3, which introduced many advanced features like animations, transitions, and
      responsive design capabilities.</p>

    <h3>Getting Started with CSS</h3>
    <p>To start using CSS, you need to create a separate CSS file or include styles directly within your HTML
      document using the <code>&lt;style&gt;</code> tag. You can then use CSS properties to customize the
      appearance of your web page.</p>

    <p>Now that you have a basic understanding of what CSS is and why it's important, let's dive into some tutorials
      to learn how to use it effectively!</p>
  </section>

  <section id="examples">
    <h2>Interactive Examples</h2>
    <p>Explore these interactive examples to see CSS in action:</p>

    <h3>1. CSS Color Picker</h3>
    <p>Experiment with different colors and color combinations using this interactive color picker. See how changing
      the color affects the appearance of various HTML elements.</p>
    <div>
      <label for="colorPicker">Choose a color
        <br>
        <input class="colorpicker" id="colorPicker" type="color" value="#ff0000">
        </label>
    </div>
    <h3>2. CSS Box Model Demo</h3>
    <p>Visualize the CSS box model and its components (content, padding, border, margin) using this interactive
      demo. Adjust the size and spacing of the box to see how it affects the layout.</p>
    <em>Not implemented yet...</em>
    <!-- TODO mf2 embed a box model demo here -->
    <img alt="A picture showing the css box model." class="display-block seventy-five-percent-width"
         src="img/box_model.png">

    <h3>3. Flexbox Playground</h3>
    <p>Play around with Flexbox properties to create different layouts and arrangements of elements. Drag and drop
      elements to see how they respond to changes in flex container and flex item properties.</p>
    <em>Not implemented yet...</em>
    <!-- TODO mf2 embed a Flexbox playground here -->

    <h3>4. CSS Grid Builder</h3>
    <p>Build custom grid layouts using CSS Grid Layout with this interactive tool. Specify the number of rows and
      columns, and drag elements into the grid to position them as desired.</p>
    <em>Not implemented yet...</em>
    <!-- TODO mf2  embed a CSS Grid builder tool here -->

    <h3>5. Responsive Design Simulator</h3>
    <p>Test the responsiveness of your website by simulating different screen sizes and orientations. See how your
      layout adjusts to accommodate different devices.</p>
    <em>Not implemented yet...</em>
    <!-- TODO mf2  embed a responsive design simulator here -->

    <p>These interactive examples provide a hands-on way to explore CSS concepts and techniques. Click on the links
      to start experimenting!</p>
    <section class="animation-container" id="animation-demo">
      <h3 class="animation-heading">CSS Animation Demonstration</h3>
      <img alt="First rabbit fades out." onclick="applyAnimation(this, 'fadeOut')" src="img/nyul-icon.png"
           title="First rabbit fades out.">
      <p>First rabbit fades out.</p>
      <img alt="Second rabbit slides in." onclick="applyAnimation(this, 'slideIn')" src="img/nyul1.png"
           title="Second rabbit slides in.">
      <p>Second rabbit slides in.</p>
      <img alt="Third rabbit rotates." onclick="applyAnimation(this, 'rotate')" src="img/nyul2.jfif"
           title="Third rabbit rotates.">
      <p>Third rabbit rotates.</p>
      <img alt="Fourth rabbit scales." onclick="applyAnimation(this, 'scale')" src="img/nyul3.jfif"
           title="Fourth rabbit scales.">
      <p>Fourth rabbit scales.</p>
      <img alt="Fifth rabbit changes color." onclick="applyAnimation(this, 'changeColor')" src="img/nyul4.jfif"
           title="Fifth rabbit changes color.">
      <p>Fifth rabbit picture changes color.</p>
    </section>

    <script>
        function applyAnimation(element, animationName) {
            element.style.animationName = animationName; // Apply the specified animation
            element.style.animationDuration = '1s'; // Set animation duration
            element.style.animationTimingFunction = 'ease'; // Set animation timing function
            element.style.animationIterationCount = '1'; // Set animation iteration count
            element.style.animationFillMode = 'forwards'; // Keep the final state of the animation
        }
    </script>
  </section>
  <section id="challenges">

    <h3>1. CSS Selector Challenge</h3>
    <p>Given a specific HTML structure, write CSS selectors to target specific elements and apply the required
      styles. For example, style all paragraph elements with a class of "highlight" to have a yellow
      background.</p>

    <h3>2. Layout Challenge</h3>
    <p>Create a specific layout using CSS, following a provided design mockup or description. Practice positioning
      elements using techniques such as Flexbox or CSS Grid to achieve the desired layout.</p>

    <h3>3. Responsive Design Challenge</h3>
    <p>Take a static webpage and make it responsive to different screen sizes. Use media queries and other
      responsive design techniques to ensure that the layout adapts seamlessly on devices of varying widths.</p>

    <h3>4. Animation Challenge</h3>
    <p>Create a CSS animation to add visual interest to a webpage. Experiment with keyframes, transitions, and other
      animation properties to achieve effects like fading, sliding, or rotating elements.</p>

    <h3>5. Advanced CSS Challenge</h3>
    <p>Tackle a more complex CSS challenge, such as creating a custom dropdown menu, implementing a sticky header,
      or building a modal popup window. Push your CSS skills to the next level!</p>

        <p>These challenges will help reinforce your understanding of CSS concepts and improve your ability to apply
            them in real-world scenarios. Dive in and test your skills!</p>
    </section>
    <section id="resources">
        <h2>Resources</h2>
        <p>Explore these additional resources to further enhance your CSS knowledge:</p>
        <h3>1. TryHard33 CSS Blog</h3>
        <p>Visit the TryHard33 CSS Blog for in-depth tutorials, tips, and tricks on mastering CSS. Learn from industry
            experts and stay updated with the latest trends in web design.</p>
        <a href="https://tryhard33cssblog.com">Visit TryHard33 CSS Blog</a>
        <h3>2. Meowuwuka CSS Framework</h3>
        <p>Meet Meowuwka, the magical cat who helps you learn CSS and pass the university subject called "Web
            tervezés".
            Discover the Meowuwuka CSS Framework, a lightweight and flexible framework for building beautiful and
            responsive websites. Explore its features and documentation to streamline your development process.</p>
        <a href="https://meowuwukacss.com">Explore Meowuwuka CSS Framework</a>
    </section>
</main>
<div>
    <a class="left btn" href="index.php">&#10094;&#10094; Home</a>
    <br>
    <a class="left btn" href="html.php">&#10094; Previous</a>
    <a class="right btn" href="javascript.php">Next &#10095;</a>
</div>
<?php include_once "inc/footer.inc.html"; ?>
</body>
</html>
