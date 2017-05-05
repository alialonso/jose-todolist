<?php require_once("includes/connection.php"); ?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
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
        <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul>
    </div>
  </div>
</nav>

 <?php
 
if(isset($_POST["register"])){
 
if(!empty($_POST['nombre']) && !empty($_POST['apellidos']) && !empty($_POST['dni']) && !empty($_POST['telefono']) && 
			!empty($_POST['sexo']) && !empty($_POST['email']) && !empty($_POST['usuario']) && !empty($_POST['password'])) {
 $nombre=$_POST['nombre'];
 $apellidos=$_POST['apellidos'];
 $dni=$_POST['dni'];
 $telefono=$_POST['telefono'];
 $sexo=$_POST['sexo'];
 $email=$_POST['email'];
 $usuario=$_POST['usuario'];
 $password=$_POST['password'];
 $comentarios=$_POST['comentarios'];
 
 $query=mysql_query("SELECT * FROM persona WHERE usuario='".$usuario."'");
 $numrows=mysql_num_rows($query);
 
 if($numrows==0)
 {
 $sql="INSERT INTO persona
 (nombre, apellidos, dni, telefono, sexo, email, usuario, password, comentarios)
 VALUES('$nombre','$apellidos','$dni','$telefono','$sexo','$email', '$usuario', '$password','$comentarios')";
 
$result=mysql_query($sql);
 
 if($result){
  header("location:login.php");
 //$message = "Cuenta Correctamente Creada";
 } else {
 $message = "Error al ingresar datos de la informacion!";
 }
 
} else {
 $message = "El nombre de usuario ya existe! Por favor, intenta con otro!";
 }
 
} else {
 $message = "Todos los campos deben completarse!";
}
}
?>
 
<?php if (!empty($message)) {echo '<div class="alert alert-danger">' . "Mensaje: ". $message . "</div>";} ?>
  
 <h1>Registrate gratis</h1>
 <form class="form-horizontal col-sm-6" name="registerform" id="registerform" action="register.php" method="POST">
 	<div class="form-group">
 		<label class="col-sm-2 control-label">Nombre</label>
 		<div class="col-sm-6">
 			<input type="text" name="nombre" id="nombre" class="form-control" size="256" value="">
 	 	</div>
	</div> 

 	<div class="form-group">
 		<label class="col-sm-2 control-label">Apellidos</label>
 		<div class="col-sm-6">
 			<input type="text" name="apellidos" id="apellidos" class="form-control" size="256" value="">
 	 	</div>
	</div> 
 
 	<div class="form-group">
  		<label class="col-sm-2 control-label">Dni</label>
  		<div class="col-sm-6">
 			<input type="text" name="dni" id="dni" class="form-control" size="10" value="">
 	 	</div>
	</div> 
 
 	<div class="form-group"> 
 		<label class="col-sm-2 control-label">Teléfono</label>
 		<div class="col-sm-6">
 			<input type="text" name="telefono" id="telefono" class="form-control" value="" size="10">
 	 	</div>
	</div> 
 
  	<div class="form-group"> 
 		<label class="col-sm-2 control-label">Email</label>
 		<div class="col-sm-6">
 			<input type="text" name="email" id="email" class="form-control" size="256" value="">
 	 	</div>
	</div> 

	<div class="form-group"> 
 		<label class="col-sm-2 control-label">Sexo</label>
 		<div class="col-sm-6">
	         <select id="sexo" name="sexo" class="form-control">
				<option value=""></option>
	            <option value="F">Mujer</option>
	            <option value="M">Hombre</option>
	        </select>
 	 	</div>
	</div> 

 	<div class="form-group">
 		<label class="col-sm-2 control-label">Nombre De Usuario</label>
 		<div class="col-sm-6">
 			<input type="text" name="usuario" id="usuario" class="form-control" value="" size="250">
 	 	</div>
	</div> 
 
 	<div class="form-group">
 		<label class="col-sm-2 control-label">Contraseña</label>
 		<div class="col-sm-6">
 			<input type="password" name="password" id="password" class="form-control" value="" size="250"/>
 	 	</div>
	</div> 

	<div class="form-group">
 		<label class="col-sm-2 control-label">Comentarios</label>
 		<div class="col-sm-6">
 			<input type="textarea" name="comentarios" id="comentarios" class="form-control" value="" size="256">
  	 	</div>
	</div> 

	<div class="form-group"> 
    	<div class="col-sm-offset-2 col-sm-10">	
	 		<input type="submit" name="register" id="register" class="btn btn-default"  value="Registrar" />
 	 	</div>
	 </div>

 	<p>Ya tienes una cuenta? <a href="login.php" >Entra Aquí!</a>!</p>
</form>
 
	<footer></footer>	
</body>
</html>