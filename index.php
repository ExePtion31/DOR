<!DOCTYPE html>
<html lang="en">

<head>
  <title>Inicio</title>
  <meta name="description" content="DOR, Tienda para mascotas con productos 100% de calidad.">

  <?php
  include('php/head.php');
  ?>
</head>

<body>

  <?php
  include('php/whatsapp.php');
  include('php/header.php');
  ?>

  <div class="sliderinicio">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
      </ol>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <picture>
            <source loading="lazy" srcset="build/img/img1.webp" type="image/webp" class="d-block w-100">
            <img loading="lazy" src="build/img/img1.jpg" alt="imagen blog" class="d-block w-100">
          </picture>
        </div>
        <div class="carousel-item">
          <picture>
            <source loading="lazy" srcset="build/img/img2.webp" type="image/webp" class="d-block w-100">
            <img loading="lazy" src="build/img/img2.jpg" alt="imagen blog" class="d-block w-100">
          </picture>
        </div>
        <div class="carousel-item">
          <picture>
            <source loading="lazy" srcset="build/img/img3.webp" type="image/webp" class="d-block w-100">
            <img loading="lazy" src="build/img/img3.jpg" alt="imagen blog" class="d-block w-100">
          </picture>
        </div>
        <div class="carousel-item">
          <picture>
            <source loading="lazy" srcset="build/img/img4.webp" type="image/webp" class="d-block w-100">
            <img loading="lazy" src="build/img/img4.jpg" alt="imagen blog" class="d-block w-100">
          </picture>
        </div>
      </div>
    </div>
  </div>

  <section class="seccion">
    <h2 class="centrar-texto titulos">Más Sobre Nosotros</h2>

    <div class="iconos-nosotros">
      <div class="icono border-bottom">
        <img src="build/img/icono1.svg" alt="Icono Seguridad">
        <h3>Seguridad</h3>
        <p>Quasi quibusdam, quos deserunt, recusandae iusto dolorem voluptatibus quaerat veritatis consectetur culpa sit dignissimos maiores iure id, magnam non voluptatum molestiae doloremque.</p>
      </div>

      <div class="icono border-bottom">
        <img src="build/img/icono2.svg" alt="Icono Mejor Precio">
        <h3>El Mejor Precio</h3>
        <p>Quasi quibusdam, quos deserunt, recusandae iusto dolorem voluptatibus quaerat veritatis consectetur culpa sit dignissimos maiores iure id, magnam non voluptatum molestiae doloremque.</p>
      </div>

      <div class="icono border-bottom">
        <img src="build/img/icono3.svg" alt="Icono a Tiempo">
        <h3>A Tiempo</h3>
        <p>Quasi quibusdam, quos deserunt, recusandae iusto dolorem voluptatibus quaerat veritatis consectetur culpa sit dignissimos maiores iure id, magnam non voluptatum molestiae doloremque.</p>
      </div>
    </div>
  </section>

  <div class="video">
    <div class="overlay">
      <div class="contenedor contenido-video">
        <h2>Lo mejor en accesorios para tú Mascota. <span>Bogotá, Colombia </span></h2>
      </div>
    </div>
    <video autoplay muted loop preload="auto">
      <source src="video/perros.mp4" type="video/mp4">
      <source src="video/perros.webm" type="video/webm">
    </video>
  </div>

  <div class="contactos">
    <div class="mapa">
      <h3>Ubicación</h3>
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2364.675296187594!2d-74.22123448541046!3d4.6129942252657115!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x6a8e0c02c9facfdc!2sConjunto%20Residencial%20Peral!5e0!3m2!1ses!2sco!4v1610835487928!5m2!1ses!2sco" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
    </div>
    <div class="redes">
      <h3>Contacto</h3>
      <div class="red">
        <picture>
          <source loading="lazy" srcset="build/img/facebook.webp" type="image/webp">
          <img loading="lazy" src="build/img/facebook.jpg" alt="imagen blog">
        </picture>
        <p>Facebook: <span>Dor_Sobaka</span></p>
      </div>
      <div class="red">
        <picture>
          <source loading="lazy" srcset="build/img/instagram.webp" type="image/webp">
          <img loading="lazy" src="build/img/instagram.jpg" alt="imagen blog">
        </picture>
        <p>Instagram: <span>@Dor_Sobaka</span></p>
      </div>
      <div class="red">
        <picture>
          <source loading="lazy" srcset="build/img/mail.webp" type="image/webp">
          <img loading="lazy" src="build/img/mail.jpg" alt="imagen blog">
        </picture>
        <p>E-Mail: <span>dorsobaka2021@gmail.com</span></p>
      </div>
    </div>
  </div>

  <?php
  include('php/footer.php');
  ?>
</body>

</html>