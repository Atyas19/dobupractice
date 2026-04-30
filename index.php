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
    <link rel="stylesheet" href="http://localhost/my_project/dobupractice/css/style.css">
</head>
<header>
    <h1>DoBu Martial Arts website Sign up</h1>
    <div class="menu">
        <button class="dropbtn">Menu</button>
        <div class="pages">
            <a href="http://localhost/my_project/dobupractice/pages/login.php">DoBu login</a>
        </div>
    </div>
</header>
<body>
<section>
<p>Welcome to DoBu Martial Arts website, 
Here we provide details and information about our courses, membership plans, 
course timetable, private courses and age group courses, To learn more about DoBu
and access more of the pages create an account using your details in the form below.
Along with which membership plan you intend to apply for a explaination table is provided.
If you already have an account, go to the hamburger menu and select login.</p>
</section>
<br><br>
<div class="membership_table">
<h2>Membership Table</h2>
<table>
    <tr>
        <th>Membership Options</th>
        <th>Membership Details</th>
        <th>Price</th>
    </tr>
    <tr>
        <td>Basic</td>
        <td>Basic, apply for 1 martial art course and 2 sessions per week.</td>
        <td>£25.00 per month</td>
    </tr>
    <tr>
        <td>Intermediate</td>
        <td>Intermediate, apply for 1 martial art course and 3 sessions per week.</td>
        <td>£35.00 per month</td>
    </tr>
    <tr>
        <td>Advanced</td>
        <td>Advanced, apply for any 2 martial art courses and 5 sessions per week.</td>
        <td>£45.00 per month</td>
    </tr>
    <tr>
        <td>Elite</td>
        <td>Elite, Unlimited classes.</td>
        <td>£60.00</td>
    </tr>
    <tr>
        <td>Private</td>
        <td>Private, apply for a private 1-on-1 instructor martial arts course lesson.</td>
        <td>£15.00 per hour</td>
    </tr>
    <tr>
        <td>Junior</td>
        <td>Junior, can attend all-kids martial arts sessions.</td>
        <td>£25.00 </td>
    </tr>
</table>
</div>
<br>

<div class="signup">
<h3>Sign-up form</h3>
<form action="index.php" method="POST">
    <label for="fname">First_name:</label><br>
        <input type="text" id="fname" name="fname" placeholder="John" required> <br>
    <label for="lname">Last_name:</label><br>
        <input type="text" id="lname" name="lname" placeholder="Doe" required> <br>
    <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2, 4}$" placeholder="j.doe@gmail.co.uk" required><br>
    <label for="pass_word">password:</label><br>
        <input type="password" id="pass_word" name="pass_word" required><br>
    <label for="mobile">Mobile_number:</label><br>
        <input type="tel" id="mobile" name="mobile" placeholder="123-45-678" pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}"><br>
    <label for="membership">Select a membership:</label><br>
    <select id="membership" name="membership" required>
        <option value="">Select a membership</option>
        <option value="basic">Basic</option>
        <option value="intermediate">Intermediate</option>
        <option value="advanced">Advanced</option>
        <option value="elite">Elite</option>
        <option value="private">Private</option>
        <option value="junior">Junior</option>
    <input type="submit" value="Sign up">
</form>
</div>

<!--This code will collect the customer data from the HTML form and insert it into the php database-->
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $pass_word =password_hash($_POST['pass_word'], PASSWORD_DEFAULT);
    $mobile = $_POST['mobile'];
    $membership = $_POST['membership'];

    //insert collected data into users database table stmt to make the program secure from SQL injections
    $stmt = $conn->prepare("INSERT INTO Users (fname, lname, email, pass_word, mobile, membership) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $fname, $lname, $email, $pass_word, $mobile, $membership);

    if ($stmt->execute()) {
        header("Location: login.php");
        exit();
    } else {
        echo "Sign up Failed, please try again.";
    }
    $stmt->close();
}
?>
</body>
</html> 