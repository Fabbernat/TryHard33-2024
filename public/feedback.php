<?php
session_start();
?>
<!--//https://studio.code.org/s/pre-express-2023/lessons/1/levels/1-->
<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title> TryHard - Feedback</title>
    <link href="css/style.css" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.10.2/css/all.css" rel="stylesheet"/>
</head>
<body>
<?php
include_once "inc/navbar.inc.php";
?>
<main>
    <header>
        <h1>Feedback</h1>
    </header>
    <section>
        <form action="inc/submit_feedback.inc.php" class="white_background background-form  feedback-form form"
              method="POST"><!--inc/submit_feedback.inc.php-->
            <h2>Rate Us (1-5):</h2>
            <div class="rating">
                <label>
                    <input name="stars" type="radio" value="1" required/>
                    <span class="fa fa-star icon"></span>
                </label>
                <label>
                    <input name="stars" type="radio" value="2"/>
                    <span class="fa fa-star icon"></span>
                    <span class="fa fa-star icon"></span>
                </label>
                <label>
                    <input name="stars" type="radio" value="3"/>
                    <span class="fa fa-star icon"></span>
                    <span class="fa fa-star icon"></span>
                    <span class="fa fa-star icon"></span>
                </label>
                <label>
                    <input name="stars" type="radio" value="4"/>
                    <span class="fa fa-star icon"></span>
                    <span class="fa fa-star icon"></span>
                    <span class="fa fa-star icon"></span>
                    <span class="fa fa-star icon"></span>
                </label>
                <label>
                    <input name="stars" type="radio" value="5"/>
                    <span class="fa fa-star icon"></span>
                    <span class="fa fa-star icon"></span>
                    <span class="fa fa-star icon"></span>
                    <span class="fa fa-star icon"></span>
                    <span class="fa fa-star icon"></span>
                </label>
            </div>
            <br>
            <label for="comment">Feel free to leave a comment, or write your opinion:
                <textarea cols="50" id="comment" name="comment" placeholder="Write your feedback here..."
                          rows="4"></textarea>
            </label>
            <br>
            <button class="button" type="submit">Submit Feedback</button>
        </form>
    </section>
</main>


<?php include_once "inc/footer.inc.html"; ?>
</body>
</html>
