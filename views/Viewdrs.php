<?php
include_once "../includes/db.php";
include_once '../includes/pnavigation.php';
include_once '../views/classes.php'; 

$doctors = Dr::getAllDoctors();

if (!empty($doctors)) {
    echo '<div class="container"><div class="row">';
    
    foreach ($doctors as $doctor) {
        echo '
        <div id="profilesection">
            <div class="docprofbox">
                <div class="pannelhead">
                    <a class="username" href="Docprofileview.php?Did=' . $doctor->did . '">' ."Dr. " . $doctor->firstname . ' ' . $doctor->lastname . '</a>
                    <h3 class="page-header small" style="margin-left:40px;font-weight: bold;">' . $doctor->specialization . '</h3>  
                </div>
                <p>Education: '. $doctor->educ .'</p>
                <strong>Information</strong><br>
                <p><i class="fa fa-map-marker"></i> New Cairo</p>
                <p><i class="fa fa-phone"></i> ' . $doctor->number . '</p>
                <p><i class="fa fa-money"></i> : 800</p>
                <div class="panel-footer">
                    <a href="#" class="btn btn-link btn-reserve">Reserve Appointment</a> 
                    <a style=" background-color: green;" class="btn btn-link btn-reserve">Doctor Details </a> 
                </div>
            </div>
        </div>';
    }
}

?>

</body>

<footer>
    <?php
    include_once "../includes/footer.php";
    ?>
</footer>

</html>
