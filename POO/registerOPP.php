<?php 
require_once('baseConec.php');

class Usuario {
	
	private $nombre;
	private $apellido;
	private $email;
	private $password;
	private $imagen;
	private $id_nacionalidad;
	
	public function __construct($nombre,$apellido,$email,$password,$imagen,$id_nacionalidad){
		$this->nombre = $nombre;
		$this->apellido = $apellido;
		$this->email = $email;
		$this->password = $password;
		$this->imagen = $imagen;
		$this->id_nacionalidad = $id_nacionalidad;
	}
	
	public function save(){
		$sql='INSERT INTO usuarios(nombre,apellido,email,password,imagen,id_nacionalidad) VALUES (:nombre, :apellido, :email, :password, :imagen, :id_nacionalidad)';
		$stmt = DB::getConec()->prepare($sql);
		$stmt->bindValue(':nombre', $this->nombre, PDO::PARAM_STR);
		$stmt->bindValue(':apellido', $this->apellido, PDO::PARAM_STR);
		$stmt->bindValue(':email', $this->email, PDO::PARAM_STR);
		$stmt->bindValue(':password', $this->password, PDO::PARAM_STR);
		$stmt->bindValue(':imagen', $this->imagen, PDO::PARAM_STR);
		$stmt->bindValue(':id_nacionalidad', $this->id_nacionalidad, PDO::PARAM_INT);
		$stmt->execute();
	}
	
	public static function find($email, $password)
	{   
		$sql = 'SELECT email, password FROM usuarios WHERE email=:email';
		$stmt = DB::getConec()->prepare($sql);
		$stmt->bindValue(':email', $email, PDO::PARAM_STR );
		$stmt->execute();
		$result = $stmt->fetch(PDO::FETCH_ASSOC);
		
		foreach($result as $clave => $valor){	
			if($valor==$password){
				return true;
			}
		} 	
	}
	
}

?>