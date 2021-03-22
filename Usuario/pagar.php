<?php
// SDK de Mercado Pago
require __DIR__ .  '/vendor/autoload.php';

// Agrega credenciales
MercadoPago\SDK::setAccessToken('TEST-6423219670901595-032100-bf6111052ae0acb1f4235d4e006bb552-731880921');

// Crea un objeto de preferencia
$preference = new MercadoPago\Preference();
$preference->back_urls = array(
    "success" => "http://localhost/DOR/Usuario/aprovado.php",
    "failure" => "http://localhost/DOR/Usuario/errorpago.php?error=rechazado",
    "pending" => "http://localhost/DOR/Usuario/errorpago.php?error=pendiente"
);
$preference->auto_return = "approved";

// Crea un ítem en la preferencia
$datos = array();
for($x=0; $x<10; $x++){
    $item = new MercadoPago\Item();
    $item->title = 'Pantalones Negro';
    $item->quantity = 1;
    $item->unit_price = 70;
    $datos[]=$item;
}

//curl -X POST -H "Content-Type: application/json" "https://api.mercadopago.com/users/test_user?access_token=TEST-8017408200086131-032023-bb8747edc74fc3304769a872f37de54f-279766251" -d "{'site_id':'MCO'}"  
//COMPRADOR: {"id":731879327,"nickname":"TESTU5PVAU35","password":"qatest2889","site_status":"active","email":"test_user_14357631@testuser.com"}
//VENDEDOR: {"id":731880921,"nickname":"TESTDWZT042O","password":"qatest2407","site_status":"active","email":"test_user_20070712@testuser.com"}
$preference->items = $datos;
$preference->save();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="POST">
        <script
        src="https://www.mercadopago.com.co/integrations/v1/web-payment-checkout.js"
        data-preference-id="<?php echo $preference->id; ?>">
        </script>
    </form>
</body>
</html>