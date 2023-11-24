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
include_once'..\includes\adminnavigation.php';





?>
<body >


<div class="main--container">
            <div class="section--title">
                <h3 class="title">Welcome back <?php  echo $_SESSION["firstname"] ?></h3>
                
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
                        <span>Sales</span>
                    </div>
                    <h3 class="card--value"><?php $sql = $sql = "SELECT Sum(amount) from billing";
                    if ($result = mysqli_query($conn, $sql)) {

                        $rowsum = mysqli_fetch_assoc( $result );
                        echo $rowsum['Sum(amount)'];
                    }
                        ?> </i></h3>
                    <div class="chart">
                        <canvas id="orders"></canvas>
                    </div>
                </div>
                <div class="card card-3">
                    <div class="card--title">
                        <span class="card--icon icon"><i class="ri-handbag-line"></i></span>
                        <span>clinics</span>
                    </div>
                    <h3 class="card--value"><?php $sql = "SELECT * from clinic";
                    if ($result = mysqli_query($conn, $sql)) {

                        $rowcount = mysqli_num_rows( $result );
                    }
                    echo "$rowcount";    ?> </h3>
                    <h5 class="more"></h5>
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
                <div class="section--title">
                    <h3 class="title">Schedule</h3>
                    <div class="sales--value">
                        <div class="target">
                            <i class="ri-checkbox-blank-circle-fill circle"></i>
                            Finished <span>&nbsp; </span>
                        </div>
                        <div class="current">
                            <i class="ri-checkbox-blank-circle-fill circle"></i>
                            Not  <span>&nbsp;Finished</span>
                        </div>
                    </div>
                </div>
                <div class="target--vs--sales">
                    <canvas id="tarsale"></canvas>
                </div>
            </div>
            <div class="table">
                <div class="section--title">
                    <h3 class="title">Recent Patients</h3>
                    <div></div>
                </div>
                <table>
                    <thead>
                        <tr>
                            <th>Patient name</th>
                            <th>Patient ID</th>
                            <th>Age</th>
                            <th>Mobile Number</th>
                            <th>Clinic</th>
                            <th>Next time Appointment</th>
                        </tr>
                    </thead>
                    <tbody>
                            <?php 
$sql = "SELECT
patient.firstname,
patient.lastname,
patient.age,
patient.pid,

patient.number
FROM
patient

-- JOIN
-- medications ON patient.Pid=medications.Pid  

";
$result = $conn->query($sql);
while ($row = $result->fetch_array()) {
    echo '<tr>';

    echo '<td>'.$row["firstname"]. '</td>';
    echo '<td>'.$row["pid"].    '</td>';
    echo '<td>'.$row["age"].'</td>';
    echo '<td>'.$row["number"].'</td>';
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