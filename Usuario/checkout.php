<?php
session_start();
if (!isset($_SESSION['carrito'])||!isset($_GET['k'])) {
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
            <div class="col-25 mt-3 ">
                    <div class="container">
                        <h4>Carrito</h4>
                        <hr>
                        <ul>
                            <?php
                            $subtotal = 0;
                            for ($i = 0; $i < count($arreglo); $i++) {
                                $subtotal = $subtotal + ($arreglo[$i]['Precio'] * $arreglo[$i]['Cantidad']);
                            ?>
                                <li>
                                    <p><?php echo $arreglo[$i]['Nombre']; ?> (x<?php echo $arreglo[$i]['Cantidad']; ?>) <span class="price">$<?php echo number_format($arreglo[$i]['Precio'] * $arreglo[$i]['Cantidad'], 0, '', '.'); ?></span></p>
                                </li>
                            <?php } ?>
                            <li>
                                <?php 
                                    include('../conexion.php');
                                    $id_ciudad = $_GET["k"];
                                    $query = "SELECT * FROM ciudades_envio WHERE id_ciudad = '$id_ciudad'";
                                    $result = mysqli_query($conexiondb, $query);

                                    while ($row = mysqli_fetch_array($result)) {
                                ?>
                                <p>Envio <span class="price">$<?php echo number_format($row["envio"], 0, '', '.'); $total = $row["envio"];?></span></p>
                                <?php
                                    }
                                ?>
                            </li>
                        </ul>
                        <hr>
                        <?php $total = $total + $subtotal;?>
                        <p>Total <span class="price" style="color:black"><b>$<?php echo number_format($total, 0, '', '.'); ?></b></span></p>
                    </div>
                </div>
            </div>
    <div class="checkout">
        <div class="row">
            <div class="col-75">
                <div class="container">
                    <form action="metodospago.php" method="POST">
                        <div class="row">
                            <div class="col-50">
                                <h3>Dirección de envio</h3>
                                <label for="fname"><i class="fa fa-user"></i> Nombre completo</label>
                                <input type="text" id="fname" name="firstname" placeholder="Nombre completo" required>
                                <label for="email"><i class="fa fa-envelope"></i> Email</label>
                                <input type="email" id="email" name="email" placeholder="correo@example.com" required>
                                <label for="adr"><i class="fa fa-address-card-o"></i> Dirección</label>
                                <input type="text" id="adr" name="address" placeholder="Dirección" pattern="[A-Za-z0-9 ,.-]{1,70}" title="No ingrese carácteres especiales '#°@?'" required>
                                <label for="city"><i class="fa fa-institution"></i> Ciudad</label>
                                <select class="ciudades" id="city" name="city">
                                    <?php
                                        include("../conexion.php");
                                        $query2 = "SELECT * FROM ciudades_envio WHERE id_ciudad = '$id_ciudad'";
                                        $result2 = mysqli_query($conexiondb, $query2);

                                        while ($row2 = mysqli_fetch_array($result2)) {
                                    ?>
                                        <option value="<?php echo $row2["ciudad"];?>"><?php echo $row2["ciudad"];?></option>
                                    <?php
                                        }
                                    ?>
                                </select>
                                <input type="text" value="<?php echo $total?>" readonly class="d-none" name="total">

                                <div class="row">
                                    <div class="col-50">
                                        <label for="zip">Código postal</label>
                                        <input type="number" id="zip" name="zip" placeholder="10001" >
                                    </div>
                                </div>
                            </div>
                        </div>
                        <input type="submit" value="Realizar pago" class="btn-checkout">
                    </form>
                </div>
            </div>
        </div>
    <?php
    include('php/footer.php');
    ?>
</body>

</html>