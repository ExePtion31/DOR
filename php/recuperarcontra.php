<?php

    require('../conexion.php');
    $conexion = $conexiondb;
    $email = $_POST['email'];
    $asuntom = 'Reestablecimiento de contraseña.';
      
    if(validarUsu($email, $conexion) == 1){
        $sql = "SELECT * FROM usuarios WHERE correoUsuario='$email'";

        $result = mysqli_query($conexion, $sql);
        while($row = mysqli_fetch_array($result)){
            $header = 'From: ' . "Reestablecimiento de contraseña." . "\r\n ";
            $header .= "Reply-To: contactosdor@dorsobaka.com";
            $header .= "X-Mailer: PHP/" . phpversion() . "\r\n ";
            
            $mensaje = "Sus datos de inicio de sesión son los siguiente:" . "\r\n ";
            $mensaje .= "Correo electrónico: ". $row['correoUsuario'] . "\r\n ";
            $mensaje .= "Contraseña: " . $row['passUsuario'] . "\r\n ";
            $mensaje .= "Enviado el: " . date('d/m/Y', time());


            $para = $row['correoUsuario'];

            $validacion = @mail($para, $asuntom, utf8_decode($mensaje), $header);
        }

        echo "<script>location.href='../contraenviada.php'</script>";
    }else{
      
        echo "<script>location.href='../contranoenviada.php'</script>";
    }


    function validarUsu($email, $conexion){
      $sql = "SELECT * FROM usuarios WHERE correoUsuario='$email'";

      $result = mysqli_query($conexion, $sql);

      if(mysqli_num_rows($result) > 0){
        return 1;
      }else{
        return 0;
      }
    }
?>
        

