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
    background-color: #a0a0a0; 
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
    display: flex;
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



</style>

<body>

    <div class="container">
<div class="doctor-list">
     
        <?php session_start();
       include_once "db.php";

      
        $sql = "SELECT firstname,lastname, specialization, educ,number FROM dr";

        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            // Loop through the data and generate HTML for each doctor
            while ($row = mysqli_fetch_array($result)) {
                echo '<div class="doctor-box">';
                echo '<div class="doctor-info">';
                echo '<h2>'."Dr. " . $row['firstname']." " .$row['lastname']. '</h2>';
                echo '<p>Specialty: ' . $row['specialization'] . '</p>';
                echo '<p>Education: ' . $row['educ'] . '</p>';
                echo '<p>Number: ' . $row['number'] . '</p>';
                echo '<a href="calendar.php" class="book-appointment-button">Book Appointment</a>';
                echo '</div>';
                echo '</div>';
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
