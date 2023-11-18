<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/Docprofileview_style.css">
    <title>doctor details</title>
</head>
<body>
<?php 
    include_once 'pnavigation.php'; 
    include_once "./includes/db.php";

echo '<h1> '. "the selected doctor was " . $_SESSION["firstname"]. '</h1>'

?>

<div class="box">
<img src=".\images\default.jpg" alt="image" class="drimg">
<div class="info">
    <h1>name </h1>
    <h1>specialization</h1>
    <h1>Number </h1>
</div>
</div>
</body>
</html>