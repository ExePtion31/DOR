<?php
    include('../servicios/validacionuser.php');
?>    
<header>
    <div class="header">
        <div class="btn-menu">
            <picture>
                <source loading="lazy"  srcset="../build/img/menu.webp" type="image/webp">
                <img loading="lazy" src="../build/img/menu.png" alt="Imagen Menu"> 
            </picture>
        </div>
        <div class="logo-header">
            <a href="index.php">
                <picture>
                    <source loading="lazy"  srcset="../build/img/Logo2.webp" type="image/webp">
                    <img loading="lazy" src="../build/img/Logo2.png" alt="Imagen Logo"> 
                </picture>
            </a>
        </div>
        
        <div class="barra_navegacion">
            <nav class="navegacion">
                <a href="index.php" class="enlace-nav">Inicio</a>
                <a href="animales.php" class="enlace-nav">Productos</a>
                <a href="nosotros.php" class="enlace-nav">Sobre Nosotros</a>
                <a href="contacto.php" class="enlace-nav">Contacto</a>
            </nav>
        </div>
        <div class="items">
            <ul class="menu-items">
                <li><a href="index.php" class="enlace-nav active">Inicio</a></li>
                <hr>
                <li><a href="animales.php" class="enlace-nav">Productos</a></li>
                <hr>
                <li><a href="nosotros.php" class="enlace-nav">Sobre Nosotros</a></li>
                <hr>
                <li><a href="contacto.php" class="enlace-nav">Contacto</a></li>
                <hr>
                <li><a href="../login.php?cerrar_sesion=true">cerrar sesion</a></li>
                <hr>
            </ul>
        </div>
    </div>
    <div class="div_inferior">
        <a href="infousuario.php">
            <div class="usuario">
                <p>Mi cuenta</p>
                <i class="fas fa-user-circle"></i>
            </div>
        </a>
        <a href="cart.php">
            <div class="usuario">
                <p>Carrito</p>
                <i class="fas fa-shopping-cart"></i>
            </div>
        </a>
        <a href="../login.php?cerrar_sesion=true">
            <div class="usuario none">
                <p>Logout</p>
                <i class="fas fa-power-off"></i>
            </div>
        </a>
    </div>
</header>