<?php
    extract($_POST);
    
    if(isset($_POST['nombre'])){
        $nombre = $_POST['nombre'];
        $img = $_FILES['imagen']['name'];
        $ruta = "../img/animales/".$img;
        $archivo = $_FILES['imagen']['tmp_name'];
        $subir = move_uploaded_file($archivo, $ruta);
        
        try{
            include('../../conexion.php');
            $stmt = $conexiondb->prepare('INSERT INTO animales (nombre,img) VALUES(?,?)');
            $stmt->bind_param("ss", $nombre,$ruta);
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

        die(json_encode($respuesta));
    }
?>