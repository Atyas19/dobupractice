<?php
session_start();

include "http://localhost/my_project/dobupractice/.../connection.php";

// Verifies if User is logged in
if (!isset($_SESSION['fname'])) {
    header("Location: login.php");
    exit();
}

//Get users first name and email and membership from session
$fname = $_SESSION['fname'];
$email = $_SESSION['email'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DoBu Martial Arts Contact</title>
    <link rel="stylesheet" href="http://localhost/my_project/dobupractice/css/style.css">
</head>
<header>
    <div class="logo">
        <img src="http://localhost/my_project/dobupractice/assets/dobu_logo.jpg" alt="Logo">
    </div>
    <h1>DoBu Martial Arts website Contact</h1>
    <div class="menu">
        <button class="dropbtn">Menu</button>
        <div class="pages">
            <a href="http://localhost/my_project/dobupractice/pages/home.php">DoBu Home</a>
            <a href="http://localhost/my_project/dobupractice/pages/membership.php">DoBu Membership</a>
            <a href="http://localhost/my_project/dobupractice/pages/logout.php">Logout</a>
        </div>
    </div>
</header>

<body>
<section>
<p>This is the DoBu martial arts contact page, <?php echo $fname; ?> by filling in the form below you can,
explain what you liked about our website and what areas need improvement. This way
we can make the website better when you next visit.
</p>
</section>

<!--Contact form details-->
<h3>Contact form</h3>
<form action="contact.php" method="POST">
    <label for="fname">First_name:</label><br>
        <input type="text" id="fname" name="fname" placeholder="John" required> <br>
    <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2, 4}$" placeholder="j.doe@gmail.co.uk" required><br>
    <label for="feedback">Feedback:</label><br>
        <input type="textarea" id="feedback" name="feedback" rows="5" cols="40" required><br><br>
    <input type="submit" value="Send">
</form>

</body>
</html>