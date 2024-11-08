<?php

require_once "conexion.php";

class ModeloPagos{

    /*=============================================
                        MOSTRAR PAGOS
    =============================================*/

    static public function mdlMostrarPagos($tabla, $item, $valor){

        if ($item != null) {

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item ORDER BY idpagoservicio ASC");

            $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

            $stmt -> execute();

            return $stmt -> fetch();

        } else {

            $stmt = Conexion::conectar() -> prepare("SELECT * FROM $tabla ORDER BY idpagoservicio  ASC");

            $stmt -> execute();

            return $stmt -> fetchAll();

        }

        $stmt -> close();

        $stmt = null;

    }

    /*=============================================
                    REGISTRO DE PAGO
    =============================================*/

    static public function mdlIngresarPagos($tabla, $datos){

        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(numeroPago, idcajera, idmedico, idcliente, total, metodo_pago, fecha) VALUES (:numeroPago, :idcajera, :idmedico, :idcliente, :total, :metodo_pago, :fecha)");

        $stmt->bindParam(":numeroPago", $datos["numeroPago"], PDO::PARAM_INT);
        $stmt->bindParam(":idcajera", $datos["idcajera"], PDO::PARAM_INT);
        $stmt->bindParam(":idmedico", $datos["idmedico"], PDO::PARAM_INT);
        $stmt->bindParam(":idcliente", $datos["idcliente"], PDO::PARAM_INT);
        $stmt->bindParam(":total", $datos["total"], PDO::PARAM_STR);
        $stmt->bindParam(":metodo_pago", $datos["metodo_pago"], PDO::PARAM_STR);
        $stmt->bindParam(":fecha", $datos["fecha"], PDO::PARAM_STR);

        if($stmt->execute()){

            return "ok";

        }else{

            return "error";

        }

        $stmt->close();
        $stmt = null;

    }

    static public function mdlIngresarDetallePago($tabla, $datos){

        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(id_pago_servicio, id_servicio, cantidad, precio) VALUES (:id_pago_servicio, :id_servicio, :cantidad, :precio)");

        $stmt->bindParam(":id_pago_servicio", $datos["id_pago_servicio"], PDO::PARAM_INT);
        $stmt->bindParam(":id_servicio", $datos["id_servicio"], PDO::PARAM_INT);
        $stmt->bindParam(":cantidad", $datos["cantidad"], PDO::PARAM_INT);
        $stmt->bindParam(":precio", $datos["precio"], PDO::PARAM_STR);


        if($stmt->execute()){

            return "ok";

        }else{

            return "error";

        }

        $stmt->close();
        $stmt = null;

    }

    /*=============================================
    RANGO FECHAS
    =============================================*/	

    static public function mdlEntreFechasPagos($tabla, $fechaInicial, $fechaFinal){


        $stmt = Conexion::conectar()->prepare("SELECT PS.idpagoservicio, PS.numeroPago, CONCAT(C.nombre,' ', C.apellido) AS cliente, U.nombre as secretaria, V.nombre as veterinario, PS.fecha, PS.total FROM pago_servicio PS INNER JOIN cliente C ON PS.idcliente = C.id INNER JOIN usuario_v U ON PS.idcajera = U.id INNER JOIN usuario_v V ON PS.idmedico = V.id where PS.fecha >= '$fechaInicial' AND PS.fecha < DATE_ADD('$fechaFinal', INTERVAL 1 DAY) ORDER BY PS.fecha ASC");


        $stmt -> execute();

        return $stmt -> fetchAll();	

        $stmt -> close();

        $stmt = null;

    }

}