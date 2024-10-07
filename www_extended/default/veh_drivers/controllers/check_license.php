<?php


include '../../../../admin/conect_db.php';

global $db;

//// Conexión a la base de datos
//function connect_to_db() {
//    try {
//        $db = new PDO('mysql:host=localhost;dbname=factuxorg_demo', 'root', 'root');
//        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//        return $db;
//    } catch (PDOException $e) {
//        echo 'Error en la conexión: ' . $e->getMessage();
//    }
//}

// Función para buscar si la combinación de país y número ya existe
function veh_drivers_search_by_country_number($country, $number) {
    global $db ; //= connect_to_db();

    $sql = "SELECT COUNT(*) as count FROM veh_drivers WHERE country = :country AND number = :number";
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':country', $country);
    $stmt->bindValue(':number', $number);
    $stmt->execute();

    return $stmt->fetch(PDO::FETCH_ASSOC);
}

// Si la solicitud es AJAX para la verificación
if (isset($_POST['ajax']) && $_POST['ajax'] === 'check_license') {
    $country = $_POST['country'];
    $number = $_POST['number'];

    // Verificar en la base de datos
    $result = veh_drivers_search_by_country_number($country, $number);

    if ($result['count'] > 0) {
        // Ya existe la combinación de país y número
        echo json_encode(['status' => 'exists']);
    } else {
        // No existe la combinación
        echo json_encode(['status' => 'available']);
    }
    exit; // Terminar el script aquí ya que es una solicitud AJAX
}
