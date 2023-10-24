<?php
include_once("../includes/db.php");

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
    $event = "{$formattedDate} - {$row['time']} ({$row['status']}) - {$row['Appid']}";
    $events[] = $event;
}

header('Content-Type: text/plain'); // Set the content type to plain text
echo implode("\n", $events); // Output the data as a plain text list
?>
