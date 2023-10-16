<?php
$cdb_server = 'localhost'; // Change "local host :80" to "localhost"
$cdb_user = 'root';
$cdb_pass = '';
$cdb_name = 'calendar';

$cdb = mysqli_connect($cdb_server, $cdb_user, $cdb_pass, $cdb_name);

if ($cdb) {
    echo "Connected to the database successfully";
} else {
    echo "Couldn't connect to the database: " . mysqli_connect_error();
}



function get_events($start_date,$end_date){
    global $cdb;
    $query = "SELECT * FROM events WHERE start_date BETWEEN '$start_date' AND '$end_date'";
    $result = mysqli_query($cdb,$query);
    $events = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $events[] = $row;
    }
    return $events;
}
function count_events_on_date($date, $events) {
    $count = 0;
    foreach ($events as $event) {
        if ($event['start_date'] == $date) {
            $count++;
        }
    }
    return $count;
}


?>

<html>
<head>
    <title>Dynamic Calendar</title>
    <link rel="stylesheet"  href="calendar.css">
</head>
<body>
    <div id = "calendar">
    <h1>Event Calendar</h1>
    <?php
    $year = date("Y");
    $month = date("n");

    echo "<h2>" . date("F", mktime(0, 0, 0, $month, 1, $year)) . " $year</h2>";

    $start_date = date("$year-$month-01");
    $end_date = date("$year-$month-t");

    $events = get_events($start_date, $end_date);

    $days_in_month = date("t", mktime(0, 0, 0, $month, 1, $year));
    $first_day = date("N", mktime(0, 0, 0, $month, 1, $year));

    echo "<table border='1'>";
    echo "<tr><th>Mon</th><th>Tue</th><th>Wed</th><th>Thu</th><th>Fri</th><th>Sat</th><th>Sun</th></tr>";
    echo "<tr>";

    for ($i = 1; $i < $first_day; $i++) {
        echo "<td></td>";
    }

    for ($day = 1; $day <= $days_in_month; $day++) {
        if ($first_day > 7) {
            echo "</tr><tr>";
            $first_day = 1;
        }

        $current_date = date("$year-$month-$day");
        $event_count = count_events_on_date($current_date, $events);
        $day_link = "view_day.php?date=$current_date";

        echo "<td>";
        echo "<a href='$day_link'>$day</a>";
        if ($event_count > 0) {
            echo "<br><span class='event-count'>$event_count events</span>";
        }
        echo "</td>";

        $first_day++;
    }

    echo "</tr>";
    echo "</table>";
    ?>
    </div>



    <a href="add_event.php">Add Event</a>
</body>

<style>
    /* Calendar Container */
#calendar {
    width: 80%;
    margin: 0 auto;
    font-family: Arial, sans-serif;
}

/* Calendar Header */
#calendar h1 {
    text-align: center;
    font-size: 24px;
    margin-bottom: 10px;
}

/* Calendar Table */
#calendar table {
    width: 100%;
    border-collapse: collapse;
    table-layout: fixed;
}

/* Calendar Table Headers */
#calendar th {
    background-color: #333;
    color: #fff;
    text-align: center;
    padding: 10px;
}

/* Calendar Table Cells */
#calendar td {
    text-align: center;
    padding: 10px;
}

/* Highlight Today's Date */
#calendar td a {
    text-decoration: none;
    color: #333;
}

#calendar td a:hover {
    background-color: #f2f2f2;
}

/* Event Count Indicator */
.event-count {
    font-size: 12px;
    color: #ff5733;
}

/* Add Event Link */
#calendar a {
    display: block;
    text-align: center;
    background-color: #333;
    color: black;
    padding: 10px;
    text-decoration: none;
    margin: 10px 0;
}

#calendar a:hover {
    background-color: #555;
}

</style>
</html>

