<?php

require_once "conexion.php";

class ModeloCitas
{

	/*=============================================
	CREAR Cita
	=============================================*/

	static public function mdlIngresarCita($tabla, $datos)
	{

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(id_usuario_v, id_mascota, inicio, fin)
		VALUES (:id_medico, :id_mascota, :inicio, :fin)");

		$stmt->bindParam(":id_medico", $datos["id_Medico"], PDO::PARAM_STR);
		$stmt->bindParam(":id_mascota", $datos["id_Mascota"], PDO::PARAM_STR);
		$stmt->bindParam(":inicio", $datos["fechaInicio"], PDO::PARAM_STR);
		$stmt->bindParam(":fin", $datos["fechaFin"], PDO::PARAM_STR);

		if ($stmt->execute()) {

			return "ok";
		} else {

			return "error";
		}

		$stmt->close();
		$stmt = null;
	}

	/*=============================================
	MOSTRAR Cita
	=============================================*/

	static public function mdlMostraCita($tabla, $item, $valor)
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
	
	static public function mdlMostraCitaAll($tabla, $item, $valor)
	{

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);

			$stmt->execute();

			return $stmt->fetchAll();
		} else {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

			$stmt->execute();

			return $stmt->fetchAll();
		}

		$stmt->close();

		$stmt = null;
	}



	/*=============================================
				MOSTRAR CITA DE UN MEDICO
	=============================================*/

	static public function mdlMostrasCitaMedico($valor) {

		/* $stmt = Conexion::conectar() -> prepare("SELECT c.id, c.inicio, c.fin, c.id_paciente,  p.nombre FROM citas c, pacientes p WHERE c.estado=1 and c.id_paciente= p.id and c.id_medico=$valor;"); */

		/* $stmt = Conexion::conectar() -> prepare("SELECT c.id, c.inicio, c.fin, c.id_paciente,  p.nombres FROM citas c, paciente p WHERE c.estado=1 and c.id_paciente= p.idpaciente and c.id_medico=$valor;"); */
		$stmt = Conexion::conectar() -> prepare("SELECT c.id, c.inicio, c.fin, c.id_mascota,  m.nombre FROM citas c, mascota m WHERE c.estado=1 and c.id_mascota= m.id and c.id_usuario_v=$valor;");
		$stmt -> execute();

		return $stmt -> fetchAll();
		
		$stmt -> close();

		$stmt = null;
	}

	/*=============================================
	MOSTRAR EDAD Cita
	=============================================*/

    static public function mdlMostrarEdadCita($tabla, $item, $valor){

		

        //$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item AND fecha = date(NOW()) AND estado = 1");

    
    	$stmt = Conexion::conectar()->prepare("SELECT YEAR(now())-YEAR(fechaNacimiento)as fechaNacimiento FROM $tabla where idCita = $item");


        //$stmt -> bindParam(":".$items, $valor, PDO::PARAM_STR);

        $stmt -> execute();

        return $stmt -> fetchAll();


        $stmt -> close();
       
       $stmt = null;

}

	/*=============================================
	MOSTRAR EDAD Cita
	=============================================*/

    static public function mdlMostrarTotalCita($tabla, $item, $valor){

		

        //$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item AND fecha = date(NOW()) AND estado = 1");

    
    $stmt = Conexion::conectar()->prepare("SELECT COUNT(idCita) as TOTAL_Citas FROM $tabla");


        //$stmt -> bindParam(":".$items, $valor, PDO::PARAM_STR);

        $stmt -> execute();

        return $stmt -> fetchAll();


        $stmt -> close();
       
       $stmt = null;

}

	/*=============================================
	EDITAR Cita
	=============================================*/

	static public function mdlEditarCita($tabla, $datos)
	{

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET documento = :documento, nombres = :nombres, apellidos = :apellidos, telefono = :telefono,direccion = :direccion, sexo = :sexo ,fechaNacimiento = :fechaNacimiento WHERE idCita= :idCita");

		$stmt->bindParam(":idCita", $datos["idCita"], PDO::PARAM_INT);
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
	ELIMINAR Cita
	=============================================*/

	static public function mdlEliminarCita($tabla, $datos)
	{

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :idCita");

		$stmt->bindParam(":idCita", $datos, PDO::PARAM_INT);

		if ($stmt->execute()) {

			return "ok";
		} else {

			return "error";
		}

		$stmt->close();

		$stmt = null;
	}
}
