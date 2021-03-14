<!DOCTYPE html>
<html lang="en">

<head>
    <title>Crear <?php extract($_GET);
                    echo $_GET['categoria']; ?></title>
    <meta name="description" content="Crear nuevo elemento">
    <?php
    include('php/head.php');
    ?>
</head>
<?php
include('templates/navbar.php');
include('templates/aside.php');
?>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Crear <?php echo $_GET['categoria']; ?></h1>
                        </div>
                    </div>
                </div>
            </section>

            <section class="content">
                <?php
                if ($_GET['categoria'] == "usuarios") {


                ?>
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title"><b>NUEVO USUARIO</b></h3>
                        </div>
                        <form method="POST" action="php/nuevouser.php" id="crear_usuarios">
                            <div class="card-body">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                    </div>
                                    <input type="text" name="nombre" class="form-control" placeholder="Nombre" required>
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                    </div>
                                    <input type="email" name="email" class="form-control" placeholder="Correo electrónico" required>
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                    </div>
                                    <input type="number" name="telefono" class="form-control" placeholder="Teléfono" required>
                                </div>
                                <div class="form-group">
                                    <label>Rol</label>
                                    <select class="form-control" name="rol">
                                        <option disabled selected>--Seleccionar--</option>
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
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-key"></i></span>
                                    </div>
                                    <input type="password" name="password" class="form-control" placeholder="Contraseña" required>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Crear</button>
                            </div>
                        </form>
                    </div>
                <?php } elseif ($_GET['categoria'] == "productos") { ?>
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title"><b>CREAR PRODUCTO</b></h3>
                        </div>
                        <form method="POST" action="php/nuevoproducto.php" enctype="multipart/form-data" id="crear_productos">
                            <div class="card-body">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-file-signature"></i></span>
                                    </div>
                                    <input type="text" name="nombre" class="form-control" placeholder="Nombre" required>
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-audio-description"></i></span>
                                    </div>
                                    <textarea cols="20" rows="5" name="desc" class="form-control" placeholder="Descripción" required></textarea>
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-money-bill-alt"></i></span>
                                    </div>
                                    <input type="int" name="valor" class="form-control" placeholder="Valor" required>
                                </div>
                                <div class="form-group">
                                    <label>Categoría</label>
                                    <select class="form-control" name="categoria">
                                        <option disabled selected>--Seleccionar--</option>
                                        <?php
                                        require('../conexion.php');
                                        $query2 = "SELECT * FROM categorias";
                                        $result = mysqli_query($conexiondb, $query2);

                                        while ($row2 = mysqli_fetch_array($result)) {
                                        ?>
                                            <option><?php echo $row2['nombre']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Animal</label>
                                    <select class="form-control" name="animal">
                                        <option disabled selected>--Seleccionar--</option>
                                        <?php
                                        require('../conexion.php');
                                        $query2 = "SELECT * FROM animales";
                                        $result = mysqli_query($conexiondb, $query2);

                                        while ($row2 = mysqli_fetch_array($result)) {
                                        ?>
                                            <option><?php echo $row2['nombre']; ?></option>
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
                                <button type="submit" class="btn btn-primary">Crear</button>
                            </div>
                        </form>
                    </div>
                <?php } elseif ($_GET['categoria'] == "categorias") { ?>
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title"><b>CREAR CATEGORIA</b></h3>
                        </div>
                        <form method="POST" action="php/nuevacategoria.php" enctype="multipart/form-data" id="crear_categorias">
                            <div class="card-body">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                    </div>
                                    <input type="text" name="nombre" class="form-control" placeholder="Nombre" required>
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
                                <button type="submit" class="btn btn-primary">CREAR</button>
                            </div>
                        </form>
                    </div>

                <?php } elseif ($_GET['categoria'] == "animales") { ?>
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title"><b>CREAR ANIMAL</b></h3>
                        </div>
                        <form method="POST" action="php/nuevoanimal.php" enctype="multipart/form-data" id="crear_animales">
                            <div class="card-body">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                    </div>
                                    <input type="text" name="nombre" class="form-control" placeholder="Nombre" required>
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
                                <button type="submit" class="btn btn-primary">CREAR</button>
                            </div>
                        </form>
                    </div>
                <?php } ?>

            </section>

            <?php
            include('templates/footer.php');
            ?>
</body>

</html>