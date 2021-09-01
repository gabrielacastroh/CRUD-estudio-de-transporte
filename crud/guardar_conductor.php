<?php

include('../connection.php');

if (isset($_POST['guardar'])) {
    $nom_c = $_POST['nombre_c'];
    $ape_c = $_POST['apellido_c'];
    $dir_c = $_POST['direccion_c'];
    $tel_c = $_POST['telefono_c'];
    $email_c = $_POST['email_c'];
    $lic_c = $_POST['licencia_c'];
    $sal_c = $_POST['salario_c'];

    $query = "INSERT INTO conductores(nombre, apellido, direccion, telefono, correo, licencia, salario) VALUES ('$nom_c', '$ape_c' , '$dir_c', '$tel_c', '$email_c', '$lic_c', '$sal_c')";


    $result =  mysqli_query($conn, $query);
    if (!$result) {
        die("Query failed");
    }

    $_SESSION['message'] = 'Conductor guardado';
    $_SESSION['message_type'] = 'success';


    header("Location: ../pages/conductor.php");
}
?>




