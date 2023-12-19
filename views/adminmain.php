<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.9.1/dist/chart.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <title>VeZeeTa</title>
</head>
<?php
include_once '..\includes\navigation.php';

    $db = Database::getInstance();
	$conn = $db->getConnection();	



?>
<body >


<div class="main--container">
            <div class="section--title">
                <h3 class="title">Welcome back <?php  echo $_SESSION["email"] ?></h3>
                
            </div>
            <div class="cards">
                <div class="card card-1">
                    <div class="card--title">
                        <span class="card--icon icon"><i class="ri-shopping-bag-2-line"></i></span>
                        <span>Doctors</span>
                    </div>
                    <h3 class="card--value"><?php $sql = "SELECT * from dr";
                    if ($result = mysqli_query($conn, $sql)) {

                        $rowcount = mysqli_num_rows( $result );
                    }
                    echo "$rowcount";    ?> </i></h3>
                    <div class="chart">
                        <canvas id="sales"></canvas>
                    </div>
                </div>
                <div class="card card-2">
                    <div class="card--title">
                        <span class="card--icon icon"><i class="ri-gift-line"></i></span>
                        <span>Clinics</span>
                        
                    </div>
                   
                    <h3 class="card--value"><?php $sql = "SELECT * from clinic";
                    if ($result = mysqli_query($conn, $sql)) {

                        $rowcount = mysqli_num_rows( $result );
                    }
                    echo "$rowcount";    ?> </i></h3>                    <div class="chart">
                        <canvas id="orders"></canvas>
                    </div>
                </div>
                <div class="card card-3">
                    <div class="card--title">
                        <span class="card--icon icon"><i class="ri-handbag-line"></i></span>
                        <span>Appointments</span>
                    </div>
                    <h3 class="card--value"><?php $sql = "SELECT * from appointments";
                    if ($result = mysqli_query($conn, $sql)) {

                        $rowcount = mysqli_num_rows( $result );
                    }
                    echo "$rowcount";    ?> </i></h3>
                    <div class="chart">
                        <canvas id="products"></canvas>
                    </div>
                </div>
                <div class="card card-4">
                    <div class="card--title">
                        <span class="card--icon icon"><i class="ri-user-line"></i></span>
                        <span>patients</span>
                    </div>
                    <h3 class="card--value"><?php $sql = "SELECT * from patient";
                    if ($result = mysqli_query($conn, $sql)) {

                        $rowcount = mysqli_num_rows( $result );
                    }
                    echo "$rowcount";    ?> </i></h3>
                    <div class="chart">
                        <canvas id="customers"></canvas>
                    </div>
                </div>
            </div>
            <div class="target-vs-sales--container">
               
               
            </div>
            <div class="table">
                <div class="section--title">
                    <h3 class="title">Recent Patients</h3>
                    <div></div>
                </div>
                <table>
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>email</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                            <?php 
$sql = "SELECT * FROM user_acc WHERE usertype_id = 1";
$result = mysqli_query($conn,$sql);
while ($row = $result->fetch_array()) {
    echo '<tr>';

    echo '<td>'.$row["uid"]. '</td>';
    echo '<td>'.$row["email"].    '</td>';
  
    //echo '<td>'.$row["diagnosis"].'</td>';
   echo '</tr>';
    
}


                             ?>
                          
                        
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    <script src="assets/js/main.js"></script>
    <script src="assets/js/sales.js"></script>
    <script src="assets/js/orders.js"></script>
    <script src="assets/js/products.js"></script>
    <script src="assets/js/customers.js"></script>
    <script src="assets/js/tarsale.js"></script>
</body>
</html>