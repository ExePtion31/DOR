<!DOCTYPE html>
<html lang="en">

<head>
    <title>Contacto</title>
    <meta name="description" content="Contacto directo a nosotros.">

    <?php
    include('php/head.php')
    ?>
</head>

<body>
    <?php
    include('../php/whatsapp.php');
    include('php/headerusers.php');
    ?>

    <main class="contenedor">
        <h3 class="centrar-texto titulos">Contacto</h3>

        <div class="contacto-bg"></div>

        <form class="formulario shadow" method="post" action="../php/enviocontacto.php" id="form_contacto">
            <div class="campo">
                <label class="campo__label" for="nombre">Asunto:</label>
                <input class="campo__field" type="text" placeholder="Asunto" id="asunto" name="asunto" required>
            </div>
            <div class="campo">
                <label class="campo__label" for="nombre">Nombre:</label>
                <input class="campo__field" type="text" placeholder="Tu Nombre" id="nombre" name="nombre" required>
            </div>
            <div class="campo">
                <label class="campo__label" for="email">E-mail:</label>
                <input class="campo__field" type="email" placeholder="Tu E-mail" id="email" name="email" required>
            </div>
            <div class="campo">
                <label class="campo__label" for="email">Teléfono:</label>
                <input class="campo__field" type="number" placeholder="Tu teléfono" min="0" id="telefono" name="telefono" required>
            </div>
            <div class="campo">
                <label class="campo__label" for="mensaje">Mensaje:</label>
                <textarea class="campo__field campo__field--textarea" id="mensaje" name="mensaje" required></textarea>
            </div>

            <div class="campo">
                <input type="submit" value="Enviar" class="boton_primario">
            </div>
        </form>
    </main>

    <?php
    include('php/footer.php');
    ?>
</body>

</html>