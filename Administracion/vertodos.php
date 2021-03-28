<!DOCTYPE html>
<html lang="en">

<head>
  <title>AdminDOR Plus | Ver <?php extract($_GET);
                              echo $_GET['categoria']; ?></title>
  <meta name="description" content="Ver todos los elementos">
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
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Ver <?php echo $_GET['categoria']; ?></h1>
            </div>
          </div>
        </div>
      </section>

      <!-- Main content -->
      <section class="content d-grid-2">
        <?php
        if ($_GET['categoria'] == "categorias" || $_GET['categoria'] == "productos" || $_GET['categoria'] == "animales") {

        ?>
          <?php
          include('../conexion.php');
          $categoria = $_GET['categoria'];

          $query = "SELECT * FROM $categoria";
          $result = mysqli_query($conexiondb, $query);

          while ($row = mysqli_fetch_array($result)) {
          ?>
            <div class="col-sm-10 b-2 centrar">
              <div class="position-relative padding" style="min-height: 180px;">
                <img src="img/<?php echo $row['img'] ?>" alt="Photo 3" class="img-fluid">
                <div class="ribbon-wrapper ribbon-xl">
                  <div class="ribbon bg-danger text-lg">
                    <?php echo $row['nombre'] ?>
                  </div>
                </div>
                <a href="editar.php?editar=<?php echo $categoria ?>&id=<?php echo $row['id'] ?>" class="btn btn-block btn-success btn-xs">Editar</a>
                <a href="#" data-id="<?php echo $row['id'] ?>" data-table="<?php echo $categoria ?>" class="btn btn-block btn-danger btn-xs borrar_registro">Eliminar</a>
              </div>
            </div>

          <?php } ?>

        <?php } else { ?>
          <?php
          include('../conexion.php');
          $categoria = $_GET['categoria'];

          $query = "SELECT * FROM $categoria";
          $result = mysqli_query($conexiondb, $query);

          while ($row = mysqli_fetch_array($result)) {
          ?>
            <!-- Profile Image -->
            <div class="card card-primary card-outline padding">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle" src="img/user.png" alt="User profile picture">
                </div>

                <h3 class="profile-username text-center"><?php echo $row['nombreUsuario'] ?></h3>
                <?php
                $rolusuario = $row['rolUsuario'];
                require('../conexion.php');
                $query2 = "SELECT * FROM roles WHERE idRol = '$rolusuario'";
                $result2 = mysqli_query($conexiondb, $query2);

                while ($row2 = mysqli_fetch_array($result2)) {
                ?>
                  <p class="text-muted text-center"><?php echo $row2['nombreRol'] ?></p>
                <?php } ?>
                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>ID: </b><a class="float-right"><?php echo $row['idUsuario'] ?></a>
                  </li>
                  <li class="list-group-item">
                    <b>Teléfono: </b> <a class="float-right"><?php echo $row['telefonoUsuario'] ?> </a>
                  </li>
                  <li class="list-group-item">
                    <b>Correo: </b> <a class="float-right"><?php echo $row['correoUsuario'] ?> </a>
                  </li>
                </ul>
              </div>
              <a href="editar.php?editar=<?php echo $categoria ?>&id=<?php echo $row['idUsuario'] ?>" class="btn btn-block btn-success btn-xs">Editar</a>
              <a href="#" data-id="<?php echo $row['idUsuario'] ?>" data-table="<?php echo $categoria ?>" class="btn btn-block btn-danger btn-xs borrar_registro">Eliminar</a>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          <?php } ?>
        <?php } ?>





      </section>


    </div>
    <?php
    include('templates/footer.php');
    ?>
  </div>
</body>

</html>