<?php

include('../connection.php');

if (isset($_POST['guardar'])) {
    $pre_s = $_POST['precio_s'];
    $desc_s = $_POST['descripcion_s'];

    $query = "INSERT INTO servicios(precio, descripcion) VALUES ('$pre_s', '$desc_s')";

    $result =  mysqli_query($conn, $query);
    if (!$result) {
        die("Query failed");
    }
    
    $_SESSION['message'] = 'Servicio guardado';
    $_SESSION['message_type'] = 'success';

    header("Location: ../pages/servicio.php");
}

?>