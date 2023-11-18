<?php
include_once("includes/db.php");

// Define the date format conversion function
function convertDateToEvoFormat($date)
{
    // Remove backslashes from the date
    $date = stripslashes($date);
    
    $timestamp = strtotime($date);
    $formattedDate = date('F/d/Y', $timestamp);

    return $formattedDate;
}

$sql = "select * from appointments";
$result = mysqli_query($conn, $sql);

$events = array();
while ($row = mysqli_fetch_assoc($result)) {
    $formattedDate = convertDateToEvoFormat($row['date']);
    
    // Create an event object
    $event = array(
        'id' => $row['Appid'],
        'date' => $formattedDate,
        'name' => $row['time'],
        'type' => $row['status'],
        'description'=> 'appointment id : '.$row['Appid']
    );
    
    $events[] = $event;
}

// Convert the PHP $events array to a JSON array
$eventsJson = json_encode($events);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendar</title>
    <link rel="stylesheet" href="evo/evo-calendar.midnight-blue.min.css">
    <link rel="stylesheet" href="evo/evo-calendar.min.css">
    <link rel="stylesheet" href="evo/evo-calendar.orange-coral.min.css">
    <link rel="stylesheet" href="evo/evo-calendar.royal-navy.min.css">
</head>
<body>
<div class="hero">
    <div id="calendar"></div>
</div>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.4.1/dist/jquery.min.js"></script>
<script src="evo/evo-calendar.min.js"></script>
<script>
    
  $(document).ready(function() {
    $('#calendar').evoCalendar({
        theme: 'Royal Navy',
        
       calendarEvents: <?php echo $eventsJson; ?>, // Pass the events array here
      
        
    });
});
</script>
</body>
</html>



</body>
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body, html {
        height: 100%;
    }

    .hero {
        width: 100%;
        height: 100%;
        background: rgb(2,0,36);
        background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(234,13,13,0.7176120448179272) 0%, rgba(0,212,255,1) 100%);
        display: flex;
        justify-content: center;
        align-items: center;
    }

    #calendar {
        width: 80%;
        max-width: 1200px;
    }
</style>
<footer>
    <?php
    include_once "./includes/footer.php";
    ?>
   </footer>
</html>
