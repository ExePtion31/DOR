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
                        window.location.href = 'login.php';           
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

    /*LOGUEAR USUARIOS*/
    $('#login_usuarios').on('submit',function(e){
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
                        'Login Correcto',
                        'Bienvenido(a) '+ resultado.usuario+'!',
                        'success'
                    )

                    if(resultado.rol == "1"){
                        setTimeout(function() {
                            window.location.href = 'Administracion/indexadmin.php';           
                        }, 2000);
                    }else{
                        setTimeout(function() {
                            window.location.href = 'Usuario/index.php';           
                        }, 2000);
                    }
                    
                }else if(resultado.respuesta == "Noexiste"){
                    Swal.fire(
                        'Error',
                        'Este correo no se encuentra registrado.',
                        'error'
                    )
                }else{
                    Swal.fire(
                        'Error',
                        'Correo o contraseña incorrectas.',
                        'error'
                    )
                }
            }
        })
    });

    /*FORMULARIO CONTACTO*/
    $('#form_contacto').on('submit',function(e){
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
                        'Mensaje enviado',
                        'El mensaje fue enviado correctamente, pronto nos pondremos en contacto contigo!',
                        'success'
                    )
                }else{
                    Swal.fire(
                        'Error',
                        'Hubo un error al enviar en mensaje, por favor intentalo de nuevo.',
                        'error'
                    )
                }
            }
        })
    });
})