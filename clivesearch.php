<link rel="stylesheet" href="clive.css">
<?php
include("includes/db.php");

if (isset($_POST["query"])) {
    $usertype = $_POST['type'];
    $search = $_POST["query"];

    if ($usertype == 'clinic') {
        $sql = "SELECT clinic.cname, clinic.cid, clinic.cloc, clinic.cnumber,clinic.workhrs   
                FROM clinic 
                WHERE cname LIKE '%$search%'";
        $result = $conn->query($sql);

        echo '<form action="" method="post">';
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
if (isset($_GET['cid'])) {
    $cid = $_GET['cid'];
    if (isset($_POST["delete"])) {

    $sql = "DELETE FROM clinic WHERE cid = '$cid'";
    $conn->query($sql);
    }
} 



?>

<script>
$("#pop").click(function() {
   $("#plink").show();
}) 
$("#pop1").click(function() {
   $("#plink").show();
}) 
$("#pop3").click(function() {
   $("#plink").show();
}) 
$("#pop2").click(function() {
   $("#plink").show();
})
$("#close").click(function() {
   $("#plink").hide();
})  

</script>
</html>