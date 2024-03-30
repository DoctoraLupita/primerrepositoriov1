<?php
session_start();

include 'conexion_be.php';

$correo= $_POST['correo'];
$contrasena= $_POST['contrasena'];
$contrasena= hash('sha512', $contrasena);


// Escapar las variables para evitar inyección SQL (solo si no se usan consultas preparadas)
$correo = mysqli_real_escape_string($conexion, $correo);
$contrasena = mysqli_real_escape_string($conexion, $contrasena);

$consulta = "SELECT * FROM usuarios WHERE correo='$correo' AND contrasena='$contrasena'";
$resultado = mysqli_query($conexion, $consulta);

if(mysqli_num_rows($resultado) > 0) {

   

 $_SESSION['usuarios'] = $correo;
    header("location: ../lucero/menu_ppal.html");
    
  exit;
} else {
   echo '<script>alert("Usuario no existe o la contraseña es incorrecta"); 
    window.location ="../index.php";
    </script>';
    exit;
}
?>