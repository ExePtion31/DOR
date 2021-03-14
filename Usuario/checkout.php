<?php
session_start();
if (!isset($_SESSION['carrito'])) {
    header('Location: ./cart.php');
}
$arreglo = $_SESSION['carrito'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Checkout | DOR</title>
    <meta name="description" content="Checkout">
    <?php
    include('php/head.php');
    ?>
</head>

<body>
    <?php
    include('../php/whatsapp.php');
    include('php/headerusers.php');
    ?>
    <div class="checkout">
        <div class="row">
            <div class="col-75">
                <div class="container">
                    <form action="php/validacioncompra.php" id="formcheckout" method="POST">
                        <div class="row">
                            <div class="col-50">
                                <h3>Dirección de envio</h3>
                                <label for="fname"><i class="fa fa-user"></i> Nombre completo</label>
                                <input type="text" id="fname" name="firstname" placeholder="Nombre completo" >
                                <label for="email"><i class="fa fa-envelope"></i> Email</label>
                                <input type="text" id="email" name="email" placeholder="correo@example.com" >
                                <label for="adr"><i class="fa fa-address-card-o"></i> Dirección</label>
                                <input type="text" id="adr" name="address" placeholder="Dirección" >
                                <label for="city"><i class="fa fa-institution"></i> Ciudad</label>
                                <select class="ciudades" id="city" name="city">
                                    <option value="">-</option>
                                    <option value="Arauca">Arauca</option>
                                    <option value="Armenia">Armenia</option>
                                    <option value="Barranquilla">Barranquilla</option>
                                    <option value="Bogotá">Bogotá</option>
                                    <option value="Bucaramanga">Bucaramanga</option>
                                    <option value="Cali">Cali</option>
                                    <option value="Cartagena">Cartagena</option>
                                    <option value="Cúcuta">Cúcuta</option>
                                    <option value="Florencia">Florencia</option>
                                    <option value="Ibagué">Ibagué</option>
                                    <option value="Leticia">Leticia</option>
                                    <option value="Manizales">Manizales</option>
                                    <option value="Medellín">Medellín</option>
                                    <option value="Mitú">Mitú</option>
                                    <option value="Mocoa">Mocoa</option>
                                    <option value="Montería">Montería</option>
                                    <option value="Neiva">Neiva</option>
                                    <option value="Pasto">Pasto</option>
                                    <option value="Pereira">Pereira</option>
                                    <option value="Popayán">Popayán</option>
                                    <option value="Puerto Carreño">Puerto Carreño</option>
                                    <option value="Puerto Inírida">Puerto Inírida</option>
                                    <option value="Quibdó">Quibdó</option>
                                    <option value="Riohacha">Riohacha</option>
                                    <option value="San Andrés">San Andrés</option>
                                    <option value="San José del Guaviare">San José del Guaviare</option>
                                    <option value="Santa Marta">Santa Marta</option>
                                    <option value="Sincelejo">Sincelejo</option>
                                    <option value="Tunja">Tunja</option>
                                    <option value="Valledupar">Valledupar</option>
                                    <option value="Villavicencio">Villavicencio</option>
                                    <option value="Yopal">Yopal</option>
                                </select>

                                <div class="row">
                                    <div class="col-50">
                                        <label for="zip">Código postal</label>
                                        <input type="text" id="zip" name="zip" placeholder="10001" >
                                    </div>
                                </div>
                            </div>

                            <div class="col-50">
                                <h3>Pago</h3>
                                <label for="fname">Tarjetas aceptadas</label>
                                <div class="icon-container">
                                    <i class="fa fa-cc-visa" style="color:blue;"></i>
                                    <i class="fa fa-cc-mastercard" style="color:red;"></i>
                                </div>
                                <label for="cname">Nombre en la tarjeta</label>
                                <input type="text" id="cname" name="cardname" placeholder="Nombre completo" >
                                <label for="ccnum">Número de la tarjeta</label>
                                <input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444" >
                                <label for="expmonth">Exp Month</label>
                                <select class="ciudades" id="expmonth" name="expmonth">
                                    <option value="">-</option>
                                    <option value="Arauca">Enero</option>
                                    <option value="Armenia">Febrero</option>
                                    <option value="Barranquilla">Marzo</option>
                                    <option value="Bogotá">Abril</option>
                                    <option value="Bucaramanga">Mayo</option>
                                    <option value="Cali">Junio</option>
                                    <option value="Cartagena">Julio</option>
                                    <option value="Cúcuta">Agosto</option>
                                    <option value="Florencia">Septiembre</option>
                                    <option value="Ibagué">Octubre</option>
                                    <option value="Leticia">Noviembre</option>
                                    <option value="Manizales">Diciembre</option>
                                </select>

                                <div class="row">
                                    <div class="col-50">
                                        <label for="expyear">Exp Year</label>
                                        <input type="text" id="expyear" name="expyear" placeholder="2018" >
                                    </div>
                                    <div class="col-50">
                                        <label for="cvv">CVV</label>
                                        <input type="text" id="cvv" name="cvv" placeholder="352" >
                                    </div>
                                </div>
                            </div>

                        </div>

                        <input type="submit" value="Continuar con el pago" class="btn-checkout">
                    </form>
                </div>
            </div>
            <div class="col-25">
                <div class="container">
                    <h4>Carrito</h4>
                    <hr>
                    <ul>
                        <?php
                        $total = 5000;
                        $subtotal = 0;
                        for ($i = 0; $i < count($arreglo); $i++) {
                            $subtotal = $subtotal + ($arreglo[$i]['Precio'] * $arreglo[$i]['Cantidad']);
                        ?>
                            <li>
                                <p><?php echo $arreglo[$i]['Nombre']; ?> (<?php echo $arreglo[$i]['Cantidad']; ?>) <span class="price">$<?php echo number_format($arreglo[$i]['Precio'] * $arreglo[$i]['Cantidad'], 0, '', '.'); ?></span></p>
                            </li>
                        <?php } ?>
                        <li>
                            <p>Envio <span class="price">$5.000</span></p>
                        </li>
                    </ul>
                    <hr>
                    <?php $total = $total + $subtotal; ?>
                    <p>Total <span class="price" style="color:black"><b>$<?php echo number_format($total, 0, '', '.'); ?></b></span></p>
                </div>
            </div>
        </div>
    </div>
    <?php
    include('php/footer.php');
    ?>
</body>

</html>