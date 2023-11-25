<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../public/css/interface.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
        integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer">
        <style>
      body {
        background-image: url('test.jpg');
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
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit']))
{
	include_once "../views/classes.php";
    $email=$_POST["email"];
	$pass=$_POST["password"];
	$UserObject=user::login($email,$pass);
    if ($UserObject)
	{	
		session_start();
        $_SESSION["type"] = $UserObject->usertype->name;
        $_SESSION["email"] = $UserObject->email;
        $_SESSION["ID"] = $UserObject->id;
        if ($UserObject instanceof Patient) {
            $_SESSION["Pid"] = $UserObject->id;
            $_SESSION["firstname"] = $UserObject->firstname;
            $_SESSION["lastname"] = $UserObject->lastname;
            $_SESSION["age"] = $UserObject->age;
            $_SESSION["address"] = $UserObject->address;
            $_SESSION["gender"] = $UserObject->gender;
            $_SESSION["number"] = $UserObject->number;
            $_SESSION["image"] = $UserObject->image;



            header("Location:../views/pindex.php");
            exit();
        } elseif ($UserObject instanceof Dr) {
            $_SESSION["Did"] = $UserObject->id;
            $_SESSION["firstname"] = $UserObject->firstname;
            $_SESSION["lastname"] = $UserObject->lastname;
            $_SESSION["specialization"] = $UserObject->specialization;
            $_SESSION["number"] = $UserObject->number;
            $_SESSION["educ"] = $UserObject->educ;
            $_SESSION["Cid"] = $UserObject->cid;

            header("Location: admin.php"); 
            exit();
        }
        elseif ($UserObject instanceof Admin) {
            $_SESSION["aid"] = $UserObject->id;
            $_SESSION["name"] = $UserObject->name;
          

            header("Location: admin.php"); 
            exit();
        }
    } else {
        $loginError = "Invalid login credentials.";
    }		
	}



?>
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
                        <div id="login-error" style="color: red;"><?php if (isset($loginError)) echo $loginError; ?></div>
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
    include_once "../includes/footer.php";
    ?>
   </footer>
</html>