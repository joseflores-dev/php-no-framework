<?php
class ControladorCarro
{
    


    static public function envios()
    {
        if (isset($_POST["valorEntrega"])) {
            if ($_POST["valorEntrega"] == "des") {
                $datos = array(
                    "fechaEnvio" => $_POST["fechaEnvio"],
                    "id_usuario" => $_SESSION["id"]
                );

                $respuesta = ModeloCarro::guardarEnvio($datos);

                if ($respuesta == "ok") {
                    echo '<script>
					swal({
						type: "success",
						title: "¡Su venta ha finalizado con éxito!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"
					}).then(function(result){
						if(result.value){
							window.location = "inicio";
						}
					});
					</script>';
                } else {
                    echo 'se cayó y se hecho a perder';
                }
            }else{
                echo '<script>
                swal({
                    type: "success",
                    title: "¡Su venta ha finalizado con éxito!",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar"
                }).then(function(result){
                    if(result.value){
                        window.location = "inicio";
                    }
                });
                </script>';
            }
        }
    }

    public static function agregarVenta()
    {
        $total = 0;
        $cantidad = 0;
        foreach ($_SESSION["cart"] as $key => $value) {

            $total += $value["PRECIO"] * $value["CANTIDAD"];
            $cantidad += $value["CANTIDAD"];
        }
        if (isset($_POST["ventaOK"])) {
            if (isset($_POST["nroVenta"])) {
                $datos = array(
                    "precio_total" => $total, "cantidad_total" => $cantidad, "numero" => $_POST["nroVenta"],
                    "status" => 1
                );
                $respuesta = ModeloCarro::guardar($datos);
                if ($respuesta == "ok") {
                    foreach ($_SESSION["cart"] as $key => $value) {
                        $array = array(
                            "id_producto" => $value["ID"], "id_venta" => $_POST["nroVenta"], "total" => $value["PRECIO"] * $value["CANTIDAD"],
                            "cantidad" => $value["CANTIDAD"]
                        );

                        $guardarDetalle = ModeloCarro::guardarDetalle($array);

                        if ($guardarDetalle == "ok") {
                            $descontarProductos = ModeloCarro::descontar($array);
                            if ($descontarProductos == "ok") {
                                var_dump($array);
                                echo "<script>alert(1)</script>";
                                /*
                                unset($_SESSION["cart"]);
                                echo '<script>
                                window.location = "demo"
                                </script>';
                                */
                            }else{
                                var_dump("fail");
                            }
                        }
                    }
                 
                } else { }
            } else { }
        } else { }
    }
    public function aprobarBoleta(){
        if(isset($_POST["aprobarBoleta"])){
            if ($_POST["aprobarBoleta"] == "SI") {
               foreach ($_SESSION["detalle_boleta"] as $key => $value) {
                $obj = new ModeloCarro();
                $array = array($value["id"],$value["cantidad"],$value["total"]);
                $obj = $obj->actualizarDetalle($array);
               }
               $obj = new ModeloCarro();
               $obj = $obj->actualizarVenta($_GET["boleta"]);
               if($obj){
                echo '<script>
                swal({
                    type: "success",
                    title: "¡Su venta ha finalizado con éxito!",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar"
                }).then(function(result){
                    if(result.value){
                        window.location = "admin-boletas-pendientes";
                    }
                });
                </script>';
               }

              
            }else{
               $obj = new ModeloCarro();
               $obj = $obj->actualizarVenta($_GET["boleta"]);
               if($obj){
                echo '<script>
                swal({
                    type: "success",
                    title: "¡Su venta ha finalizado con éxito!",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar"
                }).then(function(result){
                    if(result.value){
                        window.location = "admin-boletas-pendientes";
                    }
                });
                </script>';
               }
            }
        }
    }
}
