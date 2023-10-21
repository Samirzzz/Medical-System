<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="homepage.css">
    <title>hello</title>
</head>
<body>

<?php
include_once'Navbar.php';
?>

                  <section id="img-slideshow">


                <div class="slider">


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
            </section>

<script src="homescript.js"></script>
</body>
</html>