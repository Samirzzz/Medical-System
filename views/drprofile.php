<!DOCTYPE html>
<html>
<head>
  <title>Doctor Details</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <style>
    html, body, h1, h2, h3, h4, h5, h6 {font-family: "Roboto", sans-serif}
    /* Set a minimum height for the body to fit the screen */
    body {
      min-height: 100vh;
      margin: 0;
      background-color: #f0f0f0;
    }
    /* Make images responsive */
    img {max-width: 100%; height: auto;}
    /* Adjust the container width for responsiveness */
    .w3-content {
      max-width: 1024px; /* Adjust the max-width */
      padding: 0;
    }
    /* Add padding for the text content to avoid edge cutoff */
    .w3-container {
      padding: 16px;
    }
    /* Position everything to the right */
    .w3-main {
      margin-left: 10%; /* Move everything to the right one-third of the screen */
      margin-right: 0;
    }
  </style>
</head>
<body class="w3-light-grey">
  <?php include_once 'navigation.php'; ?>

  <div class="w3-main">
    <div class="w3-content">
      <div class="w3-row-padding">
        <div class="w3-third">
          <div class="w3-white w3-text-grey w3-card-4">
            <div class="w3-display-container">
              <img src="..\images\dr.jpg" style="width:100%" alt="Avatar">
              <div class="w3-display-bottomleft w3-container w3-text-black">
                <h2>Samuel Smith</h2>
              </div>
            </div>
            <div class="w3-container">
              <p><i class="fa fa-briefcase fa-fw w3-margin-right w3-large w3-text-teal"></i>Pediatric cardiologist</p>
              <p><i class="fa fa-home fa-fw w3-margin-right w3-large w3-text-teal"></i>London, UK</p>
              <p><i class="fa fa-envelope fa-fw w3-margin-right w3-large w3-text-teal"></i>samuel_smith@mail.com</p>
              <p><i class="fa fa-phone fa-fw w3-margin-right w3-large w3-text-teal"></i>1224435534</p>
              <hr>

              <p class="w3-large w3-text-theme"><b><i class="fa fa-globe fa-fw w3-margin-right w3-text-teal"></i>Languages</b></p>
              <p>English</p>
              <div class="w3-light-grey w3-round-xlarge">
                <div class="w3-round-xlarge w3-teal" style="height:24px;width:100%"></div>
              </div>
              <p>Spanish</p>
              <div class="w3-light-grey w3-round-xlarge">
                <div class="w3-round-xlarge w3-teal" style="height:24px;width:55%"></div>
              </div>
              <p>German</p>
              <div class="w3-light-grey w3-round-xlarge">
                <div class="w3-round-xlarge w3-teal" style="height:24px;width:25%"></div>
              </div>
              <br>
            </div>
          </div><br>
        </div>

        <div class="w3-twothird">
          <div class="w3-container w3-card w3-white w3-margin-bottom">
            <h2 class="w3-text-grey w3-padding-16"><i class="fa fa-asterisk fa-fw w3-margin-right w3-text-teal"></i>About</h2>
            <div class="w3-container">
              <h5 class="w3-opacity"><b>Short Biography</b></h5>
              <p>Dr. Samuel Smith is a neurosurgeon in East Patchogue. Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. He received his medical degree from Harvard Medical School and has been in practice for 21 years. He is one of 5 doctors at Brookhaven Memorial Hospital Medical Center and one of 9 at Southside Hospital who specialize in Neurological Surgery.</p>
              <hr>
            </div>
          </div>
          <div class="w3-container w3-card w3-white w3-margin-bottom">
            <h2 class="w3-text-grey w3-padding-16"><i class="fa fa-suitcase fa-fw w3-margin-right w3-xxlarge w3-text-teal"></i>Work Experience</h2>
            <div class="w3-container">
              <h5 class="w3-opacity"><b>Johns Hopkins Hospital</b></h5>
              <h6 class="w3-text-teal"><i class="fa fa-calendar fa-fw w3-margin-right"></i>2013 - 2017</h6>
              <p>Cardiology, Pediatric cardiologist</p>
              <hr>
            </div>
            <div class="w3-container">
              <h5 class="w3-opacity"><b>UCLA Medical Center</b></h5>
              <h6 class="w3-text-teal"><i class="fa fa-calendar fa-fw w3-margin-right"></i>2013 - 2017</h6>
              <p>Cardiology, Pediatric cardiologist</p><br>
            </div>
          </div>
          <div class="w3-container w3-card w3-white">
            <h2 class="w3-text-grey w3-padding-16"><i class="fa fa-certificate fa-fw w3-margin-right w3-xxlarge w3-text-teal"></i>Education</h2>
            <div class="w3-container">
              <h5 class="w3-opacity"><b>Harvard University</b></h5>
              <h6 class="w3-text-teal"><i class="fa fa-calendar fa-fw w3-margin-right"></i>2013 - 2017</h6>
              <p>Bachelor of Medicine, Pediatric cardiologist, 8.5</p>
              <hr>
            </div>
            <div class="w3-container">
              <h5 class="w3-opacity"><b>University of Cambridge</b
