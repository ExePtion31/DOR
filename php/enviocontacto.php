<?php
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];
    $mensaje = $_POST['mensaje'];
    $asuntom = $_POST['asunto'];

    $para = 'dorsobaka2021@gmail.com';
    $cabeceras = 'From: webmaster@example.com' . "\r\n" .
        'Reply-To: webmaster@example.com' . "\r\n" .
        'X-Mailer: PHP/' . phpversion();
    

    $mensaje = "Este mensaje fue enviado por: ". $nombre . "\r\n ";
    $mensaje .= "Correo electrónico: ". $email . "\r\n ";
    $mensaje .= "Teléfono de contacto: " . $telefono . "\r\n ";
    $mensaje .= "Mensaje: " . $_POST['mensaje'] . "\r\n ";
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

    die(json_encode($respuesta));
?>  