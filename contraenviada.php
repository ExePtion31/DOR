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
      <img src="build/img/checked.png" alt="">
      <hr>
      <h2>Revisa tu correo</h2>
      <p>Hemos enviado un mensaje a tu correo electronico con tus datos. En caso de no encontrarlo busca en la papelera de <span>Spam</span>.</p>
      <a href="login.php" class="boton_primario">Aceptar</a>
    </div>
  </main>

  <?php
  include('php/footer.php')
  ?>
</body>

</html>