<?php

require_once "conexion.php";

class LoginModels{

	public static function loginModel($dataModel, $table){

		$stmt = Conexion::connect()->prepare("SELECT user_name, password, counter FROM $table WHERE user_name = :user_name");
		$stmt -> bindParam(":user_name", $dataModel["user_name"], PDO::PARAM_STR);
		$stmt -> execute();
		return $stmt -> fetch();
		$stmt -> close();
	}

	public static function counterModel($dataModel, $table){

		$stmt = Conexion::connect()->prepare("UPDATE $table SET counter = :counter WHERE user_name = :user_name");
		$stmt -> bindParam(":counter", $datosModel["updateCounter"], PDO::PARAM_INT);
		$stmt -> bindParam(":user_name", $datosModel["currentUser"], PDO::PARAM_STR);

		if($stmt -> execute()){

			return "ok";

		}

		else{

			return "error";
		}

	}

}