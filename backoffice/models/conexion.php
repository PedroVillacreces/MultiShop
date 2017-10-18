<?php

class Conexion{

	public static function connect(){

		$link = new PDO('mysql:dbname=multishop;host=localhost',"root","");
		return $link;

	}

}