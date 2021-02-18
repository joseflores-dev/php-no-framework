<?php



class ControladorCategorias{

    static public function ctrAgregarCategoria(){
        if (isset($_POST["descripcion"])) {
            $respuesta = ModeloCategorias::mdlAgregarCategoria($_POST["descripcion"]);
            if($respuesta == "ok"){
                echo '<script>

                swal({

                    type: "success",
                    title: "¡Categoria Registrada correctamente!",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar"

                }).then(function(result){
                    if(result.value){
                        window.location = "admin-categorias";
                    }
                });
            

                </script>';
            }else{

            }
        }
    }

    static public function ctrTraerCategorias($id){
        $categorias = ModeloCategorias::mdlTraerCategorias($id);
        return $categorias;
    }

    static public function ctrEditarCategoria(){
        if (isset($_POST["EditarCategoria"])) {
      
            $respuesta = ModeloCategorias::mdlEditarCategoria($_POST["EditarCategoria"],$_SESSION["id_categoria"]);
            if ($respuesta == "ok") {
                unset($_SESSION["id_categoria"]);
                
                echo '<script>

                swal({

                    type: "success",
                    title: "¡Categoria Registrada correctamente!",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar"

                }).then(function(result){
                    if(result.value){
                        window.location = "admin-categorias";
                    }
                });
            

                </script>';
            }
        }
    }

}