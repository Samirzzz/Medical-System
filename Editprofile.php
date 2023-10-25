<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<header>
    <?php
    session_start();
    include_once 'Navbar.php';
    include_once "includes/db.php";

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $Fname = htmlspecialchars($_POST['firstname']);
        $Lname = htmlspecialchars($_POST['lastname']);
        $number = htmlspecialchars($_POST['number']);
        $UserType = $_SESSION["type"];

        if ($UserType == "patient") {
            $Address = htmlspecialchars($_POST['address']);
        } elseif ($UserType == "doctor") {
            $Specialization = htmlspecialchars($_POST['specialization']);
            $Education = htmlspecialchars($_POST['education']);
        }

        $userID = $_SESSION['ID'];

        if ($UserType == "patient") {
            $sql = "UPDATE patient SET firstname='$Fname', lastname='$Lname', number='$number', address='$Address' WHERE uid=$userID";
        } elseif ($UserType == "doctor") {
            $sql = "UPDATE dr SET firstname='$Fname', lastname='$Lname', number='$number', educ='$Education', specialization='$Specialization' WHERE uid=$userID";
        }

        $result = mysqli_query($conn, $sql);

        if ($result) {
            // Update session variables with new values
            $_SESSION["firstname"] = $Fname;
            $_SESSION["lastname"] = $Lname;
            $_SESSION["number"] = $number;

            if ($UserType == "patient") {
                $_SESSION["address"] = $Address;
            } elseif ($UserType == "doctor") {
                $_SESSION["specialization"] = $Specialization;
                $_SESSION["education"] = $Education;
            }

           
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }
    ?>
</header>
<body>
    <div class="container mt-4">
        <h1>Edit Profile</h1>
        <form action="" method="post">
            <div class="form-group">
                <label for="firstname">First Name</label>
                <input type="text" class="form-control" id="firstname" name="firstname" value="<?php echo $_SESSION["firstname"]; ?>">
            </div>
            <div class="form-group">
                <label for "lastname">Last Name</label>
                <input type="text" class="form-control" id="lastname" name="lastname" value="<?php echo $_SESSION["lastname"]; ?>">
            </div>

            <div class="form-group">
                <label for="number">Phone</label>
                <input type="tel" class="form-control" id="number" name="number" value="<?php echo $_SESSION["number"]; ?>">
            </div>

            <?php
            if ($_SESSION["type"] == 'patient') {
                echo '
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" id="address" name="address" value="' . $_SESSION["address"] . '">
                    </div>';
            } elseif ($_SESSION["type"] == 'doctor') {
                echo '<div class="form-group">
                        <label for="specialization">Specialization</label>
                        <input type="text" class="form-control" id="specialization" name="specialization" value="' . $_SESSION["specialization"] . '">
                    </div>
                    <div class="form-group">
                        <label for="education">Education</label>
                        <input type="text" class="form-control" id="education" name="education" value="' . $_SESSION["education"] . '">
                    </div>';
            }
            ?>

            <button type="submit" class="btn btn-primary">Save Changes</button>
        </form>
    </div>
</body>
<footer>
    <?php
    include_once "./includes/footer.php";
    ?>
</footer>
</html>
