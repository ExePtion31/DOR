<?php
session_start();
if (isset($_GET['cerrar_sesion'])) {
    $cerrar_sesion = $_GET['cerrar_sesion'];

    if ($cerrar_sesion) {
        session_destroy();
        header("Location: index.php");
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Iniciar Sesión</title>
    <meta name="description" content="Inicia sesión en DOR">

    <?php
    include('php/head.php');
    ?>
</head>

<body class="loginwallpaper">

    <?php
    include('php/whatsapp.php');
    ?>

    <main class="cont_login">
        <a href="index.php" class="text-decoration-none">
            <div class="volver">
                <i class="fas fa-arrow-left"></i>
                <p>Volver</p>
            </div>
        </a>
        <div class="cont_formulario_login">
            <div class="formulario_login">
                <p>Iniciar Sesión</p>
                <hr>
                <img src="build/img/Logopag.png" alt="Imagen Login">
                <form action="php/loginusuarios.php" id="login_usuarios" name="login_usuarios" method="POST">
                    <div class="input-icono-mail">
                        <input type="text" name="email" placeholder="Correo Electrónico">
                    </div>
                    <div class="input-icono-password">
                        <input type="password" name="password" placeholder="Contraseña">
                    </div>
                    <input type="submit" value="Iniciar Sesión" class="boton_primario">
                </form>
                <div class="extras_login">
                    <a href="registro.php">¿No tienes cuenta? Registrate aquí.</a>
                    <a href="olvidocontra.php">¿Olvidaste la contraseña?</a>
                </div>
            </div>
        </div>
    </main>
    <?php
    include('php/footer.php');
    ?>
</body>

</html>