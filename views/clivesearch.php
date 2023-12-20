<link rel="stylesheet" href="../public/css/clive.css">
<style>
        [id^="plink"] {
            display: none;
        }
    #search-bar {
        display: flex;
        margin-top: 20px;
    }

    #search-bar select {
        margin-right: 10px;
        padding: 5px;
    }

    #search-bar input[type="text"] {
        padding: 5px;
        flex: 1;
    }

    #search-results {
        margin-top: 10px;
    }

    #search-results table {
        width: 180%;
        border-collapse: collapse;
    }

    #search-results table th,
    #search-results table td {
        padding: 10px;
        border: 1px solid #ddd;
        text-align: left;
    }

    #search-results table th {
        background-color: #f5f5f5;
    }

    #search-results a {
        text-decoration: none;
        color: black;
        display: block;
    }

</style>
<?php
require_once '../app/Model/Clinic.php';
require_once '../app/controller/ClinicController.php';
require_once '../app/controller/PatientController.php';
require_once '../app/controller/DrController.php';
require_once '../app/controller/AdminController.php';


$db = Database::getInstance();
$conn = $db->getConnection();	



if (isset($_POST["query"])) {
    $usertype = $_POST['type'];
    $search = $_POST["query"];

    if ($usertype == 'clinic') {
        $viewclinics = ClinicController::clinicSearch($search,$conn);

                   
                   if (!empty($viewclinics)) {
                       echo '<div id="search-result">';
                       echo '<table>';
                       echo '<tr>';
                       echo '<th>ID</th>';
                       echo '<th>Email</th>';
                       echo '<th>Name</th>';
                       echo '<th>Number</th>';
                       echo '</tr>';
                       
                       foreach ($viewclinics as $pat) {
                         
                           
                           echo '<tr>';
                           echo '<td><a  id="pop' .  $pat->cid . '" href="#plink' . $pat->cid . '">' . $pat->cid . '</a></td>';
                           echo '<td><a  id="pop2' . $pat->cid . '" href="#plink' . $pat->cid . '">' . $pat->email . '</a></td>';
                           
                           echo '<td><a  id="pop1' . $pat->cid . '" href="#plink' . $pat->cid . '">' . $pat->cname . '</a></td>';
                           echo '<td><a  id="pop3' . $pat->cid . '" href="#plink' . $pat->cid . '">' . $pat->cnumber . '</a></td>';
                           echo '</tr>';
                           
                           echo '<form action="" method="post">';
                           echo '<div id="plink'. $pat->cid . '">';
                           echo '<div class="container mt-5 d-flex justify-content-center">';
                           echo '<div class="card p-3" style="width: 300px;"> ';
                           echo '<div class="d-flex align-items-center">';
                           echo '<div class="ml-3 w-100">';
                           echo '<h4 class="mb-0 mt-0">' . $pat->cname . '</h4>';
                           echo '<span>' . $pat->email . '</span>';
                           echo '<div class="p-2 mt-2 bg-primary d-flex justify-content-between rounded text-white stats">';
                           echo '<div class="d-flex flex-column">';
                           echo '<span class="articles">Doctors</span>';
                           echo '<span class="number1">38</span>';
                           echo '</div>';
                           echo '<div class="d-flex flex-column">';
                           echo '<span class="followers">Work hrs</span>';
                           echo '<span class="number2">'.$pat->workhrs.'</span>';
                           echo '</div>';
                           echo '<div class="d-flex flex-column">';
                         
                           echo '</div>';
                           echo '</div>';
                           echo '<div class="button mt-2 d-flex flex-row align-items-center">';
                           
                           echo '<button type="submit" name="deletee" class="btn btn-sm btn-outline-primary w-100"><a href=".\deleteclinic.php?cid=' . $pat->cid . '">Delete</a></button>';
                           echo  '</form>';
                           echo '<button class="btn btn-sm btn-primary w-100 ml-2" id="close'.$pat->cid.'">Close</button>';
           
                           echo '</div>';
                           echo '</div>';
                           echo '</div>';
                           echo '</div>';
                           echo '</div>';
                       }
           
                       echo '</table>';
                       echo '</div>';
                   } else {
                       echo "No results found.";
                   }
                //    if (isset($_GET['cid'])) {
                //     $cid = $_GET['cid'];
                //     if (isset($_POST["deletee"])) {
                
                //     $sql = "DELETE FROM clinic WHERE cid = '$cid'";
                //     $conn->query($sql);
                //     }
                // } 
    }
                 elseif ($usertype == 'patients') {
                    $viewpatients = PatientController::patientSearch($search,$conn);
    if (!empty($viewpatients)) {
        echo '<div id="search-results">';
        echo '<table>';
        echo '<tr>';
        echo '<th>ID</th>';
        echo '<th>Email</th>';
        echo '<th>First Name</th>';
        echo '<th>Last Name</th>';
        echo '</tr>';
        foreach ($viewpatients as $pat) {
            echo '<tr>';
                    echo '<td><a  id="pop' . $pat->uid . '" href="#plink' . $pat->uid . '">' . $pat->pid . '</a></td>';
                    echo '<td><a  id="pop1' . $pat->uid . '" href="#plink' . $pat->uid . '">' . $pat->email . '</a></td>';
                    echo '<td><a  id="pop2' . $pat->uid . '" href="#plink' . $pat->uid . '">' . $pat->firstname . '</a></td>';
                    echo '<td><a  id="pop3' . $pat->uid . '" href="#plink' . $pat->uid . '">' . $pat->lastname . '</a></td>';
                    echo '</tr>';
                       
                                       echo '<div id="plink'. $pat->uid . '">';
                                       echo '<div class="container mt-5 d-flex justify-content-center">';
                                       echo '<div class="card p-3" style="width: 300px;"> ';
                                       echo '<div class="d-flex align-items-center">';
                                       echo '<div class="ml-3 w-100">';
                                       echo '<h4 class="mb-0 mt-0">' . $pat->firstname . '</h4>';
                                       echo '<span>' . $pat->lastname  . '</span>';
                                       echo '<div class="p-2 mt-2 bg-primary d-flex justify-content-between rounded text-white stats">';
                                       echo '<div class="d-flex flex-column">';
                                       echo '<span class="articles">Patient Mail</span>';
                                       echo '<span class="number1">'.$pat->email .'</span>';
                                       echo '</div>';
                                      
                                       echo '<div class="d-flex flex-column">';
                                     
                                       echo '</div>';
                                       echo '</div>';
                                       echo '<div class="button mt-2 d-flex flex-row align-items-center">';
                                       
                                       echo '<button type="submit" name="deletee" class="btn btn-sm btn-outline-primary w-100"><a href=".\deletepatients.php?uid=' .$pat->uid . '">Delete</a></button>';
                                       echo  '</form>';
                                       echo '<button class="btn btn-sm btn-primary w-100 ml-2" id="close'.$pat->uid.'">Close</button>';
                       
                                       echo '</div>';
                                       echo '</div>';
                                       echo '</div>';
                                       echo '</div>';
                                       echo '</div>';
                                   }
                       
                                   echo '</table>';
                                   echo '</div>';
                               } else {
                                   echo "No results found.";
                               }
                              
                 
                } elseif ($usertype == 'doctors') {
                    

                    $viewpatients = DrController::drSearch($search,$conn);
                    if (!empty($viewpatients)) {
                        echo '<div id="search-results">';
                        echo '<table>';
                        echo '<tr>';
                        echo '<th>ID</th>';
                        echo '<th>Email</th>';
                        echo '<th>First Name</th>';
                        echo '<th>Last Name</th>';
                        echo '</tr>';
                        foreach ($viewpatients as $pat) {
                            echo '<tr>';
                                    echo '<td><a  id="pop' . $pat->uid . '" href="#plink' . $pat->uid . '">' . $pat->did . '</a></td>';
                                    echo '<td><a  id="pop1' . $pat->uid . '" href="#plink' . $pat->uid . '">' . $pat->email . '</a></td>';
                                    echo '<td><a  id="pop2' . $pat->uid . '" href="#plink' . $pat->uid . '">' . $pat->firstname . '</a></td>';
                                    echo '<td><a  id="pop3' . $pat->uid . '" href="#plink' . $pat->uid . '">' . $pat->lastname . '</a></td>';
                                    echo '</tr>';
                                       
                                                       echo '<div id="plink'. $pat->uid . '">';
                                                       echo '<div class="container mt-5 d-flex justify-content-center">';
                                                       echo '<div class="card p-3" style="width: 300px;"> ';
                                                       echo '<div class="d-flex align-items-center">';
                                                       echo '<div class="ml-3 w-100">';
                                                       echo '<h4 class="mb-0 mt-0">' . $pat->firstname . '</h4>';
                                                       echo '<span>' . $pat->lastname  . '</span>';
                                                       echo '<div class="p-2 mt-2 bg-primary d-flex justify-content-between rounded text-white stats">';
                                                       echo '<div class="d-flex flex-column">';
                                                       echo '<span class="articles">Patient Mail</span>';
                                                       echo '<span class="number1">'.$pat->email .'</span>';
                                                       echo '</div>';
                                                      
                                                       echo '<div class="d-flex flex-column">';
                                                     
                                                       echo '</div>';
                                                       echo '</div>';
                                                       echo '<div class="button mt-2 d-flex flex-row align-items-center">';
                                                       
                                                       echo '<button type="submit" name="deletee" class="btn btn-sm btn-outline-primary w-100"><a href=".\deletedr.php?uid=' .$pat->uid . '">Delete</a></button>';
                                                       echo  '</form>';
                                                       echo '<button class="btn btn-sm btn-primary w-100 ml-2" id="close'.$pat->uid.'">Close</button>';
                                       
                                                       echo '</div>';
                                                       echo '</div>';
                                                       echo '</div>';
                                                       echo '</div>';
                                                       echo '</div>';
                                                   }
                                       
                                                   echo '</table>';
                                                   echo '</div>';
                                               } else {
                                                   echo "No results found.";
                                               }
                                              
     
                                            }
    }




?>

<script>
    $(document).ready(function () {
        <?php
        foreach ($viewclinics as $pat) {
            echo '$("#pop' . $pat->cid . ', #pop1' . $pat->cid . ', #pop2' . $pat->cid . ', #pop3' . $pat->cid . '").click(function () {';
            echo '$("#plink' . $pat->cid . '").show();';
            echo '});';

            echo '$("#close' . $pat->cid . '").click(function (e) {';
            echo 'e.preventDefault();';
            echo '$("#plink' . $pat->cid . '").hide();';
            echo '});';
        }
        ?>
    });
</script>
<script>
    $(document).ready(function () {
        <?php
        
        foreach ($viewpatients as $pat) {
            echo '$("#pop' . $pat->uid . ', #pop1' . $pat->uid . ', #pop2' . $pat->uid . ', #pop3' . $pat->uid . '").click(function () {';
            echo '$("#plink' . $pat->uid . '").show();';
            echo '});';

            echo '$("#close' . $pat->uid . '").click(function (e) {';
            echo 'e.preventDefault();';
            echo '$("#plink' . $pat->uid . '").hide();';
            echo '});';
        }
       
        ?>
    });
    
</script>
<script>
    $(document).ready(function () {
        <?php
        
        foreach ($viewdrs as $pat) {
            echo '$("#pop' . $pat->uid . ', #pop1' . $pat->uid . ', #pop2' . $pat->uid . ', #pop3' . $pat->uid . '").click(function () {';
            echo '$("#plink' . $pat->uid . '").show();';
            echo '});';

            echo '$("#close' . $pat->uid . '").click(function (e) {';
            echo 'e.preventDefault();';
            echo '$("#plink' . $pat->uid . '").hide();';
            echo '});';
        }
       
        ?>
    });
    
</script>

</html>