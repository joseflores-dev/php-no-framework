<?php 

//Modelos
require_once "modelos/conexion.php";
require_once "modelos/usuarios.modelo.php";
require_once "modelos/carro.modelo.php";
require_once "modelos/productos.modelo.php";
require_once "modelos/categorias.modelo.php";

//Controladores
require_once "controladores/plantilla.controlador.php";
require_once "controladores/usuarios.controlador.php";
require_once "controladores/carro.controlador.php";
require_once "controladores/productos.controlador.php";
require_once "controladores/categorias.controlador.php";





$plantilla = new ControladorPlantilla();
$plantilla::ctrPlantilla();


?>