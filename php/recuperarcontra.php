<?php
    require('../conexion.php');
    $email = $_POST['email'];
    $conexion = $conexiondb;
      
    if(validarUsu($email, $conexion) == 1){
      try {
        require __DIR__ .  '../../vendor/autoload.php';
        $password = $_POST['password'];
        $opciones = array(
          'cost' => 12
        );
        $password_hashed = password_hash($password, PASSWORD_BCRYPT, $opciones);
        $asuntom = 'Reestablecimiento de contraseña.';
    
        $stmt = $conexiondb->prepare('UPDATE usuarios SET passUsuario = ? WHERE correoUsuario = ?');
        $stmt->bind_param("ss", $password_hashed, $email);
        $stmt->execute();

        if($stmt->affected_rows){
          require('mail.php');
          $respuesta = array(
            'respuesta' => 'Exito'
          );
        }else{
          $respuesta = array(
            'respuesta' => 'Herror'
          ); 
        }
      }catch (Exception $e) {
        echo "Error:" . $e->getMessage();  
      }
      $stmt->close();
      $conexiondb ->close();  

    }else{
      $respuesta = array(
        'respuesta' => 'No Existe'
      );
    }

    die(json_encode($respuesta));

    
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
        

