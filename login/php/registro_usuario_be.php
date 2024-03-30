<?php

include 'conexion_be.php';

$nombre_completo = $_POST['nombre_completo'];
$correo = $_POST['correo'];
$usuario = $_POST['usuario'];
$contrasena = $_POST['contrasena'];


//Encriptamiento de contrsaeña
$contrasena= hash('sha512', $contrasena);

$query = "INSERT INTO usuarios(nombre_completo , correo, usuario, contrasena) 
          VALUES('$nombre_completo', '$correo', '$usuario', '$contrasena')";

//verificar que correo no se repita en bd
$verificar_correo = mysqli_query($conexion, "SELECT * FROM usuarios where correo = '$correo'"); 

if(mysqli_num_rows($verificar_correo)> 0){

echo'
        <script>
            alert("Este correo ya esta registrado, intenta con otro correo diferente");
            window.location = "../index.php";
        </script>
    ';
    exit();

}

//verificar que usuario no se repita en bd

$verificar_usuario = mysqli_query($conexion, "SELECT * FROM usuarios where usuario = '$usuario'"); 

if(mysqli_num_rows($verificar_usuario)> 0){
echo"
        <script>
            alert('Este usuario ya esta registrado, intenta con otro usuario diferente');
            window.location = '../index.php';
        </script>
    ";
    exit();

}

// Establecer conexión a la base de datos
$conexion = mysqli_connect("localhost", "root", "", "login_register_db");

// Verificar la conexión
if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}

// Ejecutar la consulta
$resultado = mysqli_query($conexion, $query);

// Verificar si la consulta se ejecutó con éxito
if ($resultado) {
    echo "
    <script>
        alert('Usuario insertado correctamente');
        window.location = '../index.php';
    </script>
        ";

} else {
    echo "Error al insertar el registro: " . mysqli_error($conexion);
}

// Cerrar la conexión
mysqli_close($conexion);

?>