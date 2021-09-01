<?php

include('../connection.php');


if (isset($_POST['guardar'])) {
    $placa_v = $_POST['placa_v'];
    $mod = $_POST['modelo_v'];
    foreach ($mod as $modelo_v);
    $marca_v = $_POST['marca_v'];
    $cap = $_POST['capacidad_v'];
    foreach ($cap as $capacidad_v);
    $cliente = $_POST['cliente_v'];
    $conductor = $_POST['conductor_v'];

    $query = "INSERT INTO vehiculos(placa, modelo, marca, capacidad, clientes_id, conductores_id) VALUES ('$placa_v', '$modelo_v', '$marca_v', '$capacidad_v', '$cliente', '$conductor')";

    $result =  mysqli_query($conn, $query);
    if (!$result) {
        die("Query failed");
    }

    $_SESSION['message'] = 'Vehiculo guardado';
    $_SESSION['message_type'] = 'success';

    header("Location: ../pages/vehiculo.php");
}

?>