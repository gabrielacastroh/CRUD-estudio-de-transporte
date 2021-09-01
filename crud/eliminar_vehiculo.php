<?php 

include('../connection.php');

	if (isset($_GET['id'])) {
		$id = $_GET['id'];
		$query = "DELETE FROM vehiculos WHERE id= $id";
		$resultado = mysqli_query($conn,$query);
		if (!$resultado) {
			die("Query failed");
		}
		$_SESSION['message'] = 'Vehiculo Eliminado';
		$_SESSION['message_type']='danger';
		header("Location: ../pages/vehiculo.php");
	}

?>