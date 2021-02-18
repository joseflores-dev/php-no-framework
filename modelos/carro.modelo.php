<?php
require_once "conexion.php";
class ModeloCarro{

    static public function Leer(){
        $stmt = Conexion::conectar()->prepare("select max(id) as max from ventas");
        $stmt -> execute();
        return $stmt -> fetchAll();
    }

    static public function traerTodos($status){
        $stmt = Conexion::conectar()->prepare("select * from ventas where status = $status");
        $stmt -> execute();
        return $stmt -> fetchAll();
    }

    static public function traerDetalleBoleta($datos){
        $stmt = Conexion::conectar()->prepare("select a.id,a.cantidad,a.total,b.nombre,b.precio as precio_producto from detalle_ventas a join productos b 
        on(a.id_producto=b.id) where id_venta = :id");
        $stmt->bindParam(":id", $datos["id"], PDO::PARAM_STR);
        $stmt -> execute();
        return $stmt -> fetchAll();
    }

    static public function guardar($datos){
		$stmt = Conexion::conectar()->prepare("INSERT INTO ventas(id,precio_total, cantidad_total,status)
         VALUES (:id,:precio_total, :cantidad_total,:status)");
	
		$stmt->bindParam(":precio_total", $datos["precio_total"], PDO::PARAM_STR);
        $stmt->bindParam(":cantidad_total", $datos["cantidad_total"], PDO::PARAM_STR);
        $stmt->bindParam(":id", $datos["numero"], PDO::PARAM_STR);
        $stmt->bindParam(":status", $datos["status"], PDO::PARAM_STR);
       

		if($stmt->execute()){
			return "ok";	
		}else{
			return "error";
	
		}
		$stmt->close();
		$stmt = null;

    }

    static public function guardarEnvio($datos){
		$stmt = Conexion::conectar()->prepare("INSERT INTO envios(fecha, id_usuario)
         VALUES (:fecha, :id_usuario)");

		
		$stmt->bindParam(":fecha", $datos["fechaEnvio"], PDO::PARAM_STR);
        $stmt->bindParam(":id_usuario", $datos["id_usuario"], PDO::PARAM_STR);
     

		if($stmt->execute()){

			return "ok";	

		}else{

			return "error";
		
		}

		$stmt->close();
		
		$stmt = null;



    }

    static public function guardarDetalle($datos){
        $stmt = Conexion::conectar()->prepare("INSERT INTO detalle_ventas(id_producto, id_venta,total,cantidad)
        VALUES (:id_producto, :id_venta,:total,:cantidad)");

       
       $stmt->bindParam(":id_producto", $datos["id_producto"], PDO::PARAM_STR);
       $stmt->bindParam(":id_venta", $datos["id_venta"], PDO::PARAM_STR);
       $stmt->bindParam(":total", $datos["total"], PDO::PARAM_STR);
       $stmt->bindParam(":cantidad", $datos["cantidad"], PDO::PARAM_STR);
     

       if($stmt->execute()){

           return "ok";	

       }else{

           return "error";
       
       }

       $stmt->close();
       
       $stmt = null;


    }

    static public function descontar($datos){

       
		$stmt = Conexion::conectar()->prepare("UPDATE productos SET stock = :CANTIDAD WHERE id = :ID");

		$stmt -> bindParam(":CANTIDAD", $datos["cantidad"], PDO::PARAM_INT);
		$stmt -> bindParam(":ID", $datos["id_producto"], PDO::PARAM_STR);
	
		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

        $stmt = null;
        
    }

  
    static public function envio($datos){
        $stmt = Conexion::conectar()->prepare("INSERT INTO envios(fecha, id_usuario) VALUES (:fecha, :id_usuario)");

       
       $stmt->bindParam(":fecha", $datos["fecha"], PDO::PARAM_STR);
       $stmt->bindParam(":id_usuario", $datos["id_usuario"], PDO::PARAM_STR);
    

       if($stmt->execute()){

           return "ok";	

       }else{

           return "error";
       
       }

       $stmt->close();
       
       $stmt = null;
    }

    public function actualizarVenta($id){
        $stmt = Conexion::conectar()->prepare("UPDATE ventas SET status = 0 WHERE id = :ID");
		$stmt -> bindParam(":ID", $id, PDO::PARAM_STR);
		if($stmt -> execute()){
			return "ok";
		}else{
			return "error";	
		}
		$stmt -> close();
        $stmt = null;
    }

    public function actualizarDetalle($array){
        $stmt = Conexion::conectar()->prepare("UPDATE detalle_ventas SET cantidad = :cantidad,total = :total WHERE id = :ID");
        $stmt -> bindParam(":ID", $array["id"], PDO::PARAM_STR);
        $stmt -> bindParam(":cantidad", $array["cantidad"], PDO::PARAM_STR);
        $stmt -> bindParam(":total", $array["total"], PDO::PARAM_STR);
		if($stmt -> execute()){
			return "ok";
		}else{
			return "error";	
		}
		$stmt -> close();
        $stmt = null;
    }
    
}
