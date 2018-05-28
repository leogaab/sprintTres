<?php 

class DB{
	
	private static $conn;

	public static function getConec()
	{
		if(!self::$conn){
			$db = new PDO('mysql:host=localhost; dbname=huellapet','root','root');
			$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			self::$conn = $db;
		}

		return self::$conn;
	
	}
}

