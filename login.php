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

</head>
<style>
      body {
        background-image: url('test.jpg');
        background-size: cover;
  background-repeat: no-repeat;
  background-attachment: fixed;
      }
    </style>
<body>
    <div id="cont">
            <div id="frm">
                <h1 id="wel">WELCOME</h1>
              
                <form action="/user/login" method="post" id="interface-form" name="form">
                    <div id="fields">
                        <i class="fa fa-solid fa-user iicon"></i>
                        <a href="./forget-pass"> </a>
                        
                        <input class="login-field" type="text" name="Email" placeholder="Email" id="Email">
                        <div id="user-err"></div>
                        <br>
                        <i class="fa-solid fa-lock icon"></i>
                        <input class="login-field" type="password" name="password" placeholder="Password" id="password">
                        <div id="pass-err"> </div>
                        <br>
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

<?php
   session_start();
   include_once "db.php";
   if($_SERVER["REQUEST_METHOD"]=="POST"){

    $username=$_POST["username"];
	 $password=$_POST["password"];
   $sql="select * from user_acc where email='$Email' and pass='$password'";
   $result=mysqli_query($conn,$sql);
    if($row=mysqli_fetch_array($result))
    {
      $_SESSION["ID"]=$row[0];
      $_SESSION["FirstName"]=$row['FirstName'];
      $_SESSION["LastName"]=$row['LastName'];
      $_SESSION["Email"]=$row[3];
      $_SESSION["Password"]=$row['Password'];
      $_SESSION["dob"]=$row[5];
      header("Location:index.php");

    }
    else
    {
      echo "Invalid Input";
    }
   //select data from database where email and password matches
   //if true then use session variables to use it as long as session is started

	
   }
   ?>
</html>