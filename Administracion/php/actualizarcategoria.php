<?php
    extract($_POST);
    
    if(isset($_POST['id'])){
        $id = $_POST['id'];
        $nombre = $_POST['nombre'];
        
        if($_FILES['imagen']['name'] != null){
            try{
                include('../../conexion.php');
                $img = $_FILES['imagen']['name'];
                $ruta = "../img/categorias/".$img;
                $archivo = $_FILES['imagen']['tmp_name'];
                $subir = move_uploaded_file($archivo, $ruta);
    
                $stmt = $conexiondb->prepare('UPDATE categorias SET nombre = ?, img = ? WHERE id = ?');
                $stmt->bind_param("ssi", $nombre, $ruta, $id);
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
                
            $stmt->close();
            $conexiondb ->close();  
        }else{
            try {
                include('../../conexion.php');
                $stmt = $conexiondb->prepare('UPDATE categorias SET nombre = ? WHERE id = ?');
                $stmt->bind_param("si", $nombre, $id);
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
                
            $stmt->close();
            $conexiondb ->close();  
        } 

        die(json_encode($respuesta));
    }
?>