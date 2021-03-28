<?php
    extract($_POST);
    
    if(isset($_POST['nombre'])){
        $nombre = $_POST['nombre'];
        $valor = $_POST['valor'];
        $desc = $_POST['desc'];
        $animal = $_POST['animal'];
        $categoria = $_POST['categoria'];
        $img = $_FILES['imagen']['name'];
        $ruta = "../img/productos/".$img;
        $archivo = $_FILES['imagen']['tmp_name'];
        $subir = move_uploaded_file($archivo, $ruta);
        
        try{
            include('../../conexion.php');
            $stmt = $conexiondb->prepare('INSERT INTO productos (nombre, categoria, img, animal ,descripcion, valor) VALUES(?,?,?,?,?,?)');
            $stmt->bind_param("sssssi", $nombre, $categoria, $ruta, $animal ,$desc, $valor);
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