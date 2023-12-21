<?php

require_once "config.php";
include('./functions/functions.php');

$email = $nombre = $apellido = $username = $password = $confirm_password = $image = "";
$email_err = $nombre_err = $apellido_err = $username_err = $password_err = $confirm_password_err = $image_err = "";
['user' => $user] = getCookie();
function validatePass($pass)
{

    $mayusculas = preg_match_all('/([A-Z]{1})/', $pass);
    $minusculas = preg_match_all('/([a-z]{1})/', $pass);
    $numeros = preg_match_all('/([0-9]{1})/', $pass);

    if ($mayusculas > 2 || $mayusculas < 2) {
        return ['error' => true, 'result' => 'No cumple con las mayúsculas necesarias'];
    }

    if ($minusculas > 2 || $minusculas < 2) {
        return ['error' => true, 'result' => 'No cumple con las minúsculas necesarias'];
    }

    if ($numeros > 4 || $numeros < 4) {
        return ['error' => true, 'result' => 'No cumple con los números necesarios'];
    }

    return ['error' => false, 'result' => 'Contraseña correcta'];
}
function validateDate($date)
{
    $number = preg_match_all('/([0-9]{1})/', $date);
    if (!$number) {
        return false;
    }

    return true;
}

function validateEmail($mail)
{
    $exampleEmail = '@gmail.com';

    $containsGmail = strpos($mail, $exampleEmail);

    return $containsGmail;
}



if ($_SERVER["REQUEST_METHOD"] == "POST") {


    if (empty(trim($_POST["email"]))) {
        $email_err = "Por favor ingrese un correo electrónico.";
    } else {

        $sql = "SELECT id FROM users WHERE email = ?";

        if ($stmt = mysqli_prepare($link, $sql)) {

            mysqli_stmt_bind_param($stmt, "s", $param_email);

            $param_email = trim($_POST["email"]);

            if (mysqli_stmt_execute($stmt)) {
                mysqli_stmt_store_result($stmt);

                if (mysqli_stmt_num_rows($stmt) == 1) {
                    $email_err = "Este correo electrónico ya está en uso.";
                } else {
                    $email = trim($_POST["email"]);
                }
            } else {
                echo 'Error al intentar ejecutar la consulta de selección: ' . mysqli_error($link);
            }
        }

        mysqli_stmt_close($stmt);
    }


    if (empty(trim($_POST["nombre"]))) {
        $nombre_err = "Por favor ingrese su nombre.";
    } else {
        $nombre = trim($_POST["nombre"]);
    }


    if (empty(trim($_POST["apellido"]))) {
        $apellido_err = "Por favor ingrese su apellido.";
    } else {
        $apellido = trim($_POST["apellido"]);
    }


    if (empty(trim($_POST["username"]))) {
        $username_err = "Por favor ingrese un usuario.";
    } else {
        $sql = "SELECT id FROM users WHERE username = ?";

        if ($stmt = mysqli_prepare($link, $sql)) {
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            $param_username = trim($_POST["username"]);

            if (mysqli_stmt_execute($stmt)) {
                mysqli_stmt_store_result($stmt);

                if (mysqli_stmt_num_rows($stmt) == 1) {
                    $username_err = "Este usuario ya está en uso.";
                } else {
                    $username = trim($_POST["username"]);
                }
            } else {
                echo 'Error al intentar ejecutar la consulta de selección: ' . mysqli_error($link);
            }
        }

        mysqli_stmt_close($stmt);
    }


    if (empty($_FILES['image']['tmp_name'])) {
        $image_err = "Por favor seleccione una imagen.";


    } else {
        $imageData = file_get_contents($_FILES['image']['tmp_name']);
    }


    if (empty(trim($_POST["password"]))) {
        $password_err = "Por favor ingrese una contraseña.";
    } elseif (strlen(trim($_POST["password"])) < 8) {
        $password_err = "La contraseña debe tener al menos 8 caracteres.";
    } else {
        $password = trim($_POST["password"]);
    }


    if (empty(trim($_POST["confirm_password"]))) {
        $confirm_password_err = "Confirme la contraseña.";
    } else {
        $confirm_password = trim($_POST["confirm_password"]);
        if (empty($password_err) && ($password != $confirm_password)) {
            $confirm_password_err = "Las contraseñas no coinciden.";
        }
    }




    $name_validation = validateDate($nombre);
    if ($name_validation) {
        $nombre_err = "Debe contener solo letras.";
    }
    $surname_validation = validateDate($apellido);
    if ($surname_validation) {
        $apellido_err = "Debe contener solo letras.";
    }

    $email_validation = validateEmail($email);
    if (!$email_validation) {
        $email_err = 'No pertecene a un correo Gmail.';
    }

    $user_validation = validateDate($username);
    if (!$user_validation) {
        $username_err = "Debe tener almenos un número.";
    }

    $pass_validation = validatePass($password);
    if ($pass_validation['error']) {

        $password_err = $pass_validation['result'];
    }


    if (empty($email_err) && empty($nombre_err) && empty($apellido_err) && empty($username_err) && empty($password_err) && empty($confirm_password_err) && empty($image_err)) {

        echo '<img src="data:image/jpeg;base64,' . $imageBase64 . '" alt="User Image">';
        $sql = "INSERT INTO users (name, surname, email, username, password,image) VALUES (?, ?, ?, ?, ?,?)";

        if ($stmt = mysqli_prepare($link, $sql)) {
            mysqli_stmt_bind_param($stmt, "ssssss", $param_nombre, $param_apellido, $param_email, $param_username, $param_password, $param_image);

            $param_email = $email;
            $param_nombre = $nombre;
            $param_apellido = $apellido;
            $param_username = $username;
            $param_image = $imageData;
            $param_password = password_hash($password, PASSWORD_DEFAULT);





            if (mysqli_stmt_execute($stmt)) {


                $userAdmin = 'admin1';
                if ($user === $userAdmin) {
                    header("Location: register.php");
                    exit;
                }
                header("location: login.php");
            } else {
                echo 'Error al intentar ejecutar la consulta de inserción: ' . mysqli_error($link);
            }
        }

        mysqli_stmt_close($stmt);
    }

    mysqli_close($link);
}

?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Tu Página de Registro</title>
    <style type="text/css">
        body {
            font: 14px sans-serif;
            background-color: #5f4dee;
            color: white;
        }

        .wrapper {


            padding: 20px;
            border: 1px solid #E1E1E1;
            border-radius: 5px;
            background-color: white;
            color: grey;

        }

        p {

            font: 400 1rem/1.625rem "Open Sans", sans-serif;
        }

        h1 {

            font: 700 2.5rem/3.125rem "Open Sans", sans-serif;
        }

        .btn-primary {
            display: inline-block;
            width: 100%;
            height: 3.125rem;
            border: 1px solid #5f4dee;
            border-radius: 1.5rem;
            background-color: #5f4dee;
            color: #fff;
            font: "Open Sans", sans-serif;
            cursor: pointer;
            transition: all 0.2s;
        }

        .btn-default {
            display: inline-block;
            width: 100%;
            height: 3.125rem;
            border: 1px solid #5f4dee;
            border-radius: 1.5rem;
            background-color: white;
            color: grey;
            font: "Open Sans", sans-serif;
            cursor: pointer;
            transition: all 0.2s;
        }
    </style>
    <!-- Aquí puedes agregar otros elementos head que necesites -->
</head>

<body>

    <?php

    $userAdmin = 'admin1';
    if ($user === $userAdmin) {
        ?>
        <div class=" mt-2 p-3 container bg-dark w-50 h-25 d-flex justify-content-center align-item-center rounded">


            <div class="w-50 ">
                <h2 class="text-center bold">Agrega un Usuario</h1>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data   "
                        method="post">



                        <div class="form-group <?php echo (!empty($apellido_err)) ? 'has-error' : ''; ?>">
                            <label>Apellido</label>
                            <input type="text" required name="apellido" class="form-control"
                                value="<?php echo $apellido; ?>">
                            <span class="help-block">
                                <?php echo $apellido_err; ?>
                            </span>
                        </div>
                        <div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
                            <label>Email</label>
                            <input type="email" required name="email" class="form-control" value="<?php echo $email; ?>">
                            <span class="help-block">
                                <?php echo $email_err; ?>
                            </span>
                        </div>
                        <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                            <label>Usuario</label>
                            <input type="text" required name="username" class="form-control"
                                value="<?php echo $username; ?>">
                            <span class="help-block">
                                <?php echo $username_err; ?>
                            </span>
                        </div>
                        <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                            <label>Contraseña</label>
                            <input type="password" required name="password" class="form-control"
                                value="<?php echo $password; ?>">
                            <span class="help-block">
                                <?php echo $password_err; ?>
                            </span>
                        </div>
                        <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                            <label>Confirmar Contraseña</label>
                            <input type="password" required name="confirm_password" class="form-control"
                                value="<?php echo $confirm_password; ?>">
                            <span class="help-block ">
                                <?php echo $confirm_password_err; ?>
                            </span>
                        </div>
                        <div class="form-group <?php echo (!empty($image_err)) ? 'has-error' : ''; ?>">
                            <label>Selecciona foto de perfil</label>
                            <input type="file" accept="image/jpeg" required name="image">
                            <br>
                            <span class="help-block ">

                                <?php echo $image_err; ?>
                            </span>
                        </div>

                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="Ingresar">
                            <br><br>
                            <input type="reset" class="btn btn-default" value="Borrar">
                        </div>
                    </form>
            </div>
        </div>
        <?php
    } else {
        ?>
        <div class="d-flex justify-content-center  flex-column align-items-center ">
            <div class="text-center">
                <h1>Registro</h1>
                <p>Por favor complete este formulario para crear una cuenta.</p>
            </div>
            <div class="wrapper w-50 h-10">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data"
                    method="post">

                    <div class="form-group <?php echo (!empty($nombre_err)) ? 'has-error' : ''; ?>">
                        <label>Nombre</label>
                        <input type="text" required name="nombre" class="form-control" value="<?php echo $nombre; ?>">
                        <span class="help-block">
                            <?php echo $nombre_err; ?>
                        </span>
                    </div>
                    <div class="form-group <?php echo (!empty($apellido_err)) ? 'has-error' : ''; ?>">
                        <label>Apellido</label>
                        <input type="text" required name="apellido" class="form-control" value="<?php echo $apellido; ?>">
                        <span class="help-block">
                            <?php echo $apellido_err; ?>
                        </span>
                    </div>
                    <div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
                        <label>Email</label>
                        <input type="email" required name="email" class="form-control" value="<?php echo $email; ?>">
                        <span class="help-block">
                            <?php echo $email_err; ?>
                        </span>
                    </div>
                    <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                        <label>Usuario</label>
                        <input type="text" required name="username" class="form-control" value="<?php echo $username; ?>">
                        <span class="help-block">
                            <?php echo $username_err; ?>
                        </span>
                    </div>
                    <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                        <label>Contraseña</label>
                        <input type="password" required name="password" class="form-control"
                            value="<?php echo $password; ?>">
                        <span class="help-block">
                            <?php echo $password_err; ?>
                        </span>
                    </div>
                    <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                        <label>Confirmar Contraseña</label>
                        <input type="password" required name="confirm_password" class="form-control"
                            value="<?php echo $confirm_password; ?>">
                        <span class="help-block">
                            <?php echo $confirm_password_err; ?>
                        </span>
                    </div>
                    <div class="form-group <?php echo (!empty($image_err)) ? 'has-error' : ''; ?>">
                        <label>Selecciona foto de perfil</label>
                        <input type="file" accept="image/jpeg" name="image" value="<?php echo $image; ?>">
                        <span class="help-block">
                            <?php echo $image_err; ?>
                        </span>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Ingresar">
                        <br><br>
                        <input type="reset" class="btn btn-default" value="Borrar">
                    </div>
                    <p>¿Ya tienes una cuenta? <a href="login.php">Ingresa aquí</a>.</p>
                </form>
            </div>
        </div>
        </div>
        <?php
    }
    ?>

    <!-- Otro contenido de tu página si es necesario -->

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Otros scripts que puedas necesitar -->

</body>

</html>