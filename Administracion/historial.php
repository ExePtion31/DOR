<!DOCTYPE html>
<html lang="en">

<head>
    <title>AdminDOR Plus | Historial</title>
    <meta name="description" content="Historiales">
    <?php
    include('php/head.php');
    ?>
</head>

<body>
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
                            <h1>Historial</h1>
                        </div>
                    </div>
                </div>
            </section>


            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"><b>Historial de Usuarios</b></h3>
                    </div>
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nombre</th>
                                    <th>ID Usuario</th>
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
                                $query = "SELECT * FROM historial_usuarios ORDER BY idUsuario";
                                $result = mysqli_query($conexiondb, $query);

                                while ($row = mysqli_fetch_array($result)) {
                                ?>
                                    <tr>
                                        <td><?php echo ($row['id_registro']) ?></td>
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
                                    <th>#</th>
                                    <th>Nombre</th>
                                    <th>ID Usuario</th>
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
            </div>

            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"><b>Historial de Productos</b></h3>
                    </div>
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nombre</th>
                                    <th>ID Producto</th>
                                    <th>Descripción</th>
                                    <th>Categoría</th>
                                    <th>Valor</th>
                                    <th>Animal</th>
                                    <th>Fecha</th>
                                    <th>Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include('../conexion.php');
                                $query = "SELECT * FROM historial_productos ORDER BY id";
                                $result = mysqli_query($conexiondb, $query);

                                while ($row = mysqli_fetch_array($result)) {
                                ?>
                                    <tr>
                                        <td><?php echo ($row['id_registro']) ?></td>
                                        <td><?php echo ($row['nombre']) ?></td>
                                        <td><?php echo ($row['id']) ?></td>
                                        <td><?php echo ($row['descripcion']) ?></td>
                                        <td><?php echo ($row['categoria']) ?></td>
                                        <td><?php echo ($row['valor']) ?></td>
                                        <td><?php echo ($row['animal']) ?></td>
                                        <td><?php echo ($row['fecha']) ?></td>
                                        <td><?php echo ($row['Estado']) ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Nombre</th>
                                    <th>ID Producto</th>
                                    <th>Descripción</th>
                                    <th>Categoría</th>
                                    <th>Valor</th>
                                    <th>Animal</th>
                                    <th>Fecha</th>
                                    <th>Acción</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"><b>Historial de Animales</b></h3>
                    </div>
                    <div class="card-body">
                        <table id="example3" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nombre</th>
                                    <th>ID</th>
                                    <th>Imagén</th>
                                    <th>Fecha</th>
                                    <th>Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include('../conexion.php');
                                $query = "SELECT * FROM historial_animales ORDER BY id";
                                $result = mysqli_query($conexiondb, $query);

                                while ($row = mysqli_fetch_array($result)) {
                                ?>
                                    <tr>
                                        <td><?php echo ($row['id_registro']) ?></td>
                                        <td><?php echo ($row['nombre']) ?></td>
                                        <td><?php echo ($row['id']) ?></td>
                                        <td><?php echo ($row['img']) ?></td>
                                        <td><?php echo ($row['fecha']) ?></td>
                                        <td><?php echo ($row['Estado']) ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Nombre</th>
                                    <th>ID</th>
                                    <th>Imagén</th>
                                    <th>Fecha</th>
                                    <th>Acción</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"><b>Historial de Categorías</b></h3>
                    </div>
                    <div class="card-body">
                        <table id="example4" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nombre</th>
                                    <th>ID</th>
                                    <th>Imagén</th>
                                    <th>Fecha</th>
                                    <th>Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include('../conexion.php');
                                $query = "SELECT * FROM historial_categorias ORDER BY id";
                                $result = mysqli_query($conexiondb, $query);

                                while ($row = mysqli_fetch_array($result)) {
                                ?>
                                    <tr>
                                        <td><?php echo ($row['id_registro']) ?></td>
                                        <td><?php echo ($row['nombre']) ?></td>
                                        <td><?php echo ($row['id']) ?></td>
                                        <td><?php echo ($row['img']) ?></td>
                                        <td><?php echo ($row['fecha']) ?></td>
                                        <td><?php echo ($row['Estado']) ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Nombre</th>
                                    <th>ID</th>
                                    <th>Imagén</th>
                                    <th>Fecha</th>
                                    <th>Acción</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <?php
        include('templates/footer.php');
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
                $('#example2').DataTable({
                    "paging": true,
                    "lengthChange": false,
                    "searching": true,
                    "ordering": true,
                    "info": true,
                    "autoWidth": false,
                    "responsive": true,
                });
                $('#example3').DataTable({
                    "paging": true,
                    "lengthChange": false,
                    "searching": true,
                    "ordering": true,
                    "info": true,
                    "autoWidth": false,
                    "responsive": true,
                });
                $('#example4').DataTable({
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
    </div>
</body>

</html>