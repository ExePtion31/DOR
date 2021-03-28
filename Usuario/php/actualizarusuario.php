<?php
    extract($_POST);


    $opciones = array(
        'cost' => 12
    );

    if(isset($_POST['id'])){
        $id = $_POST['id'];
        $nombre = $_POST['nombre'];
        $password = $_POST['password'];
        $correo = $_POST['correo'];
        $telefono = $_POST['telefono'];

        if($password == ""){
            try{
                include("../../conexion.php");
                $stmt = $conexiondb->prepare('UPDATE usuarios SET nombreUsuario = ?, correoUsuario = ?, telefonoUsuario = ? WHERE idUsuario = ?');
                $stmt->bind_param("ssii", $nombre, $correo, $telefono, $id);
                $stmt->execute();
    
                if($stmt->affected_rows){
                    $respuesta = array(
                        'respuesta' => 'Exito'
                    );
                }else{
                    $respuesta = array(
                        'respuesta' => 'Error'
                    ); 
                }
            } catch (Exception $e) {
                echo "Error:" . $e->getMessage();  
              }
    
            $stmt->close();
            $conexiondb ->close();  
        }else{
            try{
                include("../../conexion.php");
                $password_hash = password_hash($password, PASSWORD_BCRYPT, $opciones);
                $stmt = $conexiondb->prepare('UPDATE usuarios SET nombreUsuario = ?, correoUsuario = ?, telefonoUsuario = ?, passUsuario = ? WHERE idUsuario = ?');
                $stmt->bind_param("ssisi", $nombre, $correo, $telefono, $password_hash, $id);
                $stmt->execute();
    
                if($stmt->affected_rows){
                    $respuesta = array(
                        'respuesta' => 'Exito'
                    );
                }else{
                    $respuesta = array(
                        'respuesta' => 'Error'
                    ); 
                }
            } catch (Exception $e) {
                echo "Error:" . $e->getMessage();  
              }
    
            $stmt->close();
            $conexiondb ->close();  
        }
        die(json_encode($respuesta));
    }
 
?>