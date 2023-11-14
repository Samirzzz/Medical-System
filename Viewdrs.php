<!DOCTYPE html>
<html>

<head>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="Viewdrs.css">
</head>
<style>
      body {
            background-color: white;
        }

        .btn-reserve {
            font-size: 16px;
            background-color: red;
            color: white;
            padding: 10px 20px;
            border: none;
            text-decoration: none;
            cursor: pointer;
            border-radius: 5px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .btn-reserve:hover {
            background-color: darkred;
        }
        
</style>
<body>

    <?php  
    include_once 'pnavigation.php'; 
    include_once "./includes/db.php";

    $sql = "SELECT firstname, lastname, specialization, educ, number FROM dr";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        echo '<div class="container"><div class="row">';

        while ($row = mysqli_fetch_assoc($result)) {
            echo '<div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="panel panel-default userlist">
                        <div class="panel-heading">
                        <h3 class="username">'."Dr. " . $row['firstname'] . ' ' . $row['lastname'] . '</h3>  
                        <h3 class="page-header small">' . $row['specialization'] . '</h3>  
                        </div>
                        <div class="panel-body text-center">
                            <div class="userprofile">
                                <div class="userpic"> <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="" class="userpicimg"> </div>
                                <p>Education: '. $row['educ'] .'</p>

                            </div>
                            <div class="info">
                            <strong>Information</strong><br>
                            <p><i class="fa fa-map-marker"></i> New Cairo</p>
                            <p><i class="fa fa-phone"></i> ' . $row['number'] . '</p>
                            <p><i class="fa fa-money"></i> : 800</p>
                            </div>

                        </div>
                        <div class="panel-footer"> <a href="#" class="btn btn-link btn-reserve">Reserve Appointment</a> </div>
                    </div>
                </div>';
        }

        echo '</div></div>';
    }
    ?>

</body>

<footer>
    <?php
    include_once "./includes/footer.php";
    ?>
</footer>

</html>
