<!DOCTYPE html>
<html lang="en">

<head>
    <title>AdminDOR Plus | Editar <?php extract($_GET);
                                    echo $_GET['editar']; ?></title>
    <meta name="description" content="Editar información">
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
                            <h1>Editar <?php echo $_GET['editar']; ?></h1>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Main content -->
            <section class="content">
                <?php
                include('../conexion.php');
                $categoria = $_GET['editar'];
                $id = $_GET['id'];
                if ($categoria == "usuarios") {
                    $query = "SELECT * FROM $categoria WHERE idUsuario = '$id'";
                    $result = mysqli_query($conexiondb, $query);

                    while ($row = mysqli_fetch_array($result)) {
                ?>
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title"><b>EDITAR USUARIO</b></h3>
                            </div>
                            <form action="php/actualizarusuario.php" method="POST" id="editar_usuarios">
                                <div class="card-body">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-id-card"></i></span>
                                        </div>
                                        <input type="number" name="id" class="form-control" placeholder="ID" value="<?php echo $row['idUsuario']; ?>" readonly>
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                                        </div>
                                        <input type="text" name="nombre" class="form-control" placeholder="Nombre" value="<?php echo $row['nombreUsuario']; ?>" required>
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-key"></i></span>
                                        </div>
                                        <input type="password" name="password" class="form-control" placeholder="Contraseña">
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                        </div>
                                        <input type="email" name="correo" class="form-control" placeholder="Correo electrónico" value="<?php echo $row['correoUsuario']; ?>" required>
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                        </div>
                                        <input type="number" name="telefono" class="form-control" placeholder="Teléfono" value="<?php echo $row['telefonoUsuario'] ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Rol</label>
                                        <select class="form-control" name="rol">
                                            <?php
                                            $rolusuario = $row['rolUsuario'];
                                            require('../conexion.php');
                                            $query2 = "SELECT * FROM roles WHERE idRol = '$rolusuario'";
                                            $result = mysqli_query($conexiondb, $query2);

                                            while ($row2 = mysqli_fetch_array($result)) {
                                            ?>
                                                <option value="<?php echo $row['rolUsuario'] ?>" selected>--<?php echo $row2['nombreRol']; ?>--</option>
                                            <?php } ?>
                                            <?php
                                            require('../conexion.php');
                                            $query2 = "SELECT * FROM roles";
                                            $result = mysqli_query($conexiondb, $query2);

                                            while ($row2 = mysqli_fetch_array($result)) {
                                            ?>
                                                <option value="<?php echo $row2['idRol']; ?>"><?php echo $row2['nombreRol']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Guardar</button>
                                </div>
                            </form>
                        </div>
                    <?php } ?>
                    <?php } elseif ($categoria == "productos") {
                    $query = "SELECT * FROM $categoria where id = '$id' ORDER BY nombre";
                    $result = mysqli_query($conexiondb, $query);

                    while ($row = mysqli_fetch_array($result)) {
                    ?>
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title"><b>EDITAR PRODUCTO</b></h3>
                            </div>
                            <form method="POST" action="php/actualizarproducto.php" enctype="multipart/form-data" id="editar_productos" name="editar_productos">
                                <div class="card-body">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-id-card"></i></span>
                                        </div>
                                        <input type="email" name="id" class="form-control" placeholder="ID" value="<?php echo $row['id']; ?>" readonly>
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-file-signature"></i></span>
                                        </div>
                                        <input type="text" name="nombre" class="form-control" placeholder="Nombre" value="<?php echo $row['nombre']; ?>" required>
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-money-bill-alt"></i></span>
                                        </div>
                                        <input type="int" name="valor" class="form-control" placeholder="Valor" value="<?php echo $row['valor']; ?>" required>
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-audio-description"></i></span>
                                        </div>
                                        <textarea cols="20" rows="5" name="desc" class="form-control" placeholder="Descripción" required><?php echo $row['descripcion']; ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Categoría</label>
                                        <select class="form-control" name="categoria">
                                            <option value="<?php echo $row['categoria']; ?>" selected>--<?php echo $row['categoria']; ?>--</option>
                                            <?php
                                            require('../conexion.php');
                                            $query2 = "SELECT * FROM categorias";
                                            $result2 = mysqli_query($conexiondb, $query2);

                                            while ($row2 = mysqli_fetch_array($result2)) {
                                            ?>
                                                <option value="<?php echo $row2['nombre']; ?>"><?php echo $row2['nombre']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Animal</label>
                                        <select class="form-control" name="animal">
                                            <option value="<?php echo $row['animal']; ?>" selected>--<?php echo $row['animal']; ?>--</option>
                                            <?php
                                            require('../conexion.php');
                                            $query3 = "SELECT * FROM animales";
                                            $result3 = mysqli_query($conexiondb, $query3);

                                            while ($row3 = mysqli_fetch_array($result3)) {
                                            ?>
                                                <option value="<?php echo $row3['nombre']; ?>"><?php echo $row3['nombre']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputFile">Imágen</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="imagen" name="imagen">
                                                <label class="custom-file-label" for="exampleInputFile">Seleccionar imágen</label>
                                            </div>
                                            <div class="input-group-append">
                                                <span class="input-group-text">Subir</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Guardar</button>
                                </div>
                            </form>
                        </div>

                    <?php } ?>
                    <?php } elseif ($categoria == "categorias") {
                    $query = "SELECT * FROM $categoria where id = '$id'";
                    $result = mysqli_query($conexiondb, $query);

                    while ($row = mysqli_fetch_array($result)) {
                    ?>
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title"><b>EDITAR CATEGORIA</b></h3>
                            </div>
                            <form method="POST" action="php/actualizarcategoria.php" enctype="multipart/form-data" id="editar_categorias">
                                <div class="card-body">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-id-card"></i></span>
                                        </div>
                                        <input type="number" name="id" class="form-control" placeholder="ID" value="<?php echo $row['id']; ?>" readonly>
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                                        </div>
                                        <input type="text" name="nombre" class="form-control" placeholder="Nombre" value="<?php echo $row['nombre']; ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputFile">Imágen</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" name="imagen">
                                                <label class="custom-file-label" for="exampleInputFile">Seleccionar imágen</label>
                                            </div>
                                            <div class="input-group-append">
                                                <span class="input-group-text">Subir</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Guardar</button>
                                </div>
                            </form>
                        </div>

                    <?php } ?>
                <?php } else { ?>
                    <?php
                    $query = "SELECT * FROM $categoria where id = '$id'";
                    $result = mysqli_query($conexiondb, $query);

                    while ($row = mysqli_fetch_array($result)) {
                    ?>
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title"><b>EDITAR ANIMALES</b></h3>
                            </div>
                            <form method="POST" action="php/actualizaranimal.php" enctype="multipart/form-data" id="editar_animal">
                                <div class="card-body">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-id-card"></i></span>
                                        </div>
                                        <input type="number" name="id" class="form-control" placeholder="ID" value="<?php echo $row['id']; ?>" readonly>
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                                        </div>
                                        <input type="text" name="nombre" class="form-control" placeholder="Nombre" value="<?php echo $row['nombre']; ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputFile">Imágen</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" name="imagen">
                                                <label class="custom-file-label" for="exampleInputFile">Seleccionar imágen</label>
                                            </div>
                                            <div class="input-group-append">
                                                <span class="input-group-text">Subir</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Guardar</button>
                                </div>
                            </form>
                        </div>
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