<?php

function import_contacts_from_csv() {
    $linea = 0;
//Abrimos nuestro archivo
    $archivo = fopen("tmp/contacts.csv", "r");
//Lo recorremos
    while (($d = fgetcsv($archivo, ",")) == true) {
        $num = count($d);
        $linea++;
        import_contacts_add_line(
//                $d[0], // #, 
                $d[1], // $id, 
                $d[2], // $owner_id, 
                $d[3], // $type, 
                $d[4], // $title, 
                $d[5], // $name, 
                $d[6], // $lastname, 
                $d[4], // $birthdate, 
                $d[8], // $tva, 
                $d[9], // $billing_method, 
                $d[10], // $discounts, 
                $d[11], // $code, 
                $d[12], // $language, 
                $d[13], // $order_by, 
                $d[14], // $status
        );

        vardump($d);

//Recorremos las columnas de esa linea
        for ($col = 0;
                $col < $num;
                $col++) {
// echo "<p>" . $d[$col] . "</p>";
//    import_contacts_add_line($owner_id, $type, $title, $name, $lastname, $birthdate, $tva, $billing_method, $discounts, $code, $language, $order_by, $status);
//    import_contacts_add_line($owner_id, $type, $title, $name, $lastname, $birthdate, $tva, $billing_method, $discounts, $code, $language, $order_by, $status);
//
//
//
        }
    }
//Cerramos el archivo
    fclose($archivo);
}

/**
  function import_contacts_from_csv22() {

  $lines = array();

  foreach ($lines as $key => $line) {
  // agrego el contacto
  $lastInsertId = import_contacts_from_csv($owner_id, $type, $title, $name, $lastname, $birthdate, $tva, $billing_method, $discounts, $code, $language, $order_by, $status);

  foreach (directory_names_list_names() as $key => $dir_name) {
  directory_add($lastInsertId, null, $dir_name, $line[$dir_name], uniqid(), 1, 1);
  }
  }
  }
 */
function import_contacts_add_line(
        $id,
        $owner_id,
        $type,
        $title,
        $name,
        $lastname,
        $birthdate,
        $tva,
        $billing_method,
        $discounts,
        $code,
        $language,
        $order_by,
        $status) {
    global $db;
    $req = $db->prepare(
            "INSERT INTO `contacts` VALUES
            (
            :id, 
            :owner_id, 
            :type, 
            :title, 
            :name, 
            :lastname, 
            :birthdate, 
            :tva,
            :billing_method,
            :discounts,
            :code, 
            :language, 
            :order_by, 
            :status )
");

    $req->execute(array(
        "id" => null,
        "owner_id" => $owner_id,
        "type" => $type,
        "title" => $title,
        "name" => $name,
        "lastname" => $lastname,
        "birthdate" => $birthdate,
        "tva" => $tva,
        "billing_method" => $billing_method,
        "discounts" => $discounts,
        "code" => $code,
        "language" => $language,
        "order_by" => $order_by,
        "status" => $status
            )
    );

    return $db->lastInsertId();
}

function import_check_field($field, $val) {
    switch ($field) {
        case 'id':
            import_check_field_id($val);
            break;

        default:
            break;
    }
}

function import_check_field_id($id) {


// a cada linea agrego el id para verificar mas tarde
    array_push($ids_array, $id);

    if (contacts_field_id('id', $id) && $id) {
        $class_id = ' class="danger" ';
        array_push($error_fatal, '<b>Line ' . $i . '</b> Id number already exist in your data base');
    }

    if (array_count_values($ids_array)[$id] > 1) {
        $class_id = ' class="danger" ';
        array_push($error_fatal, '<b>Line ' . $i . '</b> The id already exists in your document');
    }

    if (!is_id($id) && $id) {
        $class_id = ' class="danger" ';
        array_push($error_fatal, '<b>Line ' . $i . '</b> Id number format error');
    }
}

function import_contacts_col_check_format($col_name, $val) {
    $res = false;

    if ($col_name == '' || $col_name == 'null' || $col_name == null || $col_name == 'false' || $col_name == false) {
        $res = false;
    }
    if ($val == '' || $val == 'null' || $val == null || $val == 'false' || $val == false) {
        $res = false;
    }

    switch ($col_name) {
        case 'id':
            $res = is_id($val);
            break;
        default:
            $res = false;
            break;
    }
    return $res;
}

function import_contacts_check_id($col_name, $value) {
    $res = array();
    if (contacts_field_id('id', $id) && $id) {
        $class['id'] = ' class="danger" ';
        array_push($res, '<b>Line ' . $i . '</b> Id number already exist in your data base');
    }

    if (array_count_values($ids_array)[$id] > 1) {
        $class['id'] = ' class="danger" ';
        array_push($res, '<b>Line ' . $i . '</b> The id already exists in your document');
    }

    if (!is_id($id) && $id) {
        $class['id'] = ' class="danger" ';
        array_push($res, '<b>Line ' . $i . '</b> Id number format error');
    }

    return $res;
}
