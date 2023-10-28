


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="animations.css">  
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="main.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=Bebas+Neue&family=Poppins:wght@300;600&family=Righteous&family=Rubik:ital@1&display=swap" rel="stylesheet">
    <title>Tabeeby</title>
    <style>
        table {
            animation: transitionIn-Y-bottom 0.5s;
        }
        body {
            background-image: url('dr.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }
    </style>
</head>
<body>
<?php session_start(); ?>
    <div class="full-height">
        <center>
        <table border="0">
            <tr>
                <td width="80%">
                    <span class="edoc-logo">Tabeeby. </span>
                    <span class="edoc-logo-sub">| THE ECHANNELING PROJECT</span>
                </td>
                <td width="10%">
                   <a href="login.php" class="non-style-link"><p class="nav-item">LOGIN</p></a>
                </td>
                <td width="10%">
                    <a href="signup.php" class="non-style-link"><p class="nav-item" style="padding-right: 10px;">REGISTER</p></a>
                </td>
            </tr>
            
            <tr>
                <td colspan="3">
                    <p class="heading-text">Avoid Hassles & Delays.</p>
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    <p class="sub-text2">How is health today? Sounds like not good!<br>Don't worry. Find your doctor online. Book as you wish with eDoc. <br>We offer you a free doctor channeling service. Make your appointment now.</p>
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    <center>
                    <a href="login.php">
                        <input type="button" value="Make Appointment" class="login-btn btn-primary btn" style="padding-left: 25px; padding-right: 25px; padding-top: 10px; padding-bottom: 10px;">
                    </a>
                </center>
                </td>
            </tr>
            <tr>
                <td colspan="3">
                </td>
            </tr>
        </table>
        
    </center>
    </div>
</body>
<footer>
    <?php include_once "./includes/footer.php"; ?>
</footer>
</html>
