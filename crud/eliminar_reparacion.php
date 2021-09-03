<?php 

include('../connection.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT vehiculos_id FROM reparaciones WHERE id = $id";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $idx = $row['vehiculos_id'];
    }
    $query = "DELETE FROM reparaciones WHERE id = $id";
    $resultado = mysqli_query($conn,$query);
    if (!$resultado) {
        die("Query failed");
    }
    $_SESSION['message'] = 'Reparación Eliminada';
    $_SESSION['message_type']='danger';
	header("Location: guardar_reparacion.php?id=" .$idx);
}

?>