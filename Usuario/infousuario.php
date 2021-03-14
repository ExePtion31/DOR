<!DOCTYPE html>
<html lang="en">

<head>
  <title>Información personal</title>
  <meta name="description" content="Información personal - Usuario">
  <?php
  include('php/head.php');
  ?>
</head>

<body>
  <?php
  include('../php/whatsapp.php');
  include('php/headerusers.php');
  ?>
  <!-- Main content -->
  <section class="contenedor_users">
    <?php
    include('../conexion.php');
    $id = $_SESSION['id'];

    $query = "SELECT * FROM usuarios WHERE idUsuario = '$id'";
    $result = mysqli_query($conexiondb, $query);

    while ($row = mysqli_fetch_array($result)) {

    ?>
      <div class="container-fluid">
        <a href="comprasuser.php">
          <div class="compras_user">
            <i class="fas fa-shopping-cart"></i>
            <p>Mis compras</p>
          </div>
        </a>
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle" src="../Administracion/img/user.png" alt="User profile picture">
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
                          <input type="number" name="id" class="form-control" placeholder="ID" value="<?php echo $row['idUsuario'] ?>" readonly>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Nombre</label>
                        <div class="col-sm-10">
                          <input type="text" name="nombre" class="form-control" placeholder="Nombre" value="<?php echo $row['nombreUsuario'] ?>">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Correo
                          electrónico</label>
                        <div class="col-sm-10">
                          <input type="email" name="correo" class="form-control" placeholder="Correo electónico" value="<?php echo $row['correoUsuario'] ?>" readonly>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">Teléfono</label>
                        <div class="col-sm-10">
                          <input type="number" name="telefono" class="form-control" placeholder="Teléfono" value="<?php echo $row['telefonoUsuario'] ?>">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">Contraseña</label>
                        <div class="col-sm-10">
                          <input type="password" name="password" class="form-control" placeholder="Contraseña">
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" class="btn btn-success guardar">Guardar</button>
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



  <div class="card">
    <div class="card-header">
      <h3 class="card-title"><b>Historial</b></h3>
    </div>
    <div class="card-body">
      <table id="example1" class="table table-bordered table-hover">
        <thead>
          <tr>
            <th>Nombre</th>
            <th>ID</th>
            <th>Teléfono</th>
            <th>Rol</th>
            <th>Correo</th>
            <th>Fecha</th>
            <th>Acción</th>
          </tr>
        </thead>
        <tbody>
          <?php
          include('../conexion.php');
          $query = "SELECT * FROM historial_usuarios WHERE idUsuario = '$id'";
          $result = mysqli_query($conexiondb, $query);

          while ($row = mysqli_fetch_array($result)) {
          ?>
            <tr>
              <td><?php echo ($row['nombreUsuario']) ?></td>
              <td><?php echo ($row['idUsuario']) ?></td>
              <td><?php echo ($row['telefonoUsuario']) ?></td>
              <?php
              $rolusuario = $row['rolUsuario'];
              $query2 = "SELECT * FROM roles WHERE idRol = '$rolusuario'";
              $result2 = mysqli_query($conexiondb, $query2);

              while ($row2 = mysqli_fetch_array($result2)) {
              ?>
                <td><?php echo ($row2['nombreRol']) ?></td>
              <?php } ?>
              <td><?php echo ($row['correoUsuario']) ?></td>
              <td><?php echo ($row['fecha']) ?></td>
              <td><?php echo ($row['Estado']) ?></td>
            </tr>
          <?php } ?>
        </tbody>
        <tfoot>
          <tr>
            <th>Nombre</th>
            <th>ID</th>
            <th>Correo</th>
            <th>Teléfono</th>
            <th>Rol</th>
            <th>Fecha</th>
            <th>Acción</th>
          </tr>
        </tfoot>
      </table>
    </div>
  </div>
  <?php
  include('php/footer.php');
  ?>
  <script>
    $(function() {
      $('#example1').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
  </script>
</body>

</html>