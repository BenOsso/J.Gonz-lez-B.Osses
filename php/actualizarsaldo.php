<?php


header('Content-Type: application/json');

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if session variables are set
    if (!isset($_SESSION['usuario']) || !isset($_SESSION['saldo'])) {
        echo json_encode(['success' => false, 'message' => 'Usuario no autenticado']);
        exit;
    }

    // Retrieve session variables and POST data
    $usuario = $_SESSION['usuario'];
    $saldouser = $_SESSION['saldo'];
    $cantidad_fichas = $_POST['cantidad_fichas'];
    $ganaopierde = $_POST['gana_pierde'];

    // Update balance based on the game outcome
    if ($ganaopierde == 0) {
        $saldouser += $cantidad_fichas;
    } else if ($ganaopierde == 1) {
        $saldouser -= $cantidad_fichas;
    }

    // Establish database connection
    $conexion = new mysqli("localhost","root","","casino");

    // Check connection
    if ($conexion->connect_error) {
        echo json_encode(['success' => false, 'message' => 'Error de conexión a la base de datos']);
        exit;
    }

    // Prepare and execute the update query
    $query = "UPDATE usuarios SET saldo = ? WHERE usuario = ?";
    $stmt = $conexion->prepare($query);
    $stmt->bind_param('is', $saldouser, $usuario);

    if ($stmt->execute()) {
        
        $_SESSION['saldo'] = $saldouser;
        $mensaje = "Fichas actualizadas para el usuario $usuario";
        //echo json_encode(['success' => true, 'message' => $mensaje]);
    } else {
        //echo json_encode(['success' => false, 'message' => 'Error al actualizar el saldo']);
    }

   
    $stmt->close();
    $conexion->close();
} else {
    
    header('HTTP/1.0 405 Method Not Allowed');
    //echo json_encode(['success' => false, 'message' => 'Método no permitido']);
}


?>