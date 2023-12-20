<?php
// // Initialize the session
// session_start();

// // Check if the user is already logged in, if yes then redirect him to welcome page
// if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
//     header("location: login.php");
//     exit;
// }

// Include config file
require_once "config.php";

// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Check if username is empty
    if (empty(trim($_POST["username"]))) {
        $username_err = "Por favor ingrese su usuario.";
    } else {
        $username = trim($_POST["username"]);
    }

    // Check if password is empty
    if (empty(trim($_POST["password"]))) {
        $password_err = "Por favor ingrese su contraseña.";
    } else {
        $password = trim($_POST["password"]);
    }

    // Validate credentials
    if (empty($username_err) && empty($password_err)) {
        // Prepare a select statement
        $sql = "SELECT id, username, password,image FROM users WHERE username = ?";

        if ($stmt = mysqli_prepare($link, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            // Set parameters
            $param_username = $username;

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                // Store result
                mysqli_stmt_store_result($stmt);

                // Check if username exists, if yes then verify password
                if (mysqli_stmt_num_rows($stmt) == 1) {
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password, $image);
                    if (mysqli_stmt_fetch($stmt)) {
                        if (password_verify($password, $hashed_password)) {


                            $dataUser = array(
                                'id' => $id,
                                'user' => $username,


                            );
                            ;


                            $data_serializada = serialize($dataUser);

                            setcookie("dataUser", $data_serializada, time() + 3600);


                            header("location: index.php");
                        } else {
                            // Display an error message if password is not valid
                            $password_err = "La contraseña que ha ingresado no es válida.";
                        }
                    }
                } else {
                    // Display an error message if username doesn't exist
                    $username_err = "No existe cuenta registrada con ese nombre de usuario.";
                }
            } else {
                echo "Algo salió mal, por favor vuelve a intentarlo.";
            }
        }

        // Close statement
        mysqli_stmt_close($stmt);
    }

    // Close connection
    mysqli_close($link);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,700&display=swap&subset=latin-ext"
        rel="stylesheet">
    <style type="text/css">
        body {
            font: 14px sans-serif;
            background-color: #5f4dee;
            color: white;

        }

        .wrapper {
            width: 350px;
            padding: 20px;
            border: 1px solid #E1E1E1;
            border-radius: 5px;
            background-color: white;
            color: grey;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        p {
            text-align: center;
            font: "Open Sans", sans-serif;
            top: 25px;
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
    </style>
</head>

<body>
    <h1 class="text-center fs-1 font-bold">Bienvenidos</h1>
    <p class="font-bold">Por favor, complete sus credenciales para iniciar sesión.</p>
    <div class=" wrapper">

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label>Usuario</label>
                <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
                <span class="help-block">
                    <?php echo $username_err; ?>
                </span>
            </div>
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label>Contraseña</label>
                <input type="password" name="password" class="form-control">
                <span class="help-block">
                    <?php echo $password_err; ?>
                </span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Ingresar">
            </div>
            <p>¿No tienes una cuenta? <a href="register.php">Regístrate ahora</a>.</p>
            <p>¿perdiste tu contraseña? <a href="recucontra.php">recuperala aquí</a>.</p>

        </form>
    </div>
</body>

</html>