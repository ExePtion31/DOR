<?php
if(isset($_POST['email'])){
    $correopost = $_POST['email'];
    $passwordpost = $_POST['password'];

    try {
        include("../conexion.php");
        $stmt = $conexiondb->prepare("SELECT * FROM usuarios WHERE correoUsuario = ?");
        $stmt->bind_param("s", $correopost);
        $stmt->execute();
        $stmt->bind_result($id, $nombre, $correo, $telefono, $password, $rol);
        
        if($stmt->affected_rows){
            $existe = $stmt->fetch();
            if($existe){
                if(password_verify($passwordpost, $password)){
                    session_start();
                    $_SESSION['id'] = $id;
                    $_SESSION['rol'] = $rol;

                    $respuesta = array(
                        'respuesta' => 'Exito',
                        'usuario' => $nombre,
                        'rol' => $rol
                    );
                }else{
                    $respuesta = array(
                        'respuesta' => 'Incorrecto'
                    );
                }
            }else{
                $respuesta = array(
                    'respuesta' => 'Noexiste'
                );
            }
        }
        $stmt->close();
        $conexiondb->close();
    } catch (Exception $e) {
        echo "Error:" . $e->getMessage();  
    }
    die(json_encode($respuesta)); 
}

?>