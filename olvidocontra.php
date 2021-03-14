<!DOCTYPE html>
<html lang="en">

<head>
    <title>Reestablecer contraseña</title>
    <meta name="description" content="Inicia sesión en DOR">

    <?php
    include('php/head.php');
    ?>
</head>

<body>

    <?php
    include('php/whatsapp.php');
    include('php/header.php');
    ?>

    <main class="cont_login">
        <div class="cont_formulario_login">
            <div class="formulario_login">
                <p>Recuperar Contraseña</p>
                <hr>
                <img src="build/img/unicorn.png" alt="Imagen Login">
                <form action="php/recuperarcontra.php" method="POST">
                    <div class="input-icono-mail">
                        <input type="mail" name="email" placeholder="Correo electrónico">
                    </div>
                    <input type="submit" value="Enviar" class="boton_primario">
                </form>
                <div class="extras_login">
                    <a href="login.php">¿Ya tienes cuenta? Inicia Sesión.</a>
                    <a href="registro.php">¿No tienes cuenta? Registrate aquí.</a>
                </div>
            </div>
        </div>
    </main>

    <?php
    include('php/footer.php');
    ?>
</body>

</html>