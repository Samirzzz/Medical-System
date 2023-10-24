<?php
session_start();
include_once "db.php";
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration or Sign Up form</title>

    <!-- Add Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- Add Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap">
    <style>
        body {
            background-image: url('test.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }

        .form-control {
            width: 350px;
        }

        .card {
            max-width: 400px;
            margin: 0 auto;
            margin-top: 5vh;
            background-color: rgba(255, 255, 255, 0.9);
        }

    </style>
</head>
<body>
<div class="container mt-5">
    <div class="card">
        <div class="card-body">
            <h2 class="card-title">Registration</h2>
            <form action="" method="post" onsubmit="return validateForm()">
                <div class="form-group">
                    <label for="Fname">First Name:</label>
                    <input type="text" class="form-control" id="Fname" placeholder="First Name" name="Fname" required>
                    <div id="fname-error" class="error-message text-danger"></div>
                </div>
                <div class="form-group">
                    <label for="Lname">Last Name:</label>
                    <input type="text" class="form-control" id="Lname" placeholder="Last Name" name="Lname" required>
                    <div id="lname-error" class="error-message text-danger"></div>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="text" class="form-control" id="email" placeholder="Email Address" name="email" required>
                    <div id="email-error" class="error-message text-danger"></div>
                </div>
                <div class="form-group">
                    <label for="age">Age:</label>
                    <input type="number" class="form-control" id="age" name="age" required>
                    <div id="age-error" class="error-message text-danger"></div>
                </div>
               
            <div class="form-group">
              <label for="gender">Gender:</label>
              <select class="form-control" id="gender" name="gender">
                <option value="M">Male</option>
                <option value="F">Female</option>
              </select>
            </div>
                <div class="form-group">
                    <label for="address">Address:</label>
                    <input type="text" class="form-control" id="address" placeholder="Address" name="address" required>
                    <div id="address-error" class="error-message text-danger"></div>
                </div>
                <div class="form-group">
                    <label for="phone">Phone Number:</label>
                    <input type="text" class="form-control" id="phone" placeholder="Phone Number" name="number" required>
                    <div id="phone-error" class="error-message text-danger"></div>
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" class="form-control" id="password" placeholder="Password" name="password" required>
                    <div id="password-error" class="error-message text-danger"></div>
                </div>
                <div class="form-group">
                    <label for="cpassword">Confirm password:</label>
                    <input type="password" class="form-control" id="cpassword" placeholder="Confirm Password" name="cpassword" required>
                    <div id="cpassword-error" class="error-message text-danger"></div>
                </div>
                <div class="form-group">
                    <label for="userType">User Type:</label>
                    <select class="form-control" id="userType" name="userType" onchange="toggleDoctorFields()">
                        <option value="patient">Patient</option>
                        <option value="doctor">Doctor</option>
                    </select>
                </div>
                <div class="form-group" id="doctor-fields" style="display: none;">
                    <label for="specialization">Specialization:</label>
                    <input type="text" class="form-control" id="specialization" placeholder="Specialization" name="specialization">
                    <br>
                    <label for="education">Education:</label>
                    <input type="text" class="form-control" id="education" placeholder="Education" name="education">
                </div>
                <div class="form-group">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="acceptTerms" required>
                        <label class="form-check-label" for="acceptTerms">I accept all terms & conditions</label>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Register Now</button>
                <p class="mt-3">Already have an account? <a href="login.php">Login now</a></p>
            </form>
        </div>
    </div>
</div>

<!-- Add Bootstrap JS (Optional) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
    function toggleDoctorFields() {
        var doctorFields = document.getElementById("doctor-fields");
        var userTypeSelect = document.getElementById("userType");

        if (userTypeSelect.value === "doctor") {
            doctorFields.style.display = "block";
        } else {
            doctorFields.style.display = "none";
        }
    }

    function validateForm() {
        // Reset error messages
        var errorElements = document.querySelectorAll(".error-message");
        for (var i = 0; i < errorElements.length; i++) {
            errorElements[i].innerHTML = "";
        }

        // Get input values
        var fname = document.getElementById("Fname").value;
        var lname = document.getElementById("Lname").value;
        var email = document.getElementById("email").value;
        var age = document.getElementById("age").value;
        var address = document.getElementById("address").value;
        var phone = document.getElementById("phone").value;
        var password = document.getElementById("password").value;
        var cpassword = document.getElementById("cpassword").value;

        var isValid = true;

        // Check if fields are empty
        if (fname === "") {
            document.getElementById("fname-error").innerHTML = "First Name is required.";
            isValid = false;
        }
        if (lname === "") {
            document.getElementById("lname-error").innerHTML = "Last Name is required.";
            isValid = false;
        }
        if (email === "") {
            document.getElementById("email-error").innerHTML = "Email is required.";
            isValid = false;
        }
        if (age === "") {
            document.getElementById("age-error").innerHTML = "Age is required.";
            isValid = false;
        }
        if (address === "") {
            document.getElementById("address-error").innerHTML = "Address is required.";
            isValid = false;
        }
        if (phone === "") {
            document.getElementById("phone-error").innerHTML = "Phone Number is required.";
            isValid = false;
        }
        if (password === "") {
            document.getElementById("password-error").innerHTML = "Password is required.";
            isValid = false;
        }
        if (cpassword === "") {
            document.getElementById("cpassword-error").innerHTML = "Confirm Password is required.";
            isValid = false;
        }

        // Validate email format
        var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
        if (!emailPattern.test(email)) {
            document.getElementById("email-error").innerHTML = "Invalid email address.";
            isValid = false;
        }

        // Check if password and confirm password match
        if (password !== cpassword) {
            document.getElementById("cpassword-error").innerHTML = "Passwords do not match.";
            isValid = false;
        }

        return isValid; // Form is valid
    }
</script>
</body>

<?php
     
     if ($_SERVER['REQUEST_METHOD'] == "POST") {
       $email = htmlspecialchars($_POST['email']);
       $password = htmlspecialchars($_POST['password']);
       $userType = htmlspecialchars($_POST['userType']); 
    
       echo "User Type: $userType";
    
       $sql = "INSERT INTO user_acc (email, pass, type) VALUES ('$email', '$password', '$userType') ";
       $result = mysqli_query($conn, $sql);
       $uid = mysqli_insert_id($conn);
       if ($result) {
         if ($userType === "patient") 
         {
           $Fname = $_POST["Fname"];
           $Lname = $_POST["Lname"];
           $age = $_POST["age"];
           $gender = $_POST["gender"];
           $address = $_POST["address"];
           $phone = $_POST["number"];
           $sql="INSERT INTO patient (firstname,lastname,age,gender,address,number,uid) VALUES ('$Fname','$Lname','$age','$gender','$address','$phone','$uid')";
           $ress=mysqli_query($conn,$sql);
           if($ress)
           {
             // header("location:login.php");
           }
           else {
             echo "Error inserting data into the patient table: " . mysqli_error($conn);
         }
       } 
       elseif ($userType === "doctor") 
       {
         $Fname = $_POST["Fname"];
         $Lname = $_POST["Lname"];
         $phone = $_POST["number"];
         $password = $_POST["password"];
         $specialization = $_POST["specialization"];
         $education = $_POST["education"];
         $sql="INSERT INTO dr (firstname,lastname,specialization,number,educ,uid) VALUES ('$Fname','$Lname','$specialization','$phone','$education','$uid')";
         $resss=mysqli_query($conn,$sql);
         if($resss)
         {
           // header("location:login.php");
           echo "testinggg";
         }
         else {
           echo "Error inserting data into the patient table: " . mysqli_error($conn);
       }
           
       }
       else {
         echo "Error inserting data into the patient table: " . mysqli_error($conn);
     }
       }
    }
     ?>

<footer>
    <?php
    include_once "./includes/footer.php";
    ?>
</footer>
</html>




    