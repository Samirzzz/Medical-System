<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <!-- Include Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
  <title>Profile</title>
</head>

<body>
<?php
session_start();
include_once "includes/db.php";

$userID = $_SESSION["ID"];

// Query the user_acc table to get email, type, and number
$userAccQuery = "SELECT email, type FROM user_acc WHERE uid=$userID";
$userAccResult = mysqli_query($conn, $userAccQuery);

if ($userAccResult) {
    $userAccRow = mysqli_fetch_array($userAccResult);

    if ($_SESSION["type"] === 'doctor') {
        $sql = "SELECT firstname, lastname, number FROM dr WHERE Did=$userID";
    } elseif ($_SESSION["type"] === 'patient') {
        $sql = "SELECT firstname, lastname, number FROM patient WHERE Pid=$userID";
    }

    $result = mysqli_query($conn, $sql);

    if ($userRow = mysqli_fetch_array($result)) {
        $_SESSION["name"] = $userRow['firstname'] . ' ' . $userRow['lastname'];
        $_SESSION["email"] = $userAccRow['email'];
        $_SESSION["number"] = $userRow['number'];

        echo "<div class='outer-block'>";
        echo "<section class='profile-body'>";
        echo "<br />";
        echo "<div class='side-block'>";
        echo "<div class='form-group'>";
        echo "<label for='name'>Name:</label>";
        echo "<h1 id='name' class='form-control-static'>" . $_SESSION["name"] . "</h1>";
        echo "</div>";
        echo "<div class='form-group'>";
        echo "<label for='email'>Email:</label>";
        echo "<h1 id='email' class='form-control-static'>" . $_SESSION["email"] . "</h1>";
        echo "</div>";
        echo "<div class 'form-group'>";
        echo "<label for='phone'>Phone:</label>";
        echo "<h1 id='phone' class='form-control-static'>" . $_SESSION["number"] . "</h1>";
        echo "</div>";
        echo "<div class='form-group'>";
        echo "<label for='type'>Type:</label>";
        echo "<h1 id='type' class='form-control-static'>" . $_SESSION["type"] . "</h1>";
        echo "</div>";
        echo "</div>";
        echo "</section>";
        echo "</div>";
    }
} else {
    echo "Error showing page";
}
?>



  <!-- Include Bootstrap JS and jQuery if needed -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
<footer>
    <?php
    include_once "./includes/footer.php";
    ?>
   </footer>
</html>
