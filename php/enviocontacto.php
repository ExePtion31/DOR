<?php
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];
    $mensaje = $_POST['mensaje'];
    $asuntom = $_POST['asunto'];

    $header = 'From: ' . "Formulario de Contacto." . "\r\n ";
    $header .= "Reply-To: contactosdor@dorsobaka.com";
    $header .= "X-Mailer: PHP/" . phpversion() . "\r\n ";
    

    $mensaje = "Este mensaje fue enviado por: ". $nombre . "\r\n ";
    $mensaje .= "Correo electrónico: ". $email . "\r\n ";
    $mensaje .= "Teléfono de contacto: " . $telefono . "\r\n ";
    $mensaje .= "Mensaje: " . $_POST['mensaje'] . "\r\n ";
    $mensaje .= "Enviado el: " . date('d/m/Y', time());


    $para = 'dorsobaka2021@gmail.com';

    $validacion = @mail($para, $asuntom, utf8_decode($mensaje), $header);
  
    if($validacion){
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