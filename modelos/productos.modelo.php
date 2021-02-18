<?php
require_once "conexion.php";

class ModeloProductos{

    static public function mdlTraerProductos(){

        $stmt = Conexion::conectar()->prepare("SELECT * FROM productos");

		$stmt -> execute();

		return $stmt -> fetchAll();
    }

    static public function mdlSeleccionarProducto($id){

        $stmt = Conexion::conectar()->prepare("SELECT * FROM productos WHERE id = $id");

		$stmt -> execute();

		return $stmt -> fetch();
    }

    static public function mdlContarProductos(){

        $stmt = Conexion::conectar()->prepare("SELECT COUNT(*) FROM productos");

		$stmt -> execute();

		return $stmt -> fetch();
    }



}