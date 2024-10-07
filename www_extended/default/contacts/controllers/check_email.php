<?php
include '../../../admin/conect_db.php';

global $db;

// Verificar si se recibió la solicitud con el email
if (isset($_POST['email'])) {
    // Obtener el email desde la solicitud POST
    $email = $_POST['email'];

    // Encabezado para asegurar que la respuesta sea JSON
    header('Content-Type: application/json');

    // Nueva consulta SQL para buscar en la tabla 'directory'
    // donde el campo 'name' sea 'Email' y el 'data' coincida con el email proporcionado
    $sql = "SELECT data FROM directory WHERE name = 'Email' AND data = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email); // Vincular el email al parámetro de la consulta
    $stmt->execute();
    $result = $stmt->get_result();

    // Verificar si el correo existe
    if ($result->num_rows > 0) {
        // Si ya existe el correo en la columna 'data'
        echo json_encode(['status' => 'exists']);
    } else {
        // Si no existe
        echo json_encode(['status' => 'not exists']);
    }

    // Cerrar la consulta y conexión
    $stmt->close();
    $conn->close();
} else {
    // Si no se proporciona un email en la solicitud
    header('Content-Type: application/json');
    echo json_encode(['status' => 'error', 'message' => 'Email not provided']);
}
