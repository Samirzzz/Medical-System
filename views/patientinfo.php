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

    if (isset($_GET['uid'])) {
        $uid = $_GET['uid'];
        $patient= new Patient($uid);
    } else {
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
                            <input type="text" class="form-control" name="number"
                                value="<?php echo $patient->getNumber(); ?>">

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
                            <input type="text" class="form-control" name="gender"
                                value="<?php echo $patient->getGender(); ?>">

                        </div>
                    </div>
                    <div class="mt-5 text-center">
                        <button class="btn btn-primary profile-button" name="con" type="submit">Confirm</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-4">
            <div class="p-3 py-5">
                <div class="col-md-12">
                    <label class="labels" style="font-size: larger;">Medical History</label>
                    <br>
                    <br>
                    <form action="" method="post">
                        <label for="diagnosename">Diagnose name</label>
                        <input type="text" placeholder="diagnose name" id="diagnosename" name="diagnosename">
                        <br>
                        <br>
                        <label for="treatment_id">Treatment</label>
                        <select id="treatment_id" name="treatment_id">
                            <?php foreach ($treat_opt as $opt) { ?>
                            <option value="<?php echo $opt['treat_id']; ?>">
                                <?php echo $opt['treat_name']; ?>
                            </option>
                            <?php } ?>
                        </select>
                        <br>
                        <br>
                        <label class="labels">Options</label>
                        <select id="options" name="options"></select>
                        <br>
                        <label class="labels">Option Value: </label>
                        <input type="text" placeholder="option value" id="optionvalue" name="optionvalue">
                        <br>
                        <button type="submit" name="sov">Submit</button>


                </div>
            </div>
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
    
    if ($_SERVER['REQUEST_METHOD'] == "POST")
     {
        if (isset($_POST["sov"])) 
        {
            $diagnoseName = $_POST['diagnosename'];
            $treatmentId = $_POST['treatment_id'];
    
          
                $sqlInsertDiagnosis = "INSERT INTO diagnosis (diagnosis_name, treat_id, uid) VALUES ('$diagnoseName', '$treatmentId', '$uid')";
                $resultInsertDiagnosis = mysqli_query($GLOBALS['conn'], $sqlInsertDiagnosis);
    
                if ($resultInsertDiagnosis)
                 {
                    $diagnosisId = mysqli_insert_id($GLOBALS['conn']); 
                } else
                 {
                    
                    echo "Error inserting diagnosis: " . mysqli_error($GLOBALS['conn']);
                    exit;
                }
            }
    
            $optionId = $_POST['options'];
            $optionValue = $_POST['optionvalue'];
    
            $sql = "INSERT INTO d_s_o_v (diagnosis_id, treat_id, d_s_o_id, value) VALUES ('$diagnosisId', '$treatmentId', '$optionId', '$optionValue')";
            $result = mysqli_query($GLOBALS['conn'], $sql);
    
            if ($result) {
                echo "trueee";
            } else {
                echo "Error inserting into d_s_o_v: " . mysqli_error($GLOBALS['conn']);
            }
        }
    
    ?>


</body>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>
$(document).ready(function() {
    $('#treatment_id').on('change', function() {
        var selectedValue = $(this).val();

        $.ajax({
            type: 'GET',
            url: 'get_options.php?treat_id=1',
            data: {
                treat_id: selectedValue
            },
            dataType: 'json',
            success: function(options) {
                $('#options').empty();

                $.each(options, function(key, value) {
                    $('#options').append('<option value="' + key + '">' + value +
                        '</option>');
                });
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
                alert('Error fetching options. Please check the console for details.');
            }
        });
    });
});
</script>

</html>