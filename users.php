<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="users.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script>
      function validateForm() {
  // Get form inputs
  var firstName = this.forms["f1"]["fname"].value;
  var lastName = this.forms["f1"]["lname"].value;
  var email = this.forms["f1"]["email"].value;
  var password = this.forms["f1"]["pass"].value;
  var confirmPassword = this.forms["f1"]["confpass"].value;
  var radioButtons = this.forms["f1"]["userType"];

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

  // Form validation passed
  alert("Form submitted successfully!");
  return true;
}
    </script>
</head>
<body>
<?php
 include_once 'navigation.php';
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
             <a href="users.php" class="bo"> Add User</a>
              <a href="#" class="bo">Edit User       </a>
              <a href="viewusers.php" class="bo">View Users      </a>
             </div>
              
              </div>
              <h2 class="text-uppercase text-center mb-5">Add User</h2>
<br><br><br>
              <form name="f1">
            

                <div class="form-outline mb-4">
                  <input type="text" id="fname" class="form-control form-control-lg" />  <!-- text betsheel el input?????? -->
                  <label class="form-label" for="fname">First Name</label>  
                </div>

                <div class="form-outline mb-4">
                  <input type="text" id="lname" class="form-control form-control-lg" />  <!-- text betsheel el input?????? -->
                  <label class="form-label" for="lname">Last Name</label>  
                </div>

                <div class="form-outline mb-4">
                  <input type="email" id="email" class="form-control form-control-lg" />
                  <label class="form-label" for="email">Email</label>
                </div>

                <div class="form-outline mb-4">
                  <input type="password" id="pass" class="form-control form-control-lg" />
                  <label class="form-label" for="pass">Password</label>
                </div>

                <div class="form-outline mb-4">
                  <input type="password" id="confpass" class="form-control form-control-lg" />
                  <label class="form-label" for="confpass">Confirm password</label>
                </div>
                <div class="form-outline mb-4">
                  <input type="radio" id="userType" />
                  <label class="form-label" for="userType">Admin</label><br>
                  <input type="radio" id="userType" />
                  <label class="form-label" for="userType">Patient</label>
                </div>
            
                <div class="d-flex justify-content-center">
                  <button type="submit" class="btn btn-success btn-block btn-lg gradient-custom-4 text-body" onclick="return validateForm()">Save</button>
                </div>

               
              </form>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</body>
</html>