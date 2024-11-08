<?php

require_once "conexion.php";

class ModeloVacunacion
{
    /*=============================================
                    MOSTRAR VACUNACION
    =============================================*/
    static public function mdlMostrarVacunacion()
    {
        $stmt = Conexion::conectar()->prepare("SELECT v.*, m.id_cliente
            FROM vacunacion v
            JOIN mascota m on v.id_mascota = m.id");

        $stmt->execute();

        return $stmt->fetchAll();

        $stmt->close();
        $stmt = null;
    }

    static public function buscarPorId($idVacunacion)
    {
        $stmt = Conexion::conectar()->prepare(
            "SELECT v.*, m.id_cliente
         FROM vacunacion v
         JOIN mascota m ON v.id_mascota = m.id
         WHERE v.id = :idVacunacion"
        );

        $stmt->bindParam(":idVacunacion", $idVacunacion, PDO::PARAM_INT);
        $stmt->execute();

        $resultado = $stmt->fetch();
        return $resultado;
    }

    /*=============================================
                    AGREGAR VACUNACIÓN
    =============================================*/
    static public function mdlIngresarVacunacion($tabla, $datos)
    {

        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(fecha_vacunacion, id_vacuna, id_mascota, id_veterinario) 
                                            VALUES (:fecha_vacunacion, :id_vacuna, :id_mascota, :id_veterinario)");

        $stmt->bindParam(":fecha_vacunacion", $datos["fecha_vacunacion"], PDO::PARAM_STR);
        $stmt->bindParam(":id_vacuna", $datos["id_vacuna"], PDO::PARAM_INT);
        $stmt->bindParam(":id_mascota", $datos["id_mascota"], PDO::PARAM_INT);
        $stmt->bindParam(":id_veterinario", $datos["id_veterinario"], PDO::PARAM_INT);


        if ($stmt->execute()) {

            return "ok";
        } else {

            return "error";
        }

        $stmt->close();
        $stmt = null;
    }

    /*=============================================
                    EDITAR VACUNACIÓN
    =============================================*/
    static public function mdlEditarVacunacion($tabla, $datos)
    {
        try {

            $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET fecha_vacunacion = :fecha_vacunacion, id_vacuna = :id_vacuna, id_mascota = :id_mascota, id_veterinario = :id_veterinario WHERE id = :id");

            $stmt->bindParam(":fecha_vacunacion", $datos["fecha_vacunacion"], PDO::PARAM_STR);
            $stmt->bindParam(":id_vacuna", $datos["id_vacuna"], PDO::PARAM_INT);
            $stmt->bindParam(":id_mascota", $datos["id_mascota"], PDO::PARAM_INT);
            $stmt->bindParam(":id_veterinario", $datos["id_veterinario"], PDO::PARAM_INT);
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
                BORRAR VACUNACIÓN
    =============================================*/
    static public function mdlBorrarVacunacion($tabla, $datos)
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

    /*=============================================
    RANGO FECHAS
    =============================================*/

    static public function mdlEntreFechasVacunaciones($tabla, $fechaInicial, $fechaFinal)
    {
        $stmt = Conexion::conectar()
            ->prepare("SELECT M.nombre AS mascota,
            CONCAT(C.nombre, ' ', C.apellido) AS cliente,
            M.especie AS especie, 
            UV.nombre AS veterinario, 
            TV.nombre AS tipo_vacuna, 
            V.fecha_vacunacion 
            FROM vacunacion V 
            INNER JOIN mascota M ON V.id_mascota = M.id
            INNER JOIN cliente C ON M.id_cliente = C.id 
            INNER JOIN tipo_vacuna TV ON V.id_vacuna = TV.id 
            INNER JOIN usuario_v UV ON V.id_veterinario = UV.id 
            WHERE V.fecha_vacunacion >= '$fechaInicial' 
            AND V.fecha_vacunacion < DATE_ADD('$fechaFinal', INTERVAL 1 DAY) ORDER BY V.fecha_vacunacion ASC");

        $stmt->execute();

        return $stmt->fetchAll();

        $stmt->close();

        $stmt = null;
    }
}
