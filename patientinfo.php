<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="patientinfocss.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
<body>
   <?php include_once'navigation.php';?>
    <div class="row">
        <div class="col-md-3 border-right">
        </div>
        <div class="col-md-5 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Patient Profile</h4>
                </div>
                <div class="row mt-2">
                    <div class="col-md-6"><label class="labels">Name</label><input type="text" class="form-control" placeholder="first name" value=""></div>
                    <div class="col-md-6"><label class="labels">Last Name</label><input type="text" class="form-control" value="" placeholder="last name"></div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12"><label class="labels">Mobile Number</label><input type="text" class="form-control" placeholder="phone number" value=""></div>
                  
                    <div class="col-md-12"><label class="labels">Adress</label><input type="text" class="form-control" placeholder="address" value=""></div>
                    <div class="col-md-12"><label class="labels">Email</label><input type="text" class="form-control" placeholder="email" value=""></div>
                    <div class="col-md-12"><label class="labels">Diagnoses</label><input type="text" class="form-control" placeholder="diagnoses" value=""></div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-6"><label class="labels">Country</label><input type="text" class="form-control" placeholder="country" value=""></div>
                    <div class="col-md-6"><label class="labels">State/Region</label><input type="text" class="form-control" value="" placeholder="state"></div>
                </div>
                <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="button">Confirm</button></div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="p-3 py-5">
                <div class="col-md-12"><label class="labels" style="font-size: larger;">Medical History</label></div> <br>
                <textarea  class="ttt" rows="20" cols="40" ></textarea>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</body>
</html>