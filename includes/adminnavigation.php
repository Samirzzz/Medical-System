<?php include_once '..\includes\db.php';
 session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../public/css/adminn.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.9.1/dist/chart.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
<link rel="stylesheet" href="../public/css/adminnavv.css">
</head>
<body >

<section class="header">
        <div class="logo">
            <i class="ri-menu-line menu"></i>
            <h2><span>Ta</span>BeeBy.</h2>
        </div>
        <div class="header--items">

        <div id="wrap">
  <!-- <form action="" autocomplete="on">
  <input id="search" name="search" type="text" placeholder="Patient Name"><input id="search_submit" value="Rechercher" type="submit">
  </form> -->
</div>
            
    </section>
    <section class="main">
        <div class="sidebar">
            <ul class="sidebar--items">
                <li>
                    <a href="admin.php" class="active">
                        <span class="icon"><i class="ri-bar-chart-line"></i></span>
                        <div class="sidebar--item">Overview</div>
                    </a>
                </li>
                <li>
                    <a href="permissions.php">
                        <span class="icon"><i class="ri-empathize-line"></i></span>
                        <div class="sidebar--item">permissions</div>
                    </a>
                </li>
                <li>
                    

                </li>
                
               
               
                <li>
                    <a href="#">
                        <span class="icon"><i class="ri-question-line"></i></span>
                        <div class="sidebar--item">Clinics approval</div>
                    </a>
                </li>
                <li>
                    <a href="adminsearch.php">
                        <span class="icon"><i class="ri-settings-3-line"></i></span>
                        <div class="sidebar--item">Delete</div>
                    </a>
                </li>
                <li>
                    <a href="drprofile.php">
                        <span class="icon"><i class="ri-profile-line"></i></span>
                        <div class="sidebar--item">Profile</div>
                    </a>
                </li>
                <li>
                    <a href="logout.php">
                        <span class="icon"><i class="ri-logout-box-r-line"></i></span>
                        <div class="sidebar--item">Logout</div>
                    </a>
                </li>
            </ul>
            <ul class="sidebar--bottom--items">
            </ul>
        </div>


</body>
<script id="messenger-widget-b" src="https://cdn.botpenguin.com/website-bot.js" defer>65343c473a66a377bb977904,652ed8af9f61ca3c0661b0df</script>

</html>