<?php
include('../config.php');
include('../functions/functions.php');
['id' => $id] = getCookie();

$fileTmpName = $_FILES['file']['tmp_name'];
$fileName = $_FILES['file']['name'];  // Obtén el nombre original del archivo

$fileSize = filesize($fileTmpName);

if ($fileSize > 0) {

    $userCheck = "SELECT id FROM users WHERE id = '$id'";
    $userResult = mysqli_query($link, $userCheck);

    if (mysqli_num_rows($userResult) > 0) {

        $fileData = file_get_contents($fileTmpName);
        $escapedFileData = $link->real_escape_string($fileData);

        $insertUser = "INSERT IGNORE INTO users (id) VALUES ('$id')";
        mysqli_query($link, $insertUser);

        $sql = "INSERT INTO user_file (id_user, file_name, file) VALUES ('$id', '$fileName', '$escapedFileData')";
        $result = mysqli_query($link, $sql);

        if ($result) {
            header("Location: ../pages/showFilePage.php");
            exit;
        } else {
            echo "ERROR AL SUBIR EL ARCHIVO." . $link->error;
        }
    } else {
        echo "El usuario no existe.";
    }

    $link->close();
} else {
    echo "Selecciona un archivo.";
}
?>