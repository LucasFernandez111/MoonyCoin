<?php

 
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$new_username = $confirm_username = "";
$new_username_err = $confirm_username_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate new username
    if(empty(trim($_POST["new_username"]))){
        $new_username_err = "Please enter the new username.";     
    } elseif(strlen(trim($_POST["new_username"])) < 1){
        $new_username_err = "el nombre de usuario debe tener al menos 1 caracter numerico.";
    } else{
        $new_username = trim($_POST["new_username"]);
    }
    
    // Validate confirm username
    if(empty(trim($_POST["confirm_username"]))){
        $confirm_username_err = "Por favor confirme el nombre de usuario.";
    } else{
        $confirm_username = trim($_POST["confirm_username"]);
        if(empty($new_username_err) && ($new_username != $confirm_username)){
            $confirm_username_err = "Los nombres de usuario no coinciden.";
        }
    }
        
   
    // Close connection
    mysqli_close($link);
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cambia tu nombre de usuario acá</title>
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
     <h1>Cambia tu nombre de usuario acá</h1>
        <p>Complete este formulario para restablecer su contraseña.</p>
    <div class="wrapper">
     
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post"> 
            <div class="form-group <?php echo (!empty($new_username_err)) ? 'has-error' : ''; ?>">
                <label>Nuevo nombre de usuario</label>
                <input type="username" name="new_username" class="form-control" value="<?php echo $new_username; ?>">
                <span class="help-block"><?php echo $new_username_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($confirm_username_err)) ? 'has-error' : ''; ?>">
                <label>Confirmar nombre de usuario</label>
                <input type="text" name="confirm_username" class="form-control">
                <span class="help-block"><?php echo $confirm_username_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Enviar">
               
            </div>
        </form>
    </div>    
</body>
</html>