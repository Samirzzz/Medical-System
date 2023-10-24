<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="homepage.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">

<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Anton&family=Bebas+Neue&family=Poppins:wght@300;600&family=Righteous&family=Rubik:ital@1&display=swap" rel="stylesheet">
    <title>hello</title>

</head>
<body>

<?php  include_once'Navbar.php';  ?>


                  <div id="img-slideshow" stye=" width:100%;">
                <div class="slider"  stye=" width:100%;" >
                        <div class="list">

                        <div class="item">
                           <img src=".\images\img1home.jpg" alt="image">
                        </div>
                        <div class="item">
                            <img src=".\images\img2home.jpg" alt="">
                        </div>
                    </div>
                    <div class="buttons">
                        <button id="prev" style="color: black; font-size: 20px;"><</button>
                        <button id="next" style="color: black; font-size: 20px;">></button>
                    </div>
                    <ul class="dots">
                        <li class="active"></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                    </ul>
                </div> 
</div>
<section class="locations-in"></section>
<h1 id="clinc-title"> Our Locations</h1>
       
<div class="clinc-locs">
<div class= "Maps-loc">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3455.706381893326!2d31.41503607569206!3d29.987867174952235!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14583c9e7cd14479%3A0x48c22f61efd619f1!2sPrime%20Clinics!5e0!3m2!1sen!2seg!4v1698062329978!5m2!1sen!2seg" width="280" height="280" style="border: 4px solid black; border-radius:16px; margin-right:100px" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            <h6 class= "location_name">Prime clinc Location</h6>
         </div>

         <div class= "Maps-loc">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3455.706381893326!2d31.41503607569206!3d29.987867174952235!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14583c9e7cd14479%3A0x48c22f61efd619f1!2sPrime%20Clinics!5e0!3m2!1sen!2seg!4v1698062329978!5m2!1sen!2seg" width="280" height="280" style="border: 4px solid black; border-radius:16px; margin-right:100px" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            <h6 class= "location_name">Prime clinc Location</h6>
         </div>

         <div class= "Maps-loc">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3455.706381893326!2d31.41503607569206!3d29.987867174952235!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14583c9e7cd14479%3A0x48c22f61efd619f1!2sPrime%20Clinics!5e0!3m2!1sen!2seg!4v1698062329978!5m2!1sen!2seg" width="280" height="280" style="border: 4px solid black; border-radius:16px; margin-right:100px" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            <h6 class= "location_name">Prime clinc Location</h6>
         </div>

         <div class= "Maps-loc">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3455.706381893326!2d31.41503607569206!3d29.987867174952235!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14583c9e7cd14479%3A0x48c22f61efd619f1!2sPrime%20Clinics!5e0!3m2!1sen!2seg!4v1698062329978!5m2!1sen!2seg" width="280" height="280" style="border: 4px solid black; border-radius:16px; margin-right:100px" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            <h6 class= "location_name">Prime clinc Location</h6>
         </div>

</div>



<script src="homescript.js"></script>
</body>
<footer>
    <?php
    include_once "./includes/footer.php";
    ?>
   </footer>
</html>