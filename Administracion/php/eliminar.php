<?php   
    $id = $_POST['id'];
    $categoria = $_POST['categoria'];

    if($categoria == "productos"){
        try {
            include('../../conexion.php');
            $stmt = $conexiondb->prepare('DELETE FROM productos WHERE id = ?');
            $stmt->bind_param("i", $id);
            $stmt->execute();
    
            if($stmt->affected_rows){
                $respuesta = array(
                    'respuesta' => 'Exito',
                    'categoria' => $categoria
                );
            }else{
                $respuesta = array(
                    'respuesta' => 'Error'
                );
            }
    
    
        } catch (Exception $e) {
            $respuesta = array(
                'respuesta' => $e->getMessage()
            );
        }
    }elseif($categoria == "categorias"){
        try {
            include('../../conexion.php');
            $stmt = $conexiondb->prepare('DELETE FROM categorias WHERE id = ?');
            $stmt->bind_param("i",$id);
            $stmt->execute();
    
            if($stmt->affected_rows){
                $respuesta = array(
                    'respuesta' => 'Exito',
                    'categoria' => $categoria
                );
            }else{
                $respuesta = array(
                    'respuesta' => 'Error'
                );
            }
    
    
        } catch (Exception $e) {
            $respuesta = array(
                'respuesta' => $e->getMessage()
            );
        }
    }elseif($categoria == "usuarios"){
        try {
            include('../../conexion.php');
            $stmt = $conexiondb->prepare('DELETE FROM usuarios WHERE idUsuario = ?');
            $stmt->bind_param("i",$id);
            $stmt->execute();
    
            if($stmt->affected_rows){
                $respuesta = array(
                    'respuesta' => 'Exito',
                    'categoria' => $categoria
                );
            }else{
                $respuesta = array(
                    'respuesta' => 'Error'
                );
            }
    
    
        } catch (Exception $e) {
            $respuesta = array(
                'respuesta' => $e->getMessage()
            );
        }
    }else{
        try {
            include('../../conexion.php');
            $stmt = $conexiondb->prepare('DELETE FROM animales WHERE id = ?');
            $stmt->bind_param("i",$id);
            $stmt->execute();
    
            if($stmt->affected_rows){
                $respuesta = array(
                    'respuesta' => 'Exito',
                    'categoria' => $categoria
                );
            }else{
                $respuesta = array(
                    'respuesta' => 'Error'
                );
            }
    
    
        } catch (Exception $e) {
            $respuesta = array(
                'respuesta' => $e->getMessage()
            );
        }
    }

    die(json_encode($respuesta));

?>