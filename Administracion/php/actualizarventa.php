<?php
    extract($_POST);
    if(isset($_GET["id"])){
        try{
            include("../../conexion.php");
            $estado = $_POST["estado"];
            $id = $_GET["id"];
    
            $stmt = $conexiondb->prepare('UPDATE ventas SET estado = ? WHERE id_venta = ?');
            $stmt->bind_param("si", $estado ,$id);
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
        }catch (Exception $e) {
            echo "Error:" . $e->getMessage();  
        }

        die(json_encode($respuesta));
    }
?>