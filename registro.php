<!DOCTYPE html>
<html lang="en">

<head>
    <title>Registrar cuenta</title>
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
                <p>Registro</p>
                <hr>
                <img src="build/img/Logopag.png" alt="Imagen Login">
                <form action="php/registrarusu.php" method="post" id="crear_usuarios">
                    <div class="input-icono-login">
                        <input type="text" placeholder="Nombre completo" name="nombre" required>
                    </div>
                    <div class="input-icono-mail">
                        <input type="email" placeholder="Correo electrónico" name="email" required>
                    </div>
                    <div class="input-icono-phone">
                        <input type="number" placeholder="Teléfono" name="telefono" required>
                    </div>
                    <div class="input-icono-password">
                        <input type="password" placeholder="Contraseña" name="password" required>
                    </div>
                    <input type="submit" value="Crear Cuenta" class="boton_primario">
                </form>
                <div class="extras_login">
                    <a href="login.php">¿Ya tienes cuenta? Inicia Sesión.</a>
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