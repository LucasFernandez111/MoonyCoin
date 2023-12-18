<?php
$email=$_POST['email'];
$contraseña=$_POST['contrasenia'];

session_start();
$_SESSION['email']=$email;

$conexion=mysqli_connect("localhost", "root", "", "login");

$consulta='SELECT*FROM datos where email=$email' and 'contrasenia='$contrasenia'';
$resultado=mysqli_query($conexion,$consulta);

$filas=mysqli_num_rows($resultado);

if($filas){
    header("location:index.html");
}
else{
   
    include("iniciosesion.html");


}
mysqli_free_result($resultado);
mysqli_close($conexion);
?>