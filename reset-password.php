<?php
include('config.php');

$new_password = $confirm_password = "";
$new_password_err = $confirm_password_err = "";
 
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    if(empty(trim($_POST["new_password"]))){
        $new_password_err = "Please enter the new password.";     
    } elseif(strlen(trim($_POST["new_password"])) < 4){
        $new_password_err = "La contraseña al menos debe tener 4 caracteres.";
    } else{
        $new_password = trim($_POST["new_password"]);
    }
    
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Por favor confirme la contraseña.";
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($new_password_err) && ($new_password != $confirm_password)){
            $confirm_password_err = "Las contraseñas no coinciden.";
        }
    }
        
    if(empty($new_password_err) && empty($confirm_password_err)){
        $sql = "UPDATE users SET password = ? WHERE id = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            mysqli_stmt_bind_param($stmt, "si", $param_password, $param_id);
            
            $param_password = password_hash($new_password, PASSWORD_DEFAULT);
            $param_id = $_SESSION["id"];
            
            if(mysqli_stmt_execute($stmt)){
                
                header("location: login.php");
                exit();
            } else{
                echo "Algo salió mal, por favor vuelva a intentarlo.";
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
    <title>Cambia tu contraseña acá</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; 
            background-color: #5f4dee;
            color:white;
           
        }
        .wrapper{ width: 350px; padding: 20px; 
            border: 1px solid #E1E1E1;
          border-radius:5px;
          background-color:white;
          color:grey;
         position:absolute;
         top:50%;
         left:50%;
         transform:translate(-50%, -50%);
        }
        p{
           text-align:center;
           font:  "Open Sans", sans-serif;
           top:25px;
        }
        h1{
            text-align:center;

            font: 700 2.5rem/3.125rem "Open Sans", sans-serif;
        }
        .btn-primary{
            display: inline-block;
    width: 100%;
    height: 3.125rem;
    border: 1px solid #5f4dee;
    border-radius: 1.5rem;
    background-color: #5f4dee;
    color: #fff;
    font:  "Open Sans", sans-serif;
    cursor: pointer;
    transition: all 0.2s;
        }
    </style>
</head>
<body>  
     <h1>Cambia tu contraseña acá</h1>
        <p>Complete este formulario para restablecer su contraseña.</p>
    <div class="wrapper">
     
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post"> 
            <div class="form-group <?php echo (!empty($new_password_err)) ? 'has-error' : ''; ?>">
                <label>Nueva contraseña</label>
                <input type="password" name="new_password" class="form-control" value="<?php echo $new_password; ?>">
                <span class="help-block"><?php echo $new_password_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                <label>Confirmar contraseña</label>
                <input type="password" name="confirm_password" class="form-control">
                <span class="help-block"><?php echo $confirm_password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Enviar">
               
            </div>
        </form>
    </div>    
</body>
</html>