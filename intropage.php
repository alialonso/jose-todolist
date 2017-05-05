<?php
session_start();
if(!isset($_SESSION["session_usuario"])) {
 header("location:login.php");
} else {
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>To Do List</title>
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
	  <li><a href="editar.php"><span class="glyphicon glyphicon-pencil"></span> Editar</a></li>
        <?php if(!isset($_COOKIE["tipo_de_pago"])) 
			echo '<li><a href="completaregistro.php"><span class="glyphicon glyphicon-user"></span> Registro</a></li>';
		?>
		<li><a href="logout.php"><span class="glyphicon glyphicon-stop"></span> Logout</a></li>	
      </ul>
    </div>
  </div>
</nav>

	<?php 
	
	
		$usuario=$_SESSION["session_usuario"];
		$id=$_SESSION["session_id"];
		require_once("includes/connection.php");
		//require_once "clases.php";
		require_once "includes/funciones.php";
		
		misListas($id);
			 	 

		
/*  	 	$query=mysql_query("SELECT * FROM persona WHERE usuario='".$usuario."' AND id=".$id);
		$row = mysql_fetch_assoc($query);
		echo "Nombre: ".$row['nombre']."<br>";
		echo "Apellidos: ".$row['apellidos']."<br>";		 
		echo "DNI: ".$row['dni']."<br>";
		echo "Sexo: ".$row['sexo']."<br>";
		echo "Teléfono: ".$row['telefono']."<br>";		 
		echo "Email: ".$row['email']."<br>";
		echo "Usuario: ".$row['usuario']."<br>";
		echo "Password: ".$row['password']."<br>";		 
		echo "Comentarios: ".$row['comentarios']."<br>";
 */ 	

/* 	if(isset($_COOKIE["tipo_de_pago"])) {
 			echo '<p><a href="completaregistro.php">Modifica el Tipo de pago aquí: '.$_COOKIE['tipo_de_pago'].'</a></p>';
		} else {
			echo '<p><a href="completaregistro.php">Completar registro</a></p>';
		}
 */
	?>
	 
	</div>
	 
	<footer></footer>	
</body>
</html>
 
<?php
}
?>
