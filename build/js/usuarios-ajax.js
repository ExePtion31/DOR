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

    /*FORMULARIO CONTACTO*/
    $('#form_recovery').on('submit',function(e){
        e.preventDefault();

        var email = $('#reset_email').val();
        if(email.length == 0){
            return  Swal.fire(
                'Advertencia',
                'Llena el campo de <b>Correo electrónico</b>.',
                'warning'
            );
        }else{
            var caracteres = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890";
            var password = "";
    
            for(var i=0;i<8;i++){
                password+=caracteres.charAt(Math.floor(Math.random()*caracteres.length));
            }
            $.ajax({
                url: $(this).attr('action'),
                type: $(this).attr('method'),
                data:{email: email, password : password},
                success: function(data){
                    var resultado = data;
                    if(resultado[14] == "E"){
                        Swal.fire(
                            'Mensaje enviado',
                            'Hemos enviado un mensaje a su correo electrónico.',
                            'success'
                        )
                    }else if(resultado[14] == "H"){
                        Swal.fire(
                            'Error',
                            'Hubo un error, por favor intentalo de nuevo.',
                            'error'
                        )
                    }else if(resultado[14] == "N"){
                        Swal.fire(
                            'Error',
                            'El correo no se encuentra registrado.',
                            'error'
                        )
                    }
                }
            });
        }
    });
})

function reestablecer_contra(){
    var email = $('#reset_email').val();
    if(email.length == 0){
        return  Swal.fire(
            'Advertencia',
            'Llena el campo de <b>Correo electrónico</b>.',
            'warning'
        );
    }else{
        var caracteres = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890";
        var password = "";

        for(var i=0;i<8;i++){
            password+=caracteres.charAt(Math.floor(Math.random()*caracteres.length));
        }
        console.log(password);
        $.ajax({
            url: 'php/recuperarcontra.php',
            type: 'POST',
            data:{email: email, password : password},
            success: function(data){
                var resultado = data;
                console.log(resultado.respuesta);
                if(resultado.respuesta == "Exito"){
                    Swal.fire(
                        'Mensaje enviado',
                        'Hemos enviado un mensaje a su correo electrónico.',
                        'success'
                    )
                }else if(resultado.respuesta == "Error"){
                    Swal.fire(
                        'Error',
                        'Hubo un error, por favor intentalo de nuevo.',
                        'error'
                    )
                }else if(resultado.respuesta == "No Existe"){
                    Swal.fire(
                        'Error',
                        'El correo no se encuentra registrado.',
                        'error'
                    )
                }
            }
        });
    }
}