<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    if (empty($_GET['animal']) || empty($_GET['categoria'] || empty($_POST['buscador']))) {
        header("Location: ./animales.php");
    }
    ?>
    <title>
        <?php extract($_GET);
        $categoria = $_GET['categoria'];
        $animal = $_GET['animal'];
        $busqueda = $_POST['buscador'];
        echo ($busqueda);
        ?>
    </title>
    <meta name="description" content="Listado de Collares">
    <?php
    include('php/head.php');
    ?>
</head>

<body>
    <?php
    include('php/whatsapp.php');
    include('php/header.php');
    ?>

    <form action="busqueda.php?animal=<?php echo $animal?>&categoria=<?php echo $categoria?>" method="POST" class="cont_buscador">
        <input type="text" placeholder="Buscar producto..." class="buscador" name="buscador">
        <input type="submit" value="Buscar" class="btn_buscar">
    </form>

    <?php
        include('conexion.php');
        $query = "SELECT * FROM productos WHERE animal = '$animal' AND categoria = '$categoria' AND nombre LIKE '%" . $busqueda . "%' OR descripcion LIKE '%" . $busqueda . "%' OR valor LIKE '%" . $busqueda . "%' ORDER BY valor";
        $result = mysqli_query($conexiondb, $query);

        if(mysqli_num_rows($result) > 0 ){
    ?>
    <main class="contenedor div_seccion">
        <?php

            while ($row = mysqli_fetch_array($result)) {

        ?>
            <div class="producto">
                <h2 class="titulos"><?php echo $row['nombre'] ?></h2>
                <img src="Administracion/img/<?php echo $row['img'] ?>" alt="">
                <div class="info_producto">
                    <p>Categoria: <span><?php echo $row['categoria'] ?></span></p>
                </div>
                <p>$<?php echo number_format($row['valor'], 0, '', '.');?></p>
                <a href="comprarproducto.php?id=<?php echo $row['id'] ?>" class="boton_comprar">Comprar</a>
            </div>
        <?php 
            }
        ?>
    </main>
    <?php
        }else{
    ?>
            <div class="sin_resultados">
                <i class="far fa-frown-open"></i>
                <p>No se encontraron resultados para "<?php echo $busqueda?>"</p>
            </div>
    <?php } ?>
    <?php
    include('php/footer.php');
    ?>
</body>

</html>