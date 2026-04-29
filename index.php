<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DoBu Martial Arts Sign-up</title>
</head>
<header>
    <h1>DoBu Martial Arts website Sign up</h1>
    <nav>
        <a herf="http://localhost/my_project/dobupractice/pages/login.php">DoBu login</a>
    </nav>
</header>
<body>
<p>Welcome to DoBu Martial Arts website, 
Here we provide details and information about our facilities, courses, membership plans, 
course timetable, members of staff and what they cover, private courses and age group courses,
and relaxation and health beneficial facilities like the steam room. To learn more about DoBu
and access more of the pages create an account using your details in the form below.
If you already have an account, go to the hamburger menu and select login.</p>
<br><br>
<div class = "form">
<h2>Sign-up form</h2>
<form action="/index.php" method="POST">
    <label for="fname">First_name:</label><br>
        <input type="text" id="fname" name="fname" placeholder="John" required> <br>
    <label for="lname">Last_name:</label><br>
        <input type="text" id="lname" name="lname" placeholder="Doe" required> <br>
    <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2, 4}$" placeholder="j.doe@gmail.co.uk" required><br>
    <label for="pass_word">password:</label><br>
        <input type="password" id="pass_word" name="pass_word" required><br>
    <label for="mobile">Mobile_number:</label><br>
        <input type="tel" id="mobile" name="mobile" placeholder="123-45-678" pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}"><br><br>
    <input type="submit" value="Sign up">
</form>

<!--This code will collect the customer data from the HTML form and insert it into the php database-->
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $pass_word =password_hash($_POST['pass_word'], PASSWORD_DEFAULT);
}
?>
</body>
</html> 