<html>
   <?php include 'navigation.php';
   include 'connection.php';
   ?>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<link rel="stylesheet" href="viewuserscss.css">
<div class="container" >
<div class="row" >
    <div class="col-md-12" >
        <div class="card" >
            <div class="card-body" >
                <h5 class="card-title text-uppercase mb-0">Manage Users</h5>
            </div>
            <div class="table-responsive" >
                <table class="table no-wrap user-table mb-0">
                  <thead>
                    <tr>
                      <th scope="col" class="border-0 text-uppercase font-medium pl-4">id</th>
                      <th scope="col" class="border-0 text-uppercase font-medium">name</th>
                      <th scope="col" class="border-0 text-uppercase font-medium">email</th>
                      <th scope="col" class="border-0 text-uppercase font-medium">phone number</th>
                      <th scope="col" class="border-0 text-uppercase font-medium">type</th>
                    </tr>
                  </thead>
                  <tbody>
<?php

$sql = "SELECT user_acc.uid, user_acc.email, user_acc.type, patient.firstname, patient.lastname, patient.age, patient.gender, patient.address, patient.number
        FROM user_acc
         JOIN patient ON user_acc.uid = patient.uid";
$result = mysqli_query($conn, $sql);
while($row=mysqli_fetch_array($result)){
echo '<tr>';
echo '<td class="pl-4">' . $row['uid'].'</td>';




 echo '<td>';
  echo  ' <h5 class="font-medium mb-0">'.$row['firstname']. ' '.$row['lastname'].'</h5>';
echo '</td>';
echo '<td>';
echo    ' <span class="text-muted">'. $row['email'] .'</span><br>';
//     <span class="text-muted">Past : teacher</span>
echo '</td>';
echo '<td>';
echo    '<span class="text-muted">'.$row['age'].'</span><br>';
//     <span class="text-muted">999 - 444 - 555</span>
echo' </td>';
echo '<td>';
echo    '<span class="text-muted">'.$row['number'].'</span><br>';
//     <span class="text-muted">10: 55 AM</span>
echo '</td>';
echo '<td>';
echo  ' <select class="form-control category-select" id="exampleFormControlSelect1">';
echo    ' <option>Admin</option>';
echo    ' <option>Patient</option>';
echo  '</select>';
echo'</td>';
echo '<td>';
echo   ' <button type="button" class="btn btn-outline-info btn-circle btn-lg btn-circle">'.'<i class="ri-account-circle-fill">'.'</i> </button>';
echo  ' <button type="button" class="btn btn-outline-info btn-circle btn-lg btn-circle ml-2"><i class="fa fa-trash" ></i> </button>';
echo '<button type="button" class="btn btn-outline-info btn-circle btn-lg btn-circle ml-2"><i class="ri-edit-line"></i> </button>';
echo '</td>';
echo '</tr>';
echo' <tr>';

echo '</tr>';
 }


?>
                   
                  </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>

<!-- <script id="messenger-widget-b" src="https://cdn.botpenguin.com/website-bot.js" defer>65343c473a66a377bb977904,652ed8af9f61ca3c0661b0df</script> -->









</html>