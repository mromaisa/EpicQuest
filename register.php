<?php

$username = $firstname = $lastname = $email = $password = $c_password = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    require_once "db.php";

    $username = $_POST["username"];
    $firstname = $_POST["firstname"];
    $password = $_POST["password"];
    $c_password = $_POST["confirm_password"];
    $email = $_POST["email"];

    if ($password == $c_password) {
        $sql = "INSERT INTO `users`(`username`, `firstname`, `email`, `password`) VALUES ('$username','$firstname','$email','$password')";
        
        if (mysqli_query($conn, $sql)) {
            header("Location: login.php");
            exit; 
        } else {
            echo "Error: " . mysqli_error($conn); 
        }
    } else {
        echo "Passwords do not match."; 
    }
}
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>User Login</title>
    <link rel="stylesheet" href="register.css">
    <link rel="stylesheet" href="nav.css" />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=arrow_drop_down"
    />
  </head>

  <body>
    <div class="parent">
      <div class="register">
        <form action="register.php" method="post">
          <div class="header">
            <h2>Register Here!</h2>
          </div>
          <div class="username">
            <input type="text" placeholder="Enter your User Name" name="username" required />
          </div>
          <div class="firstname">
            <input type="text" placeholder="Enter your First Name" name="firstname" required />
          </div>
          <div class="email">
            <input type="text" placeholder="Enter your Email" name="email" required />
          </div>
          <div class="password">
            <input type="password" placeholder="Enter your Password" name="password" required />
          </div>
          <div class="c_password">
            <input type="password" placeholder="confirm Password" name="confirm_password" required />
          </div>
          <button type="submit">Sign Up</button>
          <div class="login">
            <center><p>
              Already have an account? <a href="login.php">Continue you Adventure</a>
            </p></center>
          </div>
        </form>
      </div>
      <div class="introduction">
        <div class="paragraph">
          <h2>Welcome to EpicQuest, Adventurer!</h2>
          <p>
            You're about to embark on an unforgettable journey into a world of
            limitless adventure and boundless excitement. By joining EpicQuest,
            you become part of a vibrant community of heroes, strategists, and
            explorers who thrive on the thrill of the unknown. Create your
            unique character, forge alliances, and dive into quests that will
            test your skills and courage. Register now, and let your legend
            begin—an epic quest awaits!
          </p>
        </div>
      </div>
    </div>
  </body>
</html>
