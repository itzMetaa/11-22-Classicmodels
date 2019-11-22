<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php 
    include("adatbazis.php");
?>
<form method="GET">
	<input type="number" name="input_order_number"> <br/>
</form>
<form method="POST">
	<input type="hidden" name="action" value="cmd_order_number">
	<input type="submit" value="Order Number">
</form>	
	
<?php
if(isset($_POST["action"]) and $_POST["action"]=="cmd_order_number")
{
	$db = new adatbazis();
	$db ->select_by_order_number();
}


if(isset($_POST["action"]) and $_POST["action"]=="valami"){
	$hal_delete = new adatbazis();
	echo $hal_delete->hal_delete($_POST["input_id"] );
}

?>
</body>
</html>