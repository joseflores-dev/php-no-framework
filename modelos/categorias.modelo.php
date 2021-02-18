<?php

require_once "conexion.php";

class ModeloCategorias{

    static public function mdlAgregarCategoria($descripcion){
        $stmt = Conexion::conectar()->prepare("INSERT INTO categorias(descripcion)
        VALUES (:descripcion)");

       
       $stmt->bindParam(":descripcion", $descripcion, PDO::PARAM_STR);
  
       if($stmt->execute()){

           return "ok";	

       }else{

           return "error";
       
       }

       $stmt->close();
       
       $stmt = null;
    }

    static public function mdlTraerCategorias($id){
        if($id == null){
            $stmt = Conexion::conectar()->prepare("SELECT * FROM categorias");

            $stmt -> execute();

            return $stmt -> fetchAll();

            $stmt -> close();

            $stmt = null;

        }else{
            $stmt = Conexion::conectar()->prepare("SELECT * FROM categorias where id = $id");

            $stmt -> execute();

            return $stmt -> fetch();

            $stmt -> close();

            $stmt = null;
        }
    }

    static public function mdlEditarCategoria($descripcion,$id){
	
		$stmt = Conexion::conectar()->prepare("UPDATE CATEGORIAS SET descripcion = :descripcion where id = :id");

		$stmt -> bindParam(":descripcion", $descripcion, PDO::PARAM_STR);
		$stmt -> bindParam(":id", $id, PDO::PARAM_STR);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}
}