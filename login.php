<?php
session_start();

$login = false;
$email = $password = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once "db.php"; 

    $email = $_POST["email"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM `users` WHERE email = '$email' AND password = '$password'";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        $login = true;
        $_SESSION["loggedin"] = true;
        $_SESSION["username"] = $row["username"];
        header("location: home.html");
        exit;
    } else {
        echo "Invalid email or password.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>User Login</title>
    <link rel="stylesheet" href="login.css" />
    <link rel="stylesheet" href="nav.css" />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=arrow_drop_down"
    />
  </head>

  <body>
    <div class="parent">
      <div class="login_body">
        <form action="login.php" method="post">
          <div class="header">
            <h2>Sign In</h2>
          </div>
          <div class="email">
            <input
              type="text"
              placeholder="Enter your Email"
              name="email"
              required
            />
          </div>
          <div class="password">
            <input
              type="password"
              placeholder="Enter your Password"
              name="password"
              required
            />
          </div>
          <button type="submit">Start where You Left Of</button>
          <div class="register">
            <p>
              Don't have an account?
              <a href="register.php">Register Yourself</a>
            </p>
          </div>
        </form>
      </div>
      <div class="introduction">
        <div class="paragraph">
          <h2>Welcome back, Adventurer!</h2>
          <p>
            The journey awaits! We're thrilled to see you return to EpicQuest,
            where each login brings new opportunities for exploration and glory.
            Step back into your world of epic battles, untold mysteries, and
            thrilling quests. Your next adventure is just a click away, and this
            time, it promises to be even more legendary. Reclaim your place
            among heroes, strategize with allies, and let the magic of EpicQuest
            take you further than ever before. Welcome back, and may your quest
            be ever victorious!
          </p>
        </div>
      </div>
    </div>
  </body>
</html>
