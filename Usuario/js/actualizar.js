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
                        window.location.href = 'infousuario.php';           
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

    //AGREGAR CARRITO
    $('#productoselect').on('submit',function(e){
        e.preventDefault();

        var datos = $(this).serializeArray();
        console.log(datos);

        if($('#selectalla').val().trim() === ''){
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Por favor, seleccione una talla.'
              })
        }else if($('#cantidad').val().trim() === ''){        
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Por favor, seleccione la cantidad.'
            })
        }else{
            $.ajax({
                type: $(this).attr('method'),
                data : datos,
                url: $(this).attr('action'),
                dataType: 'json',
                success: function(data){
                    var resultado = data;
                    if(resultado.status == "Exito"){
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Producto agregado al carrito',
                            showConfirmButton: false,
                            timer: 1500
                          })
                    }else{
                        Swal.fire(
                            'Error',
                            'Hubo un error al agregar el producto.',
                            'error'
                        )
                    }
                },
                error: function(error){
                    console.log(error);
                }
            });
        }
    });

    //ELIMINAR CARRITO
    $('.deletecar').on('click', function(e){
        e.preventDefault();

        var id = $(this).data('id');
        
        Swal.fire({
            title: 'Esta seguro?',
            text: "Seguro que quieres eliminar el producto?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Eliminar'
          }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    method: 'POST',
                    data : {
                        id: id
                    },
                    url: './php/eliminar.php',
                });
                Swal.fire(
                    'Eliminado',
                    'El producto ha sido eliminado exitosamente.',
                    'success'
                )
                setTimeout(function() {
                    window.location.href = 'cart.php';           
                }, 2000);
            }
        })
    });

    //VALIDAR CHECKOUT
    $('#formcheckout').on('submit',function(e){
        e.preventDefault();

        var datos = $(this).serializeArray();

        if($('#fname').val().trim() === ''){
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Por favor, digite su nombre completo.'
              })
        }else if($('#email').val().trim() === ''){        
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Por favor, digite su email.'
            })
        }else if($('#adr').val().trim() === ''){        
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Por favor, digite su dirección.'
            })
        }else if($('#city').val().trim() === ''){        
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Por favor, ingrese su ciudad.'
            })
        }else if($('#zip').val().trim() === ''){        
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Por favor, digite su código postal.'
            })
        }else if($('#cname').val().trim() === ''){        
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Por favor, digite su nombre en la tarjeta.'
            })
        }else if($('#ccnum').val().trim() === ''){        
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Por favor, digite su número de tarjeta.'
            })
        }else if($('#expmonth').val().trim() === ''){        
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Por favor, seleccione el mes de expedición.'
            })
        }else if($('#expyear').val().trim() === ''){        
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Por favor, seleccione el año de expedición.'
            })
        }else if($('#cvv').val().trim() === ''){        
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Por favor, digite el ccv.'
            })
        }else{
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
                            'Gracias por su compra!',
                            'success'
                        )
                        setTimeout(function() {
                            window.location.href = 'index.php';           
                        }, 2000);
                    }else{
                        Swal.fire(
                            'Error',
                            'Hubo un error al realizar su compra.',
                            'error'
                        )
                    }
                }
            })
        }              
    });

})