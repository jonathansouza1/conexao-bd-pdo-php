<?php

class ConectaBanco {


	public static $con;


	//Cria um objeto PDO no padrão Singleton 
	public static function conexao(){

		if (!isset(self::$con)) {

			$host = 'localhost';
			$user = 'root';
			$pass = '';
			$db = 'bdexemplo';

			try{
				self::$con = new PDO("mysql:host=$host;dbname=$db;", $user, $pass);
				self::$con->exec('SET CHARSET utf8');
			}
			catch(Exception $e){
			echo $e->getMessage();
			}	
			
		}

		return self::$con;

	}   


}

?>
