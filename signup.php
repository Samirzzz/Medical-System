<?php
// include_once "db.inc.php";
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8" />
    <title> login or sign up</title>
    <link rel="stylesheet" href="pSignup.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
    />

 
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Assuming you have included the necessary jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>



  </head>
  <body>
    <div class="container">
      <header>Signup Form</header>
      <div class="progress-bar">
        <div class="step">
          <p>Name</p>
          <div class="bullet">
            <span>1</span>
          </div>
          <div class="check fas fa-check"></div>
        </div>
        <div class="step">
          <p>Contact</p>
          <div class="bullet">
            <span>2</span>
          </div>
          <div class="check fas fa-check"></div>
        </div>
        <div class="step">
          <p>Birth</p>
          <div class="bullet">
            <span>3</span>
          </div>
          <div class="check fas fa-check"></div>
        </div>
        <div class="step">
          <p>Submit</p>
          <div class="bullet">
            <span>4</span>
          </div>
          <div class="check fas fa-check"></div>
        </div>
      </div>
      <div class="form-outer">
        <form action="" method ='post' onsubmit="">
          <div class="page slide-page">
            <div class="title">Basic Info:</div>
            <div class="field">
              <div class="label">First Name</div>
              <input type="text" id="fn" name="firstname" required>
              <i class="fas fa-exclamation-circle failure-icon"></i>
              <i class="far fa-check-circle success-icon"></i><br>
            </div>
            <div class="error"></div>
            <div class="field">
              <div class="label">Last Name</div>
              <input type="text" id="ln" name="lastname" required>
              <i class="fas fa-exclamation-circle failure-icon"></i>
              <i class="far fa-check-circle success-icon"></i>
            </div>
            <div class="error"></div>
            <div class="field">
              <button class="firstNext next">Next</button>
            </div>
          </div>
          <div class="page">
            <div class="title">Contact Info:</div>
            <div class="field">
              <div class="label">Email Address</div>
              <input type="text" id="mail" name="mail" required>
              <span id="email-error"></span>
              <i class="fas fa-exclamation-circle failure-icon"></i>
              <i class="far fa-check-circle success-icon"></i>
            </div>
            <div class="error"></div>
            <div class="field">
              <div class="label">Phone Number</div>
              <input type="number" id="phone" name="phone" required>
              <i class="fas fa-exclamation-circle failure-icon"></i>
              <i class="far fa-check-circle success-icon"></i>
            </div>
            <div class="error"><span id="mailerr"></span> </div>
            <div class="field btns">
              <button  class="prev-1 prev">Previous</button>
              <button id="next1btn"class="next-1 next">Next</button>
            </div>
          </div>
          <div class="page">
            <div class="title">Date of Birth:</div>
            <div class="field">
              <div class="label">Age</div>
              <input type="number" id="dob" name="dob" required>
              <i class="fas fa-exclamation-circle failure-icon"></i>
              <i class="far fa-check-circle success-icon"></i>
            </div>
            <div class="error"></div>
            <div class="field">
              <div class="label">Gender</div>
              <select id="gender" >
                <option>Male</option>
                <option>Female</option>
              </select>
            </div>
            <div class="field btns">
              <button class="prev-2 prev">Previous</button>
              <button class="next-2 next">Next</button>
            </div>
          </div>
          <div class="page">
            <div class="title">Login Details:</div>
            <div class="field">
              <div class="label">Username</div>
              <input type="text" id="user" name="username" required>
              <span id="result"></span>
              <i class="fas fa-exclamation-circle failure-icon"></i>
              <i class="far fa-check-circle success-icon"></i>
            </div>
            <div class="error"></div>
            <div class="field">
              <div class="label">Password</div>
              <input type="password" id="pass" name="password" required>
              <i class="fas fa-exclamation-circle failure-icon"></i>
              <i class="far fa-check-circle success-icon"></i>
            </div>
            <div class="error"></div>
            <div class="field">
              <div class="label">Confirm Password</div>
              <input type="password" id="passconf" name="confirmpassword" required>  
              <input type="hidden" name="type" value="client">
              <input type="hidden" name="token" value="0">
              <i class="fas fa-exclamation-circle failure-icon"></i>
              <i class="far fa-check-circle success-icon"></i>
            </div>
            <div class="error"></div>
            <div class="field btns">
              <button class="prev-3 prev">Previous</button>
              <button class="submit">Submit</button>
            </div>
          </div>
        </form>
      </div>
    </div>
    <script src="signup.js"></script>





    <?php
//  //grap data from user if form was submitted 

//   if($_SERVER["REQUEST_METHOD"]=="POST"){ //check if form was submitted
// 	$firstname=htmlspecialchars($_POST["firstname"]);
// 	$lastname=htmlspecialchars($_POST["lastname"]);
// 	$mail=htmlspecialchars($_POST["mail"]);
// 	$password=htmlspecialchars($_POST["password"]);
// 	$dob=htmlspecialchars($_POST["dob"]);
    

//     //insert it to database 
// 	$sql="insert into users(FirstName,LastName,Email,Password,Hobby) 
// 	values('$firstname','$lastname','$mail','$password','$dob')";
// 	$result=mysqli_query($conn,$sql);

//     //redirect the user back to index.php 
// 	if($result)	{
// 		header("Location:index.php");
// 	}
// }

?>

  </body>
</html>