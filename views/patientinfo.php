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

<body>
    <script>




    </script>

    <?php 
    include_once '..\includes\navigation.php';
    require_once '../app/Model/Patient.php';

  
    if (isset($_GET['uid'])) {
        $uid = $_GET['uid'];
        $patient= new Patient($uid);
        echo $patient->getFirstName();

    //     $sql = "SELECT
    //     patient.firstname,
    //     patient.lastname,
    //     patient.age,
    //     patient.gender,
    //     patient.address,
    //     patient.number
    //     from patient
    
    //     WHERE patient.uid ='$uid'";

    //     $result = mysqli_query($conn, $sql);
    //     if ($row = mysqli_fetch_array($result)) 
    //     {
    //         $firstname = $row['firstname'];
    //         $lastname = $row['lastname'];
    //         $age = $row['age'];
    //         $gender = $row['gender'];
    //         $address = $row['address'];
    //         $number = $row['number'];
            
    //     } else {
    //         echo "Patient not found.";
    //     }
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
                    <div id="d1">
                        <input type="button" value="Create new" style="width:200px" name="t" id="t" onclick="create();">

                    </div>
                    <div>
                        <table class="table mt-3" style="margin-left: -40px;">
                            <thead>
                                <tr>
                                    <th>Diagnosis</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sqlPid = "SELECT Pid,uid FROM patient WHERE uid = '$uid'";
                                $resultPid = mysqli_query($conn, $sqlPid);       
                                if ($rowPid = mysqli_fetch_array($resultPid)) {
                                    $uid = $rowPid['uid'];               
                                $sqlDiagnosis = "SELECT diagnosis,date,uid FROM medications WHERE uid = '$uid'";
                                $resultDiagnosis = mysqli_query($conn, $sqlDiagnosis);
                                
                                
                                while ($row = mysqli_fetch_array($resultDiagnosis)) {
                                    echo '<tr>';
                                    echo '<td>' . $row["diagnosis"] . '</td>';
                                    echo '<td>' . $row["date"] . '</td>';

                                    echo '</tr>';
                                }
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>

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




        $sql = "UPDATE patient
        
        SET patient.firstname='$firstname',
            patient.lastname='$lastname',
            patient.gender='$gender',
            patient.address='$address',
            patient.number='$number'
        WHERE patient.uid ='$uid'";





    } 

    $result = mysqli_query($conn, $sql);
    }
    // if ($result) {
    //     if (isset($_POST["updateEmail"])) {
    //         $_SESSION['email'] = $email;
    //         echo "Email updated";
    //     } elseif (isset($_POST["updatePassword"])) {
    //         $_SESSION['password'] = $pass;
    //         echo "Password updated";
    //     }
    //}
    //  else {
    //     echo "Invalid input";
    // }

}

?>
</body>
<script>
var counter = 1;

function create() {
    var newButton = document.createElement("input");
    newButton.type = "button";
    newButton.value = "Add";
    newButton.id = "tt";
    newButton.style.width = "100px";
    document.getElementById("t").onclick = null;
    newButton.onclick = function() {
        createNewInput();
        document.getElementById("tt").onclick = null;

    };

    var d = document.getElementById("d1");
    d.appendChild(newButton);
    d.appendChild(document.createElement("br"));
}

function createNewInput() {
    var d = document.getElementById("d1");

    var newForm = document.createElement("form");
    newForm.setAttribute("method", "post");

    var newInput = document.createElement("input");
    newInput.type = "text";
    newInput.name = "input_1";
    newInput.id = "inp";
    newInput.placeholder = "Type here";
    newInput.style.width = "300px";
    newInput.style.height = "30px";

    var newSub = document.createElement("input");
    newSub.type = "submit";
    newSub.name = "s_1";
    newForm.appendChild(newInput);
    newForm.appendChild(document.createElement("br"));
    newForm.appendChild(newSub);
    d.appendChild(newForm);
    d.appendChild(document.createElement("br"));
}


<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_GET['uid'])) {
        $uid = $_GET['uid'];

        if (isset($_POST["s_1"])) {
            $diagnosis = htmlspecialchars($_POST["input_1"]); 

            $sqlPid = "SELECT Pid,uid FROM patient WHERE uid = '$uid'";
            $resultPid = mysqli_query($conn, $sqlPid);

            if ($rowPid = mysqli_fetch_array($resultPid)) {
                $uid = $rowPid['uid'];

                $sql2 = "INSERT INTO medications (diagnosis, uid) VALUES ('$diagnosis', '$uid')";
                $result = mysqli_query($conn, $sql2);

                
            } 
        }
    }
}

?>
</script>

</html>