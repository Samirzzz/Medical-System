<?php
include_once '..\includes\db.php';
include_once '..\includes\navigation.php';
require_once '../app/Model/User.php';
require_once '../app/Model/Pages.php';
$db = Database::getInstance();
	$conn = $db->getConnection();

if(isset($_POST['submit'])){ 
		
	$sql="delete from usertype_pages where usertypeid=".$_POST["UserType"].";";
	mysqli_query($conn,$sql);
	foreach ($_POST["choosen-pages"] as $page){
		$sql="insert into usertype_pages (usertypeid,pageid) values(".$_POST["UserType"].",".$page.");";
		mysqli_query($conn,$sql);
	}
}


?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script src="https://code.jquery.com/jquery-1.9.1.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){			
			$("#btnLeft").click(function () {
			    var selectedItem = $("#rightValues option:selected");
			    $("#leftValues").append(selectedItem);
			});
			$("#btnRight").click(function () {
			    var selectedItem = $("#leftValues option:selected");
			    $("#rightValues").append(selectedItem);
			});
		});
	</script>
</head>
<style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
	
tbody tr:hover{
	background-color: white;
	color: black;
}

        form {
            max-width: 600px;
            margin:  auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        table {
            width: 100%;
			background-color: initial;
        }

        table, th, td {
            border: 1px solid #ddd;
            border-collapse: collapse;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        select, input[type="button"], input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="button"], input[type="submit"] {
            cursor: pointer;
            background-color: #4caf50;
            color: #fff;
        }

        input[type="button"]:hover, input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
<body>
	<form action="" method="post">
		<table>
			<tr>
				<td>All Pages</td>
				<td></td>
				<td>Choosen Pages</td>
			</tr>
			<tr>
				<td>
					<select id="leftValues" STYLE="width: 160px;box-sizing: border-box;" size="5" multiple>
						<?php
						$obj=Pages::getallpages($conn);
						for ($i=0;$i<count($obj);$i++){
							echo "<option value='".$obj[$i]->pgid."'>".$obj[$i]->name."</option>";
						}?>
					</select>
				</td>
				<td align="center">
					<input type="button" id="btnRight" value=">>"  />
					<input type="button" id="btnLeft" value="<<"  />
				</td>
				<td>
					<select id="rightValues" name="choosen-pages[]" STYLE="width: 160px;box-sizing: border-box;" size="5" multiple>
						
					</select>
				</td>
			</tr>
			<tr class="l">
				<td >
					Choose User Type:
				</td>
				<td>
					<select name="UserType">
						<?php 
						$obj=UserType::getallusertypes($conn); 
						for ($i=0;$i<count($obj);$i++){ 
							echo "<option value='".$obj[$i]->utid."'>".$obj[$i]->name."</option>";
						} ?>							
					</select>
				</td>
			</tr>
			<tr>
				<td>
					<input type="submit" name="submit">
				</td>
			</tr>
		</table>
	</form>
</body>
</html>