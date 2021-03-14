<!DOCTYPE html>
<html lang="en">
<head>
    <title>Panel usuario</title>
    <?php 
        include('servicios/validacionuser.php');
        include('php/head.php');
    ?>
</head>
<body>
    <?php 
        include('php/header.php');
        include('php/footer.php');
    ?>   

    <a href="login.php?cerrar_sesion=true">cerrar sesion</a>
</body>
</html>