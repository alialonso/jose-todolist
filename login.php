<?php
session_start();
?>

<?php
echo ("antes");
include ("connection.php");
echo ("despues");
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8"  />
	<title>Inicio de sesión</title>
	<!-- lineas para bootstrap	 -->
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<!-- lineas para bootstrap	 -->
</head>

<body>
 	 <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="intropage.php">To Do List</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Home</a></li>
        <li><a href="#">Page 1</a></li>
        <li><a href="#">Page 2</a></li>
        <li><a href="#">Page 3</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="register.php"><span class="glyphicon glyphicon-user"></span> Registro</a></li>
      </ul>
    </div>
  </div>
</nav>

<?php
if(isset($_SESSION["session_usuario"])){
// echo "Session is set"; // for testing purposes
header("Location: intropage.php");
}

if(isset($_POST["login"])){

if(!empty($_POST['usuario']) && !empty($_POST['password'])) {
 $usuario=$_POST['usuario'];
 $password=$_POST['password'];

$query =mysql_query("SELECT * FROM persona WHERE usuario='".$usuario."' AND password='".$password."'");

$numrows=mysql_num_rows($query);
 if($numrows!=0)

{
 while($row=mysql_fetch_assoc($query))
 {
 $dbusuario=$row['usuario'];
 $dbpassword=$row['password'];
 $iduser=$row['id'];
 }
if($usuario == $dbusuario && $password == $dbpassword)

{

 $_SESSION['session_usuario']=$usuario;
 $_SESSION['session_id']=$iduser;

/* Redirect browser */
 header("Location: intropage.php");
 }
 } else {

$message = "Nombre de usuario ó contraseña inválida!";
 }

} else {
 $message = "Todos los campos son requeridos!";
}
if (!empty($message)) {echo '<div class="alert alert-danger">' . "Mensaje: ". $message . "</div>";}
}
?>
<h1>Login</h1>
<form class="form-horizontal col-sm-4" name="loginform" id="loginform" action="" method="POST">
  <div class="form-group">
    <label class="control-label col-sm-2" for="text">Usuario:</label>
    <div class="col-sm-4">
      <input type="text" class="form-control col-sm-2" name="usuario" id="usuario" placeholder="Usuario">
    </div>
	 </div>
	<div class="form-group">
    <label class="control-label col-sm-2" for="pwd">Password:</label>
	<div class="col-sm-4">
      <input type="password" class="form-control" name="password" id="password" placeholder="Enter password">
    </div>
	</div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-4">
      <div class="checkbox">
        <label><input type="checkbox"> Remember me</label>
      </div>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default"   id="login" name="login" value="Entrar">Entrar</button>
    </div>
  </div>
</form>

	<footer></footer>
 </body>
</html>
