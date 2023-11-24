<?php
include_once "classes.php";
include_once '..\includes\db.php';



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
						$obj=Pages::getallpages();
						for ($i=0;$i<count($obj);$i++){
							echo "<option value='".$obj[$i]->pgid."'>".$obj[$i]->name."</option>";
						}?>
					</select>
				</td>
				<td align="center">
					<input type="button" id="btnLeft" value="<<"  />
					<input type="button" id="btnRight" value=">>"  />
				</td>
				<td>
					<select id="rightValues" name="choosen-pages[]" STYLE="width: 160px;box-sizing: border-box;" size="5" multiple>
						
					</select>
				</td>
			</tr>
			<tr>
				<td>
					Choose User Type:
				</td>
				<td>
					<select name="UserType">
						<?php 
						$obj=UserType::getallusertypes(); 
						for ($i=0;$i<count($obj);$i++){ 
							echo "<option value='".$obj[$i]->utid."'>".$obj[$i]->name."</option>";
						}?>							
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