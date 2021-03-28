<!DOCTYPE html>
<html lang="en">
<head>
  <title>AdminDOR Plus | Ventas <?php echo $_GET["k"];?> </title>
  <meta name="description" content="Página de inicio - Administrador">
  <?php
    include('php/head.php');
  ?>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <?php
    include('templates/navbar.php');
    include('templates/aside.php');
  ?>

  <div class="content-wrapper">
    <section class="content-header">
      <h1>Ventas <?php echo $_GET["k"];?> </h1>
    </section>

    <!-- Main content -->
    <section class="content">
    <?php
        if($_GET["k"] == "En Proceso"){
          include('../conexion.php');
          $estado = $_GET["k"];

          $query = "SELECT * FROM ventas WHERE estado = '$estado' ORDER BY id_venta DESC";
          $result = mysqli_query($conexiondb, $query);

          while ($row = mysqli_fetch_array($result)) {

    ?>
      <form action="php/actualizarventa.php?id=<?php echo $row['id_venta'] ?>" method="POST" class="actualizarventa">
        <div class="contenedor_compra">
            <div class="info_compra">
                <div class="info_compra-1">
                    <p>Número de orden: <span><?php echo $row['id_venta'] ?></span></p>
                    <p>|</p>
                    <p>Fecha de compra: <span><?php echo $row['fecha'] ?></span></p>
                </div>
                <div class="info_compra-2">
                    <p>Estado: </p>
                    <select name="estado">  
                      <option value="<?php echo $row['estado'] ?>" select><?php echo $row['estado'] ?></option>
                      <option value="Enviado">Enviado</option>
                      <option value="Entregado">Entregado</option>
                      <option value="Cancelado">Cancelado</option>
                    </select>
                </div>
            </div>
            <div class="info_direccion">
                <div class="info_compra-1">
                    <p>Dirección: <span><?php echo $row['direccion'] ?></span></p>
                    <p>|</p>
                    <p>Ciudad: <span><?php echo $row['ciudad'] ?></span></p>
                </div>
            </div>
            <?php
            $iduser = $row["id_usuario"];
            $query2 = "SELECT * FROM usuarios WHERE idUsuario = '$iduser'";
            $result2 = mysqli_query($conexiondb, $query2);
    
            while ($row2 = mysqli_fetch_array($result2)) {
            ?>
            <div class="info_usuario">
              <div class="info_usuarios2">
                <p>Nombre: <span><?php echo $row2['nombreUsuario'] ?></span></p>
                <p>Teléfono: <span><?php echo $row2['telefonoUsuario'] ?></span></p>
              </div>
              <p>Correo: <span><?php echo $row2['correoUsuario'] ?></span></p>
              <p>Metodo: <span><?php echo $row['metodo'] ?></span></p>
            </div>
            <?php } ?>
            <div class="h2_productos">
                <h2>Productos</h2>
            </div>
            <?php
            $total = 0;
            $productosdb = $row['productos'];
            $productos = unserialize($productosdb);
            for ($i = 0; $i < count($productos); $i++) {
            ?>
                <div class="info_productos">
                    <div class="img_producto">
                        <img src="../Administracion/img/<?php echo $productos[$i]['img'] ?>" alt="">
                    </div>
                    <div class="informacion_producto">
                        <div class="informacion_producto-1">
                            <h2><?php echo $productos[$i]['Nombre'] ?></h2>
                            <p>Talla: <span><?php echo $productos[$i]['Talla'] ?></span></p>
                            <p>Cantidad: <span><?php echo $productos[$i]['Cantidad'] ?></span></p>
                        </div>
                        <div class="informacion_producto-2">
                            <p>Total: <span>$<?php echo number_format($productos[$i]['Precio'] * $productos[$i]['Cantidad'], 0, '', '.'); ?></span></p>
                        </div>
                    </div>
                </div>
            <?php
                $total = $total + ($productos[$i]['Precio'] * $productos[$i]['Cantidad']);
            }
            ?>
            <div class="total_compra">
                <p>Envio: <span>$5.000</span></p>
                <p>Total: <span>$<?php echo number_format($total + 5000, 0, '', '.'); ?></span></p>
            </div>
            <input type="submit" value="Guardar" class="btn btn-primary mt-3">
            <hr>
        </div>
      </form>  
    <?php
        } 
      }elseif($_GET["k"] == "Enviadas"){
        include('../conexion.php');

        $query = "SELECT * FROM ventas WHERE estado = 'Enviado' ORDER BY id_venta DESC";
        $result = mysqli_query($conexiondb, $query);

        while ($row = mysqli_fetch_array($result)) {
    ?>
      <form action="php/actualizarventa.php?id=<?php echo $row['id_venta'] ?>" method="POST" class="actualizarventa">
        <div class="contenedor_compra">
            <div class="info_compra">
                <div class="info_compra-1">
                    <p>Número de orden: <span><?php echo $row['id_venta'] ?></span></p>
                    <p>|</p>
                    <p>Fecha de compra: <span><?php echo $row['fecha'] ?></span></p>
                </div>
                <div class="info_compra-2">
                    <p>Estado: </p>
                    <select name="estado">  
                      <option value="<?php echo $row['estado'] ?>" select><?php echo $row['estado'] ?></option>
                      <option value="En Proceso">En Proceso</option>
                      <option value="Entregado">Entregado</option>
                      <option value="Cancelado">Cancelado</option>
                    </select>
                </div>
            </div>
            <div class="info_direccion">
                <div class="info_compra-1">
                    <p>Dirección: <span><?php echo $row['direccion'] ?></span></p>
                    <p>|</p>
                    <p>Ciudad: <span><?php echo $row['ciudad'] ?></span></p>
                </div>
            </div>
            <?php
            $iduser = $row["id_usuario"];
            $query2 = "SELECT * FROM usuarios WHERE idUsuario = '$iduser'";
            $result2 = mysqli_query($conexiondb, $query2);
    
            while ($row2 = mysqli_fetch_array($result2)) {
            ?>
            <div class="info_usuario">
              <div class="info_usuarios2">
                <p>Nombre: <span><?php echo $row2['nombreUsuario'] ?></span></p>
                <p>Teléfono: <span><?php echo $row2['telefonoUsuario'] ?></span></p>
              </div>
              <p>Correo: <span><?php echo $row2['correoUsuario'] ?></span></p>
              <p>Metodo: <span><?php echo $row['metodo'] ?></span></p>
            </div>
            <?php } ?>
            <div class="h2_productos">
                <h2>Productos</h2>
            </div>
            <?php
            $total = 0;
            $productosdb = $row['productos'];
            $productos = unserialize($productosdb);
            for ($i = 0; $i < count($productos); $i++) {
            ?>
                <div class="info_productos">
                    <div class="img_producto">
                        <img src="../Administracion/img/<?php echo $productos[$i]['img'] ?>" alt="">
                    </div>
                    <div class="informacion_producto">
                        <div class="informacion_producto-1">
                            <h2><?php echo $productos[$i]['Nombre'] ?></h2>
                            <p>Talla: <span><?php echo $productos[$i]['Talla'] ?></span></p>
                            <p>Cantidad: <span><?php echo $productos[$i]['Cantidad'] ?></span></p>
                        </div>
                        <div class="informacion_producto-2">
                            <p>Total: <span>$<?php echo number_format($productos[$i]['Precio'] * $productos[$i]['Cantidad'], 0, '', '.'); ?></span></p>
                        </div>
                    </div>
                </div>
            <?php
                $total = $total + ($productos[$i]['Precio'] * $productos[$i]['Cantidad']);
            }
            ?>
            <div class="total_compra">
                <p>Envio: <span>$5.000</span></p>
                <p>Total: <span>$<?php echo number_format($total + 5000, 0, '', '.'); ?></span></p>
            </div>
            <input type="submit" value="Guardar" class="btn btn-primary mt-3">
            <hr>
        </div>
      </form>
    <?php 
        } 
      }elseif($_GET["k"] == "Entregadas"){
        include('../conexion.php');

        $query = "SELECT * FROM ventas WHERE estado = 'Entregado' ORDER BY id_venta DESC";
        $result = mysqli_query($conexiondb, $query);

        while ($row = mysqli_fetch_array($result)) {
    ?>
      <form action="php/actualizarventa.php?id=<?php echo $row['id_venta'] ?>" method="POST" class="actualizarventa">
        <div class="contenedor_compra">
            <div class="info_compra">
                <div class="info_compra-1">
                    <p>Número de orden: <span><?php echo $row['id_venta'] ?></span></p>
                    <p>|</p>
                    <p>Fecha de compra: <span><?php echo $row['fecha'] ?></span></p>
                </div>
                <div class="info_compra-2">
                    <p>Estado: </p>
                    <select name="estado">  
                      <option value="<?php echo $row['estado']; ?>" select><?php echo $row['estado']; ?></option>
                      <option value="En Proceso">En Proceso</option>
                      <option value="Enviado">Enviado</option>
                      <option value="Cancelado">Cancelado</option>
                    </select>
                </div>
            </div>
            <div class="info_direccion">
                <div class="info_compra-1">
                    <p>Dirección: <span><?php echo $row['direccion'] ?></span></p>
                    <p>|</p>
                    <p>Ciudad: <span><?php echo $row['ciudad'] ?></span></p>
                </div>
            </div>
            <?php
            $iduser = $row["id_usuario"];
            $query2 = "SELECT * FROM usuarios WHERE idUsuario = '$iduser'";
            $result2 = mysqli_query($conexiondb, $query2);
    
            while ($row2 = mysqli_fetch_array($result2)) {
            ?>
            <div class="info_usuario">
              <div class="info_usuarios2">
                <p>Nombre: <span><?php echo $row2['nombreUsuario'] ?></span></p>
                <p>Teléfono: <span><?php echo $row2['telefonoUsuario'] ?></span></p>
              </div>
              <p>Correo: <span><?php echo $row2['correoUsuario'] ?></span></p>
              <p>Metodo: <span><?php echo $row['metodo'] ?></span></p>
            </div>
            <?php } ?>
            <div class="h2_productos">
                <h2>Productos</h2>
            </div>
            <?php
            $total = 0;
            $productosdb = $row['productos'];
            $productos = unserialize($productosdb);
            for ($i = 0; $i < count($productos); $i++) {
            ?>
                <div class="info_productos">
                    <div class="img_producto">
                        <img src="../Administracion/img/<?php echo $productos[$i]['img'] ?>" alt="">
                    </div>
                    <div class="informacion_producto">
                        <div class="informacion_producto-1">
                            <h2><?php echo $productos[$i]['Nombre'] ?></h2>
                            <p>Talla: <span><?php echo $productos[$i]['Talla'] ?></span></p>
                            <p>Cantidad: <span><?php echo $productos[$i]['Cantidad'] ?></span></p>
                        </div>
                        <div class="informacion_producto-2">
                            <p>Total: <span>$<?php echo number_format($productos[$i]['Precio'] * $productos[$i]['Cantidad'], 0, '', '.'); ?></span></p>
                        </div>
                    </div>
                </div>
            <?php
                $total = $total + ($productos[$i]['Precio'] * $productos[$i]['Cantidad']);
            }
            ?>
            <div class="total_compra">
                <p>Envio: <span>$5.000</span></p>
                <p>Total: <span>$<?php echo number_format($total + 5000, 0, '', '.'); ?></span></p>
            </div>
            <input type="submit" value="Guardar" class="btn btn-primary mt-3" >
            <hr>
        </div>
      </form>
    <?php
        } 
      }elseif($_GET["k"] == "Canceladas"){
        include('../conexion.php');

        $query = "SELECT * FROM ventas WHERE estado = 'Cancelado' ORDER BY id_venta DESC";
        $result = mysqli_query($conexiondb, $query);

        while ($row = mysqli_fetch_array($result)) {
    ?>
      <form action="php/actualizarventa.php?id=<?php echo $row['id_venta'] ?>" method="POST" class="actualizarventa">
        <div class="contenedor_compra">
            <div class="info_compra">
                <div class="info_compra-1">
                    <p>Número de orden: <span><?php echo $row['id_venta'] ?></span></p>
                    <p>|</p>
                    <p>Fecha de compra: <span><?php echo $row['fecha'] ?></span></p>
                </div>
                <div class="info_compra-2">
                    <p>Estado: </p>
                    <select name="estado">  
                      <option value="<?php echo $row['estado'] ?>" select><?php echo $row['estado'] ?></option>
                      <option value="En Proceso">En Proceso</option>
                      <option value="Enviado">Enviado</option>
                      <option value="Entregado">Entregado</option>
                    </select>
                </div>
            </div>
            <div class="info_direccion">
                <div class="info_compra-1">
                    <p>Dirección: <span><?php echo $row['direccion'] ?></span></p>
                    <p>|</p>
                    <p>Ciudad: <span><?php echo $row['ciudad'] ?></span></p>
                </div>
            </div>
            <?php
            $iduser = $row["id_usuario"];
            $query2 = "SELECT * FROM usuarios WHERE idUsuario = '$iduser'";
            $result2 = mysqli_query($conexiondb, $query2);
    
            while ($row2 = mysqli_fetch_array($result2)) {
            ?>
            <div class="info_usuario">
              <div class="info_usuarios2">
                <p>Nombre: <span><?php echo $row2['nombreUsuario'] ?></span></p>
                <p>Teléfono: <span><?php echo $row2['telefonoUsuario'] ?></span></p>
              </div>
              <p>Correo: <span><?php echo $row2['correoUsuario'] ?></span></p>
              <p>Metodo: <span><?php echo $row['metodo'] ?></span></p>
            </div>
            <?php } ?>
            <div class="h2_productos">
                <h2>Productos</h2>
            </div>
            <?php
            $total = 0;
            $productosdb = $row['productos'];
            $productos = unserialize($productosdb);
            for ($i = 0; $i < count($productos); $i++) {
            ?>
                <div class="info_productos">
                    <div class="img_producto">
                        <img src="../Administracion/img/<?php echo $productos[$i]['img'] ?>" alt="">
                    </div>
                    <div class="informacion_producto">
                        <div class="informacion_producto-1">
                            <h2><?php echo $productos[$i]['Nombre'] ?></h2>
                            <p>Talla: <span><?php echo $productos[$i]['Talla'] ?></span></p>
                            <p>Cantidad: <span><?php echo $productos[$i]['Cantidad'] ?></span></p>
                        </div>
                        <div class="informacion_producto-2">
                            <p>Total: <span>$<?php echo number_format($productos[$i]['Precio'] * $productos[$i]['Cantidad'], 0, '', '.'); ?></span></p>
                        </div>
                    </div>
                </div>
            <?php
                $total = $total + ($productos[$i]['Precio'] * $productos[$i]['Cantidad']);
            }
            ?>
            <div class="total_compra">
                <p>Envio: <span>$5.000</span></p>
                <p>Total: <span>$<?php echo number_format($total + 5000, 0, '', '.'); ?></span></p>
            </div>
            <input type="submit" value="Guardar" class="btn btn-primary mt-3">
            <hr>
        </div>
      </form>
    <?php
        }
      }
    ?>
    </section>
  </div>
  <?php
    include('templates/footer.php');
  ?>
</div>
</body>
</html>
