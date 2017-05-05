<?php 

class Lista{
	private $nombre;
	private $usuario;
	private $fecha;
	private $comentarios;
	
	public function __construct ($nombre,$usuario,$fecha,$comentarios){
		$this->nombre=$nombre;
		$this->usuario=$usuario;
		$this->fecha=$fecha;
		$this->comentarios=$comentarios;
	}

	public function getNombre(){
		return $this->nombre;
	}
	public function getUsuario(){
		return $this->usuario;
	}
	public function getFecha(){
		return $this->fecha;
	}
	public function getComentarios(){
		return $this->comentarios;
	}
	public function setNombre($nombre){
		$this->nombre=$nombre;
	}
	public function setUsuario($usuario){
		$this->usuario=$usuario;
	}
	public function setFecha($fecha){
		$this->fecha=$fecha;
	}
	public function setComentarios($comentarios){
		$this->comentarios=$comentarios;
	}

/* 	 public function guardaLista($nombre,$usuario,$fecha,$comentarios){
	 	 $sql="INSERT INTO listas
		(nombre, usuario,fecha,comentarios)
		VALUES('$nombre','$usuario','$fecha','$comentarios')";
	 
		if ($result=mysql_query($sql))
				return true;
		else
				return false;		
	}

	public function misListas($usuario){
	 	 $sql="SELECT * from listas
		WHERE usuario = '$usuario'";
	  while($row=mysql_fetch_assoc($sql))
		{
			echo "<p>usuario      : ".$usuario."</p>";
			echo "<p>nombre      : ".$nombre."</p>";
			echo "<p>comentarios : ".$comentarios."</p>";

		 } */

/* 		if ($result=mysql_query($sql))
				return true;
		else
				return false;		 
	}*/

	// public function devolucion(){
		// if ($this->prestados>0){
			// $this->prestados-=1;
			// $this->ejemplares+=1;
			// return true;
		// }
		// else
			// return false;		
	// }
}
?>