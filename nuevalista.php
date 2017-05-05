<?php 
session_start();


require_once "clases.php";
require_once("includes/connection.php");
require_once "includes/funciones.php";
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>Completar Registro</title>
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
        <li class="active"><a href="#">Home</a></li>
        <li><a href="#">Page 1</a></li>
        <li><a href="#">Page 2</a></li> 
        <li><a href="#">Page 3</a></li> 
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
      </ul>
    </div>
  </div>
</nav>

<?php 


 
if(isset($_POST["register"])){
	
	if(!empty($_POST['nombre'])) {
	 
	 $nombre=$_POST['nombre'];
	 $comentarios=$_POST['comentarios'];
	 $fecha=date('Y-m-d h:i:s');
	 $usuario=$_SESSION['session_id'];
	 $vencimiento=$_POST['vencimiento'];
	 	 
	 $query=mysql_query("SELECT * FROM listas WHERE usuario='".$usuario."' AND nombre = '".$nombre."'");
	 $numrows=mysql_num_rows($query);
	 
	 if($numrows==0)
	 { 	 
		$result=guardaLista($nombre,$usuario,$fecha,$comentarios,$vencimiento);
	 
		if($result){
			header("location:login.php");
			//$message = "Cuenta Correctamente Creada";
		} else {
			$message = "Error al ingresar datos de la informacion!";
		}
	 
	} else {
	 $message = "El nombre de lista ya existe! Por favor, intenta con otro!";
	 }
	 
	} else {
	 $message = "Todos los campos deben completarse!";
	}
}
?>
 
<?php if (!empty($message)) {echo '<div class="alert alert-danger">' . "Mensaje: ". $message . "</div>";} ?>
 <h1>Nueva lista</h1>
<form class="form-horizontal col-sm-6" name="loginform" id="loginform" action="" method="POST">
  <div class="form-group">
    <label class="control-label col-sm-2" for="text">Lista:</label>
    <div class="col-sm-6">
      <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre de la lista">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="text">Comentarios:</label>
    <div class="col-sm-6">
      <input type="text" class="form-control" name="comentarios" id="comentarios" placeholder="Comentarios">
    </div>
  </div>
    <div class="form-group">
    <label class="control-label col-sm-2" for="date">Vencimiento:</label>
    <div class="col-sm-6">
      <input type="date" class="form-control" name="vencimiento" id="vencimiento" placeholder="AAAA/MM/DD">
    </div>
  </div>

  <div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default"   id="guardar" name="register" value="Guardar">Guardar</button>
    </div>
  </div>
</form>
 
</form>