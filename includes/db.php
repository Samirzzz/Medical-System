<?php
$cdb_server = 'localhost'; // Change "local host :80" to "localhost"
$cdb_user = 'root';
$cdb_pass = '';
$cdb_name = 'tabiby';

$cdb = mysqli_connect($cdb_server, $cdb_user, $cdb_pass, $cdb_name);

if ($cdb) {
    echo "Connected to the database successfully";
} else {
    echo "Couldn't connect to the database: " . mysqli_connect_error();
}
