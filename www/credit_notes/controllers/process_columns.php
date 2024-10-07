<?php






//// Definir la función para construir la consulta SQL dinámica
//function buildDynamicSelectQuery($tableName, $columns) {
//    if (empty($columns)) {
//        return "SELECT * FROM $tableName"; // Si no hay columnas seleccionadas, seleccionar todas
//    }
//
//    $columnList = implode(", ", $columns);
//    return "SELECT $columnList FROM $tableName";
//}
// Verificar si los datos han sido enviados
if (isset($_POST['selected_columns'])) {

    // Obtener el array de columnas seleccionadas y ordenadas
    $selectedColumns = json_decode($_POST['selected_columns'], true);

    // Aquí puedes guardar el array en la base de datos o en la sesión del usuario
    // Usar la función para guardar las opciones
    user_options_push_data($u_id, 'credit_notes_show_col_from_table', json_encode($selectedColumns));

    // Para este ejemplo, simplemente lo mostramos en pantalla
    echo "Columnas seleccionadas y ordenadas:<br>";
    print_r($selectedColumns);

    // Generar una consulta SQL dinámica para seleccionar solo las columnas especificadas
    if (!empty($selectedColumns)) {
        $tableName = 'credit_notes'; // Define el nombre de tu tabla
        // Usar la función para construir la consulta SQL
        $sql = buildDynamicSelectQuery($tableName, $selectedColumns);

        echo "<br>Consulta SQL generada: " . htmlspecialchars($sql);
    } else {
        echo "No se seleccionaron columnas.";
    }
} else {
    echo "No se enviaron datos.";
}
