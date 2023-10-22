<?php
include "includes/appnavbar.php";
include_once "includes/db.php";

if (isset($_GET['Appid'])) {
    $appid = $_GET['Appid'];

    // Retrieve appointment details for editing
    $sql = "SELECT * FROM appointments WHERE Appid = $appid";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();


        if (isset($_POST['submit'])) {
            // Retrieve form data and perform necessary validation
            $date = $_POST['date'];
            $time = $_POST['time'];
            $status = $_POST['status'];
    
            // Perform the update in the database
            $update_sql = "UPDATE appointments SET date = '$date', time = '$time', status = '$status' WHERE Appid = '$appid'";
         $ress = mysqli_query($conn, $update_sql);  
           if($ress){
            echo "updated successfuly";
           }
           else 
           {
            echo "error in updating"  ;
           }
    
       
    
            
        }







        
        // Display the edit form here
        // Populate the form fields with $row data for editing
    } else {
        echo "Appointment not found.";
    }
} else {
    echo "Invalid appointment ID.";
}?>

<!-- Display the edit form here -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <title>Document</title>
</head>
<body>
   <form action="" method = 'post' autocomplete="off">
    <label for="d">date</label>
    <input type="date"  placeholder="choose the date" id="d" name="date">
    <br>
    <label for="t">time</label>
    <input type="text" placeholder ="enter the time" id="t" name="time">
    <br>
    <label for="s">status</label>
    <input type="text" placeholder ="enter status " id="s" name="status">
    <br>
    <input type="submit" id="submit" name="submit">

    
   </form> 
   <style>
    /* Style for the overall form container */
body {
    font-family: Arial, sans-serif;
    background-color: #f5f5f5;
}

form {
    background-color: #fff;
    border: 1px solid #ccc;
    padding: 20px;
    width: 300px;
    margin: 0 auto;
    margin-top: 50px;
    border-radius: 5px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

/* Style for form labels */
label {
    display: block;
    margin-bottom: 5px;
}

/* Style for input fields */
input[type="text"],
input[type="date"] ,
input[type="submit"] 
{
    width: 100%;
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    transition: border-color 0.3s;
}

input[type="text"]:focus,
input[type="date"]:focus,
input[type="submit"]  {
    border-color: #333;
    outline: none;
}

/* Style for form submit button */
input[type="submit"] {
    background-color: #333;
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s;
}

input[type="submit"]:hover {
    background-color: #555;
}

   </style>
</body>
</html>