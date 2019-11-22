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
	<input type="submit" name="action" value="GET order number"> <br/>
</form>	
	
<?php
$db = new adatbazis();
$db ->kapcsolodas();
$db ->select_by_order_number();
$db ->kapcsolat_bontas();

?>
</body>
</html>