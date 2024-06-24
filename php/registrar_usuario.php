<?php

include 'conexion_be.php';

function calcularEdad($fecha) {
    $hoy = new DateTime();
    $cumpleanos = new DateTime($fecha);
    $edad = $hoy->format('Y') - $cumpleanos->format('Y');
    $m = $hoy->format('m') - $cumpleanos->format('m');

    if ($m < 0 || ($m === 0 && $hoy->format('d') < $cumpleanos->format('d'))) {
        $edad--;
    }

    return $edad;
}

$edaduser = $_POST['Fecha'];


if (calcularEdad($edaduser)>=18){

    $jugo = "";



    $primernom = $_POST['PNom'];
    $segunom = $_POST['SNom'];
    $apaterno = $_POST['App'];
    $amaterno = $_POST['Apm'];
    $correo = $_POST['Corr'];
    $usuarionom = $_POST['Usname'];
    $contla = $_POST['Password'];

    if (strlen($primernom)<=0 || strlen($primernom)>40){
        $jugo.="\nPrimer nombre invalido.\n";
    }

    if (strlen($apaterno)<=0 || strlen($apaterno)>40){
        $jugo.="\nApellido paterno invalido.\n";
    }
    if (strlen($correo)<=0 || strlen($correo)>50){
        $jugo.="\nCorreo electronico invalido.\n";
    }
    if (strlen($usuarionom)<=0 || strlen($usuarionom)>30){
        $jugo.="\nNombre de usuario invalido.\n";
    }
    if (strlen($contla)<=0 || strlen($contla)>30){
        $jugo.="\nContraseña demasiado larga.\n";
    }

    if ($jugo!=""){
        echo "<script>alert($jugo);
                  window.location = '../Registro.php';
          </script>";
    }else{


    
    $query = "INSERT INTO usuarios VALUES (null,'$primernom','$segunom','$apaterno','$amaterno',DATE('$edaduser'),'$correo','$usuarionom','$contla',1000)";
    
    $execute = mysqli_query($conexion,$query);
    
    if ($execute==true){
        echo "<script>alert('Usuario registrado con exito!');
                  window.location = '../index.php';
         </script>";
    }else if ($execute==false){
        echo "<script>alert('Error al registrar usuario!');
                  window.location = '../index.php';
         </script>";
    }

    }

mysqli_close($conexion);
}else{

    echo "<script>alert('No se puede registrar siendo menor de edad!!!');
                  window.location = '../Registro.php';
          </script>";
}



?>