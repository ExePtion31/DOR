<?php
    if(!isset($_POST['total']) || !isset($_POST['city']) || !isset($_POST['zip']) || !isset($_POST['address'])){
        header('Location: ./cart.php');
    }
?>
<?php
        session_start();
        // SDK de Mercado Pago
        require __DIR__ .  '/vendor/autoload.php';
        
        // Agrega credenciales
        MercadoPago\SDK::setAccessToken('TEST-8017408200086131-032023-bb8747edc74fc3304769a872f37de54f-279766251');
        
        // Array de informacion de envio
        $informacion[] = array(
            'total' => $_POST['total'],
            'city' => $_POST['city'],
            'zip' => $_POST['zip'],
            'direccion' => $_POST['address'],
            'metodo' => 'MercadoPago'
        ); 
        $_SESSION['informacion'] = $informacion;    


        // Crea un objeto de preferencia
        $preference = new MercadoPago\Preference();

        $preference->payment_methods = array(
            "excluded_payment_types" => array(
              array(
                  "id" => "ticket",
                  "id" => "atm"
                )
            ),
            "installments" => 4
          );
        $preference->back_urls = array(
            "success" => "http://localhost/DOR/Usuario/php/validacioncompra.php",
            "failure" => "http://localhost/DOR/Usuario/index.php",
            "pending" => "http://localhost/DOR/Usuario/errorpago.php?error=pendiente"
        );
        $preference->auto_return = "approved";
        
        // Crea un ítem en la preferencia 
        $datos = array();
        $item = new MercadoPago\Item();
        $item->title = 'Productos DOR';
        $item->currency_id = "COP";
        $item->quantity = 1;
        $item->unit_price = $_POST['total'];
        $datos[]=$item;

        $preference->items = $datos;
        $preference->save();
        
?>

<!DOCTYPE html>
<html lang="en">

<head data-header-color="#c0392b">
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