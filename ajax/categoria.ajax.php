<?php
require_once "../controladores/categorias.controlador.php";
require_once "../modelos/categorias.modelo.php";


class AjaxCategoria{

    public function ajaxTraerCategoria($id){
        session_start();
        
        $respuesta = ControladorCategorias::ctrTraerCategorias($id);
        $_SESSION["id_categoria"] = $respuesta["id"];
        echo json_encode($respuesta);
    }

}


if (isset($_POST["traerCategoria"])) {
    $categoria = new AjaxCategoria();
    $categoria->ajaxTraerCategoria($_POST["traerCategoria"]);
}