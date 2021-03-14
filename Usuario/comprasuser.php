<!DOCTYPE html>
<html lang="en">

<head>
    <title>Compras realizadas</title>
    <meta name="description" content="Compras realizadas">

    <?php
    include('php/head.php');
    ?>
</head>

<body>
    <?php
    include('../php/whatsapp.php');
    include('php/headerusers.php');
    ?>

    <h1 class="titulos">Historial de compras</h1>
    <?php
    include('../conexion.php');
    $id = $_SESSION['id'];

    $query = "SELECT * FROM ventas WHERE id_usuario = '$id'";
    $result = mysqli_query($conexiondb, $query);

    while ($row = mysqli_fetch_array($result)) {

    ?>
        <div class="contenedor_compra">
            <div class="info_compra">
                <div class="info_compra-1">
                    <p>Número de orden: <span><?php echo $row['id_venta'] ?></span></p>
                    <p>|</p>
                    <p>Fecha de compra: <span><?php echo $row['fecha'] ?></span></p>
                </div>
                <div class="info_compra-2">
                    <p>Estado: <span><?php echo $row['estado'] ?></span></p>
                </div>
            </div>
            <div class="info_direccion">
                <div class="info_compra-1">
                    <p>Dirección: <span><?php echo $row['direccion'] ?></span></p>
                    <p>|</p>
                    <p>Ciudad: <span><?php echo $row['ciudad'] ?></span></p>
                </div>
            </div>
            <div class="h2_productos">
                <h2>Productos</h2>
            </div>
            <?php
            $total = 0;
            $productosdb = $row['productos'];
            $productos = unserialize($productosdb);
            for ($i = 0; $i < count($productos); $i++) {
            ?>
                <div class="info_productos">
                    <div class="img_producto">
                        <img src="../Administracion/img/<?php echo $productos[$i]['img'] ?>" alt="">
                    </div>
                    <div class="informacion_producto">
                        <div class="informacion_producto-1">
                            <h2><?php echo $productos[$i]['Nombre'] ?></h2>
                            <p>Talla: <span><?php echo $productos[$i]['Talla'] ?></span></p>
                            <p>Cantidad: <span><?php echo $productos[$i]['Cantidad'] ?></span></p>
                        </div>
                        <div class="informacion_producto-2">
                            <p>Total: <span>$<?php echo number_format($productos[$i]['Precio'] * $productos[$i]['Cantidad'], 0, '', '.'); ?></span></p>
                        </div>
                    </div>
                </div>
            <?php
                $total = $total + ($productos[$i]['Precio'] * $productos[$i]['Cantidad']);
            }
            ?>
            <div class="total_compra">
                <p>Envio: <span>$5.000</span></p>
                <p>Total: <span>$<?php echo number_format($total + 5000, 0, '', '.'); ?></span></p>
            </div>
            <hr>
        </div>
    <?php } ?>

    <?php
    include('php/footer.php');
    ?>
</body>

</html>