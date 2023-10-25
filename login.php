<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="interface.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
        integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer">
        <style>
      body {
        background-image: url('test.jpg');
        background-size: cover;
  background-repeat: no-repeat;
  background-attachment: fixed;
      }
      #login-error{
        text-align:left;
        left:10;  
      }
    </style>
    <script>
        function validateForm() {
            // Reset error messages
            document.getElementById("user-err").innerHTML = "";
            document.getElementById("pass-err").innerHTML = "";
            document.getElementById("login-error").innerHTML = ""; 
            var email = document.getElementById("email").value;
            var password = document.getElementById("password").value;

            
            var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
            if (!emailPattern.test(email)) {
                document.getElementById("user-err").innerHTML = "Invalid email address.";
                return false;
            }

            if (email === "") {
            document.getElementById("user-err").innerHTML = "Email is required.";
            isValid = false;
        }
        if (password === "") {
            document.getElementById("pass-err").innerHTML = "Password is required.";
            isValid = false;
        }

            return true; 
        }
    </script>
</head>
<header>
<?php    session_start();
  include_once'Navbar.php'; 
  include_once "includes/db.php";

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
   $email = $_POST["email"];
   $pass = $_POST["password"];
   $sql = "SELECT * FROM user_acc WHERE email='$email' AND pass='$pass'";
   $result = mysqli_query($conn, $sql);

   if ($row = mysqli_fetch_array($result)) {
       $_SESSION["type"] = $row['type'];
       $_SESSION["email"] = $row['email'];
       $_SESSION["ID"] = $row['uid'];
       
       if ($row['type'] === 'patient') {
           $patientInfoSql = "SELECT * FROM patient WHERE uid = " . $row['uid']; 
           $patientInfoResult = mysqli_query($conn, $patientInfoSql);
           if ($patientRow = mysqli_fetch_array($patientInfoResult)) {
               $_SESSION["Pid"] = $row[0];
               $_SESSION["firstname"] = $patientRow['firstname']; 
               $_SESSION["lastname"] = $patientRow['lastname']; 
               $_SESSION["age"] = $patientRow['age']; 
               $_SESSION["gender"] = $patientRow['gender']; 
               $_SESSION["address"] = $patientRow['address']; 
               $_SESSION["number"] = $patientRow['number']; 
               echo "Patient in";
           }
       } elseif ($row['type'] === 'doctor') {
           $doctorInfoSql = "SELECT * FROM dr WHERE uid = " . $row['uid'];
           $doctorInfoResult = mysqli_query($conn, $doctorInfoSql);
           if ($doctorRow = mysqli_fetch_array($doctorInfoResult)) {
               $_SESSION["Did"] = $row[0];
               $_SESSION["firstname"] = $doctorRow['firstname']; 
               $_SESSION["lastname"] = $doctorRow['lastname']; 
               $_SESSION["specialization"] = $doctorRow['specialization']; 
               $_SESSION["number"] = $doctorRow['number']; 
               $_SESSION["education"] = $doctorRow['educ']; 
               echo "Doctor in";
           }
       }

       header("Location: home.php");
   } else {
       echo "<script>document.getElementById('login-error').innerHTML = 'Invalid email or password.';</script>";
    }
}  
   ?>

</header>
<body>
    <div id="cont">
            <div id="frm">
                <h1 id="wel">WELCOME</h1>
              
                <form action="" method="post" id="interface-form" name="form" onsubmit="return validateForm()">
                    <div id="fields">
                        <i class="fa fa-solid fa-user iicon"></i>
                        <a href="./forget-pass"> </a>
                        
                        <input class="login-field" type="text" name="email" placeholder="Email" id="email" required>
                        <div id="user-err"></div>
                        <br>
                        <i class="fa-solid fa-lock icon"></i>
                        <input class="login-field" type="password" name="password" placeholder="Password" id="password" required>
                        <div id="pass-err"> </div>
                        <br>
                        <div id="login-error" style="color: red;"></div>
                        <input type="submit" name="submit" id="sb" class="login-field">
                    </div>
                    <div id="sgu">
                        <a class="link" href="signup.php">Sign Up</a> 
                        
                        <p> Not a member yet ? </p>
                        
                    </div>
                    
                </form>
            </div>
            
    </div>
</body>

   <footer>
    <?php
    include_once "./includes/footer.php";
    ?>
   </footer>
</html>