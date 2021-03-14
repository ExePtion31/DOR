<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    if (empty($_GET['id'])) {
        header("Location: ./animales.php");
    }
    ?>
    <?php
    include('../conexion.php');
    extract($_GET);
    $id = $_GET['id'];

    $query = "SELECT * FROM productos where id = '$id' ";
    $result = mysqli_query($conexiondb, $query);

    while ($row = mysqli_fetch_array($result)) {
    ?>
        <title><?php echo $row['nombre'] ?></title>
        <meta name="description" content="Comprar <?php echo $row['nombreProducto'] ?>">
    <?php } ?>

    <?php
    include('php/head.php')
    ?>
</head>

<body>
    <?php
    include('../php/whatsapp.php');
    include('php/headerusers.php');
    ?>
    <?php
    include('../conexion.php');
    extract($_GET);
    $id = $_GET['id'];

    $query = "SELECT * FROM productos where id = '$id' ";
    $result = mysqli_query($conexiondb, $query);

    while ($row = mysqli_fetch_array($result)) {
    ?>
        <main class="comprar_producto">
            <div class="img_producto">
                <img src="../Administracion/img/<?php echo $row['img'] ?>" alt="">
            </div>
            <div class="desc_producto">
                <h1><?php echo $row['nombre'] ?></h1>
                <p><?php echo $row['descripcion'] ?></p>
                <hr>
                <form action="php/carrito.php?id=<?php echo $row['id'] ?>" method="POST" id="productoselect">
                    <div class="talla_producto">
                        <label for="">Talla <span>Por favor, seleccione una.</span></label>
                        <select name="talla" id="selectalla">
                            <option value="" selected class="seleccionar">Seleccionar</option>
                            <option value="S">S</option>
                            <option value="M">M</option>
                            <option value="L">L</option>
                            <option value="XL">XL</option>
                        </select>
                    </div>
                    <div class="cantidad_producto">
                        <label for="">Cantidad</label>
                        <input type="number" min="1" id="cantidad" name="cantidad">
                    </div>
                    <div class="tarjetas">
                        <p>Formas de pago:</p>
                        <div class="img-tar">
                            <img src="../build/img/visa.png" alt="Imágen Visa">
                            <img src="../build/img/mastercard.png" alt="Imágen MasterCard">
                            <img src="../build/img/paypal.png" alt="Imágen Paypal">
                        </div>
                    </div>
                    <div class="precio_producto">
                        <p>Precio:</p>
                        <span>$<?php echo number_format($row['valor'], 0, '', '.'); ?></span>
                    </div>

                    <div class="btn-carrito">
                        <i class="fas fa-cart-plus"></i>
                        <input type="submit" value="Agregar al carrito">
                    </div>

                </form>
            </div>
        </main>
    <?php } ?>

    <?php
    include('php/footer.php');
    ?>
</body>

</html>