<?php
include_once "calendardb.php";

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['submit'])) {
    $t = $_POST['title'];
    $s = $_POST['startdate']; 
    $e = $_POST['enddate']; 
    $d = $_POST['description'];

    // Process form data here

    $sql = "INSERT INTO events (title, start_date, end_date, description) VALUES ('$t', '$s', '$e', '$d')";
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
    <title>Document</title>
</head>
<body>
   <form action="" method = 'post' autocomplete="off">
    <label for="t">title</label>
    <input type="text"  placeholder="enter the title" id="t" name="title">
    <br>
    <label for="sd">start date</label>
    <input type="date" placeholder ="enter start date" id="sd" name="startdate">
    <br>
    <label for="ed">end date</label>
    <input type="date" placeholder ="enter end date" id="ed" name="enddate">
    <br>
    <label for="d">description</label>
    <input type="text"  placeholder="enter the description" id="d"name="description">
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