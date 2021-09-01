<?php 

include('../connection.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM conductores WHERE id= $id";
    $resultado = mysqli_query($conn,$query);
    if (!$resultado) {
        die("Query failed");
    }
$_SESSION['message'] = 'Conductor Eliminado';
$_SESSION['message_type']='danger';
    header("Location: ../pages/conductor.php");
}


?>