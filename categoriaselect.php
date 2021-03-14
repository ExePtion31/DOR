<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    if (empty($_GET['animal']) || empty($_GET['categoria'])) {
        header("Location: ./animales.php");
    }
    ?>
    <title>
        <?php extract($_GET);
        $categoria = $_GET['categoria'];
        echo ($categoria);
        ?>
    </title>
    <meta name="description" content="Listado de Collares">
    <link rel="stylesheet" href="build/css/app.css">

    <?php
    include('php/head.php');
    ?>
</head>

<body>
    <?php
    include('php/whatsapp.php');
    include('php/header.php');
    ?>

    <form action="categoriaselect.php" method="get" class="cont_buscador">
        <input type="text" placeholder="Buscar producto..." class="buscador" id="buscador">
        <input type="submit" value="Buscar" class="btn_buscar">
    </form>
    <main class="contenedor div_seccion">
        <?php
        error_reporting(E_ALL ^ E_NOTICE);
        include('conexion.php');

        $buscador = $_GET['buscador'];
        $animal = $_GET['animal'];

        if ($buscador == "") {
            $query = "SELECT * FROM productos WHERE categoria = '$categoria' AND animal = '$animal' ORDER BY valor";
            $result = mysqli_query($conexiondb, $query);
        } else {
            $query = "SELECT * FROM productos WHERE categoria = '$categoria' AND  nombre LIKE '%" . $buscador . "%' OR descripcion LIKE '%" . $buscador . "%' OR valor LIKE '%" . $buscador . "%' AND animal = '$animal' ORDER BY valor";
            $result = mysqli_query($conexiondb, $query);
        }

        while ($row = mysqli_fetch_array($result)) {

        ?>
            <div class="producto">
                <h2 class="titulos"><?php echo $row['nombre'] ?></h2>
                <img src="Administracion/img/<?php echo $row['img'] ?>" alt="">
                <div class="info_producto">
                    <p>Categoria: <span><?php echo $row['categoria'] ?></span></p>
                </div>
                <p>$<?php echo $row['valor'] ?></p>
                <a href="comprarproducto.php?id=<?php echo $row['id'] ?>" class="boton_comprar">Comprar</a>
            </div>

        <?php } ?>
    </main>



    <?php
    include('php/footer.php');
    ?>
</body>

</html>