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

            </section>


            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"><b>Historial de Ventas</b></h3>
                    </div>
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>ID Venta</th>
                                    <th>ID Usuario</th>
                                    <th>Dirección</th>
                                    <th>Ciudad</th>
                                    <th>CP</th>
                                    <th>Estado</th>
                                    <th>Fecha</th>
                                    <th>Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include('../conexion.php');
                                $query = "SELECT * FROM historial_ventas ORDER BY id_registro DESC";
                                $result = mysqli_query($conexiondb, $query);

                                while ($row = mysqli_fetch_array($result)) {
                                ?>
                                    <tr>
                                        <td><?php echo ($row['id_registro']) ?></td>
                                        <td><?php echo ($row['id_venta']) ?></td>
                                        <td><?php echo ($row['id_usuario']) ?></td>
                                        <td><?php echo ($row['direccion']) ?></td>
                                        <td><?php echo ($row['ciudad']) ?></td>
                                        <td><?php echo ($row['cp']) ?></td>
                                        <td><?php echo ($row['estado']) ?></td>
                                        <td><?php echo ($row['fecha']) ?></td>
                                        <td><?php echo ($row['accion']) ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>ID Venta</th>
                                    <th>ID Usuario</th>
                                    <th>Dirección</th>
                                    <th>Ciudad</th>
                                    <th>CP</th>
                                    <th>Estado</th>
                                    <th>Fecha</th>
                                    <th>Acción</th>
                                </tr>
                            </tfoot>
                        </table>
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
            });
        </script>
    </div>
</body>

</html>