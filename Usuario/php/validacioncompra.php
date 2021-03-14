<?php
    session_start();
    extract($_POST);
    include('../../conexion.php');

    if(isset($_SESSION['carrito'])){
        $id_usuario = $_SESSION['id'];
        $productos = serialize($_SESSION['carrito']);
        $direccion = $_POST['address'];
        $_ciudad = $_POST['city'];
        $zip = $_POST['zip'];
        $estado = 'En proceso';
        $fecha = date('Y-m-d H:i:s');

        try {
            $stmt = $conexiondb->prepare('INSERT INTO ventas (id_usuario , productos, direccion, ciudad, cp, estado, fecha) VALUES(?,?,?,?,?,?,?)');
            $stmt->bind_param("isssiss", $id_usuario, $productos, $direccion, $_ciudad, $zip, $estado, $fecha );
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

        die(json_encode($respuesta));
    }


?>