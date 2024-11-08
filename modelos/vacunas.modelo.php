<?php

require_once "conexion.php";

class ModeloVacunas
{
    /*=============================================
                    MOSTRAR VACUNA
    =============================================*/
    static public function mdlMostrarVacuna($tabla, $item, $valor) {

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
                    AGREGAR VACUNA
    =============================================*/
    static public function mdlIngresarVacuna($tabla, $datos) {

        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre) VALUES (:nombre)");

        $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
    
        if ($stmt->execute()) {

            return "ok";

        } else {

            return "error";

        }

        $stmt->close();
        $stmt = null;

    }

    /*=============================================
                    EDITAR VACUNA
    =============================================*/
    static public function mdlEditarVacuna($tabla, $datos) {
        try {
            
            $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :nombre WHERE id = :id");

            $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
            $stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);

            if ($stmt->execute()) {
                return "ok";
            } else {
                return "error";
            }

        } catch (PDOException $e) {
            return "error: " . $e->getMessage();
        } finally {
            if ($stmt) {
                $stmt->closeCursor();
            }
            $stmt = null;
        }
    }

    /*=============================================
                BORRAR VACUNA
    =============================================*/
    static public function mdlBorrarVacuna($tabla, $datos) {

        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");

        $stmt->bindParam(":id", $datos, PDO::PARAM_INT);

        if ($stmt->execute()) {

            return "ok";

        } else {

            return "error";

        }

        $stmt->close();

        $stmt = null;

    }



}