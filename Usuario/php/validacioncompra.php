<?php
    session_start();
    include('../../conexion.php');
    
    echo serialize($_SESSION['informacion']);   
   
    if(isset($_SESSION['carrito'])){
        $informacion = $_SESSION['informacion'];
        $id_usuario = $_SESSION['id'];
        $productos = serialize($_SESSION['carrito']);
        $direccion = $informacion[0]['direccion'];
        $metodo = $informacion[0]['metodo'];
        $_ciudad = $informacion[0]['city'];
        $zip = $informacion[0]['zip'];
        $estado = 'En proceso';
        $total = $informacion[0]['total'];
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
                unset($_SESSION['informacion']);
                header('Location: ../infousuario.php');
            }

        } catch (Exception $e) {
            echo "Error:" . $e->getMessage();  
        }
        die(json_encode($respuesta));
    }


?>