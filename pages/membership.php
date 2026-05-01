<?php
session_start();

include "connection.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DoBu Martial Arts Membership</title>
</head>
<header>
    <h1>DoBu Martial Arts website Membership</h1>
    <div class="menu">
        <button class="dropbtn">Menu</button>
        <div class="pages">
            <a href="http://localhost/my_project/dobupractice/pages/home.php">DoBu Home</a>
            <a href="http://localhost/my_project/dobupractice/pages/contact.php">DoBu Contact</a>
            <a href="http://localhost/my_project/dobupractice/pages/logout.php">Logout</a>
        </div>
    </div>
</header>

<body>
<section>
<p>This is the DoBu login page after, You have created your account or already
have made an account from a previous visit, you use your account details to fill in the form
below to verify that you exist in the database and then will be redirected to the home page. 
</p>
</section>

</body>
</html>