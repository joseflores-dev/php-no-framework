
$(".restarCantidadCompra").click(function(){
    var id = $(this).attr("id");
    var datos = new FormData();
    datos.append("id",id);
    $.ajax({
        url: "ajax/productos.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (respuesta) {
        
            $(".cantidadNueva"+id).html(respuesta["CANTIDAD"]);
            $(".nuevoSubTotal"+id).html("$"+respuesta["SUBTOTAL"].toLocaleString());
            $(".nuevaCantidadTotal").html(respuesta["CANTIDADTOTAL"]);
            $(".nuevoTotalFinal").html("$"+respuesta["TOTAL"].toLocaleString());
            
            if (respuesta["CANTIDAD"] == 1) {
                swal("Informacion", "Para quitar un producto debe seleccionar la X", "info");
            }
            
        }
       
    })
   
})

$(".btnInteractivo").click(function () {
    var id = $(this).attr("aumentoID");
  
    var datos = new FormData();
    datos.append("aumentoID",id);
    $.ajax({
        url: "ajax/productos.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (respuesta) {
            /*alert(respuesta["CANTIDAD"]);*/
            
            $(".cantidadNueva"+id).html(respuesta["CANTIDAD"]);
            $(".nuevoSubTotal"+id).html("$"+respuesta["SUBTOTAL"].toLocaleString());
            $(".nuevaCantidadTotal").html(respuesta["CANTIDADTOTAL"]);
            $(".nuevoTotalFinal").html("$"+respuesta["TOTAL"].toLocaleString());
            
           
        }
       
    })
});

$(".demo").click(function () {

    window.location = "formaDespacho";
});



$('.formaEntrega').on('change', function() {
    var seleccionado = $('.formaEntrega').val();
    $('.contenido').empty();
    if (seleccionado == 're') {
        $('.contenido').append(
            '<br>'+
            '<h4 style="font-style: italic;">Su producto estará disponible para retiro en tienda en tres días hábiles a contar de la fecha actual.</h4>'
        );
    }else{
        $('.contenido').append(
            '<br>'+
            '<center>'+
            '<h4>Seleccione fecha estimada para despacho</h4>'+
            '<br>'+
            '<div class="form-group">'+
            '<div class="input-group date" style="width:30%" data-provide="datepicker" aria-placeholder="Fecha de envio" data-date-format="yyyy-mm-dd">'+
               ' <input type="text" class="form-control fechaEnvio" name="fechaEnvio" id="fechaEnvio">'+
                '<div class="input-group-addon">'+
                    '<span class="input-group-text"><i class="material-icons">date_range</i></span>'+
               '</div>'+
           ' </div>'+
       ' </div>'+
       '</center>'
        );
    }
});

$(".btnEliminarProducto").click(function () {
    
    var id = $(this).attr("idProducto");
    swal({
        title: '¿Esta seguro que desea Quitar este Producto?',
        text: "¡Si no lo está puede cancelar la acción!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, Quitar Producto'
    }).then(function (result) {
        if (result.value) {
           
            window.location="index.php?ruta=admin-productos&idProducto="+id;
           
        }

    })

});

$(".close").click(function () {
    var numero = $(".close").attr("numero");
    var datos = new FormData();
    datos.append("numero",numero);
    swal({
        title: '¿Esta seguro que desea Quitar este Producto?',
        text: "¡Si no lo está puede cancelar la acción!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, Quitar Producto'
    }).then(function (result) {
        if (result.value) {
            $.ajax({
                url: "ajax/productos.ajax.php",
                method: "POST",
                data: datos,
                cache: false,
                contentType: false,
                processData: false,
                dataType: "json",
                success: function (respuesta) {
                    alert(respuesta);
                    if (respuesta == 1) {
                        swal("Eliminado", "Se ha sacado el producto del carrito.", "success");
                        window.location="shipping";
                    } 
                }
            })
        }
    })

});


$(".reservar").click(function () {
    swal({
        title: '¿Esta seguro que desea reservar este producto?',
        text: "¡Si no lo está puede cancelar la acción!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, Reservar producto!'
    }).then(function (result) {
        if (result.value) {
            swal("Reservado", "Se te notificara al gmail cuando el producto se encuentre disponible.", "success");
        }
    })

});

$('.tabla').DataTable({
    "deferRender": true,
    "retrieve": true,
    "processing": true,
    "language": {
        "sProcessing": "Procesando...",
        "sLengthMenu": "Mostrar _MENU_ registros",
        "sZeroRecords": "No se encontraron resultados",
        "sEmptyTable": "Ningún dato disponible en esta tabla",
        "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
        "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0",
        "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
        "sInfoPostFix": "",
        "sSearch": "Buscar:",
        "sUrl": "",
        "sInfoThousands": ",",
        "sLoadingRecords": "Cargando...",
        "oPaginate": {
            "sFirst": "Primero",
            "sLast": "Último",
            "sNext": "Siguiente",
            "sPrevious": "Anterior"
        },
        "oAria": {
            "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
        }
    }
});

$(".btnEditarProducto").click(function () {
    var id = $(this).attr('idProducto');
    var datos = new FormData();
    datos.append("traerProducto",id);
    $.ajax({
        url: "ajax/productos.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (respuesta) {
            $("#EditarNombre").val(respuesta["nombre"]);
            $("#EditarDescripcion").val(respuesta["descripcion"]);
            $("#EditarPrecio").val(respuesta["precio"]);
            $("#EditarStock").val(respuesta["stock"]);
        }
    })
});

$(".btnEditarCategoria").click(function () {
    var id = $(this).attr('idCategoria');
    var datos = new FormData();
    datos.append("traerCategoria",id);
    $.ajax({
        url: "ajax/categoria.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (respuesta) {
           $("#EditarCategoria").val(respuesta["descripcion"]);
        }
    })
});

$(".editarCantidadBoleta").click(function(){
    var aumentar = 1
    var producto = $(this).attr("detalle_boleta");
    var datos = new FormData();
    datos.append("aumentar",aumentar);
    datos.append("producto",producto);
    $.ajax({
        url: "ajax/detalle_boleta.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (respuesta) {
           $(".cambio-cantidad"+producto).html(respuesta["cantidad"]);
           $(".cambio-cantidad"+producto).val(respuesta["cantidad"]);
           $(".cambio-precio"+producto).html(respuesta["total"]);
           $(".cambio-precio"+producto).val(respuesta["total"]);
           $(".validador-cambio").val("SI");
        }
    })


});

$(".editarCantidadBoletaMinus").click(function(){
    var restar = 1
    var producto = $(this).attr("detalle_boleta");
    var datos = new FormData();
    datos.append("restar",restar);
    datos.append("producto",producto);
    $.ajax({
        url: "ajax/detalle_boleta.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (respuesta) {
           $(".cambio-cantidad"+producto).html(respuesta["cantidad"]);
           $(".cambio-cantidad"+producto).val(respuesta["cantidad"]);
           $(".cambio-precio"+producto).html(respuesta["total"]);
           $(".cambio-precio"+producto).val(respuesta["total"]);
           $(".validador-cambio").val("SI");
        }
    })
  


});


