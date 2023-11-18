<?php
session_start();

    include_once 'includes/db.php';
    

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $x = $_SESSION['email'];
        $UserType = $_SESSION["type"];

        if ($UserType == 'patient') {
            $sql = "DELETE FROM patient WHERE uid = " . $_SESSION['ID'];
        } elseif ($UserType == 'doctor') {
            $sql = "DELETE FROM dr WHERE uid = " . $_SESSION['ID'];
        }

        $result = mysqli_query($conn, $sql);

        if ($result) {
            echo 'User deleted successfully';
            header("location:home.php");
        }
    }
    ?>