<?php

	 function guardaLista($nombre,$usuario,$fecha,$comentarios,$vencimiento,$completada){
	 	 $sql="INSERT INTO listas
		(nombre, usuario,fecha,comentarios,vencimiento,completada)
		VALUES('$nombre','$usuario','$fecha','$comentarios','$vencimiento','$completada')";
		//$result = mysql_query($sql);
		if ($result=mysql_query($sql))
				return true;
		else
				return false;		
	}

	 function cambiaestadoNota($id){ 
		 $fecha=date('Y-m-d h:i:s');
		 $sql="SELECT * from notas
			WHERE id = ".$id;

		$result = mysql_query($sql);
		if (mysql_num_rows($result) <> 0){
			$row=mysql_fetch_assoc($result, MYSQL_ASSOC);
			if ($row['activa'])
				$activa=0;
			else
				$activa=1;

			 $sql="UPDATE notas
			SET finalizacion = '$fecha',
				activa = '$activa'
			WHERE id=".$id;
			//$result = mysql_query($sql);
			//echo $sql;
			if ($result=mysql_query($sql))
					return $activa;
			else
					return false;
		} else
				return false;
	}
	
	function misListas($usuario){
	 	 $sql="SELECT * from listas
		WHERE usuario = ".$usuario;
		
		$result = mysql_query($sql);
		if (mysql_num_rows($result) <> 0)
		{
			$cl='';
			echo '<h2>Mis listas</h2>';
			echo '<div class="list-group col-sm-6">';
			$ya=0;
			while($row=mysql_fetch_assoc($result, MYSQL_ASSOC))
			{
				if (!$ya){
						echo '<div class="col-sm-6">';
						$ya=1;
						echo $cl;
				}

			// echo $cl.'5555555555555555';
				if ($row['completada']){
					$cl=' text-success bg-success ';
//					echo $cl;
					
				} else 
					$cl=' text-danger bg-danger ';
//			echo $cl;
				echo '<a href="editalista.php?idlista='.$row['id'].'" class="list-group-item "><h4 class="list-group-item-heading"'.'>'.$row['nombre'].'</h4>';
				echo '<p class="list-group-item-text '.$cl.'">'.$row['vencimiento'].'</p></a>';
				$cl='';
		 	}
			echo '</div>';

			echo '</div>';
		 } else{
		 	echo '<h2>No tienes listas todavía</h2><div class="list-group">';
		 	}
	}

	/* 	<div class="container"> 
<h2>List group custom</h2>
	<div class="list-group">
	  <a href="#" class="list-group-item active">
		<h4 class="list-group-item-heading">First List Group Item Heading</h4>
		<p class="list-group-item-text">List Group Item Text</p>
	  </a>
	  <a href="#" class="list-group-item">
		<h4 class="list-group-item-heading">Second List Group Item Heading</h4>
		<p class="list-group-item-text">List Group Item Text</p>
	  </a>
	</div> 
 </div>
 */

	function misNotas($lista){
	 	 $sql="SELECT * from notas
		WHERE lista = ".$lista;
		
		$result = mysql_query($sql);
		if (mysql_num_rows($result) <> 0)
		{
			echo '<h2>Mis notas</h2><div class="list-group">';
			while($row=mysql_fetch_assoc($result, MYSQL_ASSOC))
			{
				
				echo '<a href="#" class="list-group-item active"><h4 class="list-group-item-heading">'.$row['texto'].'</h4>';
				echo '<p class="list-group-item-text">'.$row['vencimiento']." completada: ".$row['completada'].'</p></a></div>';
		 	}
		 } else{
		 	echo '<h2>No tienes notas todavía</h2><div class="list-group">';
		 	}
	}
	
	?>

