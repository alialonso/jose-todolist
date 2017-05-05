<?php 
session_start();
unset($_SESSION['session_usuario']);
session_destroy();
header("location:login.php");
?>
