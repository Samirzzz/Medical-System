<style>
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
    width: 198%;
    border-collapse: collapse;
}

#search-results table th, #search-results table td {
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
include("includes/db.php");

if (isset($_POST["query"])) {
    $usertype = $_POST['type'];
    $search = $_POST["query"];
    if ($usertype == 'patient') {
        $sql = "SELECT user_acc.uid, user_acc.email, patient.firstname, patient.lastname 
                FROM patient 
                JOIN user_acc ON user_acc.uid = patient.uid 
                WHERE email LIKE '%$search%'";
    } elseif ($usertype == 'admin') {
        $sql = "SELECT user_acc.uid, user_acc.email, dr.firstname, dr.lastname 
                FROM dr 
                JOIN user_acc ON user_acc.uid = dr.uid  
                WHERE email LIKE '%$search%'";
    }
    elseif ($usertype == 'clinic') {
        $sql = "SELECT clinic.cname,clinic.cid,clinic.cloc,clinic.cnumber   
                FROM clinic 
                WHERE cname LIKE '%$search%'";
    }
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo '<div id="search-result">';
        echo '<table>';
        echo '<tr>';
        echo '<th>ID</th>';
        echo '<th>Email</th>';
        echo '<th>First Name</th>';
        echo '<th>Last Name</th>';
        echo '</tr>';
        while ($row = $result->fetch_array()) {
            echo '<tr>';
            echo '<td>'.'<a href="patientinfo.php?uid=' . $row["uid"] . '">' . $row["uid"] . '</a>'.'</td>';
            echo '<td>'.'<a href="patientinfo.php?uid=' . $row["uid"] . '">' . $row["email"] . '</a>'.'</td>';
            echo '<td>'.'<a href="patientinfo.php?uid=' . $row["uid"] . '">' . $row["firstname"] . '</a>'.'</td>';
            echo '<td>'.'<a href="patientinfo.php?uid=' . $row["uid"] . '">' . $row["lastname"] . '</a>'.'</td>';

            echo '</tr>';
        }
        echo '</table>';
        echo '</div>';
    } else {
        echo "No results found.";
    }
}
?>