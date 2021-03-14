<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    if (empty($_GET['id'])) {
        header("Location: ./animales.php");
    }
    ?>
    <?php
    include('conexion.php');
    extract($_GET);
    $id = $_GET['id'];

    $query = "SELECT * FROM productos where id = '$id' ";
    $result = mysqli_query($conexiondb, $query);

    while ($row = mysqli_fetch_array($result)) {
    ?>
        <title><?php echo $row['nombre'] ?></title>
        <meta name="description" content="Comprar <?php echo $row['nombreProducto'] ?>">

        <link rel="preload" href="build/css/app.css" as="style">
        <link rel="stylesheet" href="build/css/app.css">
    <?php } ?>

    <?php
    include('php/head.php')
    ?>
</head>

<body>
    <?php
    include('php/whatsapp.php');
    include('php/header.php');
    ?>
    <?php
    include('conexion.php');
    extract($_GET);
    $id = $_GET['id'];

    $query = "SELECT * FROM productos where id = '$id' ";
    $result = mysqli_query($conexiondb, $query);

    while ($row = mysqli_fetch_array($result)) {
    ?>
        <main class="comprar_producto">
            <div class="img_producto">
                <img src="Administracion/img/<?php echo $row['img'] ?>" alt="">
            </div>
            <div class="desc_producto">
                <h1><?php echo $row['nombre'] ?></h1>
                <p><?php echo $row['descripcion'] ?></p>
                <hr>
                <div class="talla_producto">
                    <label for="">Talla <span>Por favor, seleccione una.</span></label>
                    <select name="" id="">
                        <option value="" disabled selected class="seleccionar">Seleccionar</option>
                        <option value="">S</option>
                        <option value="">M</option>
                        <option value="">L</option>
                        <option value="">XL</option>
                    </select>
                </div>
                <div class="cantidad_producto">
                    <label for="">Cantidad</label>
                    <input type="number" min="1" required>
                </div>
                <div class="tarjetas">
                    <p>Formas de pago:</p>
                    <div class="img-tar">
                        <img src="build/img/visa.png" alt="Imágen Visa">
                        <img src="build/img/mastercard.png" alt="Imágen MasterCard">
                        <img src="build/img/paypal.png" alt="Imágen Paypal">
                    </div>
                </div>
                <div class="precio_producto">
                    <p>Precio:</p>
                    <span>$<?php echo $row['valor'] ?></span>
                </div>
                <a href="login.php">
                    <div class="btn-carrito">
                        <i class="fas fa-cart-plus"></i>
                        Agregar al carrito
                    </div>
                </a>
            </div>
        </main>
    <?php } ?>

    <?php
    include('php/footer.php');
    ?>
</body>

</html>