<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<?php
    include_once "../includes/navigation.php";
    include_once "../includes/db.php";
    $db = Database::getInstance();
	$conn = $db->getConnection();	

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $x = $_SESSION['email'];
        $UserType = $_SESSION["type"];

        if ($UserType == 'patient') {
            $sql = "DELETE FROM patient WHERE uid = " . $_SESSION['ID'];
        } elseif ($UserType == 'doctor') {
            $sql = "DELETE FROM dr WHERE uid = " . $_SESSION['ID'];
        }
        elseif ($UserType == 'clinic') {
            $sql = "DELETE FROM clinic WHERE uid = " . $_SESSION['ID'];
        }
        // elseif ($UserType == 'admin') {
        //     $sql = "DELETE FROM admin WHERE uid = " . $_SESSION['ID'];
        // }

        $result = mysqli_query($conn, $sql);

        if ($result) {
            echo 'User deleted successfully';
            header("location:home.php");
        }
    }
    ?>
<style>
body {
    background-color: white;
    margin: 0;
    padding: 0;

}

.container {
    padding-left: 250px;
    padding-top: 20px;
}

.container p {
    margin-bottom: 10px;
    font-size: 20px;
}

p {
    padding-top: 10px;
}
</style>

</style>

<body>
    <div class="container">
        <h1> View details.</h1>
        <p>Name: <?php echo "<br>"; echo $_SESSION["firstname"] . " " . $_SESSION["lastname"]; ?></p>
        <p>Email: <?php echo "<br>"; echo $_SESSION["email"]; ?></p>
        <p>Phone: <?php echo "<br>"; echo $_SESSION["number"]; ?></p>

        <?php
        if ($_SESSION["type"] === 'patient') {
            echo "<p>Age: <br>" . $_SESSION["age"] . "</p>";
            echo "<p>Gender: <br> " . $_SESSION["gender"] . "</p>";
            echo "<p>Address: <br> " . $_SESSION["address"] . "</p>";
        } elseif ($_SESSION["type"] === 'doctor') {
            echo "<p>Specialization: <br>" . $_SESSION["specialization"] . "</p>";
            echo "<p>Education: <br> " . $_SESSION["educ"] . "</p>";
        }
        ?>


    </div>
</body>
<footer>
    <?php
    include_once "../includes/footer.php";
    ?>
</footer>

</html>