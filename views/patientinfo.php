<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="..\public\css/patientinfocss.css">
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body >


    <?php 
    include_once '..\includes\navigation.php';
  
$treat_id=null;
    $sql = "select treat_id , treat_name from treatment";
    $res = mysqli_query($conn,$sql);
    $treat_opt=[];
    while($row=mysqli_fetch_assoc($res)){
        $treat_opt [] = [
            'treat_id' => $row['treat_id'],
            'treat_name'=>$row['treat_name'],
            
        ];
    }

    $sql = "select id , opt_id from d_s_o where treat_id ='$treat_id'";
    $res = mysqli_query($conn,$sql);
    $treat_opt=[];
    while($row=mysqli_fetch_assoc($res)){
        $treat_opt [] = [
            'opt_id' => $row['opt_id'],
            'treat_name'=>$row['id'],
            
        ];
    }
   






    if (isset($_GET['uid'])) {    // get uid
        $uid = $_GET['uid'];
        $patient= new Patient($uid);
 
    } 
    else {
        echo "Invalid request.";
    }
    
    ?>
    <div class="row">
        <div class="col-md-3 border-right">
        </div>
        <div class="col-md-5 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content between align-items-center mb-3">
                    <h4 class="text-right">Patient Profile</h4> 
                </div>
                <form action="" method="post">
                    <div class="row mt-2">
                        <div class="col-md-6">
                            <label class="labels">First Name</label>
                            <input type="text" class="form-control" name="firstname"
                                value="<?php echo $patient->getFirstName(); ?>">
                        </div>
                        <div class="col-md-6">
                            <label class="labels">Last Name</label>
                            <input type="text" class="form-control" name="lastname"
                                value="<?php echo $patient->getLastName(); ?>">

                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12">
                            <label class="labels">Number</label>
                            <input type="text" class="form-control" name="number" value="<?php echo $patient->getNumber(); ?>">

                        </div>
                        <div class="col-md-12">
                            <label class="labels">Address</label>
                            <input type="text" class="form-control" name="address"
                                value="<?php echo $patient->getAddress(); ?>">

                        </div>


                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <label class="labels">Gender</label>
                            <input type="text" class="form-control" name="gender" value="<?php echo $patient->getGender(); ?>">

                        </div>

                    </div>
                    <div class="mt-5 text-center">
                        <button class="btn btn-primary profile-button" name="con" type="submit">Confirm</button>
                    </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="p-3 py-5">
                <div class="col-md-12">
                    <label class="labels" style="font-size: larger;">Medical History</label>
                    <br>
                    <br>
                    <form action=""> 
        <label for="diagnosename">Diagnose name</label>
    <input type="text" placeholder="diagnose name" id="diagnosename" name="diagnosename">
    <br>
    <br>
    <label for="treatment_id">Treatment</label>
     <select id="treatment_id" name="treatment_id" onchange="treat_opt(event)">
        <?php foreach ($treat_opt as $opt) { ?>
            <option value="<?php echo $opt['treat_id']; ?>">
                <?php echo $opt['treat_name'] ; ?>
            </option>
        <?php } ?>
   
      
    <input type="hidden" id="uid" name="uid" value="<?php echo $uid?>"> 
    <!-- <input type="submit" value="treatment-options"> -->


          
       </form>    
                    <div id="d1">
        <!-- <input type="button" value="Create new" style="width:200px" name="t" id="t"   onclick="create();"> -->


    </div>
    <!-- <div> -->
    <!-- <table class="table mt-3" style="margin-left: -40px;">
                        <thead>
                            <tr>
                                <th>Diagnosis</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            //     $sqlPid = "SELECT Pid,uid FROM patient WHERE uid = '$uid'";
                            //     $resultPid = mysqli_query($conn, $sqlPid);       
                            //     if ($rowPid = mysqli_fetch_array($resultPid)) {
                            //         $uid = $rowPid['uid'];               
                            //     $sqlDiagnosis = "SELECT diagnosis,date,uid FROM medications WHERE uid = '$uid'";
                            //     $resultDiagnosis = mysqli_query($conn, $sqlDiagnosis);
                                
                                
                            //     while ($row = mysqli_fetch_array($resultDiagnosis)) {
                            //         echo '<tr>';
                            //         echo '<td>' . $row["diagnosis"] . '</td>';
                            //         echo '<td>' . $row["date"] . '</td>';

                            //         echo '</tr>';
                            //     }
                            // }
                            ?>
                        </tbody>
                    </table>
    </div> -->

                </div>
                <br>


            </div>
        </div>
    </div>


    </form>


    <?php
if($_SERVER['REQUEST_METHOD']== "POST"){
    if (isset($_GET['uid'])) {
        $uid = $_GET['uid'];
        

    if (isset($_POST["con"])) {
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $gender = $_POST['gender'];
        $address = $_POST['address'];
        $number = $_POST['number'];
        $editpatient=PatientController::editPatient($firstname,$lastname,$number,$gender,$address,$uid);
        if($editpatient)
        {
            $patient=new Patient($uid);
        }
        else{
            echo "error";
        }

    } 

    }
  

}

?>
</body>
<script>
//     var counter = 1;

// function create() {
//     var newButton = document.createElement("input");
//     newButton.type = "button";
//     newButton.value = "Add";
//     newButton.id="tt";
//     newButton.style.width = "100px";
//     document.getElementById("t").onclick = null;
//     newButton.onclick = function () {
//         createNewInput();
//     document.getElementById("tt").onclick = null;

//     };

//     var d = document.getElementById("d1");
//     d.appendChild(newButton);
//     d.appendChild(document.createElement("br"));
// }

// function createNewInput() {
//     var d = document.getElementById("d1");

//     var newForm = document.createElement("form");
//     newForm.setAttribute("method", "post");

//     var newInput = document.createElement("input");
//     newInput.type = "text";
//     newInput.name = "input_1";
//     newInput.id = "inp";
//     newInput.placeholder = "Type here";
//     newInput.style.width = "300px";
//     newInput.style.height = "30px";

//     var newSub = document.createElement("input");
//     newSub.type = "submit";
//     newSub.name = "s_1";
//     newForm.appendChild(newInput);
//     newForm.appendChild(document.createElement("br"));
//     newForm.appendChild(newSub);
//     d.appendChild(newForm);
//     d.appendChild(document.createElement("br"));
// }


// <?php
// if ($_SERVER["REQUEST_METHOD"] == "POST") {

//     if (isset($_GET['uid'])) {
//         $uid = $_GET['uid'];

//         if (isset($_POST["s_1"])) {
//             $diagnosis = htmlspecialchars($_POST["input_1"]); 

//             $sqlPid = "SELECT Pid,uid FROM patient WHERE uid = '$uid'";
//             $resultPid = mysqli_query($conn, $sqlPid);

//             if ($rowPid = mysqli_fetch_array($resultPid)) {
//                 $uid = $rowPid['uid'];

//                 $sql2 = "INSERT INTO medications (diagnosis, uid) VALUES ('$diagnosis', '$uid')";
//                 $result = mysqli_query($conn, $sql2);

                
//             } 
//         }
//     }
// }

// ?>

    </script>
 <script>
        document.getElementById("treatment_id").addEventListener("change", function() {
            var selectedValue = this.value;
            
            // Assuming you have a second form with an input field with the id "second_input"
            document.getElementById("dso").value = selectedValue;
        });
    </script>
</html>