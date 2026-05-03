<?php
session_start();

include "http://localhost/my_project/dobupractice/connection.php";

// Verifies if User is logged in
if (!isset($_SESSION['fname'])) {
    header("Location: login.php");
    exit();
}

//Get users first name from session
$fname = $_SESSION['fname'];
?>

<!--start of home page code-->
<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DoBu Martial Arts Home</title>
</head>
<header>
    <h1>DoBu Martial Arts website Home</h1>
    <div class="menu">
        <button class="dropbtn">Menu</button>
        <div class="pages">
            <a href="http://localhost/my_project/dobupractice/pages/membership.php">DoBu Membership</a>
            <a href="http://localhost/my_project/dobupractice/pages/contact.php">DoBu Contact</a>
            <a href="http://localhost/my_project/dobupractice/pages/logout.php">Logout</a>
        </div>
    </div>
</header>

<!-- code that uses the session to paste the fname of the user into the intro paragraph-->
<body>
<section>
<p>Welcome <?php echo $fname; ?>, to the DoBu Martial Arts home page, This will help you 
understand what courses and lessons We teach and the types of martial arts courses avaliable,
It will also provide information on the gym facility and the equipment in place to help with teaching and exercise.
</p>
</section>
<br>
<!--code that opens assets folder and collects the neccessary image-->
<article>
    <img scr="http://localhost/my_project/dobupractice/assets/dobu_gym.jpg" alt="Martial Arts gym with matted floors and professional equipment">
<article>
<p>This is the DoBu Martial Arts Gym facility where all your martial arts lessons are going to take place,
like Karate, Judo, Jiu-jitsu, and others, The gym is fitted with matted floors and professional equipment,
to provide better teaching and training, there are also kid classes for younger students,
and there is private lessons for users that need one-on-one guidence.</p>
<br>
<img scr="http://localhost/my_project/dobupractice/assets/dobu_training.jpg" alt="Karate Lesson showing students and instructor">

</body>
</html>