<?php
    session_start();
    include('../../conexion.php');
    if(isset($_SESSION['carrito'])){    
        if(isset($_GET['id'])){
            $productos = $_SESSION['carrito'];
            $encontro = false;
            $numero = 0;
            for($i=0;$i<count($productos);$i++){
                if($productos[$i]['id'] == $_GET['id']){
                    $encontro = true;
                    $numero = $i;
                }
            }

            if($encontro == true){
                if($productos[$numero]['Talla'] != $_POST['talla']){
                    try {
                        $id=$_GET['id'];
                        $query = "SELECT * FROM productos where id = '$id' ";
                        $result = mysqli_query($conexiondb, $query);
            
                        while ($row = mysqli_fetch_array($result)) {
                            $nombre = $row['nombre'];
                            $img = $row['img'];
                            $valor = $row['valor'];
                        }
                        $talla = $_POST['talla'];
                        $cantidad = $_POST['cantidad'];
            
                        $productosNuevo = array(
                            'id' => $_GET['id'],
                            'Nombre' => $nombre,
                            'Talla' => $talla,
                            'Cantidad' => $cantidad,
                            'Precio' => $valor,
                            'img' => $img
                        );
                        array_push($productos, $productosNuevo);
                        $_SESSION['carrito'] = $productos; 
                        $status = array(
                            'status' => 'Exito'
                        );
                        die(json_encode($status));
                    } catch (Exception $e) {
                        echo "Error:" . $e->getMessage();
                    }
                }else{
                    try {
                        $productos[$numero]['Cantidad'] = $productos[$numero]['Cantidad']+$_POST['cantidad'];
                        $_SESSION['carrito'] = $productos;
                        $status = array(
                            'status' => 'Exito'
                        );
                        die(json_encode($status));
                    } catch (Exception $e) {
                        echo "Error:" . $e->getMessage();
                    }
                }
                
            }else{
                try {
                    $id=$_GET['id'];
                    $query = "SELECT * FROM productos where id = '$id' ";
                    $result = mysqli_query($conexiondb, $query);
        
                    while ($row = mysqli_fetch_array($result)) {
                        $nombre = $row['nombre'];
                        $img = $row['img'];
                        $valor = $row['valor'];
                    }
                    $talla = $_POST['talla'];
                    $cantidad = $_POST['cantidad'];
        
                    $productosNuevo = array(
                        'id' => $_GET['id'],
                        'Nombre' => $nombre,
                        'Talla' => $talla,
                        'Cantidad' => $cantidad,
                        'Precio' => $valor,
                        'img' => $img
                    );
                    array_push($productos, $productosNuevo);
                    $_SESSION['carrito'] = $productos; 
                    $status = array(
                        'status' => 'Exito'
                    );
                    die(json_encode($status));
                } catch (Exception $e) {
                    echo "Error:" . $e->getMessage();
                }
            }
        }
        
    }else{
        if(isset($_GET['id'])){
           try {
                $id=$_GET['id'];
                $query = "SELECT * FROM productos where id = '$id' ";
                $result = mysqli_query($conexiondb, $query);

                while ($row = mysqli_fetch_array($result)) {
                    $nombre = $row['nombre'];
                    $img = $row['img'];
                    $valor = $row['valor'];
                }
                $talla = $_POST['talla'];
                $cantidad = $_POST['cantidad'];

                $productos[] = array(
                    'id' => $_GET['id'],
                    'Nombre' => $nombre,
                    'Talla' => $talla,
                    'Cantidad' => $cantidad,
                    'Precio' => $valor,
                    'img' => $img
                );
                
                $_SESSION['carrito'] = $productos;
                $status = array(
                    'status' => 'Exito'
                );
                die(json_encode($status));
           }catch (Exception $e) {
            echo "Error:" . $e->getMessage();
            }
        }
    }
?>