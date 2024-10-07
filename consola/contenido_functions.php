<?php

function contenido_functions($plugin) {


    $contenido = "<?php \n";
    $contenido .= logo();
    $contenido .= al(80);
    $contenido .= "# Documento creado con mago de Magia_PHP \n";
    $contenido .= "# http://magiaphp.com \n";
    $contenido .= "# Fecha de creacion del documento: " . date("Y-m-d H:m:s") . " \n";
//            $contenido .= "# Documento accesible via la siguiente url:  \n";
//            $contenido .= "# http://localhost/index.php?c={$plugin} \n";
    $contenido .= "\n";
    $contenido .= '
// 

//function ' . $plugin . '_can_be_edit($id){
//    return true; 
//}



/**
 * Obtener las columnas para mostrar en la tabla.
 * Si el usuario ha configurado columnas personalizadas, las utiliza.
 * Si no, usa las columnas por defecto de la tabla de la base de datos.
 *
 * @return array Columnas a mostrar en la tabla.
 */
function ' . $plugin . '_get_user_or_default_columns() {

    // Obtener columnas seleccionadas por el usuario
    $user_cols = user_options("' . $plugin . '_show_col_from_table");

    // Inicializar el array de columnas del usuario
    $user_cols_array = [];

    // Verificar si hay columnas seleccionadas por el usuario y si es un JSON válido
    if ($user_cols && is_json($user_cols)) {

        // Decodificar JSON a un array asociativo
        $user_cols_array = json_decode($user_cols, true);
    } else {

        // Si no hay datos del usuario o no es JSON válido, usar columnas por defecto desde la tabla
        $columns = db_cols_from_table("' . $plugin . '"); // Obtener columnas de la tabla de la base de datos
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





// 
function ' . $plugin . '_field_id($field, $id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `' . $plugin . '` WHERE `id`= ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function ' . $plugin . '_field_code($field, $code) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `' . $plugin . '` WHERE `code` = ?");
    $req->execute(array($code));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function ' . $plugin . '_search_by_unique($field, $FieldUnique, $valueUnique) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `' . $plugin . '` WHERE   `$FieldUnique` = ?");
    $req->execute(array($valueUnique));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function ' . $plugin . '_list($start = 0, $limit = 999, $order_col = "order_by", $order_way = "desc") {
    global $db;
    
    $start = (int) $start; 
    $limit = (int) $limit; 

    
    
     // Validar $order_col y $order_way
    $allowed_order_cols = [';
    $i = 0;
    foreach (bdd_columnas_segun_tabla($plugin) as $columna) {
        $coma = ($i < bdd_total_columnas_segun_tabla($plugin) - 1 ) ? "," : "";
        $contenido .= "'" . $columna['Field'] . "'" . $coma . '  ';
        $i++;
    }


    $contenido .= ']; // Lista de columnas permitidas
    $allowed_order_ways = ["asc", "desc"]; // Solo "asc" o "desc"
    
    if (!in_array($order_col, $allowed_order_cols)) {
        $order_col = "order_by"; // Valor por defecto
    }
    
    if (!in_array($order_way, $allowed_order_ways)) {
        $order_way = "desc"; // Valor por defecto
    }
    

    
    $data = null;
    
    $sql = "SELECT ';

    $i = 0;
    foreach (bdd_columnas_segun_tabla($plugin) as $columna) {
        $coma = ($i < bdd_total_columnas_segun_tabla($plugin) - 1 ) ? "," : "";
        $contenido .= '`' . $columna['Field'] . '`' . $coma . '  ';
        $i++;
    }
    $contenido .= ' 
    
    FROM `' . $plugin . '` 
    
    ORDER BY $order_col $order_way 
    
    Limit  $limit OFFSET $start  ";
    
    $query = $db->prepare($sql);                
    
    $query->execute();
    
    $data = $query->fetchall();
    
    return $data;
}

function ' . $plugin . '_details($id) {
    global $db;
    $req = $db->prepare(
    "
    SELECT ';
    $i = 0;
    foreach (bdd_columnas_segun_tabla($plugin) as $columna) {
        $coma = ($i < bdd_total_columnas_segun_tabla($plugin) - 1 ) ? "," : "";
        $contenido .= '`' . $columna['Field'] . '`' . $coma . '  ';
        $i++;
    }
    $contenido .= ' 
    FROM 
        `' . $plugin . '` 
        WHERE 
            `id` = ? 
    ");
    $req->execute(array(
        $id
    ));
    $data = $req->fetch();
    return $data;
}


function ' . $plugin . '_edit(';
    $i = 0;
    foreach (bdd_columnas_segun_tabla($plugin) as $columna) {
        $coma = ($i < bdd_total_columnas_segun_tabla($plugin) - 1 ) ? "," : "";
        $contenido .= '$' . $columna['Field'] . ' ' . $coma . '  ';
        $i++;
    }


    $contenido .= ') {

    global $db;
    $req = $db->prepare(" UPDATE `' . $plugin . '` SET ';
    $i = 0;
    foreach (bdd_columnas_segun_tabla($plugin) as $columna) {
        $coma = ($i < bdd_total_columnas_segun_tabla($plugin) - 1 ) ? "," : "";
        if ($columna['Field'] != "id") {
//            $contenido .= '."' . $columna['Field'] . '=:' . $columna['Field'] . ' ' . $coma . ' "   ' . "\n";
            $contenido .= '`' . $columna['Field'] . '` =:' . $columna['Field'] . '' . $coma . ' ';
        }

        $i++;
    }
    $contenido .= ' WHERE `id`=:id ");
    $req->execute(array(
';
    $i = 0;
    foreach (bdd_columnas_segun_tabla($plugin) as $columna) {
        $coma = ($i < bdd_total_columnas_segun_tabla($plugin) ) ? "," : "";
        $contenido .= ' "' . $columna['Field'] . '" =>$' . $columna['Field'] . ' ' . $coma . '  ' . "\n";
        $i++;
    }

    $contenido .= '
));
}

function ' . $plugin . '_add(';
    $i = 0;
    foreach (bdd_columnas_segun_tabla($plugin) as $columna) {
        if ($columna['Field'] != "id") {
            $coma = ($i < bdd_total_columnas_segun_tabla($plugin) - 1 ) ? "," : "";
            $contenido .= '$' . $columna['Field'] . ' ' . $coma . '  ';
        }
        $i++;
    }


    $contenido .= ') {
    global $db;
    $req = $db->prepare(" INSERT INTO `' . $plugin . '` (';
    $i = 0;
    foreach (bdd_columnas_segun_tabla($plugin) as $columna) {
        $coma = ($i < bdd_total_columnas_segun_tabla($plugin) - 1 ) ? "," : "";
        $contenido .= ' `' . $columna['Field'] . '` ' . $coma . '  ';

        $i++;
    }


    $contenido .= ')
                                       VALUES  (';
    $i = 0;
    foreach (bdd_columnas_segun_tabla($plugin) as $columna) {
        $coma = ($i < bdd_total_columnas_segun_tabla($plugin) - 1 ) ? "," : "";
        $contenido .= ':' . $columna['Field'] . ' ' . $coma . '  ';

        $i++;
    }

    $contenido .= ') ");

    $req->execute(array(

';
    $i = 0;
    foreach (bdd_columnas_segun_tabla($plugin) as $columna) {
        $coma = ($i < bdd_total_columnas_segun_tabla($plugin) - 1 ) ? "," : "";

        if ($columna['Field'] == "id") {
            $contenido .= ' "' . $columna['Field'] . '" => null ' . $coma . '  ' . "\n";
        } else {
            $contenido .= ' "' . $columna['Field'] . '" => $' . $columna['Field'] . ' ' . $coma . '  ' . "\n";
        }

        $i++;
    }

    $contenido .= '                        
            )
    );
    
     return $db->lastInsertId();
}

// SEARCH
function ' . $plugin . '_search($txt, $start = 0, $limit = 999, $order_col = "order_by", $order_way = "desc") {
    global $db;
    



    $start = (int) $start; 
    $limit = (int) $limit; 

    
    
     // Validar $order_col y $order_way
    $allowed_order_cols = [';
    $i = 0;
    foreach (bdd_columnas_segun_tabla($plugin) as $columna) {
        $coma = ($i < bdd_total_columnas_segun_tabla($plugin) - 1 ) ? "," : "";
        $contenido .= "'" . $columna['Field'] . "'" . $coma . '  ';
        $i++;
    }


    $contenido .= ']; // Lista de columnas permitidas
    $allowed_order_ways = ["asc", "desc"]; // Solo "asc" o "desc"
    
    if (!in_array($order_col, $allowed_order_cols)) {
        $order_col = "order_by"; // Valor por defecto
    }
    
    if (!in_array($order_way, $allowed_order_ways)) {
        $order_way = "desc"; // Valor por defecto
    }
    
    
    $data = null;
    
    $sql = "SELECT ';
    $i = 0;
    foreach (bdd_columnas_segun_tabla($plugin) as $columna) {
        $coma = ($i < bdd_total_columnas_segun_tabla($plugin) - 1 ) ? "," : "";
        $contenido .= '`' . $columna['Field'] . '`' . $coma . '  ';
        $i++;
    }
    $contenido .= '  
            FROM 
                `' . $plugin . '` 
            WHERE 
                `id` = :txt ';

    foreach (bdd_columnas_segun_tabla($plugin) as $columna) {
        $contenido .= 'OR `' . $columna['Field'] . '` like :txt' . "\n";
    }
    $contenido .= ' 
        

    ORDER BY $order_col $order_way 
    
    Limit  $limit OFFSET $start
";
    $query = $db->prepare($sql);
    $query->bindValue(\':txt\', "%$txt%", PDO::PARAM_STR);        
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

function ' . $plugin . '_select($k, $values_to_show = array(), $selected = "", $disabled = array()) {
    $c = "";
    foreach (' . $plugin . '_list() as $key => $value) {
        $s = ($selected == $value[$k]) ? " selected  " : "";        
        $d = ( in_array($value[$k], $disabled)) ? " disabled " : "";        
        $val = ""; 
        foreach ($values_to_show as $val_to_show) {
            $val = $val . " " . $value[$val_to_show] ;  
        }              
        $c .= "<option value=\"$value[$k]\" $s $d >" . ucfirst($val) . "</option>";
    }
    echo $c;     
}' . "\n";

    $contenido .= 'function ' . $plugin . '_unique_from_col($col) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $col FROM `' . $plugin . '` GROUP BY $col ");
    $req->execute(array());
    $data = $req->fetchall();
    return (isset($data)) ? $data : false;
}

// SEARCH
function ' . $plugin . '_search_by($field, $txt, $start = 0, $limit = 999, $order_col = "order_by", $order_way = "desc") {
    global $db;
    
    $start = (int) $start; 
    $limit = (int) $limit; 
        
     // Validar $order_col y $order_way
    $allowed_order_cols = [';
    $i = 0;
    foreach (bdd_columnas_segun_tabla($plugin) as $columna) {
        $coma = ($i < bdd_total_columnas_segun_tabla($plugin) - 1 ) ? "," : "";
        $contenido .= "'" . $columna['Field'] . "'" . $coma . '  ';
        $i++;
    }


    $contenido .= ']; // Lista de columnas permitidas
    $allowed_order_ways = ["asc", "desc"]; // Solo "asc" o "desc"
    
    if (!in_array($order_col, $allowed_order_cols)) {
        $order_col = "order_by"; // Valor por defecto
    }
    
    if (!in_array($order_way, $allowed_order_ways)) {
        $order_way = "desc"; // Valor por defecto
    }
    

    $data = null;
    
    $sql = "SELECT ';

    $i = 0;
    foreach (bdd_columnas_segun_tabla($plugin) as $columna) {
        $coma = ($i < bdd_total_columnas_segun_tabla($plugin) - 1 ) ? "," : "";
        $contenido .= '`' . $columna['Field'] . '`' . $coma . '  ';
        $i++;
    }
    $contenido .= '  FROM `' . $plugin . '` 

    WHERE `$field` = \'$txt\' 
    
    ORDER BY $order_col $order_way 
    
    Limit  $limit OFFSET $start
";
    $query = $db->prepare($sql);
//    $query->bindValue(\':field\', "field", PDO::PARAM_STR);
//    $query->bindValue(\':txt\',   "%$txt%", PDO::PARAM_STR);

    $query->execute();
    $data = $query->fetchall();
    return $data;
}

function ' . $plugin . '_db_show_col_from_table($c) {
    global $db;
    $data = null;
    $req = $db->prepare("            
             SHOW COLUMNS FROM `$c`
            ");
    $req->execute(array(
    ));
    $data = $req->fetchAll();
    return $data;
}
//
function ' . $plugin . '_db_col_list_from_table($c){
    $list = array();
    foreach (' . $plugin . '_db_show_col_from_table($c) as $key => $value) {
        array_push($list, $value[\'Field\']);   
    }
    return $list;
}
//
//
';
    $i = 0;
    foreach (bdd_columnas_segun_tabla($plugin) as $columna) {
        $coma = ($i < bdd_total_columnas_segun_tabla($plugin) - 1 ) ? "," : "";
//        $contenido .= '`' . $columna['Field'] . '`' . $coma . '  ';
        $contenido .= 'function ' . $plugin . '_update_' . $columna['Field'] . '($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `' . $plugin . '` SET `' . $columna['Field'] . '`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
';
        $i++;
    }

    $contenido .= '
//
function ' . $plugin . '_update_field($id, $field, $new_data) {
    switch ($field) {';
    $i = 0;
    foreach (bdd_columnas_segun_tabla($plugin) as $columna) {
        $coma = ($i < bdd_total_columnas_segun_tabla($plugin) - 1 ) ? "," : "";
//        $contenido .= '`' . $columna['Field'] . '`' . $coma . '  ';
        $contenido .= '
        case "' . $columna['Field'] . '":
            ' . $plugin . '_update_' . $columna['Field'] . '($id, $new_data);
            break;
';
        $i++;
    }
    $contenido .= '

        default:
            break;
    }
}
//
function ' . $plugin . '_delete($id) {
    global $db;
    $req = $db->prepare("DELETE FROM `' . $plugin . '` WHERE `id` =? ");
    $req->execute(array($id));
}
//
// To modify this function
// Copy tis function in /www_extended/' . $plugin . '/functions.php
// and comment here (this function)
function ' . $plugin . '_add_filter($col_name, $value, $filtre = NULL) {
    
    switch ($col_name) {
';
    foreach (bdd_columnas_segun_tabla($plugin) as $columna) {
        //echo "Field: " . $columna['Field'] . " \n";
        $tipo = campos_tipo($columna['Type']);
        $te = bdd_referencias($plugin, $columna['Field']);
        //echo var_dump($tabla_externa);
        //REFERENCED_TABLE_NAME, 
        //REFERENCED_COLUMN_NAME 
        $bdd_referencias = bdd_referencias($plugin, $columna['Field']);
        $bdd_ref_tabla_externa = (isset($bdd_referencias['REFERENCED_TABLE_NAME'])) ? $bdd_referencias['REFERENCED_TABLE_NAME'] : false;
        $bdd_col_externa = (isset($bdd_referencias['REFERENCED_COLUMN_NAME'])) ? $bdd_referencias['REFERENCED_COLUMN_NAME'] : false;
        //
        //if ($bdd_ref_tabla_externa) {
        $contenido .= '        case "' . $columna['Field'] . '":
            //return ' . $bdd_ref_tabla_externa . '_field_id("' . $bdd_col_externa . '", $value);
            return ($filtre) ?? $value;                
            break;' . " \n";
        //} // if ($bdd_ref_tabla_externa) {
    }
    $contenido .= '       

        default:
            return $value;
            break;
    }
}
//
//
//
';
    //$i = 0;
    foreach (bdd_columnas_segun_tabla($plugin) as $columna) {
        $contenido .= 'function ' . $plugin . '_exists_' . $columna['Field'] . '($' . $columna['Field'] . '){' . "\n";

        $contenido .= '    global $db;
    $data = null;
    $req = $db->prepare("SELECT `' . $columna['Field'] . '` FROM `' . $plugin . '` WHERE   `' . $columna['Field'] . '` = ?");
    $req->execute(array($' . $columna['Field'] . '));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; ';

        $contenido .= '
}' . "\n\n";
    }

    $contenido .= '
//        
//        
//    

';
    //$i = 0;
    foreach (bdd_columnas_segun_tabla($plugin) as $columna) {
        //$coma = ($i < bdd_total_columnas_segun_tabla($plugin) - 1 ) ? "," : "";
        $contenido .= 'function ' . $plugin . '_is_' . $columna['Field'] . '($' . $columna['Field'] . '){' . "\n";

        if ($columna['Field'] == 'id' || $columna['Field'] == 'order_by' || $columna['Field'] == 'status') {
            $contenido .= '     return (is_' . $columna['Field'] . '($' . $columna['Field'] . ') )? true : false ;' . "\n";
        } else {
            $contenido .= '     return true;' . "\n";
        }
        $contenido .= '}' . "\n\n";
    }

    $contenido .= '
//
//
function ' . $plugin . '_db_is_col_from_table($col, $table) {

    $is = false;

    if ($col == "") {
        $is = false;
    }

    if (in_array($col, ' . $plugin . '_db_col_list_from_table($table))) {
        $is = true;
    }

    return $is;
}
//
//
//
function ' . $plugin . '_is_field($field, $value) {
    $is = false;

    switch ($field) {
';
    foreach (bdd_columnas_segun_tabla($plugin) as $columna) {

        $contenido .= '     case "' . $columna['Field'] . '":
            $is = (' . $plugin . '_is_' . $columna['Field'] . '($value)) ? true : false;
            break;' . "\n";
    }
    $contenido .= '
        
        default:
            $is = false;
            break;
    }

    return $is;
}
//

function ' . $plugin . '_index_generate_column_headers($colsToShow) {
    foreach ($colsToShow as $col_to_show) {
        switch ($col_to_show) {
            case \'id\':
                echo \'<th><a href="index.php?c=' . $plugin . '&a=details&id=\'.$col_to_show.\'">\' . $col_to_show . \'</a></th>\';
                break;

';
    foreach (bdd_columnas_segun_tabla($plugin) as $columna) {

        if ($columna['Field'] != 'id') {
            $contenido .= 'case \'' . $columna['Field'] . '\':
                echo \'<th>\' . _tr(ucfirst(\'' . $columna['Field'] . '\')) . \'</th>\';
                break;' . "\n";
        }
    }
    $contenido .= '
            case \'button_details\':
            case \'button_pay\':
            case \'button_edit\':
            case \'modal_edit\':
            case \'button_delete\':
            case \'modal_delete\':
            case \'button_print\':
            case \'button_save\':
                echo \'<th></th>\';
                break;

            default:
                echo \'<th>\' . _tr(ucfirst($col_to_show)) . \'</th>\';
                break;
        }
    }
}

function ' . $plugin . '_index_generate_column_body_td($' . $plugin . ', $colsToShow) {

    foreach ($colsToShow as $key => $col) {

        switch ($col) {
            case \'id\':
                echo \'<td><a href="index.php?c=' . $plugin . '&a=details&id=\' . $' . $plugin . '[$col] . \'">\' . $' . $plugin . '[$col] . \'</a></td>\';
                break;
                


';
    foreach (bdd_columnas_segun_tabla($plugin) as $columna) {

        $contenido .= 'case \'' . $columna['Field'] . '\':
                echo \'<td>\' . ($' . $plugin . '[$col]) . \'</td>\';
                break;' . "\n";
    }

    $contenido .= '            case \'button_details\':
                echo \'<td><a class="btn btn-sm btn-primary" href="index.php?c=' . $plugin . '&a=details&id=\' . $' . $plugin . '[\'id\'] . \'">\' . icon("eye-open") . \' \' . _tr(\'Details\') . \'</a></td>\';
                break;

            case \'button_pay\':
                echo \'<td><a class = "btn btn-sm btn-primary" href = "index.php?c=' . $plugin . '&a=details_payement&id=\' . $' . $plugin . '[\'id\'] . \'">\' . icon("shopping-cart") . \' \' . _tr(\'Pay\') . \'</a></td>\';
                break;


            case \'button_edit\':
                echo \'<td><a class="btn btn-sm btn-danger" href="index.php?c=' . $plugin . '&a=edit&id=\' . $' . $plugin . '[\'id\'] . \'">\' . icon("pencil") . \' \' . _tr(\'Edit\') . \'</a></td>\';
                break;
                

            case \'button_delete\':
                echo \'<td><a class="btn btn-sm btn-danger" href="index.php?c=' . $plugin . '&a=ok_delete&id=\' . $' . $plugin . '[\'id\'] . \'">\' . icon("pencil") . \' \' . _tr(\'Edit\') . \'</a></td>\';
                break;
                

            case \'button_print\':
                echo \'<td><a class = "btn btn-sm btn-default" href = "index.php?c=' . $plugin . '&a=export_pdf&id=\' . $' . $plugin . '[\'id\'] . \'">\' . icon("print") . \'</a></td>\';
                break;

            case \'button_save\':
                echo \'<td><a class = "btn btn-sm btn-default" href = "index.php?c=' . $plugin . '&a=export_pdf&way=pdf&&id=\' . $' . $plugin . '[\'id\'] . \'">\' . icon("floppy-save") . \'</a></td > \';
                break;

    ';

    $contenido .= '
    default:
    echo \'<td>\' . ($' . $plugin . '[$col]) . \'</td>\';
                break;
        }
    }
}




//
//        
';

    $contenido .= '################################################################################' . "\n";
    $contenido .= '################################################################################' . "\n";
    $contenido .= '################################################################################' . "\n";

    return $contenido;
}
