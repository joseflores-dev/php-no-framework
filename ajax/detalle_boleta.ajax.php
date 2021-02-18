<?php

require_once "../controladores/carro.controlador.php";
require_once "../modelos/carro.modelo.php";

class AjaxProductos{
    
    public function aumentarCantidad($aumentar,$producto){
        session_start();
        $numero = 0;
        $found = false;
        foreach($_SESSION["detalle_boleta"] as $index => $item){
            if($item["id"] == $producto){
                $numero = $index;
                $found = true;
                break;
            }
        }
        if($found){
            $_SESSION["detalle_boleta"][$numero]["cantidad"] +=1;
            $cantidad =  $_SESSION["detalle_boleta"][$numero]["cantidad"];
            $_SESSION["detalle_boleta"][$numero]["total"] = $_SESSION["detalle_boleta"][$numero]["precio_producto"]*$cantidad;
            $total = $_SESSION["detalle_boleta"][$numero]["total"];
            $array = array("cantidad"=>$cantidad,"total"=>$total);
            echo json_encode($array);
        }
    }
    public function restarCantidad($aumentar,$producto){
        session_start();
        $numero = 0;
        $found = false;
        foreach($_SESSION["detalle_boleta"] as $index => $item){
            if($item["id"] == $producto){
                $numero = $index;
                $found = true;
                break;
            }
        }
        if($found){
            $_SESSION["detalle_boleta"][$numero]["cantidad"] -=1;
            if($_SESSION["detalle_boleta"][$numero]["cantidad"] == 0){
                $_SESSION["detalle_boleta"][$numero]["cantidad"] = 1;
            }
            $cantidad =  $_SESSION["detalle_boleta"][$numero]["cantidad"];
            $_SESSION["detalle_boleta"][$numero]["total"] = $_SESSION["detalle_boleta"][$numero]["precio_producto"]*$cantidad;
            $total = $_SESSION["detalle_boleta"][$numero]["total"];
            $array = array("cantidad"=>$cantidad,"total"=>$total);
            echo json_encode($array);
        }
    }
}


if(isset($_POST["aumentar"])){
    $obj = new AjaxProductos();
    $obj->aumentarCantidad($_POST["aumentar"],$_POST["producto"]);
}

if(isset($_POST["restar"])){
    $obj = new AjaxProductos();
    $obj->restarCantidad($_POST["restar"],$_POST["producto"]);
}
