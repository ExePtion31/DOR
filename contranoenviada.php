<!DOCTYPE html>
<html lang="en">

<head>
  <title>Recuperación de contraseña</title>
  <meta name="description" content="Recuperación de contraseña - DOR">
  <?php
  include('php/head.php');
  ?>
</head>

<body>
  <?php
  include('php/whatsapp.php');
  include('php/header.php');
  ?>

  <main class="contenedor div_contenedor_mensaje">
    <div class="contenedor_mensaje">
      <img src="build/img/cancel.png" alt="">
      <hr>
      <h2>Error</h2>
      <p>El correo escrito anteriormente no se encuentra registrado en nuestra Base de Datos. Revisa nuevamente e intentalo de nuevo.</p>
      <a href="login.php" class="boton_primario">Aceptar</a>
    </div>
  </main>

  <?php
  include('php/footer.php');
  ?>
</body>

</html>