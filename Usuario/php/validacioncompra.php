<?php
    session_start();
    extract($_POST);
    include('../../conexion.php');

    if(isset($_SESSION['carrito'])){
        $id_usuario = $_SESSION['id'];
        $productos = serialize($_SESSION['carrito']);
        $direccion = $_GET['dir'];
        $metodo = $_GET['metodo'];
        $_ciudad = $_GET['city'];
        $zip = $_GET['zip'];
        $estado = 'En proceso';
        $total = $_GET['total'];
        $fecha = date('Y-m-d H:i:s');
        

        try {
            $stmt = $conexiondb->prepare('INSERT INTO ventas (id_usuario , productos, direccion, ciudad, cp, total, metodo ,estado, fecha) VALUES(?,?,?,?,?,?,?,?,?)');
            $stmt->bind_param("isssiisss", $id_usuario, $productos, $direccion, $_ciudad, $zip, $total, $metodo ,$estado, $fecha );
            $stmt->execute();

            if($stmt->affected_rows){
                $query = "SELECT * FROM usuarios WHERE idUsuario = '$id_usuario'";
                $result = mysqli_query($conexiondb, $query);
        
                while ($row = mysqli_fetch_array($result)) {
                    $nombreu = $row["nombreUsuario"];
                    $correou = $row["correoUsuario"];
                    $teleu = $row["telefonoUsuario"];
                    
                }
                include("mail.php");
                header('Location: ../infousuario.php');
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