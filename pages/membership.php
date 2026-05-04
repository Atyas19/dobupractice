<?php
session_start();

include "../connection.php";

// Verifies if User is logged in
if (!isset($_SESSION['fname'])) {
    header("Location: login.php");
    exit();
}

//Get users first name and email and membership from session
$fname = $_SESSION['fname'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DoBu Martial Arts Membership</title>
    <link rel="stylesheet" href="http://localhost/my_project/dobupractice/css/style.css">
</head>
<header>
    <div class="logo">
        <img src="http://localhost/my_project/dobupractice/assets/dobu_martial_logo.jpg" alt="Logo">
    </div>
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
<p>Welcome <?php echo $fname; ?>, this is the DoBu Membership page where you can either,
update your membership plan by filling in the form below to add the courses you want to take,
or switch your membership plan if you want a membership with more benefits.
</p>
</section>
<aside>
<img src="../assets/timetable.png" alt="timetable">
</aside>

<!--Membership form for course and membership details to be added to course table-->
<h3>Membership form</h3>
<form action="membership.php" method="POST">
    <label for="membership">Select a Membership:</label><br>
    <select id="membership" name="membership" required>
        <option value="">Select a membership</option>
        <option value="basic">Basic</option>
        <option value="intermediate">Intermediate</option>
        <option value="advanced">Advanced</option>
        <option value="elite">Elite</option>
        <option value="private">Private</option>
        <option value="junior">Junior</option>
    </select><br>
    <label for="course_1">Select a course:</label><br>
    <select id="course_1" name="course_1" required>
        <option value="">Select a course</option>
        <option value="jiu-jitsu">Jiu-jitsu</option>
        <option value="karate">Karate</option>
        <option value="judo">Judo</option>
        <option value="muay thai">Muay Thai</option>
        <option value="private tuition">Private Tuition</option>
        <option value="open mat">Open Mat</option>
        <option value="kids jiu-jitsu">Kids Jiu-jitsu</option>
        <option value="kids karate">Kids Karate</option>
        <option value="kids judo">Kids Judo</option>
    </select><br>
    <label for="course_2">Select a second course:</label><br>
    <select id="course_2" name="course_2">
        <option value="">Select a course</option>
        <option value="jiu-jitsu">Jiu-jitsu</option>
        <option value="karate">Karate</option>
        <option value="judo">Judo</option>
        <option value="muay thai">Muay Thai</option>
        <option value="private tuition">Private Tuition</option>
        <option value="open mat">Open Mat</option>
        <option value="kids jiu-jitsu">Kids Jiu-jitsu</option>
        <option value="kids karate">Kids Karate</option>
        <option value="kids judo">Kids Judo</option>
    </select><br>
    <input type="submit" value="Apply">
</form>

<!--php code to update and add membership data in course table and get fname and email from user table-->
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $UID = $_SESSION['UID'];
    $membership = $_POST['membership'];
    $course_1 = $_POST['course_1'];
    $course_2 = $_POST['course_2'];

    //update membership in users
    $stmt = $conn->prepare ("UPDATE users SET membership = ? WHERE UID = ?");
    $stmt->bind_param("si", $membership, $UID);
    $stmt->execute();

    //insert collected and referenced data into course table and stmt to make the website secure from SQL injection
    $stmt = $conn->prepare("INSERT INTO courses(UID, membership, course_1, course_2) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("isss", $UID, $membership, $course_1, $course_2);
    $stmt->execute();

    if ($stmt->execute()) {
        echo "Course and Membership plan successfully inserted";
    } else {
        echo "Membership and course implementation failed, try again";
    }
    $stmt->close();
    $conn->close();
}
?>
</body>
</html>