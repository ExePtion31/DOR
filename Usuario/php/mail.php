<?php
    $para= $correou;
    $asunto = 'Gracias por tu compra en Tiendas DOR';
    $from = 'dorsobaka2021@gmail.com';
    $cabeceras = 'From: webmaster@example.com' . "\r\n" .
        'Reply-To: webmaster@example.com' . "\r\n" .
        'X-Mailer: PHP/' . phpversion();

    $mensaje = '
    <html>
        <body>
            <h3 style="font-size: 2.5rem; margin: 0; color: #FED401; text-shadow: 1px 1px 1px #000;">Gracias por tu compra '.$nombreu.'</h3>
            <h4 >Detalles de la compra:</h4>
    
            <div class="info_personal">
                <p style="margin: 0; color: #7F7F7F; margin-bottom: .4rem;">Nombre: '.$nombreu.'</p>
                <p style="margin: 0; color: #7F7F7F; margin-bottom: .4rem;">Correo: '.$correou.'</p>
                <p style="margin: 0; color: #7F7F7F; margin-bottom: .4rem;">Teléfono: '.$teleu.'</p>
            </div>
    
    
    
            <table style="border:1px solid #b1b1b1; padding: .7rem;">
                <thead style="font-size: 1.6rem;">
                    <tr>
                        <td style="margin-right: 1rem; border-bottom: 1px solid #b1b1b1; font-weight: bold;">Producto</td>
                        <td style="margin-right: 1rem; border-bottom: 1px solid #b1b1b1; font-weight: bold;">Precio</td>
                        <td style="margin-right: 1rem; border-bottom: 1px solid #b1b1b1; font-weight: bold;">Cantidad</td>
                        <td style="margin-right: 1rem; border-bottom: 1px solid #b1b1b1; font-weight: bold;">Talla</td>
                    </tr>
                </thead>
                <tbody>';

    $arreglocarrito = $_SESSION['carrito'];
    for ($i = 0; $i < count($arreglocarrito); $i++) {
        $mensaje.= '<tr style="text-align: center;"><td>'.$arreglocarrito[$i]['Nombre'].'</td>';
        $mensaje.= '<td>'.number_format($arreglocarrito[$i]['Precio'] * $arreglocarrito[$i]['Cantidad'], 0, '', '.').'</td>';
        $mensaje.= '<td>'.$arreglocarrito[$i]['Cantidad'].'</td>';
        $mensaje.= '<td>'.$arreglocarrito[$i]['Talla'].'</td> </tr>';
    }
    $mensaje.= '</tbody></table>';
    $mensaje.= '<p style="font-size: 1.5rem">Total con envio: <span style="font-weight: bold;">$'.number_format($total, 0, '', '.').'</span></p>
    <a href="https://pruebasdor.000webhostapp.com/Usuario/comprasuser.php" style="background-color:#0170FE; color: #fff; padding: 1rem; text-decoration:none; font-weight: bold; border-radius: .5rem;">Mis compras</a>
</body>
</html>';

if(mail($para, $asunto, $mensaje , $cabeceras)){

}else{

}
?>

        