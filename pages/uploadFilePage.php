<?php include('../functions/functions.php');
['user' => $user] = getCookie();


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subir Archivo</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body style="background-color:#5f4dee;">
    <button class="btn text-white" style="margin-left: 10px; margin-top: 10px; background-color:#9f94f4;"
        onclick="window.location.replace('../index.php');;">REGRESAR</button>
    <div class="container mt-5 bg-white rounded p-4 w-50">
        <form action='../services/uploadFile.php' method="post"
            class="d-flex flex-column justify-content-center align-items-center" enctype="multipart/form-data">

            <div class="input-group">

                <div class="custom-file">
                    <input type="file" id="inputGroupFile01" accept="<?php if ($user === 'admin1') {
                        echo " accept='.jpg, .jpeg, .png, .gif'";

                    } else {
                        echo " accept='*'";
                    } ?>" name="file">
                </div>
            </div>
            <input type="submit" class="btn w-25 mt-5 text-white" style="background-color:#5f4dee;"
                value="Subir archivo">

        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>