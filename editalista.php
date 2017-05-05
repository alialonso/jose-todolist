<?php require_once("includes/connection.php");
session_start();

//["id"=>1,"nombre"=>'Soraya',"email"=>'skdfos@sldifj',"usuario"=>'soraya',"password"=>'12345678']


 ?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>Editar Lista</title>
	<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"> </script>
	<script>
	function FinalizaNota(valor1,valor2){
        var parametros = {
                "valor1" : valor1,
				"valor2" : valor2
        };
        $.ajax({
                data:  parametros,
                url:   'ajax_finalizanota.php',
                type:  'post',
                beforeSend: function () {
//                        $("#resultado").html("Procesando, espere por favor...");
                },
                success:  function (response) {
						valor3='#b'+valor1;
//						console.log($(valor1).val());
//						console.log($(valor2).val());						
						
						if ($(valor3).val()=="Activar") {							
//							console.log("Activar");
							$(valor3).val("Finalizar");
							$(valor3).removeClass("btn btn-success");
							$(valor3).addClass("btn btn-warning");
//							$(valor3).text("Finalizar");
						} else {
//							console.log("Finalizar");
							$(valor3).val("Activar");
							$(valor3).removeClass("btn btn-warning");
							$(valor3).addClass("btn btn-success");
						}

						$(valor2).css("text-decoration",response);
                }
        });
}
	</script>	

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
        <li><a href="nuevanota.php">Nueva nota</a></li>
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
if(!empty($_POST['nombre']) && !empty($_POST['vencimiento']) ) 
{
	 $nombre=$_POST['nombre'];
	 $vencimiento=$_POST['vencimiento'];
	 
//	 echo $_POST['completada'];
	
	 if ($_POST['completada']=='S'){
		$completada=1;
	} else
		$completada=0;
	 $comentarios=$_POST['comentarios'];
	 $idlista=$_SESSION['session_idlista'];
	 
	 $query=mysql_query("SELECT * FROM listas WHERE id=".$idlista);
	 $numrows=mysql_num_rows($query);
	 
	 if($numrows!=0)
	 { //UPDATE
		 $sql="UPDATE listas
		 SET nombre='".$nombre."', comentarios='".$comentarios."', vencimiento='".$vencimiento."', completada=".$completada
				." WHERE id=".$idlista;
//		 echo $sql;
		$result=mysql_query($sql);
		if($result){
			header("location:editalista.php");
//			$message = "Datos modificados con éxito";
//			echo $sql;
		} else {
			$message = "Error al modificar los datos";
		}
	} else {
	 $message = "No se pudieron actualizar los datos";
	 }
 
} else {
	 $message = "No se puede actualizar porque hay datos en blanco";
	}
}

/*   $datosLista="SELECT * FROM listas WHERE id=".$_SESSION['session_idlista'];
$result = mysql_query($datosLista);
$row = mysql_fetch_assoc($result); 
 */
?>
 
<?php if (!empty($message)) {echo '<div class="alert alert-danger">' . "Mensaje: ". $message . "</div>";} ?>

 <?php 
if(isset($_POST["guardarnota"])){
 
//if(!empty($_POST['nombre']) && !empty($_POST['email']) && !empty($_POST['usuario']) && !empty($_POST['password']))
if(!empty($_POST['texto']) ) 
{
	 $texto=$_POST['texto'];
//	 $activa=$_POST['activa'];
	 $activa='S';
	
	 if ($activa=='S'){
		$activa=1;
	} else
		$activa=0;
//	 $comentarios=$_POST['comentarios'];
	 $idlista=$_SESSION['session_idlista'];
	 $fecha=date('Y-m-s h:i:s');
	 
	 $query=mysql_query("SELECT * FROM notas WHERE lista=".$idlista);
//	 $numrows=mysql_num_rows($query);
	 
//	 if($numrows!=0)
// { //UPDATE
		 $sql="INSERT INTO notas (texto, fecha, lista, activa) values ('$texto','$fecha','$idlista','$activa')";
//		 echo $sql;
		$result=mysql_query($sql);
		if($result){
			header("location:editalista.php");
//			$message = "Datos modificados con éxito";
			echo $sql;
		} else {
			$message = "Error al modificar los datos";
		}
//	} else {
//	 $message = "No se pudieron actualizar los datos";
//	 }
 
} else {
	 $message = "No se puede actualizar porque hay datos en blanco";
	}
}

/*   $datosLista="SELECT * FROM listas WHERE id=".$_SESSION['session_idlista'];
$result = mysql_query($datosLista);
$row = mysql_fetch_assoc($result); 
 */
?>
 
<?php if (!empty($message)) {echo '<div class="alert alert-danger">' . "Mensaje: ". $message . "</div>";} ?>

 <h1>Editar lista 
	<?php if (!empty($_GET["idlista"])) 
					$_SESSION['session_idlista']= $_GET["idlista"];
//			echo $_SESSION['session_idlista']; 
			$datosLista="SELECT * FROM listas WHERE id=".$_SESSION['session_idlista'];
			$result = mysql_query($datosLista);
			$row = mysql_fetch_assoc($result); 
			echo ' '.$_SESSION['session_idlista'];

	?></h1>
<form class="form-horizontal col-sm-6" name="registerform" id="registerform" action="editalista.php" method="post">
	<div class="form-group">	 
	 <label class="control-label col-sm-2">Nombre</label>
	 	<div class="col-sm-4"> 
	 		<input type="text" name="nombre" id="nombre" class="form-control" size="32" value="<?php echo $row['nombre'];?>">
	 	</div>
	</div> 
	<div class="form-group">	 
	 <label class="control-label col-sm-2">Comentarios</label>
	 	<div class="col-sm-4"> 
	 		<input type="text" name="comentarios" id="comentarios" class="form-control" size="32" value="<?php echo $row['comentarios'];?>">
	 	</div>
	</div> 
	
	<div class="form-group">
			<label class="control-label col-sm-2">Vencimiento</label>
			<div class="col-sm-4">
				 <input type="date" name="vencimiento" id="vencimiento" class="form-control" value="<?php echo $row['vencimiento']; ?>">
	 	 	</div>
	 </div>

	  <div class="form-group"> 		
			<label class="control-label col-sm-2">Completada</label>
			<div class="radio col-sm-2">
				 <label><input type="radio" name="completada" id="completada" <?php if ($row['completada']) echo ' checked value="S">Sí</label>'; else echo ' value="S">Sí</label>';?>
			</div>	
			<div class="radio col-sm-2">
				 <label><input type="radio" name="completada" id="completada" <?php if (!$row['completada']) echo ' checked value="N">No</label>'; else echo ' value="N">No</label>';?>				 
	 	 	</div>

	 </div>
  <div class="form-group"> 
    		<div class="col-sm-offset-2 col-sm-1">	
	 			<input type="submit" name="guardar" id="guardar"class="btn btn-default" value="Guardar Lista" />
	 	 	</div>
	 </div>
	
</form>

 
	<?php	
			if (!empty($_GET["idlista"])) 
					$_SESSION['session_idlista']= $_GET["idlista"];
			$datosNota="SELECT * FROM notas WHERE lista=".$_SESSION['session_idlista'];
			$result = mysql_query($datosNota);
//			$row = mysql_fetch_assoc($result); 
			
		if (mysql_num_rows($result) <> 0)
		{
			// echo '<form class="form-horizontal col-sm-6" name="registerform" id="registerform" action="editalista.php" method="post">';
			// echo '<div class="list-group">';
//echo 'hhhhhhhhhhhhhhhhhhh';echo $_SESSION['session_idlista'];
			while($row=mysql_fetch_assoc($result, MYSQL_ASSOC))
			{	
				echo '<div class="col-sm-6">';
					echo '<div class="col-sm-4">';
					if ($row['activa']){
							echo '<label name="e'.$row['id'].'" id="e'.$row['id'].'" value="e'.$row['id'].'">'.$row['texto'].'</label>';
							echo '<input type="hidden" name="'.$row['id'].'" id="'.$row['id'].'" value="'.$row['id'].'">';
					} else {
							echo '<label style="text-decoration: line-through" name="e'.$row['id'].'" id="e'.$row['id'].'" value="e'.$row['id'].'">'.$row['texto'].'</label>';
							echo '<input type="hidden" name="'.$row['id'].'" id="'.$row['id'].'" value="'.$row['id'].'">';						
					}
					echo '</div>';
					echo '<div class="col-sm-2">';		
					if ($row['activa']){
						echo '<input id="b'.$row['id'].'" type="button" class="btn btn-warning" href="javascript:;" onclick="FinalizaNota($'."('#".$row['id']."').val(),'#e".$row['id']."');return false;".'" value="Finalizar"/></input>';
					} else {
						echo '<input id="b'.$row['id'].'" type="button" class="btn btn-success" href="javascript:;" onclick="FinalizaNota($'."('#".$row['id']."').val(),'#e".$row['id']."');return false;".'" value="Activar"/></input>';
					}																									
					echo '</div>';
				echo '</div>';
		 	}
		 } 
		 // else{
		 
 			echo '<form class="form-horizontal col-sm-6" name="registerform" id="registerform" action="editalista.php" method="post">';
			echo '<div class="list-group">';
				if (mysql_num_rows($result) == 0)
					echo '<h3>No tienes notas todavía</h3>';
//					echo 'kkkkkkkkkkkkkkk';
				echo '<div class="form-group">';
					echo '<label class="control-label col-sm-2">Texto</label>';
					echo '<div class="col-sm-4"> ';
						echo '<input type="text" name="texto" id="texto" class="form-control" value="">';
					echo '</div>';
				echo '</div>'; 
//				echo '<div class="form-group">';
//				echo '<label class="control-label col-sm-2">Activa</label>';
//				echo '<div class="radio col-sm-2">';
//					echo '<label><input type="radio" name="activa" id="activa" <';
//						echo ' checked value="S">Sí</label>'; 
//					echo '</div>';
//					echo '<div class="radio col-sm-2">';
//					echo '<label><input type="radio" name="activa" id="activa"';
///					echo ' value="N">No</label>'; 
//				echo '</div>';
			echo '</div>';			
		// 	}

	?> 
	  <div class="form-group"> 
				<div class="col-sm-offset-2 col-sm-1">	
					<input type="submit" name="guardarnota" id="guardarnota" class="btn btn-default" value="Añadir nota" />
				</div>
		 </div>
	
	
</form>
	<footer></footer>	
</body>
</html>