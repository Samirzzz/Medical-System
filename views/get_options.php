<?php
include_once '..\includes\db.php'; 

if (isset($_GET['treat_id'])) {
    $treat_id = $_GET['treat_id'];

    $sql = "SELECT opt_id, opt_name FROM options WHERE opt_id IN (SELECT opt_id FROM d_s_o WHERE treat_id = '$treat_id')";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $options = array();

        while ($row = mysqli_fetch_assoc($result)) {
            $options[$row['opt_id']] = $row['opt_name'];
        }

        echo json_encode($options);
    } else {
        echo json_encode(array('error' => 'Unable to fetch options'));
    }
} else {
    echo json_encode(array('error' => 'Invalid request'));
}

mysqli_close($conn);
?>


