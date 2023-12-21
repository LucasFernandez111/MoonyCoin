<?php
include('../config.php');
$name = $_POST['name'];
$dataUser = unserialize($_COOKIE['dataUser']);
$id = $dataUser['id'];



$sql = "UPDATE users SET name = '$name' WHERE id = '$id'";

$result = mysqli_query($link, $sql);


if (!$result) {
    die('Error al actualizar nombre.' . mysqli_error($link));
} else {

    header('Location: ../logout.php');
}


























?>