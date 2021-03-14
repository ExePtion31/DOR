<!DOCTYPE html>
<html lang="en">

<head>
  <title>AdminDOR Plus | Ajustes</title>
  <meta name="description" content="Información personal - Administrador">
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
              <h1>Ajustes</h1>
            </div>
          </div>
        </div>
      </section>

      <!-- Main content -->
      <section class="content">
        <?php
        include('../conexion.php');
        $id = $_SESSION['id'];

        $query = "SELECT * FROM usuarios WHERE idUsuario = '$id'";
        $result = mysqli_query($conexiondb, $query);

        while ($row = mysqli_fetch_array($result)) {

        ?>
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-3">

                <!-- Profile Image -->
                <div class="card card-primary card-outline">
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
                        <b>ID</b> <a class="float-right"><?php echo $row['idUsuario'] ?></a>
                      </li>
                      <li class="list-group-item">
                        <b>Teléfono</b> <a class="float-right"><?php echo $row['telefonoUsuario'] ?></a>
                      </li>
                    </ul>
                  </div>
                  <!-- /.card-body -->
                </div>
                <!-- /.card -->

                <!-- About Me Box -->
                <div class="card card-primary">
                  <div class="card-header">
                    <h3 class="card-title">Información extra</h3>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    <strong><i class="fas fa-book mr-1"></i> Correo</strong>

                    <p class="text-muted">
                      <?php echo $row['correoUsuario'] ?>
                    </p>
                    <hr>
                  </div>
                </div>
              </div>
              <!-- /.col -->
              <div class="col-md-9">
                <div class="card">
                  <div class="card-header p-2">
                    <ul class="nav nav-pills">
                      <li class="nav-item"><a class="nav-link active" href="#settings" data-toggle="tab">Información</a></li>
                    </ul>
                  </div><!-- /.card-header -->
                  <div class="card-body">
                    <div class="tab-content">
                      <div class="active tab-pane" id="settings">
                        <form class="form-horizontal" method="POST" action="php/actualizarusuario.php" id="editar_usuarios">
                          <div class="form-group row">
                            <label for="inputName" class="col-sm-2 col-form-label">ID</label>
                            <div class="col-sm-10">
                              <input type="number" name="id" class="form-control" id="inputName" placeholder="ID" value="<?php echo $row['idUsuario'] ?>" readonly>
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="inputName" class="col-sm-2 col-form-label">Nombre</label>
                            <div class="col-sm-10">
                              <input type="text" name="nombre" class="form-control" id="inputName" placeholder="Nombre" value="<?php echo $row['nombreUsuario'] ?>">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="inputEmail" class="col-sm-2 col-form-label">Correo electrónico</label>
                            <div class="col-sm-10">
                              <input type="email" name="correo" class="form-control" id="inputEmail" placeholder="Correo electónico" value="<?php echo $row['correoUsuario'] ?>">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="inputName2" class="col-sm-2 col-form-label">Teléfono</label>
                            <div class="col-sm-10">
                              <input type="number" name="telefono" class="form-control" id="inputName2" placeholder="Teléfono" value="<?php echo $row['telefonoUsuario'] ?>">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="inputSkills" class="col-sm-2 col-form-label">Rol</label>
                            <div class="col-sm-10">
                              <select class="form-control" name="rol">
                                <?php
                                $rolusuario = $row['rolUsuario'];
                                require('../conexion.php');
                                $query2 = "SELECT * FROM roles WHERE idRol = '$rolusuario'";
                                $result2 = mysqli_query($conexiondb, $query2);

                                while ($row2 = mysqli_fetch_array($result2)) {
                                ?>
                                  <option value="<?php echo $row2['idRol'] ?>" selected>--<?php echo $row2['nombreRol'] ?>--</option>
                                <?php } ?>
                                <?php
                                require('../conexion.php');
                                $query2 = "SELECT * FROM roles";
                                $result = mysqli_query($conexiondb, $query2);

                                while ($row2 = mysqli_fetch_array($result)) {
                                ?>
                                  <option value="<?php echo $row2['nombreRol']; ?>"><?php echo $row2['nombreRol']; ?></option>
                                <?php } ?>
                              </select>
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="inputName2" class="col-sm-2 col-form-label">Contraseña</label>
                            <div class="col-sm-10">
                              <input type="password" name="password" class="form-control" id="inputName2" placeholder="Contraseña">
                            </div>
                          </div>
                          <div class="form-group row">
                            <div class="offset-sm-2 col-sm-10">
                              <button type="submit" class="btn btn-success">Guardar</button>
                            </div>
                          </div>
                        </form>
                      </div>
                      <!-- /.tab-pane -->
                    </div>
                    <!-- /.tab-content -->
                  </div><!-- /.card-body -->
                </div>
                <!-- /.card -->
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div><!-- /.container-fluid -->
        <?php } ?>
      </section>
      <!-- /.content -->

    </div>
    <?php
    include('templates/footer.php');
    ?>
  </div>
</body>

</html>