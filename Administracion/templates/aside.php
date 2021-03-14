<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="indexadmin.php" class="brand-link">
    <span class="logo-mini"><b>DOR</b></span>
      <span class="brand-text font-weight-light">Management Panel</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="img/user.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <?php  
          include('../conexion.php');
          $id = $_SESSION['id'];

          $query = "SELECT nombreUsuario FROM usuarios WHERE idUsuario = '$id'";
          $result = mysqli_query($conexiondb, $query);

          while($row = mysqli_fetch_array($result)){

        ?>
        <div class="info">
          <a href="perfiladm.php" class="d-block"><?php  echo $row['nombreUsuario'] ?></a>
        </div>
        <?php } ?>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="indexadmin.php" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="indexadmin.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard v1</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-header">GESTIÓN</li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-box"></i>
              <p>
                Productos
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="nuevo.php?categoria=productos" class="nav-link">
                  <i class="fas fa-plus-circle nav-icon"></i>
                  <p>Nuevo Producto</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="vertodos.php?categoria=productos" class="nav-link">
                  <i class="fas fa-list-ul nav-icon"></i>
                  <p>Ver todos</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Usuarios
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="nuevo.php?categoria=usuarios" class="nav-link">
                  <i class="fas fa-plus-circle nav-icon"></i>
                  <p>Nuevo Usuario</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="vertodos.php?categoria=usuarios" class="nav-link">
                  <i class="fas fa-list-ul nav-icon"></i>
                  <p>Ver todos</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-paw"></i>
              <p>
                Animales
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="nuevo.php?categoria=animales" class="nav-link">
                  <i class="fas fa-plus-circle nav-icon"></i>
                  <p>Nuevo Animal</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="vertodos.php?categoria=animales" class="nav-link">
                  <i class="fas fa-list-ul nav-icon"></i>
                  <p>Ver todos</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-th"></i>
              <p>
                Categorias
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="nuevo.php?categoria=categorias" class="nav-link">
                  <i class="fas fa-plus-circle nav-icon"></i>
                  <p>Nueva Categoria</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="vertodos.php?categoria=categorias" class="nav-link">
                  <i class="fas fa-list-ul nav-icon"></i>
                  <p>Ver todos</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-header">OTROS</li>
          <li class="nav-item">
            <a href="historial.php" class="nav-link">
              <i class="nav-icon fas fa-history""></i>
              <p>
                Historial
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>