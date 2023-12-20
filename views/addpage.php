<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
</head>
<body >
<?php
include_once '../includes/navigation.php';
require_once '../app/controller/AdminController.php';

$db = Database::getInstance();
	$conn = $db->getConnection();
  $admincontroller =new AdminController();
	
?>
<section class="vh-100" style="background-color:lightgray">
  <div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-xl-9">


        <div class="card" style="border-radius: 15px;">
          <div class="card-body">

            <div class="row align-items-center pt-4 pb-3">
              <div class="col-md-3 ps-5">
<form action="" method="post">
                <h6 class="mb-0">page name</h6>

              </div>
              <div class="col-md-9 pe-5">

                <input type="text" name="name" class="form-control form-control-lg" />

              </div>
            </div>

            <hr class="mx-n3">

            <div class="row align-items-center py-3">
              <div class="col-md-3 ps-5">

              <h6 class="mb-0">page address</h6>
                

              </div>
              <div class="col-md-9 pe-5">

                <input type="text" name="address" class="form-control form-control-lg" placeholder="example.php" />

              </div>
            </div>

            <hr class="mx-n3">

            <div class="row align-items-center py-3">
              <div class="col-md-3 ps-5">

                <h6 class="mb-0">icon name</h6>

              </div>
              <div class="col-md-9 pe-5">

              <input name="icon" class="form-control form-control-lg" placeholder=""></input>

              </div>
            </div>

            <hr class="mx-n3">

            <div class="row align-items-center py-3">
              <div class="col-md-3 ps-5">

                <h6 class="mb-0">Class name</h6>

              </div>
              <div class="col-md-9 pe-5">

                <input class="form-control form-control-lg" name="class" id="formFileLg" type="text" />
                
            </div>

            <hr class="mx-n3">

            <div class="px-5 py-4">
              <button type="submit" class="btn btn-primary btn-lg">Save</button>
            </div>
        </div>
    </div>
    
</div>
</div>
</div>
</form>
</section>
</body>
<?php 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = htmlspecialchars($_POST["name"]);
  $address = htmlspecialchars($_POST["address"]);
  $icon = html_entity_decode($_POST["icon"]);
  $class = htmlspecialchars($_POST["class"]);
$admincontroller->addpage($name,$address,$icon,$class);
    
}
?>

</html>
