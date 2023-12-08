<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<?php
include_once "../includes/navigation.php";
include_once "../includes/db.php";
require_once '../app/Model/User.php';
require_once '../app/Model/Patient.php';
require_once '../app/Model/UserType.php';
require_once '../app/Model/Pages.php';
require_once '../app/controller/UserController.php';
require_once '../app/controller/PatientController.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $email=htmlspecialchars($_POST['email']);
    $UserType = $_SESSION["type"];
    $userID = $_SESSION['ID'];


    if ($UserType == "patient") {
        $Fname = htmlspecialchars($_POST['firstname']);
        $Lname = htmlspecialchars($_POST['lastname']);
        $number = htmlspecialchars($_POST['number']);
        $Address = htmlspecialchars($_POST['address']);
        $gender = htmlspecialchars($_POST['gender']);

    } elseif ($UserType == "doctor") {
        $Fname = htmlspecialchars($_POST['firstname']);
        $Lname = htmlspecialchars($_POST['lastname']);
        $number = htmlspecialchars($_POST['number']);
        $Specialization = htmlspecialchars($_POST['specialization']);
        $Education = htmlspecialchars($_POST['education']);
    }
    elseif($Usertype=='clinic')
    {
        $cloc = htmlspecialchars($_POST['cloc']);
        $cname = htmlspecialchars($_POST['cname']);
    }

    $edituser=UserController::editUser($email,$imageDB,$userID);
    if($edituser)
    {
        if ($UserType == "patient") {
            $editpatient=PatientController::editPatient($Fname,$Lname,$number,$gender,$Address,$userID);
            if($editpatient)
            {
                $_SESSION['email']=$email;
                $_SESSION['firstname']=$Fname;
                $_SESSION['lastname']=$Lname;
                $_SESSION['address']=$Address;
                $_SESSION['gender']=$gender;
                header("Location:../views/pindex.php");


            }
        } elseif ($UserType == "doctor") {
            $editpatient=DrController::editDoctor($Fname,$Lname,$number,$Education,$Specialization,$userID);
            if($editpatient)
            {
                $_SESSION['email']=$email;
                $_SESSION['firstname']=$Fname;
                $_SESSION['lastname']=$Lname;
                $_SESSION['educ']=$Education;
                $_SESSION['specialization']=$Specialization;
                header("Location:../views/admin.php");

            }
        }

    }
 
}
?>
<style>
    .container {
        padding-left: 250px;
    }

    body {
        background-color: white;
        margin: 0;
        padding: 0;

    }
</style>

<body>
    <div class="container ">
        <h1>Edit Profile</h1>
        <form action="" method="post" onsubmit="return validateForm()">
            <div class="form-group">
                <label for="firstname">Email</label>
                <input type="text" class="form-control" id="firstname" name="email"
                    value="<?php echo $_SESSION["email"]; ?>">
                <div class="error-message" id="fname-error"></div>
            </div>
            <div class="form-group">
                <label for="Image">Image</label>
                <input type="file" class="form-control" id="Uimage" placeholder="Upload Image" name="Uimage"
                    value="<?php echo $_SESSION["image"]; ?>" required>
                <div id="Uimage-error" class="error-message text-danger"></div>
            </div>

            <?php
            if ($_SESSION["type"] == 'clinic') {
                echo '<div class="form-group">
                        <label for="clinicName">Clinic Name</label>
                        <input type="text" class="form-control" id="clinicName" name="clinicName" value="' . $_SESSION["cname"] . '">
                        <div class="error-message" id="clinicName-error"></div>
                    </div>
                    <div class="form-group">
                        <label for="clinicLocation">Clinic Location</label>
                        <input type="text" class="form-control" id="clinicLocation" name="clinicLocation" value="' . $_SESSION["cloc"] . '">
                        <div class="error-message" id="clinicLocation-error"></div>
                    </div>';
            }
            elseif ($_SESSION["type"] == 'patient') {
                echo '
                <div class="form-group">
                <label for="firstname">First Name</label>
                <input type="text" class="form-control" id="firstname" name="firstname"
                    value="' . $_SESSION["firstname"] . '">
                <div class="error-message" id="fname-error"></div>
            </div>
            <div class="form-group">
                <label for "lastname">Last Name</label>
                <input type="text" class="form-control" id="lastname" name="lastname"
                    value="' . $_SESSION["lastname"] . '">
                <div class="error-message" id="lname-error"></div>
            </div>
            <div class="form-group">
                <label for="number">Phone</label>
                <input type="tel" class="form-control" id="number" name="number"
                    value="' . $_SESSION["number"] . '">
                <div class="error-message" id="phone-error"></div>
            </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" id="address" name="address" value="' .  $_SESSION["address"] . '">
                        <div class="error-message" id="address-error"></div>
                    </div>
                    
                    <div class="form-group">
                        <label for="gender">Gender:</label>
                        <select class="form-control" id="gender" name="gender"  value="' . $_SESSION["gender"] . '">
                            <option value="M">Male</option>
                            <option value="F">Female</option>
                        </select>
                    </div>';
            } elseif ($_SESSION["type"] == 'doctor') {
                echo '
                <div class="form-group">
                <label for="firstname">First Name</label>
                <input type="text" class="form-control" id="firstname" name="firstname"
                    value="' . $_SESSION["firstname"] . '">
                <div class="error-message" id="fname-error"></div>
            </div>
            <div class="form-group">
                <label for "lastname">Last Name</label>
                <input type="text" class="form-control" id="lastname" name="lastname"
                    value="' . $_SESSION["lastname"] . '">
                <div class="error-message" id="lname-error"></div>
            </div>
            <div class="form-group">
                <label for="number">Phone</label>
                <input type="tel" class="form-control" id="number" name="number"
                    value="' . $_SESSION["number"] . '">
                <div class="error-message" id="phone-error"></div>
            </div>

                <div class="form-group">
                        <label for="specialization">Specialization</label>
                        <input type="text" class="form-control" id="specialization" name="specialization" value="' . $_SESSION["specialization"] . '">
                        <div class="error-message" id="specialization-error"></div>
                    </div>
                    <div class="form-group">
                        <label for="education">Education</label>
                        <input type="text" class="form-control" id="education" name="education" value="' . $_SESSION["education"] . '">
                        <div class="error-message" id="education-error"></div>
                    </div>';
            }
            ?>
            <!-- <div class="form-group">
                <label for="number">Password</label>
                <input type="password" class="form-control" id="number" name="password" >
                <div class="error-message" id="pass-error"></div>
            </div>
            <div class="form-group">
                <label for="number">Confirm Password</label>
                <input type="tel" class="form-control" id="number" name="Cpassword">
                <div class="error-message" id="pass-error"></div>
            </div> -->
            <button type="submit" class="btn btn-primary">Save Changes</button>
        </form>
    </div>

    <script>
    function validateForm() {
        var errorElements = document.querySelectorAll(".error-message");
        for (var i = 0; i < errorElements.length; i++) {
            errorElements[i].innerHTML = "";
        }

        var fname = document.getElementById("firstname").value;
        var lname = document.getElementById("lastname").value;
        var phone = document.getElementById("number").value;

        var isValid = true;

        if (fname === "") {
            document.getElementById("fname-error").innerHTML = "First Name is required.";
            isValid = false;
        }
        if (lname === "") {
            document.getElementById("lname-error").innerHTML = "Last Name is required.";
            isValid = false;
        }
        if (phone === "") {
            document.getElementById("phone-error").innerHTML = "Phone Number is required.";
            isValid = false;
        }

        if (phone.length !== 11) {
            document.getElementById("phone-error").innerHTML = "Invalid phone number. It should be 11 digits.";
            isValid = false;
        }

        return isValid;
    }
    </script>
</body>
<footer>
    <?php
    include_once "../includes/footer.php";
    ?>
</footer>

</html>
