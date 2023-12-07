<?php 
include_once '..\includes\db.php';
 session_start();

 require_once '../app/Model/User.php';
 require_once '../app/Model/Patient.php';
//  require_once '../app/Model/Doctor.php';
// require_once '../app/Model/Clinic.php';
// require_once '../app/Model/Admin.php';




 if (!empty($_SESSION['ID'])) {
     $UserObject = new user($_SESSION["ID"]);

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../public/css/admin.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.9.1/dist/chart.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
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
    margin-top: 22px;
}

li {
    padding-top: 10px;
}
.uppercase-text {
        text-transform: uppercase;
    }

</style>
<body >

 <section class="header">
        <div class="logo">
            <i class="ri-menu-line menu"></i>
            <h2><span>Ta</span>BeeBy.</h2>
        </div>
        <div class="header--items"> 
        <div class="dark--theme--btn">
            <i class="ri-notification-2-line"></i>

            <?php echo date("F j, Y"); ?>
            </div>
 
    </section>
    
    <section class="main">
        <div class="sidebar">
            <ul class="sidebar--items">
        <div class="profile-box">
                <img src="../public/images/<?php echo $_SESSION['image'];?>" alt="Profile Image">
                <span >  <?php echo ('&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  '. $_SESSION["email"]); ?></span>
            </div>
<?php
    for($i=0;$i<count($UserObject->usertype->pages);$i++){
        
        echo '
       




                <li>
                <a class="'.$UserObject->usertype->pages[$i]->class.'"  href="'.$UserObject->usertype->pages[$i]->linkaddress.'">
                    <span class="icon">'.$UserObject->usertype->pages[$i]->icons.'</i></span>
                    <div class="sidebar--item">'.$UserObject->usertype->pages[$i]->name.'</div>
                </a>
            </li>
              
            ';
        }
        
        
        
    }
    
    ?>
    </div>




</body>
<!-- <script id="messenger-widget-b" src="https://cdn.botpenguin.com/website-bot.js" defer>65343c473a66a377bb977904,652ed8af9f61ca3c0661b0df</script> -->

</html> 