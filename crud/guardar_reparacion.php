<?php
include('../connection.php');

if (isset($_POST['guardar'])) {
	$fecha_r = $_POST['fecha_re'];
	$costo_r = $_POST['costo_re'];
	$reparacion_v = $_POST['reparacion_v'];
	$descripcion_r = $_POST['descripcion_r'];

	$query = "INSERT INTO reparaciones(fecha, costo, vehiculos_id, observacion) VALUES ('$fecha_r', '$costo_r', '$reparacion_v' , '$descripcion_r')";

	$result =  mysqli_query($conn, $query);
	if (!$result) {
		die("Query failed");
	}

	$_SESSION['message'] = 'Reparación guardada';
	$_SESSION['message_type'] = 'success';

	header("Location: guardar_reparacion.php?id=" . $reparacion_v);
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

	<!-- Custom styles for this page -->
	<link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

	<!-- ICONOS -->
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

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
						<a class="collapse-item" href="conductor.php">Conductor</a>
						<a class="collapse-item" href="cliente.php">Cliente</a>
						<a class="collapse-item" href="servicio.php">Servicio</a>
						<a class="collapse-item" href="vehiculo.php">Vehiculo</a>
						<a class="collapse-item active" href="reparacion.php">Reparaciones</a>

						<div class="collapse-divider"></div>
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
						<a class="collapse-item" href="../tabla_pdf.php">Vehiculos</a>

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
					<h1 class="h3 mb-4 text-center text-gray-900">Registro Reparaciones</h1>

					<!-- MENSAJE LUEGO DE GUARDAR CLIENTE -->
					<?php if (isset($_SESSION['message'])) { ?>
						<div class="row justify-content-center">
							<div class="col-6">
								<div class="alert alert-<?= $_SESSION['message_type'] ?> alert-dismissible" role="alert" id="liveAlert">
									<?= $_SESSION['message'] ?>
									<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
								</div>
							</div>
						</div>
					<?php session_unset();
					} ?>
					<!-- FORMULARIO REPARACIONES -->
					<div class="card card-body form_servicio text-gray-900 mb-4">
						<form action="../crud/guardar_reparacion.php" method="POST">
							<div class="row form-group justify-content-center">
								<div class="col-md-4 ">
									<label for="inputFecha" class="form-label ">Fecha</label>
									<input type="date" class="form-control" name="fecha_re" id="inputFecha" required>
								</div>

								<div class="col-md-4">
									<label for="inputCosto" class="form-label">Costo</label>
									<input type="number" class="form-control" name="costo_re" id="inputCosto" required>
								</div>
								<div class="col-md-4">
									<label for="inputVehiculo" class="form-label">Vehiculo</label>
									<select name="reparacion_v" id="inputVehiculo" class="form-select form-select-md" required>
										<!-- 	<option value="" selected>-- Seleccione el Conductor --</option> -->

										<!-- CONSULTA CONDUCTOR-->
										<?php
										if (isset($_GET['id'])) {
											$id = $_GET['id'];
											print $id;
											$query = "SELECT * FROM vehiculos WHERE id = $id";
											$ejecutar = mysqli_query($conn, $query);
											while ($row = mysqli_fetch_assoc($ejecutar)) { ?>
												<option value="<?php echo $row['id']; ?>"><?php echo $row['placa']; ?></option>
										<?php }
										} ?>
									</select>
								</div>
							</div>
							<div class="row justify-content-center form-group">
								<div class="col-md-7">
									<label for="inputDesc" class="form-label ">Descripción</label>
									<textarea name="descripcion_r" class="form-control" id="inputDesc" cols="20" rows="5" required></textarea>
								</div>
							</div>
							<div class="row">
								<div class="col-md-1 m-auto">
									<input type="submit" value="Agregar" class="btn btn-primary " name="guardar">
								</div>
							</div>
						</form>
					</div>

					<!-- TABLA -->
					<div class="card shadow mb-4">
						<div class="card-header py-3">
							<h6 class="m-0 font-weight-bold text-primary">Tabla de Servicios</h6>
						</div>
						<div class="card-body">
							<div class="table-responsive">
								<table class="table table-bordered tabla" id="dataTable" width="100%" cellspacing="0">
									<thead>
										<tr>
											<th>Fecha</th>
											<th>Costo</th>
											<th>Vehiculo</th>
											<th>Descripción</th>
											<th>Acciones</th>
										</tr>
									</thead>
									<tfoot>
										<tr>
											<th>Fecha</th>
											<th>Costo</th>
											<th>Descripción</th>
											<th>Vehiculo</th>
											<th>Acciones</th>
										</tr>
									</tfoot>
									<tbody>
										<?php
										if (isset($_GET['id'])) {
											$id = $_GET['id'];
											$query = "SELECT `reparaciones`.*, `vehiculos`.`placa`
											FROM `reparaciones` 
											LEFT JOIN `vehiculos` ON `reparaciones`.`vehiculos_id` = `vehiculos`.`id` where vehiculos_id = $id;";
											$resultado = mysqli_query($conn, $query);

											while ($row = mysqli_fetch_array($resultado)) { ?>
											<tr>
												<td><?php echo $row['fecha'] ?></td>
												<td><?php echo $row['costo'] ?></td>
												<td><?php echo $row['placa'] ?></td>
												<td><?php echo $row['observacion'] ?></td>
												<td class="text-center">
													<a href="editar_reparacion.php?id=<?php echo $row['id'] ?>" class="btn btn-secondary">
														<i class="far fa-edit"></i>
													</a>
													<a href="eliminar_reparacion.php?id=<?php echo $row['id'] ?>" class="btn btn-danger">
														<i class="far fa-trash-alt"></i>
													</a>
												</td>
											</tr>
										<?php } } ?>

									</tbody>
								</table>
							</div>
						</div>
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
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

	<!-- Core plugin JavaScript-->
	<script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

	<!-- Custom scripts for all pages-->
	<script src="../js/sb-admin-2.min.js"></script>

	<!-- Page level plugins -->
	<script src="../vendor/datatables/jquery.dataTables.min.js"></script>
	<script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>
	<script src="../js/demo/datatables-demo.js"></script>
</body>

</html>