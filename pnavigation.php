<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="admin.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.9.1/dist/chart.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="adminnav.css">
</head>
<style>
.profile-box {
    display: flex;
    flex-direction: column;
    align-items: center;
    padding: 10px;
    border-bottom: 1px solid #ccc;
    margin-bottom: 20px;
}

.profile-box img {
    width: 80px;
    height: 80px;
    border-radius: 50%;
    margin-bottom: 10px;
}

.profile-box span {
    font-weight: 600;
}
.sidebar--items {
        margin-top: -300px; 
    }
</style>

<body>
    <?php include_once 'includes/db.php';
   session_start();
   
   ?>
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
            <div class="dark--theme--btn">
                <i class="ri-moon-line moon"></i>
                <i class="ri-sun-line sun"></i>
            </div>
            <i class="ri-notification-2-line"></i>

        </div>
    </section>
    <section class="main">
        <div class="sidebar">
            <div class="profile-box">
                <img src="dr.jpg" alt="Profile Image">
                <span><?php echo $_SESSION["firstname"]; ?></span>
            </div>
            <ul class="sidebar--items">
                <li>
                    <a href="pindex.php" class="active">
                        <span class="icon"><i class="ri-bar-chart-line"></i></span>
                        <div class="sidebar--item">Home</div>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="icon"><i class="ri-empathize-line"></i></span>
                        <div class="sidebar--item">Appointments</div>
                    </a>
                </li>

                <li>
                    <a href="Viewdrs.php">
                        <span class="icon"><i class="ri-calendar-line"></i></span>
                        <div class="sidebar--item">All doctors</div>
                    </a>
                </li>
                <li>
                    <a href="settings.php">
                        <span class="icon"><i class="ri-settings-line"></i></span>
                        <div class="sidebar--item">Settings</div>
                    </a>
                </li>

            </ul>
            <ul class="sidebar--bottom--items">
                <li>
                    <a href="logout.php">
                        <span class="icon"><i class="ri-logout-box-r-line"></i></span>
                        <div class="sidebar--item">Logout</div>
                    </a>
                </li>

            </ul>
        </div>


</body>

</html>