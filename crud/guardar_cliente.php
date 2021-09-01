<?php

include('../connection.php');

if (isset($_POST['guardar'])) {
	$nom_cl = $_POST['nombre_cl'];
	$ape_cl = $_POST['apellido_cl'];
	$dir_cl = $_POST['direccion_cl'];
	$tel_cl = $_POST['telefono_cl'];
	$email_cl = $_POST['email_cl'];


    $query = "INSERT INTO clientes(nombre, apellido, direccion, telefono, correo) VALUES ('$nom_cl', '$ape_cl' , '$dir_cl', '$tel_cl', '$email_cl')";

    $result =  mysqli_query($conn, $query);
    if (!$result) {
        die("Query failed");
    }
    
    $_SESSION['message'] = 'Cliente guardado';
    $_SESSION['message_type'] = 'success';

    header("Location: ../pages/cliente.php");
}
?>