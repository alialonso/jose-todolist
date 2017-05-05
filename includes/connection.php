
<?php
echo ('prueba')	;

include 'constants.php';

echo ("despues require".DB_PASS.DB_SERVER);
//$con = new mysqli_connect(DB_SERVER, DB_USER, DB_PASS);
$conn = new  PDO("mysql:host=".
	DB_SERVER.";dbname=".
	DB_NAME,DB_USER,DB_PASS);
//	mysql_select_db(DB_NAME) or die("Cannot select DB");

echo ("fin prueba");
	?>
