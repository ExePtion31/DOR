<?php
    session_start();
    $arreglo = $_SESSION['carrito'];
    for($i=0;$i<count($arreglo);$i++){
        if($arreglo[$i]['id'] != $_POST['id']){
            $arregloNuevo[] = array(
                'id' => $arreglo[$i]['id'],
                'Nombre' => $arreglo[$i]['Nombre'],
                'Talla' => $arreglo[$i]['Talla'],
                'Cantidad' => $arreglo[$i]['Cantidad'],
                'Precio' => $arreglo[$i]['Precio'],
                'img' => $arreglo[$i]['img']
            ); 
        }
    }

    if(isset($arregloNuevo)){
        $_SESSION['carrito'] = $arregloNuevo;
    }else{
        unset($_SESSION['carrito']);

    }

?>