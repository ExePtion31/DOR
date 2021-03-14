<!DOCTYPE html>
<html lang="en">

<head>
    <title>Carrito de Compras</title>
    <?php
    include('php/head.php');
    ?>
</head>

<body>
    <?php
    include('../php/whatsapp.php');
    include('php/headerusers.php');
    ?>


    <div class="carrito">
        <div class="card-header centrar">
            <h3 class="card-title">Carrito de compras</h3>
        </div>
        <?php
        if (isset($_SESSION['carrito'])) {
        ?>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th>Producto</th>
                            <th>Nombre</th>
                            <th>Talla</th>
                            <th>Cantidad</th>
                            <th>Precio</th>
                            <th>Eliminar</th>
                        </tr>
                    </thead>
                    <?php

                    $arreglocarrito = $_SESSION['carrito'];
                    for ($i = 0; $i < count($arreglocarrito); $i++) {
                    ?>
                        <tbody>
                            <tr>
                                <td><img src="../Administracion/img/<?php echo $arreglocarrito[$i]['img']; ?>" alt=""></td>
                                <td><?php echo $arreglocarrito[$i]['Nombre']; ?></td>
                                <td><?php echo $arreglocarrito[$i]['Talla']; ?></td>
                                <td><span class="tag tag-success"><?php echo $arreglocarrito[$i]['Cantidad']; ?></span></td>
                                <td>$<?php echo number_format($arreglocarrito[$i]['Precio'] * $arreglocarrito[$i]['Cantidad'], 0, '', '.'); ?></td>
                                <td>
                                    <div class="deletecar" data-id="<?php echo $arreglocarrito[$i]['id']; ?>"><i class="fas fa-trash"></i></div>
                                </td>
                            </tr>
                        </tbody>

                    <?php
                    } ?>
                </table>
            </div>
            <div class="total_carrito">
                <h2>TOTAL A PAGAR:</h2>
                <hr>
                <?php
                $subtotalcarrito = 0;
                $envio = 5000;
                $totalcarrito = 0;

                $arreglocarrito = $_SESSION['carrito'];
                $subtotalcarrito = 0;
                for ($i = 0; $i < count($arreglocarrito); $i++) {
                    $subtotalcarrito = ($arreglocarrito[$i]['Precio'] * $arreglocarrito[$i]['Cantidad']) + $subtotalcarrito;
                }

                ?>
                <p>Subtotal: <span>$<?php echo number_format($subtotalcarrito, 0, '', '.'); ?></span></p>
                <p>Envío: <span>$<?php echo number_format($envio, 0, '', '.'); ?></span></p>
                <hr>
                <?php
                $totalcarrito = $subtotalcarrito + $envio
                ?>
                <p><b>Total:</b> <span>$<?php echo number_format($totalcarrito, 0, '', '.'); ?></span></p>
            </div>
            <a href="checkout.php">
                <div class="btn-pagar">
                    <i class="fas fa-receipt"></i>
                    <p>Pagar</p>
                </div>
                
            </a>
        <?php }else{ ?>
                <div class="carrito_vacio">
                    <i class="fas fa-shopping-basket"></i>
                    <p>Aún no has agregado nada a tu carrito de compras.</p>
                </div>
        <?php } ?>
    </div>

    <?php
    include('php/footer.php');
    ?>
</body>

</html>