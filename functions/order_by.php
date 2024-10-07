<?php

/**
 * https://www.itsolutionstuff.com/post/php-dynamic-drag-and-drop-table-rows-using-jquery-ajaxexample.html
 *
 * Solo falta hacer la coneccion a la DB correctamente 
 * Cojer como ejemplo la tabla _languages
 * 
 */
//include "admin/conect_db.php";
//$position = $_POST['position'];
//$table = $_POST['table'];

$position = (isset($_POST["position"]) && $_POST["position"] != "" ) ? ($_POST["position"]) : false;
$table = (isset($_POST["table"]) && $_POST["table"] != "" ) ? ($_POST["table"]) : false;

if ($table && $position) {
// se ejecuta
    order_by_change_order($table, $position);
}

function order_by_change_order($table, $doc_id, $position) {
    global $db;

    $i = 1;
    foreach ($position as $k => $v) {
        $req = $db->prepare(" Update `budget_lines` SET `order_by`=  :i WHERE `id` = :v AND budget_id = :budget_id ");
        $req->execute(array(
            ":i" => (int) $i,
            ":v" => (int) $v,
            ":budget_id" => (int) $budget_id,
        ));

        $i++;
    }
}

function order_by_create_javascript_html($controller, $doc_id) {

    $html = '<script type="text/javascript">
            $(".row_position").sortable({
                delay: 0.000,
                stop: function () {
                    var selectedData = new Array();
                    var controller = "' . $controller . '";                    
                    var doc_id = "' . $doc_id . '";                    
                    $(".row_position>tr").each(function () {
                        selectedData.push($(this).attr("id"));
                    });
                    updateOrder(controller, doc_id, selectedData);
                }
            });
            function updateOrder(controller, document_id, data) {
                $.ajax({
                    url: "functions/order_by.php",
                    type: "post",
                    data: {
                        c: controller,
                        doc_id: document_id,
                        position: data
                    },
                    success: function () {
//                alert("your change successfully saved");
                        location.reload(true);
                    }
                })
            }
        </script>';

    echo $html;
}

//
//
//



function order_by_get_order_data($u_id, $table = "expenses", $default_col = "id", $default_way = "desc") {

    # Limpieza y validación de parámetros de ordenación enviados por el usuario (si existen)
    $order_col = clean($_GET["order_col"] ?? $default_col);
    $order_way = clean($_GET["order_way"] ?? $default_way);

    #################################################################################
    # Validar que la columna y la dirección de orden son válidas solo si vienen de la solicitud
    if (!magia_db_col_exist_in_table($order_col, $table)) {
        $order_col = $default_col; // Columna por defecto
    }
    if (!in_array($order_way, ['asc', 'desc'])) {
        $order_way = $default_way; // Orden por defecto
    }

    #################################################################################
    # Obtener las preferencias guardadas del usuario (si existen)
    $user_order_by_json = user_options("{$table}_order_by_table_index");
    $user_order_data = json_decode($user_order_by_json, true);

    # Si no hay preferencias guardadas, usar los valores predeterminados
    if (!$user_order_data) {
        $user_order_data = ['col_name' => $default_col, 'order_way' => $default_way];
    }

    #################################################################################
    # Si el usuario ha enviado un nuevo parámetro, actualizamos sus preferencias
    if (isset($_GET["order_col"]) || isset($_GET["order_way"])) {

        # Si el usuario ha especificado el orden, lo guardamos en las preferencias
        $data = json_encode(["col_name" => $order_col, "order_way" => $order_way]);

        user_options_push_data($u_id, "{$table}_order_by_table_index", $data);

        # Actualizar el array de preferencias del usuario
        $user_order_data = ["col_name" => $order_col, "order_way" => $order_way];
    }

    # Devolver los datos de ordenación
    return $user_order_data;
}

/**
 * Función para renderizar los encabezados de tabla con íconos de ordenamiento,
 * usando las opciones del usuario desde `user_options` o los valores por defecto.
 *
 * @param array $user_cols_array Arreglo con las columnas de la tabla.
 * @param string $default_order_col Columna para la ordenación por defecto (opcional).
 * @param string $default_order_way Dirección de ordenación por defecto (asc o desc, opcional).
 */
function order_by_render_table_headers_with_icons($user_cols_array, $db_table = null, $default_order_col = 'id', $default_order_way = 'desc') {
    global $u_id;

    // Cargar las preferencias de orden desde user_options (JSON)
    $user_order_data_json = user_options("{$db_table}_order_by_table_index");

    // Decodificar el JSON en un array asociativo
    $user_order_data = json_decode($user_order_data_json, true);

    // Si el JSON no es válido o está vacío, usar valores por defecto
    $order_col = $user_order_data['col_name'] ?? $default_order_col;
    $order_way = $user_order_data['order_way'] ?? $default_order_way;

    // Iterar sobre las columnas definidas en $user_cols_array
    foreach ($user_cols_array as $col) {
        if ($col["show"]) {
            // Si la columna empieza con "button" o "modal", mostrar <th></th> vacío
            if (strpos(strtolower($col["label"]), "button") === 0 || strpos(strtolower($col["label"]), "modal") === 0) {
                echo "<th></th>";
            } else {
                // Definir iconos para el orden ascendente y descendente
                $icon_asc = '<span class="glyphicon glyphicon-sort-by-alphabet"></span>';
                $icon_desc = '<span class="glyphicon glyphicon-sort-by-alphabet-alt"></span>';

                // Determinar si esta columna es la que está ordenada
                $order_icon = "";
                if ($col["col_name"] == $order_col) {
                    $order_icon = ($order_way == 'asc') ? $icon_asc : $icon_desc;
                }

                // Generar el próximo orden (alternar entre asc y desc)
                $next_order_way = ($order_way == 'asc') ? 'desc' : 'asc';

                // Crear el link de ordenación con los nuevos parámetros
                $order_link = 'index.php?c=' . $db_table . '&order_col=' . urlencode($col["col_name"]) . '&order_way=' . $next_order_way;

                // Mostrar el encabezado con el nombre de la columna y el icono de orden
                echo '<th><a href="' . $order_link . '">' . _tr(ucfirst($col["label"])) . ' ' . $order_icon . '</a></th>';
            }
        }
    }
}

/**
 * Obtener las columnas para mostrar en la tabla.
 * Si el usuario ha configurado columnas personalizadas, las utiliza.
 * Si no, usa las columnas por defecto de la tabla de la base de datos.
 *
 * @return array Columnas a mostrar en la tabla.
 */
function order_by_get_user_or_default_columns($db_table = null) {

    // Obtener columnas seleccionadas por el usuario
    $user_cols = user_options("{$db_table}_show_col_from_table");

    // Inicializar el array de columnas del usuario
    $user_cols_array = [];

    // Verificar si hay columnas seleccionadas por el usuario y si es un JSON válido
    if ($user_cols && is_json($user_cols)) {

        // Decodificar JSON a un array asociativo
        $user_cols_array = json_decode($user_cols, true);
    } else {

        // Si no hay datos del usuario o no es JSON válido, usar columnas por defecto desde la tabla
        $columns = db_cols_from_table($db_table); // Obtener columnas de la tabla de la base de datos
        //
        // Formatear columnas de la tabla como columnas predeterminadas
        foreach ($columns as $key => $col) {
            $user_cols_array[] = [
                "col_name" => $col["Field"],
                "label" => ucfirst($col["Field"]),
                "show" => true,
                "position" => $key
            ];
        }
    }

    // Ordenar las columnas según la posición definida
    usort($user_cols_array, function ($a, $b) {
        return intval($a["position"]) - intval($b["position"]);
    });

    return $user_cols_array;
}
