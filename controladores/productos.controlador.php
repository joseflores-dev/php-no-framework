<?php

class ControladorProductos{

    static public function ctrTraerProductos(){
        $productos = ModeloProductos::mdlTraerProductos();
        return $productos;
    }

    static public function ctrContarProductos(){
        $cantidad = ModeloProductos::mdlContarProductos();
        return $cantidad;
    }


    static public function ctrSeleccionarProducto($id){
        $producto = ModeloProductos::mdlSeleccionarProducto($id);
        return $producto;
    }

    static public function ctrAgregarProducto(){

        if (isset($_POST["Nombre"]) && isset($_POST["Precio"]) && isset($_POST["Stock"])
        && isset($_POST["Descripcion"]) && isset($_FILES["Foto"]["tmp_name"])) {

            

            list($ancho, $alto) = getimagesize($_FILES["Foto"]["tmp_name"]);

            $nuevoAncho = 500;
            $nuevoAlto = 500;

            /*=============================================
            CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL USUARIO
            =============================================*/
            
            $directorio = "vistas/assets/images/productos/";
             
            /*=============================================
            PRIMERO PREGUNTAMOS SI EXISTE OTRA IMAGEN EN LA BD
            =============================================*/
            /*
            if (!empty($_POST["Foto"])) {

                unlink($_POST["Foto"]);
            } else {

                mkdir($directorio, 0755);
            }   
            */
            /*=============================================
            DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
            =============================================*/

            if ($_FILES["Foto"]["type"] == "image/jpeg") {

                /*=============================================
                GUARDAMOS LA IMAGEN EN EL DIRECTORIO
                =============================================*/

                $aleatorio = mt_rand(100, 999);

                $ruta = "vistas/assets/images/productos/". $_POST["Nombre"].".jpg";

                $origen = imagecreatefromjpeg($_FILES["Foto"]["tmp_name"]);

                $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

                imagejpeg($destino, $ruta);
            }

            if ($_FILES["Foto"]["type"] == "image/png") {

                /*=============================================
                GUARDAMOS LA IMAGEN EN EL DIRECTORIO
                =============================================*/

                $aleatorio = mt_rand(100, 999);

                $ruta = "vistas/images/productos/".$_POST["Nombre"].".png";

                $origen = imagecreatefrompng($_FILES["Foto"]["tmp_name"]);

                $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

                imagepng($destino, $ruta);
            }

            $array = Array("Nombre"=>$_POST["Nombre"],"Descripcion"=>$_POST["Descripcion"],
            "Precio"=>$_POST["Precio"],"Stock"=>$_POST["Stock"],"Foto"=>$ruta);

            var_dump($array);
       
        }else{
            /*Mensaje alerta falta rellenar nombre*/
        }
    }

}