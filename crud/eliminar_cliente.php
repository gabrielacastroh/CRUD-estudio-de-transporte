<?php 

include('../connection.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM clientes WHERE id= $id";
    $resultado = mysqli_query($conn,$query);
    if (!$resultado) {
        die("Query failed");
    }
$_SESSION['message'] = 'Cliente Eliminado';
$_SESSION['message_type']='danger';
    header("Location: ../pages/cliente.php");
}

?>