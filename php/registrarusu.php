<?php
    
  if(isset($_POST['email'])){
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];
    $password = $_POST['password'];
    $rol = '2';

    $opciones = array(
      'cost' => 12
    );

    $password_hashed = password_hash($password, PASSWORD_BCRYPT, $opciones);

    try {
      include("../conexion.php");
      $stmt = $conexiondb->prepare("INSERT INTO usuarios (nombreUsuario, correoUsuario, telefonoUsuario, passUsuario, rolUsuario) VALUES (?, ?, ?, ?, ?)");
      $stmt->bind_param("sssss", $nombre, $email, $telefono, $password_hashed, $rol);
      $stmt->execute();
      $id_registro = $stmt->insert_id;
      if($id_registro > 0){
        $respuesta = array(
          'respuesta'=> 'Exito',
          'id' => $id_registro
        );
      }else{
        $respuesta = array(
          'respuesta'=> 'Error'
        );
      }
      $stmt->close();
      $conexiondb->close();
    } catch (Exception $e) {
      echo "Error:" . $e->getMessage();  
    }

    die(json_encode($respuesta)); 
  } 

?>