<?php
include('../config.php');
include('../functions/functions.php');

['id' => $id] = getCookie();

if (isset($_GET['file'])) {
    $fileName = urldecode($_GET['file']);

    $sql = "SELECT file, file_name FROM user_file WHERE id_user = '$id' AND file_name = '$fileName'";
    $result = mysqli_query($link, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $fileData = mysqli_fetch_assoc($result)['file'];
        $fileSize = strlen($fileData);

        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' . $fileName . '"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . $fileSize);
        echo $fileData;
        exit;
    } else {
        echo '<p class="alert alert-danger">El archivo no existe.</p>';
    }
} else {
    echo '<p class="alert alert-danger">Parámetro de archivo no proporcionado.</p>';
}
?>