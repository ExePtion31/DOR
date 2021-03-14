<?php
    extract($_POST);
    
    if(isset($_POST['id'])){
        $id = $_POST['id'];
        $nombre = $_POST['nombre'];
        $valor = $_POST['valor'];
        $desc = $_POST['desc'];
        $categoria = $_POST['categoria'];
        
        if($_FILES['imagen']['name'] != null){
            try{
                include('../../conexion.php');
                $img = $_FILES['imagen']['name'];
                $ruta = "../img/productos/".$img;
                $archivo = $_FILES['imagen']['tmp_name'];
                $subir = move_uploaded_file($archivo, $ruta);
    
                $stmt = $conexiondb->prepare('UPDATE productos SET nombre = ?, categoria = ?, img = ?, descripcion = ?, valor = ? WHERE id = ?');
                $stmt->bind_param("ssssii", $nombre, $categoria, $ruta, $desc, $valor ,$id);
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
                $stmt = $conexiondb->prepare('UPDATE productos SET nombre = ?, categoria = ?, descripcion = ?, valor = ? WHERE id = ?');
                $stmt->bind_param("sssii", $nombre, $categoria, $desc, $valor ,$id);
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