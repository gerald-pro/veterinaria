<?php

require_once "conexion.php";

class ModeloEspecialidades {

	/*=============================================
				CREAR ESPECIALIDAD
	=============================================*/
	static public function mdlIngresarEspecialidad($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(Especialidad) VALUES (:Especialidad)");

		$stmt->bindParam(":Especialidad", $datos, PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
				MOSTRAR ESPECIALIDADES
	=============================================*/
	static public function mdlMostrarEspecialidades($tabla, $item, $valor){

		if ($item != null) {

			$stmt = Conexion::conectar() -> prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":" . $item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		} else {

			$stmt = Conexion::conectar() -> prepare("SELECT * FROM $tabla");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
				EDITAR ESPECIALIDAD
	=============================================*/
	static public function mdlEditarEspecialidad($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :nombre WHERE id = :id");

		$stmt -> bindParam(":nombre", $datos["Especialidad"], PDO::PARAM_STR);
		$stmt -> bindParam(":id", $datos["id"], PDO::PARAM_INT);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
				BORRAR ESPECIALIDAD
	=============================================*/
	static public function mdlBorrarEspecialidad($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");

		$stmt -> bindParam(":id", $datos, PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}

}

