<?php 

include('../connection.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM servicios WHERE id= $id";
    $resultado = mysqli_query($conn,$query);
    if (!$resultado) {
        die("Query failed");
    }
$_SESSION['message'] = 'Servicio Eliminado';
$_SESSION['message_type']='danger';
    header("Location: ../pages/servicio.php");
}
?>