<?php
include('../config.php');
$surname = $_POST['surname'];
$dataUser = unserialize($_COOKIE['dataUser']);
$id = $dataUser['id'];



$sql = "UPDATE users SET surname = '$surname' WHERE id = '$id'";

$result = mysqli_query($link, $sql);


if (!$result) {
    die('Error al actualizar appelido.' . mysqli_error($link));
} else {

    echo "Se actualizo el apellido correctamente.";
}










?>