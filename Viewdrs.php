<!DOCTYPE html>
<html>
<head>
    <!-- <link rel="stylesheet" type="text/css" href="viewdrs.css"> -->
</head>
<header>
<?php  include_once 'Navbar.php';  ?>

</header>
<style>
    body {
        background: linear-gradient(to left, white, green);
        opacity: 100%;
}
.doctor-box {
    width: 600px; 
    border: 1px solid #ccc;
    border-radius: 20px;
    margin: 10px;
    margin top:50px;
    padding: 10px;
    background-color: #fff;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.doctor-info {
    flex: 1;
    text-align: left;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}

h2 {
    text-align: left;
    margin-top: 0; 
}

.book-appointment-button {
    background-color: blue;
    color: #fff;
    border: none;
    padding: 10px 20px;
    border-radius: 10px;
    text-decoration: none; 
    text-align: center;
    cursor: pointer;
}

.book-appointment-button:hover {
    background-color: #0056b3;
}

.book-appointment-button:active {
    background-color: #003b7a;
}
 header{
    margin bottom:10px;
 }

.full-card
{
    background:white;
     border: 4px solid black;  

    height: 500px;
}
 .card {
 
    border-radius:13px;
    margin-bottom:100px;
    margin-top:40px;
    margin-left:50px;
    margin-right: 50px;
    width:200px;
    height:200px;
     /* Add shadows to create the "card" effect */
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
  transition: 0.3s;
}

/* On mouse-over, add a deeper shadow */
.card:hover {
  box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
}

/* Add some padding inside the card container */
.container {
  padding: 2px 16px;
}

.doctor-list
{
    margin-top: 70px;
  margin-left: 100px;
  display: flex;
  justify-content: center;
}

</style>

<body>

    <div class="big-container">
<div class="doctor-list">
     
<div class="card">
  <img src="./images/default.jpg" alt="Avatar" style="width:100%">
  <div class="container">
    <h4><b>John Doe</b></h4>
    <p>Architect & Engineer</p>
  </div>
</div>
        <?php session_start();
       include_once "./includes/db.php";

      
        $sql = "SELECT firstname,lastname, specialization, educ,number FROM dr";

        $result = mysqli_query($conn, $sql);
        $counter=0;
        if (mysqli_num_rows($result) > 0) {
            // Loop through the data and generate HTML for each doctor
            while ($row = mysqli_fetch_array($result)) {
            
                echo '<div class="full-card">';
                echo '<div class="card">';
                echo '<div class="container">';
                echo '<img src="./images/default.jpg" alt="Avatar" style="width:100%">';
                echo '<h2>'."Dr. " . $row['firstname']." " .$row['lastname']. '</h2>';
                echo '<p>Specialty: ' . $row['specialization'] . '</p>';
                echo '<p>Education: ' . $row['educ'] . '</p>';
                echo '<p>Number: ' . $row['number'] . '</p>';
                echo '<a href="calendar.php" class="book-appointment-button">Book Appointment</a>';
                    if($counter==4)
                {
                    print "\n";
                    $counter=0;
                } echo '</div>';
                echo '</div>';
                echo '</div>';
                $counter+=1;
                echo $counter;


            }
        } else {
            echo 'No doctors found.';
        }


        ?>
    </div>
</div>

</body>
<footer>
    <?php
    include_once "./includes/footer.php";
    ?>
   </footer>
</html>
