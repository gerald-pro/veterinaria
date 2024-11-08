<?php

require_once "conexion.php";

class ModeloServicio
{

    static public function mdlMostrarServicio($tabla, $item, $valor)
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

    static public function buscarPorId($id)
    {
        $stmt = Conexion::conectar()->prepare(
            "SELECT *
         FROM servicio
         WHERE idservicio = :idservicio"
        );

        $stmt->bindParam(":idservicio", $id, PDO::PARAM_INT);
        $stmt->execute();
        $error = $stmt->errorInfo();
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

        return $resultado;
    }

    static public function mdlIngresarServicio($tabla, $datos)
    {

        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre, precio) VALUES (:nombre, :precio)");


        $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $stmt->bindParam(":precio", $datos["precio"], PDO::PARAM_STR);


        if ($stmt->execute()) {

            return "ok";
        } else {

            return "error";
        }

        $stmt->close();
        $stmt = null;
    }

    /*=============================================
    EDITAR CLIENTE
    =============================================*/
    static public function mdlEditarServicio($tabla, $datos)
    {
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :nombre, precio = :precio WHERE idservicio = :id");

        $stmt->bindParam(":id", $datos["idservicio"], PDO::PARAM_INT);
        $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $stmt->bindParam(":precio", $datos["precio"], PDO::PARAM_STR);


        if ($stmt->execute()) {
            return "ok";
        } else {
            $error = $stmt->errorInfo();
            return $error[2];
        }

        $stmt->close();
        $stmt = null;
    }

    /*=============================================
    BORRAR CATEGORIA
    =============================================*/

    static public function mdlBorrarServicio($datos)
    {
        $stmt = Conexion::conectar()->prepare("DELETE FROM servicio WHERE idservicio = :id");
        $stmt->bindParam(":id", $datos, PDO::PARAM_INT);

        if ($stmt->execute()) {
            return "ok";
        } else {
            $error = $stmt->errorInfo();
            return $error[2];
        }

        $stmt->close();

        $stmt = null;
    }

    static public function mdlMostrarDetalleServicios($item, $valor, $orden)
    {

        $stmt = Conexion::conectar()->prepare("SELECT s.nombre, d.cantidad as cantidad, d.precio, (d.cantidad * d.precio) as total FROM detalle_pago_o_servicio d INNER JOIN servicio s ON d.id_servicio = s.idservicio WHERE d.id_pago_servicio= :$item");

        $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);

        $stmt->execute();

        return $stmt->fetchAll();

        $stmt->close();

        $stmt = null;
    }
}
