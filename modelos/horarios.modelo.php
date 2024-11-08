<?php

require_once "conexion.php";

class ModeloHorarios
{

	/*=============================================
	CREAR Horario
	=============================================*/

	static public function mdlIngresarHorario($tabla, $datos)
	{

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(documento,nombres, apellidos, telefono,direccion, sexo,fechaNacimiento)
		VALUES (:documento, :nombres, :apellidos, :telefono, :direccion, :sexo, :fechaNacimiento)");

		$stmt->bindParam(":documento", $datos["documento"], PDO::PARAM_STR);
		$stmt->bindParam(":nombres", $datos["nombres"], PDO::PARAM_STR);
		$stmt->bindParam(":apellidos", $datos["apellidos"], PDO::PARAM_STR);
		$stmt->bindParam(":telefono", $datos["telefono"], PDO::PARAM_STR);
		$stmt->bindParam(":direccion", $datos["direccion"], PDO::PARAM_STR);
		$stmt->bindParam(":sexo", $datos["sexo"], PDO::PARAM_STR);
		$stmt->bindParam(":fechaNacimiento", $datos["fechaNacimiento"], PDO::PARAM_STR);


		if ($stmt->execute()) {

			return "ok";
		} else {

			return "error";
		}

		$stmt->close();
		$stmt = null;
	}

	/*=============================================
	MOSTRAR Horario
	=============================================*/

	static public function mdlMostraHorario($tabla, $item, $valor)
	{

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);

			$stmt->execute();

			return $stmt->fetch();
		} else {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

			$stmt->execute();

			return $stmt->fetchAll();
		}

		$stmt->close();

		$stmt = null;
	}

	/*=============================================
				MOSTRAR HORARIOS MEDICO
	=============================================*/

	static public function mdlMostraHorariosMedico($valor) {

		$stmt = Conexion::conectar() -> prepare("SELECT id, entrada, salida, dia, estado, id_medico FROM horarios h  WHERE h.id_medico=$valor;");

		$stmt -> execute();

		return $stmt -> fetchAll();
		
		$stmt -> close();

		$stmt = null;
	}


	/*=============================================
	MOSTRAR EDAD Horario
	=============================================*/

    static public function mdlMostrarEdadHorario($tabla, $item, $valor){

		

        //$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item AND fecha = date(NOW()) AND estado = 1");

    
    $stmt = Conexion::conectar()->prepare("SELECT YEAR(now())-YEAR(fechaNacimiento)as fechaNacimiento FROM $tabla where idHorario = $item");


        //$stmt -> bindParam(":".$items, $valor, PDO::PARAM_STR);

        $stmt -> execute();

        return $stmt -> fetchAll();


        $stmt -> close();
       
       $stmt = null;

}

	/*=============================================
	MOSTRAR EDAD Horario
	=============================================*/

    static public function mdlMostrarTotalHorario($tabla, $item, $valor){

		

        //$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item AND fecha = date(NOW()) AND estado = 1");

    
    $stmt = Conexion::conectar()->prepare("SELECT COUNT(idHorario) as TOTAL_Horarios FROM $tabla");


        //$stmt -> bindParam(":".$items, $valor, PDO::PARAM_STR);

        $stmt -> execute();

        return $stmt -> fetchAll();


        $stmt -> close();
       
       $stmt = null;

}

	/*=============================================
	EDITAR Horario
	=============================================*/

	static public function mdlEditarHorario($tabla, $datos)
	{

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET documento = :documento, nombres = :nombres, apellidos = :apellidos, telefono = :telefono,direccion = :direccion, sexo = :sexo ,fechaNacimiento = :fechaNacimiento WHERE idHorario= :idHorario");

		$stmt->bindParam(":idHorario", $datos["idHorario"], PDO::PARAM_INT);
		$stmt->bindParam(":documento", $datos["documento"], PDO::PARAM_INT);
		$stmt->bindParam(":nombres", $datos["nombres"], PDO::PARAM_STR);
		$stmt->bindParam(":apellidos", $datos["apellidos"], PDO::PARAM_STR);
		$stmt->bindParam(":telefono", $datos["telefono"], PDO::PARAM_STR);
		$stmt->bindParam(":direccion", $datos["direccion"], PDO::PARAM_STR);
		$stmt->bindParam(":sexo", $datos["sexo"], PDO::PARAM_STR);
		$stmt->bindParam(":fechaNacimiento", $datos["fechaNacimiento"], PDO::PARAM_STR);


		if ($stmt->execute()) {

			return "ok";
		} else {

			return "error";
		}

		$stmt->close();
		$stmt = null;
	}

	/*=============================================
	ELIMINAR Horario
	=============================================*/

	static public function mdlEliminarHorario($tabla, $datos)
	{

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE idHorario = :idHorario");

		$stmt->bindParam(":idHorario", $datos, PDO::PARAM_INT);

		if ($stmt->execute()) {

			return "ok";
		} else {

			return "error";
		}

		$stmt->close();

		$stmt = null;
	}
}
