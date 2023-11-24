<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="..\public\css/user.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
</head>
<body>
<?php
include_once'..\includes\navigation.php';
?>

<section class="vh-100 bg-image"
  style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.webp');">
  <div class="mask d-flex align-items-center h-100 gradient-custom-3">
    <div class="container h-100" >
      <div class="row d-flex justify-content-center align-items-center h-100" >
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
          <div class="card" style="border-radius: 15px;">
          <div class="card-body p-5" style="height: 19cm;">

              <div class="choose">
             <div class="nav"> 
            
             </div>
              
              </div>
              <h2 class="text-uppercase text-center mb-5">Add User</h2>
<br><br><br>
              <form  class="mar" name="f1" onsubmit="return validateForm()" method="post">
            

                <div class="form-outline mb-4" style=" margin-top: -100px;">
                  <input type="text" id="fname" name="firstname" class="form-control form-control-lg" />  <!-- text betsheel el input?????? -->
                  <label class="form-label" for="fname">First Name</label>  
                </div>

                <div class="form-outline mb-4">
                  <input type="text" id="lname" name="lastname" class="form-control form-control-lg" />  <!-- text betsheel el input?????? -->
                  <label class="form-label" for="lname">Last Name</label>  
                </div>

                <div class="form-outline mb-4">
                  <input type="email" id="email" name="email" class="form-control form-control-lg" />
                  <label class="form-label" for="email">Email</label>
                </div>

                <div class="form-outline mb-4">
                  <input type="password" id="pass" name="pass" class="form-control form-control-lg" />
                  <label class="form-label" for="pass">Password</label>
                </div>

                <div class="form-outline mb-4">
                  <input type="password" id="confpass" class="form-control form-control-lg" />
                  <label class="form-label" for="confpass">Confirm password</label>
                </div>
                <div class="form-outline mb-4">
                  <input type="radio" name="type" id="userType" value="doctor"/>
                  <class="form-label" for="userType">Doctor</label><br>
                  <input type="radio" name="type" id="userType" value="patient" />
                  <label class="form-label" for="userType">Patient</label>
                </div>
                <button type="submit" class="btn btn-success btn-block btn-lg">Save</button>
                </div>
            

               
              </form>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<script>
      function validateForm() {
  // Get form inputs
  var firstName = document.forms["f1"]["fname"].value;
  var lastName = document.forms["f1"]["lname"].value;
  var email = document.forms["f1"]["email"].value;
  var password = document.forms["f1"]["pass"].value;
  var confirmPassword = document.forms["f1"]["confpass"].value;
  var radioButtons = document.forms["f1"]["userType"];

  // Validate first name
  if (firstName == "") {
    alert("First name must be filled out");
    return false;
  }

  // Validate last name
  if (lastName == "") {
    alert("Last name must be filled out");
    return false;
  }

  // Validate email
  if (email == "") {
    alert("Email must be filled out");
    return false;
  }

  // Validate password
  if (password == "") {
    alert("Password must be filled out");
    return false;
  }

  // Validate confirm password
  if (confirmPassword == "") {
    alert("Confirm password must be filled out");
    return false;
  }

  // Check if password and confirm password match
  if (password !== confirmPassword) {
    alert("Passwords do not match");
    return false;
  }

  // Validate radio buttons
  var isChecked = false;
  for (var i = 0; i < radioButtons.length; i++) {
    if (radioButtons[i].checked) {
      isChecked = true;
      break;
    }
  }

  if (!isChecked) {
    alert("Please select a User Type");
    return false;
  }


}
    </script>
    <?php 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $firstname = htmlspecialchars($_POST["firstname"]);
  $lastname = htmlspecialchars($_POST["lastname"]);
  $email = htmlspecialchars($_POST["email"]);

    $pass = htmlspecialchars($_POST["pass"]);
    $type = htmlspecialchars($_POST["type"]);

    $sql_user_acc = "INSERT INTO user_acc (email, pass, type) VALUES ('$email', '$pass', '$type')";
    $result_user_acc = mysqli_query($conn, $sql_user_acc);

    if ($result_user_acc) {
        $last_uid = mysqli_insert_id($conn);

        $sql_patient = "INSERT INTO patient (firstname,lastname, uid) VALUES ('$firstname','$lastname', $last_uid)";
        $result_patient = mysqli_query($conn, $sql_patient);

        if ($result_patient) {
            header("Location: users.php");
        } else {
            echo "Error inserting data into the patient table: " . mysqli_error($conn);
        }
    } else {
        echo "Error inserting data into the user_acc table: " . mysqli_error($conn);
    }
}
?>

</body>
</html>