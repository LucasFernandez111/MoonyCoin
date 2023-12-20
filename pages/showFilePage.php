<?php
include('../config.php');
include('../functions/functions.php');
['id' => $id] = getCookie();

// Consulta para obtener los archivos almacenados de la persona
$sql = "SELECT file_name FROM user_file WHERE id_user = '$id'";
$result = mysqli_query($link, $sql);

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Archivos Almacenados</title>
</head>

<body style="background-color:#9f94f4;">


    <button class="btn text-white" style="margin-left: 10px; margin-top: 10px; background-color: #5f4dee; "
        onclick="window.history.back();">REGRESAR</button>
    <div class="container mt-4 ">
        <?php
        if ($result) {
            if (mysqli_num_rows($result) > 0) {
                ?>
                <table class="table table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th>Nombre del Archivo</th>
                            <th>Enlace de Descarga</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($row = mysqli_fetch_assoc($result)) {
                            $fileName = $row['file_name'];
                            ?>
                            <tr>
                                <td class="text-white ">
                                    <?php echo $fileName; ?>
                                </td>
                                <td><a href="download.php?file=<?php echo urlencode($fileName); ?>" class="btn text-white"
                                        style=" background-color: #5f4dee;">Descargar</a></td>
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                </table>
                <?php
            } else {
                echo '<p class="alert alert-warning">No se encontraron archivos almacenados para esta persona.</p>';
            }
        } else {
            echo '<p class="alert alert-danger">Error en la consulta: ' . mysqli_error($link) . '</p>';
        }

        mysqli_close($link);
        ?>
    </div>

    <!-- Scripts de Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>