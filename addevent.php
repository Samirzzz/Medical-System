<?php
include_once "includes/db.php";

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['submit'])) {
    // $t = $_POST['title'];
    // $s = $_POST['startdate']; 
    // $e = $_POST['enddate']; 
    // $d = $_POST['description'];
    $a_date = htmlspecialchars($_POST['date']);
    $a_time = htmlspecialchars($_POST['time']);
    $a_status = htmlspecialchars($_POST['status']);


    // Process form data here

    $sql = "INSERT INTO appointments (date, time, status , pid , did ,cid) VALUES ('$a_date', '$a_time', '$a_status','40','430','540')";
    $res = mysqli_query($cdb, $sql);

    if ($res) {
        echo "Form submitted successfully!";
    } else {
        echo "Error: " . mysqli_error($cdb);
    }

    exit(); // Stop execution after handling the form submission
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
  include "includes/appnavbar.php"
    ?>
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