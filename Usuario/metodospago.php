<?php
    if(!isset($_POST['total']) || !isset($_POST['city']) || !isset($_POST['zip']) || !isset($_POST['address'])){
        header('Location: ./cart.php');
    }
?>
<?php
        // SDK de Mercado Pago
        require __DIR__ .  '/vendor/autoload.php';
        
        // Agrega credenciales
        MercadoPago\SDK::setAccessToken('TEST-8017408200086131-032023-bb8747edc74fc3304769a872f37de54f-279766251');
        
        // Crea un objeto de preferencia
        $preference = new MercadoPago\Preference();
        $preference->back_urls = array(
            "success" => "http://localhost/DOR/Usuario/php/validacioncompra.php?total=".$_POST['total']."&metodo=MercadoPago&city=".$_POST['city']."&zip=".$_POST['zip']."&dir=".$_POST['address'],
            "failure" => "http://localhost/DOR/Usuario/index.php",
            "pending" => "http://localhost/DOR/Usuario/errorpago.php?error=pendiente"
        );
        $preference->auto_return = "approved";
        
        // Crea un ítem en la preferencia 
        $datos = array();
        $item = new MercadoPago\Item();
        $item->title = 'Productos DOR';
        $item->quantity = 1;
        $item->unit_price = $_POST['total'];
        $datos[]=$item;
        
        //curl -X POST -H "Content-Type: application/json" "https://api.mercadopago.com/users/test_user?access_token=TEST-8017408200086131-032023-bb8747edc74fc3304769a872f37de54f-279766251" -d "{'site_id':'MCO'}"  
        //COMPRADOR: {"id":731879327,"nickname":"TESTU5PVAU35","password":"qatest2889","site_status":"active","email":"test_user_14357631@testuser.com"}
        //VENDEDOR: {"id":731880921,"nickname":"TESTDWZT042O","password":"qatest2407","site_status":"active","email":"test_user_20070712@testuser.com"}
        $preference->items = $datos;
        $preference->save();
        
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Métodos de Pago</title>
    <meta name="description" content="DOR, mas sobre nosotros.">

    <?php
    include('php/head.php');
    ?>
</head>

<body>
    <?php
    include('../php/whatsapp.php');
    include('php/headerusers.php');

    //echo $_POST['firstname'];
    //echo $_POST['email'];
    //echo $_POST['address'];
    //echo $_POST['city'];
    ?>
    <main class="contenedor">
        <div class="metodosdepago_div shadow">
            <div class="botones_pago" id="botones_pago">               
                <div class="btn_mercadopago">
                  <img src="../build/img/mercadopago.jpg" alt="">
                  <script src="https://www.mercadopago.com.co/integrations/v1/web-payment-checkout.js" data-preference-id="<?php echo $preference->id; ?>">
                  </script>  
                </div>       
                <hr>     
            </div>
        </div>    
    </main>
    <?php
    include('php/footer.php');
    ?>
</body>

</html>