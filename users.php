<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="users.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<?php
include'navigation.php';
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
              <form method="post" action="">
            

                <div class="form-outline mb-4">
                  <input type="text" id="form3Example1cg" name="name" class="form-control form-control-lg" />  <!-- text betsheel el input?????? -->
                
                  <label class="form-label" for="form3Example1cg">Name</label>  
                </div>

                <div class="form-outline mb-4">
                  <input type="email" name="email" id="form3Example3cg" class="form-control form-control-lg" />
                  <label class="form-label"  for="form3Example3cg">Email</label>
                </div>

                <div class="form-outline mb-4">
                  <input type="password" id="form3Example4cg" class="form-control form-control-lg" />
                  <label class="form-label" for="form3Example4cg">Password</label>
                </div>

                <div class="form-outline mb-4">
                  <input type="password" name="pass" id="form3Example4cdg" class="form-control form-control-lg" />
                  <label class="form-label" for="form3Example4cdg">Confirm password</label>
                </div>
                <div class="form-outline mb-4">
    <input type="radio" id="admin" name="type" value="admin">
    <label class="form-label" for="admin">Admin</label><br>
    
    <input type="radio" id="patient" name="type" value="patient">
    <label class="form-label" for="patient">Patient</label>
</div>
            
                <div class="d-flex justify-content-center">
                  <button type="submit"
                  
                    class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">Save</button>
                </div>

               
              </form>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


<?php 
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = htmlspecialchars($_POST["email"]);
    $pass = htmlspecialchars($_POST["pass"]);
    $type = htmlspecialchars($_POST["type"]);
    $name = htmlspecialchars($_POST["name"]);

    // Insert data into the user_acc table
    $sql_user_acc = "INSERT INTO user_acc (email, pass, type) VALUES ('$email', '$pass', '$type')";
    $result_user_acc = mysqli_query($conn, $sql_user_acc);

    if ($result_user_acc) {
        // Retrieve the last inserted user's ID (uid)
        $last_uid = mysqli_insert_id($conn);

        // Insert data into the patient table with the corresponding uid
        $sql_patient = "INSERT INTO patient (firstname, uid) VALUES ('$name', $last_uid)";
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