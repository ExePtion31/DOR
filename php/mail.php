<?php
    $para = $email;
    $cabeceras = 'From: webmaster@example.com' . "\r\n" .
        'Reply-To: webmaster@example.com' . "\r\n" .
        'X-Mailer: PHP/' . phpversion();
    

    $mensaje = "Este mensaje fue enviado por: ". 'Tienda DOR' . "\r\n ";
    $mensaje .= "Correo electrónico: ". 'dorsobaka2021@gmail.com' . "\r\n ";
    $mensaje .= "Tu nueva contraseña es:" . $password . "\r\n ";
    $mensaje .= "Enviado el: " . date('d/m/Y', time());


    
  
    if(mail($para, $asuntom, utf8_decode($mensaje), $cabeceras)){
        $respuesta = array(
            'respuesta' => 'Exito'
        );
    }else{
        $respuesta = array(
            'respuesta' => 'Error'
        );
    }   
?>  