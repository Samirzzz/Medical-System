<!DOCTYPE html>
<html>
<head>
    <title>CRUD Bar Example</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .crud-bar {
            background-color: #333;
            color: #fff;
            padding: 10px;
        }

        .button {
            text-decoration: none;
            background-color: #007bff;
            color: #fff;
            padding: 8px 16px;
            margin-right: 10px;
        }

        .button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="crud-bar">
        <a class="button" href="./addevent.php">Add</a>
        <!-- <a class="button" href="editappointments.php">edit</a> -->
        <a class="button"id="viewButton" href="./viewappointments.php">view</a>
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
