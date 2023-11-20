<?php
$db_server = 'localhost'; // Change "local host :80" to "localhost"
$db_user = 'root';
$db_pass = '';
$db_name = 'tabiby';

$conn = mysqli_connect($db_server, $db_user, $db_pass, $db_name);

if ($conn) {
    // echo "Connected to the database successfully";
    // echo "<br>";
} else {
    echo "Couldn't connect to the database: " . mysqli_connect_error();
}
