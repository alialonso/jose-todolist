<?php 
require_once("includes/connection.php");
require_once("includes/funciones.php");
$resultado = $_POST['valor1']; 
$resultado2 = $_POST['valor2'];


// $fecha=date('Y-m-d h:i:s');

if (cambiaestadoNota($_POST['valor1'])==0)
	echo 'line-through';
else
	echo 'none';
?>