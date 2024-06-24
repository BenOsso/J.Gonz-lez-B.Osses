<?php

include 'conexion_be.php';

session_start();


function cuantasTarjetas($conesion,$iduser){
$validar_login = mysqli_query($conesion,"SELECT count(*) FROM tarjetas WHERE idusuarioposeedor = $iduser");
if (mysqli_num_rows($validar_login) > 0 ){
    if ($validar_login->num_rows == 1) {
        // Obtener la fila como un array asociativo
        $row = $validar_login->fetch_assoc();
        return $row['count(*)'];
    }
}else{
    return 0;
}
}



$usuario = $_POST['usel'];
$contra = $_POST['Password'];

$validar_login = mysqli_query($conexion,"
SELECT idusuario,usuario,contrasena,saldo FROM usuarios WHERE usuario = '$usuario' AND contrasena = '$contra'");

if (mysqli_num_rows($validar_login) > 0 ){
    
    

    

    if ($validar_login->num_rows == 1) {
        // Obtener la fila como un array asociativo
        $row = $validar_login->fetch_assoc();

        $_SESSION['idusuario'] = $row['idusuario'];
        $_SESSION['usuario'] = $usuario;
        $_SESSION['saldo'] = $row['saldo'];
        $_SESSION['cantarjetas'] = cuantasTarjetas($conexion,$row['idusuario']);

        echo "<script>alert('Sesión iniciada con exito! Bienvenido $usuario');
          </script>";

        header("location: ../indexUser.php");
        exit;

    }
}else{
    echo "<script>alert('Usuario o contraseña incorrectos.');
                  window.location = '../InicioSesion.php';
          </script>";
    exit;
}



?>