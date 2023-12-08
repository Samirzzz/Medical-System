<?php
session_start();


include_once "../includes/db.php";
require_once '../app/Model/User.php';
require_once '../app/Model/Patient.php';
require_once '../app/Model/Doctor.php';
require_once '../app/Model/Clinic.php';
require_once '../app/Model/UserType.php';
require_once '../app/Model/Pages.php';
require_once '../app/controller/UserController.php';
require_once '../app/controller/PatientController.php';
require_once '../app/controller/DrController.php';
require_once '../app/controller/ClinicController.php';

        $UserType = $_SESSION["type"];
        $userID=$_SESSION['ID'];

        if ($UserType == 'patient') {
            $deletepatient=PatientController::deletePatient($userID);
            if($deletepatient)
            {
                $deleteuser=UserController::deleteUser($userID);
                if($deleteuser)
                {
                    header("location:home.php");
                }
            }
        } elseif ($UserType == 'doctor') {
            $deletedoctor=DrController::deleteDoctor($userID);
            if($deletedoctor)
            {
                $deleteuser=UserController::deleteUser($userID);
                if($deleteuser)
                {
                    header("location:home.php");
                }
            }
        }elseif ($UserType == 'clinic') {
            $deleteclinic=ClinicController::deleteClinic($userID);
            if($deleteclinic)
            {
                $deleteuser=UserController::deleteUser ($userID);
                if($deleteuser)
                {
                    header("location:home.php");
                }
            }
        }

       
    
    ?>