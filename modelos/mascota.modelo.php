<?php

require_once "conexion.php";

class ModeloMascota
{


    /*=============================================
                    MOSTRAR MASCOTA
    =============================================*/
    static public function mdlMostrarMascota($tabla, $item, $valor)
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
                    AGREGAR MASCOTA
    =============================================*/
    static public function mdlIngresarMascota($tabla, $datos)
    {

        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(id_cliente, nombre, sexo, raza, especie, fechanacimiento) VALUES (:id_cliente, :nombre, :sexo, :raza, :especie, :fechanacimiento)");

        $stmt->bindParam(":id_cliente", $datos["id_cliente"], PDO::PARAM_INT);
        $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $stmt->bindParam(":sexo", $datos["sexo"], PDO::PARAM_STR);
        $stmt->bindParam(":raza", $datos["raza"], PDO::PARAM_STR);
        $stmt->bindParam(":especie", $datos["especie"], PDO::PARAM_STR);
        $stmt->bindParam(":fechanacimiento", $datos["fechanacimiento"], PDO::PARAM_STR);

        if ($stmt->execute()) {

            return "ok";
        } else {

            return "error";
        }

        $stmt->close();
        $stmt = null;
    }

    /*=============================================
                    EDITAR MASCOTA
    =============================================*/
    static public function mdlEditarMascota($tabla, $datos)
    {

        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :nombre, sexo = :sexo, raza = :raza, especie = :especie, fechanacimiento = :fechanacimiento WHERE id = :id");

        $stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);
        $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $stmt->bindParam(":sexo", $datos["sexo"], PDO::PARAM_STR);
        $stmt->bindParam(":raza", $datos["raza"], PDO::PARAM_STR);
        $stmt->bindParam(":especie", $datos["especie"], PDO::PARAM_STR);
        $stmt->bindParam(":fechanacimiento", $datos["fechanacimiento"], PDO::PARAM_STR);

        if ($stmt->execute()) {

            return "ok";
        } else {

            return "error";
        }

        $stmt->close();

        $stmt = null;
    }

    /*=============================================
    BORRAR CATEGORIA
    =============================================*/

    static public function mdlBorrarMascota($tabla, $datos)
    {

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

    static public function listarMascotasPorCliente($id_cliente)
    {
        $stmt = Conexion::conectar()->prepare("SELECT * FROM mascota WHERE id_cliente = :id_cliente");
        $stmt->bindParam(":id_cliente", $id_cliente, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);

        $stmt->close();
        $stmt = null;
    }
}
