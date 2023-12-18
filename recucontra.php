
<?php

require_once "config.php";


$username = $password = "";
$username_err = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    
    if (empty(trim($_POST["username"]))) {
        $username_err = "Por favor, ingresa un usuario.";
    } else {
        $username = trim($_POST["username"]);
    }

    
    if (empty($username_err)) {
        
        $sql = "SELECT password FROM users WHERE username = ?";

        if ($stmt = mysqli_prepare($link, $sql)) {
            
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            $param_username = $username;

           
            if (mysqli_stmt_execute($stmt)) {
                mysqli_stmt_store_result($stmt);

                
                if (mysqli_stmt_num_rows($stmt) == 1) {
                  
                    mysqli_stmt_bind_result($stmt, $hashed_password);

                    if (mysqli_stmt_fetch($stmt)) {
                        $password = $hashed_password;
                    }

                   
                     
                } else {
                    $username_err = "No hay ninguna cuenta registrada con ese usuario.";
                }
            } else {
                echo "Algo salió mal, por favor vuelve a intentarlo.";
            }

            
            mysqli_stmt_close($stmt);
        }
    }

    
    mysqli_close($link);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Recuperar Contraseña</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,700&display=swap&subset=latin-ext" rel="stylesheet">
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
        }

        h1 {
            text-align: center;
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
    </style>
</head>

<body>
    <h1>Recuperar Contraseña</h1>
    <p>Ingresa el usuario para mostrar la contraseña correspondiente.</p>
    <div class="wrapper">

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label>Usuario</label>
                <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
                <span class="help-block"><?php echo $username_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label>la contraseña para el usuario es:</label>
                <input type="text" value="<?php echo $password; ?>">
                
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Mostrar Contraseña">
            </div>
        </form>
    </div>
</body>

</html>
