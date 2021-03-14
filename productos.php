<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    if (empty($_GET['animal'])) {
        header("Location: ./animales.php");
    }
    ?>
    <title>Productos</title>
    <meta name="description" content="DOR, listado de productos.">
    <?php
    include('php/head.php');
    ?>

</head>

<body>

    <?php
    include('conexion.php');
    include('php/whatsapp.php');
    include('php/header.php');
    ?>
    <main class="categorias contenedor">
        <?php
        include("conexion.php");

        $query = "SELECT * FROM categorias";
        $result = mysqli_query($conexiondb, $query);

        while ($row = mysqli_fetch_array($result)) {


        ?>
            <a href="categoriaselect.php?categoria=<?php echo $row['nombre'] ?>&animal=<?php echo $_GET['animal'] ?>">
                <div class="div-categoria">
                    <h2 class="titulos"><?php echo $row['nombre'] ?></h2>
                    <hr>
                    <div class="img-categoria">
                        <img src="Administracion/img/<?php echo $row['img'] ?>" alt="">
                    </div>
                    <p class="myButton">+</p>
                </div>
            </a>
        <?php } ?>
    </main>
    <?php
    include('php/footer.php');
    ?>
</body>

</html>