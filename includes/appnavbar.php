<!DOCTYPE html>
<html>
<head>
    <title>CRUD Bar Example</title>
    <style>
      body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .crud-bar {
            background-color: white;
            color: white;
            padding: 5px;
            width: 390px;
            display: flex;
        }

        .button {
            text-decoration: none;
            background-color: #007bff;
            color: #fff;
            padding: 8px 16px;
            margin-right: 55px;
        }

        .button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="crud-bar">
        <a class="button" href="./addevent.php">Add Appointment</a>
        <!-- <a class="button" href="editappointments.php">edit</a> -->
        <a class="button"id="viewButton" href="./viewappointments.php">view Appointments</a>
        <!-- <a class="button" href="#">Delete</a> -->
    </div>
</body>
<script>
    function clickViewButton() {
        var viewButton = document.getElementById("viewButton");
        if (viewButton) {
            viewButton.click();
        }
    }
</script>
</html>
