<link rel="stylesheet" href="..\public\css\clive.css">
<?php
include("..\includes\db.php");

if (isset($_POST["query"])) {
    $usertype = $_POST['type'];
    $search = $_POST["query"];

    if ($usertype == 'clinic') {
        $sql = "SELECT clinic.cname, clinic.cid, clinic.cloc, clinic.cnumber,clinic.workhrs   
                FROM clinic 
                WHERE cname LIKE '%$search%'";
                   $result = $conn->query($sql);
                   
                   if ($result->num_rows > 0) {
                       echo '<div id="search-result">';
                       echo '<table>';
                       echo '<tr>';
                       echo '<th>ID</th>';
                       echo '<th>Name</th>';
                       echo '<th>Location</th>';
                       echo '<th>Number</th>';
                       echo '</tr>';
           
                       while ($row = $result->fetch_array()) {
                           echo '<tr>';
                           echo '<td>' . '<a id="pop" href="#plink?cid=' . $row["cid"] . '">' . $row["cid"] . '</a>' . '</td>';
                           echo '<td>' . '<a id="pop1" href="#plink?cid=' . $row["cid"] . '">' . $row["cname"] . '</a>' . '</td>';
                           echo '<td>' . '<a id="pop2" href="#plink?cid=' . $row["cid"] . '">' . $row["cloc"] . '</a>' . '</td>';
                           echo '<td>' . '<a  id="pop3" href="#plink?cid=' . $row["cid"] . '">' . $row["cnumber"] . '</a>' . '</td>';
                           echo '</tr>';
                           
                           echo '<form action="" method="post">';
                           echo '<div id="plink">';
                           echo '<div class="container mt-5 d-flex justify-content-center">';
                           echo '<div class="card p-3" style="width: 300px;"> ';
                           echo '<div class="d-flex align-items-center">';
                           echo '<div class="ml-3 w-100">';
                           echo '<h4 class="mb-0 mt-0">' . $row["cname"] . '</h4>';
                           echo '<span>' . $row["cloc"] . '</span>';
                           echo '<div class="p-2 mt-2 bg-primary d-flex justify-content-between rounded text-white stats">';
                           echo '<div class="d-flex flex-column">';
                           echo '<span class="articles">Doctors</span>';
                           echo '<span class="number1">38</span>';
                           echo '</div>';
                           echo '<div class="d-flex flex-column">';
                           echo '<span class="followers">Work hrs</span>';
                           echo '<span class="number2">'.$row["workhrs"].'</span>';
                           echo '</div>';
                           echo '<div class="d-flex flex-column">';
                         
                           echo '</div>';
                           echo '</div>';
                           echo '<div class="button mt-2 d-flex flex-row align-items-center">';
                           
                           echo '<button type="submit"  name="deletee"  class="btn btn-sm btn-outline-primary w-100">Delete</button>';
                           echo "<a href='deleteclinic.php?id=" . $row['cid'] . " '><button Delete</button></a> ";
                           echo  '</form>';
                           echo '<button class="btn btn-sm btn-primary w-100 ml-2" id="close">Close</button>';
           
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
                    $sql = "SELECT user_acc.uid, user_acc.email, patient.firstname, patient.lastname,patient.pid 
                            FROM patient 
                            JOIN user_acc ON user_acc.uid = patient.uid 
                            WHERE email LIKE '%$search%'";
                               $result = $conn->query($sql);

                               echo '<form action="" method="post">';
                               if ($result->num_rows > 0) {
                                   echo '<div id="search-result">';
                                   echo '<table>';
                                   echo '<tr>';
                                   echo '<th>ID</th>';
                                   echo '<th>email</th>';
                                   echo '<th>Name</th>';
                                   echo '</tr>';
                       
                                   while ($row = $result->fetch_array()) {
                                       echo '<tr>';
                                       echo '<td>' . '<a id="pop"  href="#plink?uid=' . $row["uid"] . '">' . $row["pid"] . '</a>' . '</td>';
                                       echo '<td>' . '<a id="pop1" href="#plink?uid=' . $row["uid"] . '">' . $row["email"] . '</a>' . '</td>';
                                       echo '<td>' . '<a id="pop2" href="#plink?uid=' . $row["uid"] . '">' . $row["firstname"] .$row["lastname"].  '</a>' . '</td>';
                                      
                                       echo '</tr>';
                       
                                       echo '<div id="plink">';
                                       echo '<div class="container mt-5 d-flex justify-content-center">';
                                       echo '<div class="card p-3" style="width: 300px;"> ';
                                       echo '<div class="d-flex align-items-center">';
                                       echo '<div class="ml-3 w-100">';
                                       echo '<h4 class="mb-0 mt-0">' . $row["firstname"] . '</h4>';
                                       echo '<span>' . $row["lastname"] . '</span>';
                                       echo '<div class="p-2 mt-2 bg-primary d-flex justify-content-between rounded text-white stats">';
                                       echo '<div class="d-flex flex-column">';
                                       echo '<span class="articles">Doctors</span>';
                                       echo '<span class="number1">38</span>';
                                       echo '</div>';
                                      
                                       echo '<div class="d-flex flex-column">';
                                     
                                       echo '</div>';
                                       echo '</div>';
                                       echo '<div class="button mt-2 d-flex flex-row align-items-center">';
                                       
                                       echo '<button type="submit" name="delete" class="btn btn-sm btn-outline-primary w-100">Delete</button>';
                                       echo  '</form>';
                                       echo '<button class="btn btn-sm btn-primary w-100 ml-2" id="close">Close</button>';
                       
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
                    $sql = "SELECT user_acc.uid, user_acc.email, dr.firstname, dr.lastname ,dr.did
                            FROM dr 
                            JOIN user_acc ON user_acc.uid = dr.uid  
                            WHERE email LIKE '%$search%'";
                          $result = $conn->query($sql);

                            echo '<form action="" method="post">';
                            if ($result->num_rows > 0) {
                                echo '<div id="search-result">';
                                echo '<table>';
                                echo '<tr>';
                                echo '<th>ID</th>';
                                echo '<th>email</th>';
                                echo '<th>Name</th>';
                                echo '</tr>';
                    
                                while ($row = $result->fetch_array()) {
                                    echo '<tr>';
                                    echo '<td>' . '<a id="pop"  href="#plink?uid=' . $row["uid"] . '">' . $row["did"] . '</a>' . '</td>';
                                    echo '<td>' . '<a id="pop1" href="#plink?uid=' . $row["uid"] . '">' . $row["email"] . '</a>' . '</td>';
                                    echo '<td>' . '<a id="pop2" href="#plink?uid=' . $row["uid"] . '">' . $row["firstname"] .$row["lastname"].  '</a>' . '</td>';
                                   
                                    echo '</tr>';
                    
                                    echo '<div id="plink">';
                                    echo '<div class="container mt-5 d-flex justify-content-center">';
                                    echo '<div class="card p-3" style="width: 300px;"> ';
                                    echo '<div class="d-flex align-items-center">';
                                    echo '<div class="ml-3 w-100">';
                                    echo '<h4 class="mb-0 mt-0">' . $row["firstname"] . '</h4>';
                                    echo '<span>' . $row["lastname"] . '</span>';
                                    echo '<div class="p-2 mt-2 bg-primary d-flex justify-content-between rounded text-white stats">';
                                    echo '<div class="d-flex flex-column">';
                                    echo '<span class="articles">Doctors</span>';
                                    echo '<span class="number1">38</span>';
                                    echo '</div>';
                                   
                                    echo '<div class="d-flex flex-column">';
                                  
                                    echo '</div>';
                                    echo '</div>';
                                    echo '<div class="button mt-2 d-flex flex-row align-items-center">';
                                    
                                    echo '<button type="submit" name="delete" class="btn btn-sm btn-outline-primary w-100">Delete</button>';
                                    echo  '</form>';
                                    echo '<button class="btn btn-sm btn-primary w-100 ml-2" id="close">Close</button>';
                    
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
        $("#pop, #pop1, #pop2, #pop3").click(function () {
            $("#plink").show();
        });

        $("#close").click(function (e) {
            e.preventDefault();  

            $("#plink").hide();
        });
    });
</script>
</html>