<?php require_once("includes/connection.php");
session_start();

//["id"=>1,"nombre"=>'Soraya',"email"=>'skdfos@sldifj',"usuario"=>'soraya',"password"=>'12345678']


 ?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>Editar datos</title>
	<!-- lineas para bootstrap	 -->
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<!-- lineas para bootstrap	 -->	
</head> 

<body>
	<div id="welcome">
	 <h2>Bienvenido, <span><?php echo $_SESSION['session_usuario'];?>! </span></h2>

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
        <li class="active"><a href="nuevalista.php">Nueva lista</a></li>
        <li><a href="#">Page 1</a></li>
        <li><a href="#">Page 2</a></li> 
        <li><a href="#">Page 3</a></li> 
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="completaregistro.php"><span class="glyphicon glyphicon-user"></span> Registro</a></li>
		<li><a href="logout.php"><span class="glyphicon glyphicon-stop"></span> Logout</a></li>	
      </ul>
    </div>
  </div>
</nav>

 <?php
 
if(isset($_POST["guardar"])){
 
//if(!empty($_POST['nombre']) && !empty($_POST['email']) && !empty($_POST['usuario']) && !empty($_POST['password']))
if(!empty($_POST['nombre']) && !empty($_POST['apellidos']) && !empty($_POST['dni']) && !empty($_POST['telefono']) && 
			!empty($_POST['sexo']) && !empty($_POST['email']) && !empty($_POST['usuario']) && !empty($_POST['password'])) 
{
	 $nombre=$_POST['nombre'];
	 $apellidos=$_POST['apellidos'];
	 $dni=$_POST['dni'];
	 $telefono=$_POST['telefono'];
	 $sexo=$_POST['sexo'];
	 $email=$_POST['email'];
	 $usuario=$_POST['usuario'];
	 $password=$_POST['password'];
	 $comentarios=$_POST['comentarios'];
	 
	 $query=mysql_query("SELECT * FROM persona WHERE usuario='".$usuario."' AND id<>".$_SESSION['session_id']);
	 $numrows=mysql_num_rows($query);
	 
	 if($numrows==0)
	 { //UPDATE
	 $sql="UPDATE persona
	 SET nombre='".$nombre."', email='".$email."', usuario='".$usuario."', password='".$password 
			."', apellidos='".$apellidos
			."', comentarios='".$comentarios
			."', dni='".$dni
			."', telefono='".$telefono
			."', sexo='".$sexo
			."' WHERE id=".$_SESSION['session_id'];
	 echo $sql;
	$result=mysql_query($sql);
	 $_SESSION['session_usuario']=$usuario;
	 if($result){
	  header("location:login.php");
	 //$message = "Datos modificados con éxito";
	 } else {
	 $message = "Error al modificar los datos";
	 }
	 
	} else {
	 $message = "Ese nombre de usuario ya existe, por favor, escribe otro";
	 }
 
} else {
	 $message = "No se puede actualizar porque hay datos en blanco";
	}
}

$datosUsuario="SELECT * FROM persona WHERE usuario='".$_SESSION['session_usuario']."'";
$result = mysql_query($datosUsuario);
$row = mysql_fetch_assoc($result);

?>
 
<?php if (!empty($message)) {echo '<div class="alert alert-danger">' . "Mensaje: ". $message . "</div>";} ?>
 

 <h1>Modificar datos</h1>
<form class="form-horizontal col-sm-6" name="registerform" id="registerform" action="editar.php" method="post">
	<div class="form-group">	 
	 <label class="control-label col-sm-2">Nombre</label>
	 	<div class="col-sm-6"> 
	 		<input type="text" name="nombre" id="nombre" class="form-control" size="32" value="<?php echo $row['nombre'];?>">
	 	</div>
	</div> 

	 <div class="form-group">
		 <label class="control-label col-sm-2" for="text">Apellidos</label>
		 <div class="col-sm-6"> 
			 <input type="text" name="apellidos" id="apellidos" class="form-control" size="32" value="<?php echo $row['apellidos']; ?>">
		 </div> 
	 </div>
	 <div class="form-group">
		 <label class="control-label col-sm-2" for="text">Dni</label>
		 <div class="col-sm-6"> 
		 	<input type="text" name="dni" id="dni" class="form-control" size="32" value="<?php echo $row['dni']; ?>">
		 </div>
	 </div>
	<div class="form-group">
			 <label class="control-label col-sm-2" for="text">Teléfono</label>
			 <div class="col-sm-6"> 
			 	<input type="text" name="telefono" id="telefono" class="form-control" size="32" value="<?php echo $row['telefono']; ?>">
		 	</div>
	 </div>
	 
	 <div class="form-group">
			 <label class="control-label col-sm-2">Email</label>
			 <div class="col-sm-6"> 
			 	<input type="text" name="email" id="email" class="form-control" size="32" value="<?php echo $row['email']; ?>">
			 </div>
	 </div>
	 <div class="form-group">
		 <label class="control-label col-sm-2">Sexo</label>
		 	<div class="col-sm-6"> 
		         <select id="sexo" name="sexo" class="form-control col-sm-6">
					<option value=""></option>
					<?php if ($row['sexo']=="F") { 
							echo '<option value="F" selected>Mujer</option>';
						} else { 
							echo '<option value="F" >Mujer</option>';
						} 
						if ($row['sexo']=="M") {	
							echo '<option value="M" selected>Hombre</option>';
						} else {
							echo '<option value="M">Hombre</option>';
						}
					?>
		        </select>
	 		</div>
	 </div>

	 
	 <div class="form-group">
			 <label class="control-label col-sm-2">Usuario</label>
			 	<div class="col-sm-6">
			 		<input type="text" name="usuario" id="usuario" class="form-control" value="<?php echo $row['usuario']; ?>" size="20">
	 		</div>
	 </div>
	 
	 
	 <div class="form-group">
	 		<label class="control-label col-sm-2">Contraseña</label>
	 		<div class="col-sm-6">
	 			<input type="password" name="password" id="password" class="form-control" value="<?php echo $row['password']; ?>" size="32">
	 		</div>
	 </div>
	 

	<div class="form-group">
			<label class="control-label col-sm-2">Comentarios</label>
			<div class="col-sm-6">
				 <input type="textarea" name="comentarios" id="comentarios" class="form-control" value="<?php echo $row['comentarios']; ?>" size="256">
	 	 	</div>
	 </div>

	 
  <div class="form-group"> 
    		<div class="col-sm-offset-2 col-sm-10">	
	 			<input type="submit" name="guardar" id="guardar"class="btn btn-default" value="Guardar" />
	 	 	</div>
	 </div>
	
</form>
 
 
	<footer></footer>	
</body>
</html>