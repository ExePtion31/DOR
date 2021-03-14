$(document).ready(function(){
    /* ACTUALIZAR USUARIOS */
    $('#editar_usuarios').on('submit',function(e){
        e.preventDefault();

        var datos = $(this).serializeArray();
        
        $.ajax({
            type: $(this).attr('method'),
            data : datos,
            url: $(this).attr('action'),
            dataType: 'json',
            success: function(data){
                var resultado = data;
                if(resultado.respuesta == "Exito"){
                    Swal.fire(
                        'Correcto',
                        'Registro actualizado exitosamente',
                        'success'
                    )
                    setTimeout(function() {
                        window.location.href = 'vertodos.php?categoria=usuarios';           
                    }, 2000);
                }else{
                    Swal.fire(
                        'Error',
                        'Hubo un error al actualizar el registro.',
                        'error'
                    )
                }
            }
        })
    });

    /* ACTUALIZAR PRODUCTOS */
    $('#editar_productos').on('submit',function(e){
        e.preventDefault();
        var datos = new FormData(this);
        console.log(datos);
        $.ajax({
            type: $(this).attr('method'),
            data : datos,
            url: $(this).attr('action'),
            dataType: 'json',
            contentType: false,
            processData: false, 
            async: true,
            cache: false,
            success: function(data){
                var resultado = data;
                
                if(resultado.respuesta == "Exito"){
                    Swal.fire(
                        'Correcto',
                        'Producto actualizado correctamente.',
                        'success'
                    )
                    setTimeout(function() {
                        window.location.href = 'vertodos.php?categoria=productos';           
                    }, 2000);
                }else{
                    Swal.fire(
                        'Error',
                        'Hubo un error al actualizar el producto.',
                        'error'
                    )
                }
            }
        })
    });

    /* ACTUALIZAR CATEGORIAS */
    $('#editar_categorias').on('submit',function(e){
        e.preventDefault();

        var datos = new FormData(this);
        $.ajax({
            type: $(this).attr('method'),
            data : datos,
            url: $(this).attr('action'),
            dataType: 'json',
            contentType: false,
            processData: false, 
            async: true,
            cache: false,
            success: function(data){
                var resultado = data;
                if(resultado.respuesta == "Exito"){
                    Swal.fire(
                        'Correcto',
                        'Categoria actualizada exitosamente.',
                        'success'
                    )
                    setTimeout(function() {
                        window.location.href = 'vertodos.php?categoria=categorias';           
                    }, 2000);
                }else{
                    Swal.fire(
                        'Error',
                        'Hubo un error al actualizar la categoria.',
                        'error'
                    )
                }
            }
        })
    });

    /* ACTUALIZAR ANIMALES */
    $('#editar_animal').on('submit',function(e){
        e.preventDefault();

        var datos = new FormData(this);
        $.ajax({
            type: $(this).attr('method'),
            data : datos,
            url: $(this).attr('action'),
            dataType: 'json',
            contentType: false,
            processData: false, 
            async: true,
            cache: false,
            success: function(data){
                var resultado = data;
                if(resultado.respuesta == "Exito"){
                    Swal.fire(
                        'Correcto',
                        'Animal actualizado exitosamente.',
                        'success'
                    )
                    setTimeout(function() {
                        window.location.href = 'vertodos.php?categoria=animales';           
                    }, 2000);
                }else{
                    Swal.fire(
                        'Error',
                        'Hubo un error al actualizar el animal.',
                        'error'
                    )
                }
            }
        })
    });


    // ELIMINAR REGISTRO
    $('.borrar_registro').on('click', function(e){
        e.preventDefault();

        var id = $(this).attr('data-id');
        var categoria = $(this).attr('data-table');
        
        Swal.fire({
            title: 'Esta seguro?',
            text: "Seguro que quieres eliminar el registro?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Eliminar'
          }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: 'post',
                    data : {
                        'id': id,
                        'categoria' : categoria
                    },
                    url: 'php/eliminar.php',
                    success: function(data){
                        var resultado = JSON.parse(data);
                    }       
                })
                Swal.fire(
                    'Eliminado',
                    'El registro ha sido eliminado exitosamente.',
                    'success'
                )
                setTimeout(function() {
                    window.location.href = 'vertodos.php?categoria='+categoria;           
                }, 2000);
            }
          })
    });
})