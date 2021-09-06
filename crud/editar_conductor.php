<?php

include('../connection.php');

if (isset($_GET['id'])) {
	$id = $_GET['id'];
	$query = "SELECT * FROM conductores WHERE id = $id";
	$result = mysqli_query($conn, $query);
	if (mysqli_num_rows($result) == 1) {
		$row = mysqli_fetch_array($result);
		$nombre = $row['nombre'];
		$apellido =	$row['apellido'];
		$direccion =	$row['direccion'];
		$telefono =	$row['telefono'];
		$correo =	$row['correo'];
		$licencia =	$row['licencia'];
		$salario =	$row['salario'];
	}
}

if (isset($_POST['actualizar'])) {
	$id = $_GET['id'];
	$nombre = $_POST['nombre_c'];
	$ape_c = $_POST['apellido_c'];
	$dir_c = $_POST['direccion_c'];
	$tel_c = $_POST['telefono_c'];
	$email_c = $_POST['email_c'];
	$lic_c = $_POST['licencia_c'];
	$sal_c = $_POST['salario_c'];

	$query = "UPDATE conductores SET nombre = '$nombre' , apellido= '$ape_c', direccion= '$dir_c', telefono= '$tel_c', correo= '$email_c', licencia ='$lic_c', salario= '$sal_c' WHERE id = $id";
	mysqli_query($conn, $query);
	$_SESSION['message'] = 'Conductor Actualizado';
	$_SESSION['message_type'] = 'warning';
	header("Location: ../pages/conductor.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>SB Admin 2 - Blank</title>

	<!-- Custom fonts for this template-->
	<link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

	<!-- Custom styles for this template-->
	<link href="../css/sb-admin-2.min.css" rel="stylesheet">

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


</head>

<body id="page-top">

	<!-- Page Wrapper -->
	<div id="wrapper">

		<!-- Sidebar -->
		<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

			<!-- Sidebar - Brand -->
			<a class="sidebar-brand d-flex align-items-center justify-content-center" href="../index.php">
				<div class="sidebar-brand-icon rotate-n-15">
					<i class="fas fa-laugh-wink"></i>
				</div>
				<div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
			</a>

			<!-- Divider -->
			<hr class="sidebar-divider my-0">

			<!-- Nav Item - Dashboard -->
			<li class="nav-item">
				<a class="nav-link" href="../index.php">
					<i class="fas fa-fw fa-tachometer-alt"></i>
					<span>Dashboard</span></a>
			</li>

			<!-- Divider -->
			<hr class="sidebar-divider">

			<!-- Heading -->
			<div class="sidebar-heading">
				Interface
			</div>

			<!-- Nav Item - Pages Collapse Menu -->
			<li class="nav-item active">
				<a class="nav-link" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
					<i class="fas fa-fw fa-folder"></i>
					<span>Registro</span>
				</a>
				<div id="collapsePages" class="collapse show" aria-labelledby="headingPages" data-parent="#accordionSidebar">
					<div class="bg-white py-2 collapse-inner rounded">
						<h6 class="collapse-header">Registro de:</h6>
						<a class="collapse-item active" href="../pages/conductor.php">Conductor</a>
						<a class="collapse-item " href="../pages/cliente.php">Cliente</a>
						<a class="collapse-item" href="../pages/servicio.php">Servicio</a>
						<a class="collapse-item" href="../pages/vehiculo.php">Vehiculo</a>
						<a class="collapse-item" href="../pages/reparacion.php">Reparación</a>
						<a class="collapse-item" href="../pages/infraccion.php">Infracción</a>
						<div class="collapse-divider"></div>

					</div>
				</div>
			</li>

			<!-- Nav Item - Listado Collapse Menu -->
			<li class="nav-item">
				<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
					<i class="fas fa-list-alt"></i>
					<span>Listado</span>
				</a>
				<div id="collapseThree" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
					<div class="bg-white py-2 collapse-inner rounded">
						<h6 class="collapse-header">Listado de:</h6>
						<a class="collapse-item" href="../listado/list_infraccion.php">Infracciones (Punto 2)</a>
						<a class="collapse-item" href="../listado/list_vehiculo.php">Vehiculos (Punto 3) </a>
						<a class="collapse-item" href="../listado/list_vehiculo_2.php">Vehiculos (Punto 4) </a>
						<a class="collapse-item" href="../listado/list_cliente.php">Lista Cliente (Punto 6) </a>
					</div>
				</div>
			</li>

			<!-- Nav Item - Utilities Collapse Menu -->
			<li class="nav-item">
				<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
					<i class="fas fa-download fa-sm text-white-50"></i>
					<span>Reporte</span>
				</a>
				<div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
					<div class="bg-white py-2 collapse-inner rounded">
						<h6 class="collapse-header">Generar Reporte:</h6>
						<a class="collapse-item" href="../detalle_infraccion.php">Reporte Infracción</a>


					</div>
				</div>
			</li>
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

					<!-- Topbar Search -->
					<form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
						<div class="input-group">
							<input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
							<div class="input-group-append">
								<button class="btn btn-primary" type="button">
									<i class="fas fa-search fa-sm"></i>
								</button>
							</div>
						</div>
					</form>

					<!-- Topbar Navbar -->
					<ul class="navbar-nav ml-auto">

						<!-- Nav Item - Search Dropdown (Visible Only XS) -->
						<li class="nav-item dropdown no-arrow d-sm-none">
							<a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="fas fa-search fa-fw"></i>
							</a>
							<!-- Dropdown - Messages -->
							<div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
								<form class="form-inline mr-auto w-100 navbar-search">
									<div class="input-group">
										<input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
										<div class="input-group-append">
											<button class="btn btn-primary" type="button">
												<i class="fas fa-search fa-sm"></i>
											</button>
										</div>
									</div>
								</form>
							</div>
						</li>
					</ul>
				</nav>
				<!-- End of Topbar -->

				<!-- Begin Page Content -->
				<div class="container-fluid">

					<!-- Page Heading -->
					<h1 class="h3 mb-4 text-center text-gray-900">Actualizar Conductor</h1>

					<!-- FORMULARIO CONDUCTORES -->
					<div class="card card-body form_reducir text-dark mb-4">
						<form action="editar_conductor.php?id=<?php echo $_GET['id']; ?>" method="POST">
							<div class="row form-group">
								<div class="col-md-4">
									<label for="inputNombre" class="form-label ">Nombre</label>
									<input name="nombre_c" value="<?php echo $nombre ?>" type="text" class="form-control" id="inputNombre" required>
								</div>
								<div class="col-md-4">
									<label for="inputApellido" class="form-label">Apellido</label>
									<input name="apellido_c" value="<?php echo $apellido ?>" type="text" class="form-control" id="inputApellido" required>
								</div>
								<div class="col-md-4">
									<label for="inputDireccion" class="form-label">Direccion</label>
									<input name="direccion_c" value="<?php echo $direccion ?>" type="text" class="form-control" id="inputDireccion" required>
								</div>
							</div>
							<div class="row py-2 form-group">
								<div class="col-md-3">
									<label for="inputTel" class="form-label">Telefono</label>
									<input name="telefono_c" value="<?php echo $telefono ?>" type="tel" class="form-control" id="inputTel" required>
								</div>
								<div class="col-md-3">
									<label for="inputCorreo" class="form-label">Correo</label>
									<input name="email_c" value="<?php echo $correo ?>" type="email" class="form-control" id="inputCorreo" required>
								</div>
								<div class="col-md-3">
									<label for="inputLic" class="form-label">Licencia</label>
									<input name="licencia_c" value="<?php echo $licencia ?>" type="text" class="form-control" id="inputLic" required>
								</div>
								<div class="col-md-3">
									<label for="inputSalario" class="form-label">Salario</label>
									<input name="salario_c" value="<?php echo $salario ?>" type="number" class="form-control" id="inputSalario" required>
								</div>
							</div>
							<div class="row">
								<div class="col-md-1 m-auto">
									<button class="btn btn-primary" name="actualizar">Actualizar</button>
								</div>
							</div>
						</form>
					</div>


				</div>
				<!-- /.container-fluid -->

			</div>
			<!-- End of Main Content -->

			<!-- Footer -->
			<footer class="sticky-footer bg-white">
				<div class="container my-auto">
					<div class="copyright text-center my-auto">
						<span>Copyright &copy; Gabriela Castro 2021</span>
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
	<script src="../vendor/jquery/jquery.min.js"></script>
	<script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

	<!-- Core plugin JavaScript-->
	<script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

	<!-- Custom scripts for all pages-->
	<script src="../js/sb-admin-2.min.js"></script>

</body>

</html>