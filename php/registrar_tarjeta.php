<?php

include 'conexion_be.php';

session_start();
$jugo = "";



$titular = $_POST['titular'];
$numeros = $_POST['Numerols'];
$ccv = $_POST['ccv'];
$fechavenc = $_POST['fectha'];
$iduser = $_SESSION['idusuario'];

if (strlen($titular)<=0 || strlen($titular)>100){
    $jugo.="\nPrimer nombre invalido.\n";
}


if ($jugo!=""){
    echo "<script>alert($jugo);
              window.location = '../AgregarTarjeta.php';
      </script>";
}else{

$query = "INSERT INTO tarjetas (idusuarioposeedor,titular,numerostarjeta,ccv,fechavenc) VALUES ($iduser,$titular,$numeros,$ccv,$fechavenc)";

$execute = mysqli_query($conexion,$query);

if ($execute==true){
    echo "<script>alert('Tarjeta guardada con exito!');
              window.location = '../indexUser.php';
     </script>";
}else if ($execute==false){
    echo "<script>alert('Error al guardar la tarjeta...');
              window.location = '../indexUser.php';
     </script>";
}
}

mysqli_close($conexion);




?>