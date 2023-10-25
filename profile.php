<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<header>
    <?php
    session_start();
    include_once 'Navbar.php';
    include_once 'includes/db.php';

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $x = $_SESSION['email'];
        $UserType = $_SESSION["type"];

        if ($UserType == 'patient') {
            $sql = "DELETE FROM patient WHERE uid = " . $_SESSION['ID'];
        } elseif ($UserType == 'doctor') {
            $sql = "DELETE FROM dr WHERE uid = " . $_SESSION['ID'];
        }

        $result = mysqli_query($conn, $sql);

        if ($result) {
            echo 'User deleted successfully';
            header("location:home.php");
        }
    }
    ?>
</header>
<body>
    <div class="container mt-4">
        <h1>Welcome, <?php echo $_SESSION["firstname"] . " " . $_SESSION["lastname"]; ?></h1>
        <p>Email: <?php echo $_SESSION["email"]; ?></p>
        <p>Phone: <?php echo $_SESSION["number"]; ?></p>
        
        <?php
        if ($_SESSION["type"] === 'patient') {
            echo "<p>Age: " . $_SESSION["age"] . "</p>";
            echo "<p>Gender: " . $_SESSION["gender"] . "</p>";
            echo "<p>Address: " . $_SESSION["address"] . "</p>";
        } elseif ($_SESSION["type"] === 'doctor') {
            echo "<p>Specialization: " . $_SESSION["specialization"] . "</p>";
            echo "<p>Education: " . $_SESSION["education"] . "</p>";
        }
        ?>
        
        <a class="btn btn-primary" href="Editprofile.php">Edit Profile</a>
   
        <form action="" method="post">
            <button class="btn btn-danger" name="delete" onclick="return confirm('Are you sure you want to delete your profile?');">Delete Profile</button>
        </form>
    </div>
</body>
<footer>
    <?php
    include_once "./includes/footer.php";
    ?>
</footer>
</html>
