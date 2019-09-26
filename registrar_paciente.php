
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Clinica_Registro</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">
   
  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Clinica Odontologica<sup></sup></div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Inicio -->
      <li class="nav-item active">
        <a class="nav-link" href="index.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Inicio</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Menu </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-cog"></i>
          <span>Registro Paciente</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Opciones</h6>
            <a class="collapse-item" href="registrar_paciente.php">Registrar</a>
           
          </div>
        </div>
      </li>

      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-fw fa-wrench"></i>
          <span>Asignacion de citas</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            
            <a class="collapse-item" href="citas.php">Citas</a>
          </div>
        </div>
      </li>

      <!-- Divider --
      <hr class="sidebar-divider">

      <!- Heading
      <div class="sidebar-heading">
        Addons
      </div>

      <!- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-folder"></i>
          <span>Consultas</span>
          </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
           
            <a class="collapse-item" href="observacionesform.php">Observaciones</a>
          </div>
        </div>
      </li>


      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

        

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

          

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"> Secretaria </span>
                <img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/60x60">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Settings
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                  Actividad
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

            
    <!-- Circle Buttons -->
              <div class="card shadow mb-8">
                <div class="card-header py-12">
                  <h6 class="m-0 font-weight-bold text-primary"> Registrar Paciente </h6>
                </div>
                <div class="card-body">

                    <form method="POST" action="Cregistrarpaciente.php"> 
                 
                      <div class="col-md-6 mb-3">
                      <label for="nombres"><font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;">Nombres</font>
                      </font></label>
                      <input type="text" class="form-control" id="nombres" name="nombres" placeholder="" value="" required>
                        </div>

                  <div class="col-md-6 mb-3">
                      <label for="apellidos"><font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;">Apellidos</font>
                      </font></label>
                      <input type="text" class="form-control" id="apellidos" name="apellidos" placeholder="" value="" required>
                        </div>

                  <div class="col-md-6 mb-3">
                      <label for="fecha_nacimiento"><font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;">Fecha Nacimiento</font>
                      </font></label>
                      <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" placeholder="" value="" required>
                        </div>

                  <div class="col-md-6 mb-3">
                      <label for="genero"><font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;">Genero</font>
                      </font></label>
                      <input type="text" class="form-control" id="genero" name="genero" placeholder="" value="" required>
                        </div>
                        
                        <div class="col-md-6 mb-3">
                      <label for="direccion"><font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;">Direccion</font>
                      </font></label>
                      <input type="text" class="form-control" id="direccion" name="direccion" placeholder="" value="" required>
                        </div>

                       <div class="col-md-6 mb-3">
                      <label for="correo"><font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;">Correo </font>
                      </font></label>
                      <input type="text" class="form-control" id="correo" name="correo" placeholder="" value="" required>
                        </div>
                  
                  <div class="col-md-6 mb-3">
                      <label for="telefono"><font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;">Numero de telefono</font>
                      </font></label>
                      <input type="is_numeric" class="form-control" id="telefono" name="telefono" placeholder="" value="" required>
                        </div>

                        <div class="col-md-6 mb-3">
                      <label for="dui"><font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;">DUI</font>
                      </font></label>
                      <input type="is_numeric" class="form-control" id="dui" name="dui" placeholder="" value="" required>
                        </div>
                 <div class="col-md-6 mb-3">
                      <label for="nit"><font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;">NIT</font>
                      </font></label>
                      <input type="is_numeric" class="form-control" id="nit" name="nit" placeholder="" value="" required>
                        </div>

                        <h5 class="m-0 font-weight-bold text-primary">
        
                       </h5>

                       <div class="col-md-6 mb-3">
                      <label for="responsableNombre"><font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;">Responsable Nombre</font>
                      </font></label>
                      <input type="text" class="form-control" id="responsableNombre" name="responsableNombre" placeholder="" value="" required>
                        </div>
                  
                        <div class="col-md-6 mb-3">
                      <label for="responsablecontacto"><font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;">Responsable contacto</font>
                      </font></label>
                      <input type="is_numeric" class="form-control" id="responsablecontacto" name="responsablecontacto" placeholder="" value="" required>
                        </div>
                  

                        <div class="col-md-6 mb-3">
                      <label for="alergias"><font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;">Alergia</font>
                      </font></label>
                      <input type="text" class="form-control" id="alergias" name="alergias" placeholder="" value="" required>
                        </div>
                  
                        <div class="col-md-6 mb-3">
                      <label for="medicamentos"><font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;">Medicamentos</font>
                      </font></label>
                      <input type="text" class="form-control" id="medicamentos" name="medicamentos" placeholder="" value="" required>
                        </div>

                        <div class="col-md-6 mb-3">
                      <label for="fechaRegistro"><font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;">fecha Registro </font>
                      </font></label>
                      <input type="date" class="form-control" id="fechaRegistro" name="fechaRegistro" placeholder="" value="" required>
                        </div>
                                   
                        <h5 class="m-0 font-weight-bold text-primary">
                                      
                        <div class="col-md-6 mb-3">
                          <button type="submit" name="guardar" class="btn btn-primary">Guardar datos</button>
                      </form>
                     
      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Clinica &copy; Your Website 2019</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
