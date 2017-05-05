<?php require_once("includes/connection.php");
session_start();

//["id"=>1,"nombre"=>'Soraya',"email"=>'skdfos@sldifj',"usuario"=>'soraya',"password"=>'12345678']


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
        <li class="active"><a href="nuevalista.php">Nueva lista</a></li>
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
 
if(isset($_POST["guardar"])){
 
	if(!empty($_POST['tipo_de_pago'])){
	 $tipo_de_pago=$_POST['tipo_de_pago'];
	 
	 //UPDATE
	 $sql="UPDATE persona SET tipo_de_pago=".$tipo_de_pago." WHERE id=".$_SESSION['session_id'];
//	 echo $sql;
	 $result=mysql_query($sql);

	 if($result){
		header("location:login.php");
	 	setcookie('tipo_de_pago', $tipo_de_pago, time()+3000);
//		$message = "Datos modificados con éxito";
	 } else {
		$message = "Error al modificar los datos";
	 }	 
	} else {
	 $message = "No se puede actualizar porque hay datos en blanco";
	}
}

?>
 
<?php if (!empty($message)) {echo '<div class="alert alert-danger">' . "Mensaje: ". $message . "</div>";} ?>
 
 <h1>Completar registro</h1>
 <p> <?php echo $_SESSION['session_usuario'].", para completar el registro, seleccione el método de pago."; ?> </p>
 
<form role="form" class="form-horizontal col-sm-6" id="myForm" action="completaregistro.php" method="post">
    	<div class="form-group">	 
        	<label class="control-label col-sm-2">Método de pago</label>
        	<div class="col-sm-6"> 
		        <select id="exampleInputMetodoPago"  class="form-control" name="tipo_de_pago">
					<option value=""></option>
					<?php
					$query = "SELECT * from tipo_de_pago";
					$result=mysql_query($query);

					while ($line= mysql_fetch_array($result, MYSQL_ASSOC)){
						echo "<option value='".$line['id']."'>".$line['nombre']."</option>";
					}
					mysql_free_result($result);
					?>

		        </select>
    	 	</div>
	</div> 

  <div class="form-group"> 
    		<div class="col-sm-offset-2 col-sm-10">	
				<button type="submit" class="btn btn-default"  name="guardar">Guardar</button>
    	 	</div>
	</div> 				
		<p class="regtext">Ya tienes una cuenta? <a href="login.php" >Entra Aquí!</a>!</p>
</form>
 
 
	<footer></footer>	
</body>
</html>