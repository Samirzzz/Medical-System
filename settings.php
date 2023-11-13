<?php
include_once 'pnavigation.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            background-color: white;
            margin: 0;
            padding: 0;
            
        }

        .dashboard-box {
            background-color: white;
            width: 80%; 
            margin: 10px auto;
            border: 1px solid #ccc;
            border-radius: 12px; 
            padding: 50px; 
            
        }

        .filter-container {
            border: none;
            text-align: center;
            padding-left:300px;
            padding-top:55px;

        }
    </style>
</head>
<body>
<div class="filter-container">
    <div class="dashboard-box">
        <a href="#" class="non-style-link">
            <div class="dashboard-items setting-tabs">
                <div class="btn-icon-back dashboard-icons-setting" style="background-image: url('../img/icons/doctors-hover.svg');"></div>
                <div>
                    <div class="h1-dashboard">Account Settings &nbsp;</div><br>
                    <div class="h3-dashboard" style="font-size: 15px;">Edit your Account Details & Change Password</div>
                </div>
            </div>
        </a>
    </div>

    <div class="dashboard-box">
        <a href="#" class="non-style-link">
            <div class="dashboard-items setting-tabs">
                <div class="btn-icon-back dashboard-icons-setting " style="background-image: url('../img/icons/view-iceblue.svg');"></div>
                <div>
                    <div class="h1-dashboard">View Account Details</div><br>
                    <div class="h3-dashboard" style="font-size: 15px;">View Personal information About Your Account</div>
                </div>
            </div>
        </a>
    </div>

    <div class="dashboard-box">
        <a href="#" class="non-style-link">
            <div class="dashboard-items setting-tabs">
                <div class="btn-icon-back dashboard-icons-setting" style="background-image: url('../img/icons/patients-hover.svg');"></div>
                <div>
                    <div class="h1-dashboard" style="color: #ff5050;">Delete Account</div><br>
                    <div class="h3-dashboard" style="font-size: 15px;">Will Permanently Remove your Account</div>
                </div>
            </div>
        </a>
    </div>
</div>

</body>
<footer>
    <?php
    include_once "./includes/footer.php";
    ?>
   </footer>
</html>
