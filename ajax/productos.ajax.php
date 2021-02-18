<?php

require_once "../controladores/productos.controlador.php";
require_once "../modelos/productos.modelo.php";

class AjaxProductos{

	/*=============================================
	EDITAR CATEGORÍA
	=============================================*/	

	public $numero;
	public $id;
	public $aumentoID;

	public function ajaxTraerProducto(){
		
		$id = $this->id;
		$datos = ControladorProductos::ctrSeleccionarProducto($id);
		echo json_encode($datos);
	}

	public function ajaxEliminar(){
		$valor = $this->numero;
		session_start();
		$found = false;
		$id = $valor;
		foreach ($_SESSION["cart"] as $key => $value) {
			if ($value["ID"] == $id) {
				$found = true;
				$numero = $key;
				break;	
			}
		}
		if ($found) 
		{
			
			unset($_SESSION["cart"][$numero]);
			$_SESSION["cart"] = array_values($_SESSION["cart"]);
			echo $found;
			
		}
		
		
	}
	public function ajaxAumentar(){
		$id = $this->aumentoID;

		$found = false;
		session_start();
		foreach ($_SESSION["cart"] as $key => $value) {
			if ($value["ID"] == $id) {

				$found = true;
				$numero = $key;
				break;
				
			}
		}
		if ($found) {
			
			$_SESSION["cart"][$numero]["CANTIDAD"] = $_SESSION["cart"][$numero]["CANTIDAD"] + 1;
			
			$SUBTOTAL =  $_SESSION["cart"][$numero]["CANTIDAD"]*$_SESSION["cart"][$numero]["PRECIO"];
			$total = 0;
			$cantidad = 0;
			foreach ($_SESSION["cart"] as $key => $value) {
	
				$total += $value["PRECIO"] * $value["CANTIDAD"];
				$cantidad += $value["CANTIDAD"];
			}
			$datos = array("CANTIDAD"=>$_SESSION["cart"][$numero]["CANTIDAD"],"SUBTOTAL"=>$SUBTOTAL,"TOTAL"=>$total
				,"CANTIDADTOTAL"=>$cantidad);
			echo json_encode($datos);
			
		}else{
			echo $_SESSION["cart"][$numero]["CANTIDAD"];
		}
		
	

	}
	
	public function ajaxReducir(){
		$id = $this->id;
		$found = false;
		session_start();
		foreach ($_SESSION["cart"] as $key => $value) {
			if ($value["ID"] == $id) {

				$found = true;
				$numero = $key;
				break;
				
			}
		}
		if ($found) {
			if ($_SESSION["cart"][$numero]["CANTIDAD"] >= 2) {
				$_SESSION["cart"][$numero]["CANTIDAD"] = $_SESSION["cart"][$numero]["CANTIDAD"] - 1;
				$total = 0;
				$cantidad = 0;
				foreach ($_SESSION["cart"] as $key => $value) {
		
					$total += $value["PRECIO"] * $value["CANTIDAD"];
					$cantidad += $value["CANTIDAD"];
				}
				
				$SUBTOTAL =  $_SESSION["cart"][$numero]["CANTIDAD"]*$_SESSION["cart"][$numero]["PRECIO"];
				$datos = array("CANTIDAD"=>$_SESSION["cart"][$numero]["CANTIDAD"],"SUBTOTAL"=>$SUBTOTAL,"TOTAL"=>$total
				,"CANTIDADTOTAL"=>$cantidad);
				echo json_encode($datos);
				
			
			}else if ($_SESSION["cart"][$numero]["CANTIDAD"] == 1){
				$SUBTOTAL =  $_SESSION["cart"][$numero]["CANTIDAD"]*$_SESSION["cart"][$numero]["PRECIO"];
				$datos = array("CANTIDAD"=>$_SESSION["cart"][$numero]["CANTIDAD"],"SUBTOTAL"=>$SUBTOTAL);
				echo json_encode($datos);	
			}
			
		}
		
	}
}

/*=============================================
EDITAR CATEGORÍA
=============================================*/	
if(isset($_POST["numero"])){

	$producto = new AjaxProductos();
	$producto->numero = $_POST["numero"];
	$producto->ajaxEliminar();
}

if(isset($_POST["id"])){

	$producto = new AjaxProductos();
	$producto->id = $_POST["id"];
	$producto->ajaxReducir();
}

if(isset($_POST["aumentoID"])){
	$producto = new AjaxProductos();
	$producto->aumentoID = $_POST["aumentoID"];
	$producto->AjaxAumentar();
}

if(isset($_POST["traerProducto"])){
	$producto = new AjaxProductos();
	$producto->id = $_POST["traerProducto"];
	$producto->ajaxTraerProducto();
}

?>