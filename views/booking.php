<?php
include_once('../includes/navigation.php');
include_once ('classes.php');
$appointment = new Appointments($conn);
$spec =$appointment->bookingOptions();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="">
    <label for="sp">select a specialization</label>
     <select id="sp" name="specialization">
        <?php foreach ($spec as $specs) { ?>
            <option value="<?php echo $specs['specialization']; ?>">
            <?php echo implode(', ', $specs['specialization']) . ' '; ?>
            </option>
        <?php } ?>
    </select>
    </form>
    <style>
       form {
            background-color: #fff;
            border: 1px solid #ccc;
            padding: 20px;
            width: 300px;
            margin: 0 auto;
            margin-top: 50px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
    </style>
</body>
</html>
