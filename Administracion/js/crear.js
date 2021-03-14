$(document).ready(function(){
    /* CREAR USUARIOS */
    $('#crear_usuarios').on('submit',function(e){
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
                        'El usuario ha sido creado exitosamente!',
                        'success'
                    )
                    setTimeout(function() {
                        window.location.href = 'vertodos.php?categoria=usuarios';           
                    }, 2000);
                }else{
                    Swal.fire(
                        'Error',
                        'Hubo un error, puede que este correo ya este registrado.',
                        'error'
                    )
                }
            }
        })
    });

    /* CREAR PRODUCTOS */
    $('#crear_productos').on('submit',function(e){
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
                        'Producto creado correctamente.',
                        'success'
                    )
                    setTimeout(function() {
                        window.location.href = 'vertodos.php?categoria=productos';           
                    }, 2000);
                }else{
                    Swal.fire(
                        'Error',
                        'Hubo un error al crear el producto.',
                        'error'
                    )
                }
            }
        })
    });

    /* CREAR CATEGORIAS */
    $('#crear_categorias').on('submit',function(e){
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
                        'Categoria creada correctamente.',
                        'success'
                    )
                    setTimeout(function() {
                        window.location.href = 'vertodos.php?categoria=categorias';           
                    }, 2000);
                }else{
                    Swal.fire(
                        'Error',
                        'Hubo un error al crear la categoria.',
                        'error'
                    )
                }
            }
        })
    });

    /* CREAR CATEGORIAS */
    $('#crear_animales').on('submit',function(e){
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
                        'Animal creado correctamente.',
                        'success'
                    )
                    setTimeout(function() {
                        window.location.href = 'vertodos.php?categoria=animales';           
                    }, 2000);
                }else{
                    Swal.fire(
                        'Error',
                        'Hubo un error al crear el animal.',
                        'error'
                    )
                }
            }
        })
    });


});