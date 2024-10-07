<?php

//
// To modify this function
// Copy tis function in /www_extended/subdomains/functions.php
// and comment here (this function)
function subdomains_add_filter($col_name, $value) {
    switch ($col_name) {
        // recive el numero de tva 
        case "create_by":
            $contact = contacts_details_by_tva($value);
            $link = '<a href="index.php?c=contacts&a=details&id=' . $contact['id'] . '">' . $contact['name'] . '</a>';
            return $link;
            break;

        default:
            return $value;
            break;
    }
}

function subdomains_push_plan($create_by, $plan, $prefix, $subdomain, $domain, $code, $date_registre, $order_by, $status) {
    // si existe lo actualizamos
    // si, lo agregamos 


    $id_sd = subdomains_search_by_unique('id', 'subdomain', $subdomain);

    if ($id_sd) {
        subdomains_update_plan($id_sd, $plan);
    } else {
        subdomains_add($create_by, $plan, $prefix, $subdomain, $domain, $code, $date_registre, $order_by, $status);
    }
}

///////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////
//function subdomains_db_create($db_name) {
//
//    global $db;
//    $req = $db->prepare("CREATE DATABASE $db_name   ");
//    $req->execute(array(
//            // "db_name"=>$db_name
//    ));
//    $data = $req->fetch();
//    return ($data) ? true : false;
//
//    echo "crea $db_name ";
//}
//
//function subdomains_db_delete($db_name) {
//    return true;
//}
//
//function subdomains_db_exists($db_name) {
//    global $db;
//    $req = $db->prepare("SHOW DATABASES LIKE ?");
//    $req->execute(array($db_name));
//    $data = $req->fetch();
//    return ($data) ? true : false;
//}
//
////---
//function subdomains_db_user_create($db_user, $db_name, $db_password) {
//
//    //CREATE USER 'aa_robin'@'%' IDENTIFIED VIA mysql_native_password USING '***';GRANT ALL PRIVILEGES ON *.* TO 'aa_robin'@'%' REQUIRE NONE WITH GRANT OPTION MAX_QUERIES_PER_HOUR 0 MAX_CONNECTIONS_PER_HOUR 0 MAX_UPDATES_PER_HOUR 0 MAX_USER_CONNECTIONS 0; 
//    //CREATE USER 'aabb'@'%' IDENTIFIED VIA mysql_native_password USING '***';GRANT ALL PRIVILEGES ON *.* TO 'aabb'@'%' REQUIRE NONE WITH GRANT OPTION MAX_QUERIES_PER_HOUR 0 MAX_CONNECTIONS_PER_HOUR 0 MAX_UPDATES_PER_HOUR 0 MAX_USER_CONNECTIONS 0; 
//    global $db;
//    $req = $db->prepare(
//            "CREATE USER `:db_user`@'%'
//    IDENTIFIED VIA mysql_native_password
//    USING :db_password;
//    GRANT ALL PRIVILEGES ON *.*
//    TO `:db_name`@'%'
//    REQUIRE NONE WITH GRANT OPTION MAX_QUERIES_PER_HOUR 0 MAX_CONNECTIONS_PER_HOUR 0 MAX_UPDATES_PER_HOUR 0 MAX_USER_CONNECTIONS 0;
//    ");
//    $req->execute(array(
//        "db_name" => $db_name,
//        "db_user" => $db_user,
//        "db_password" => $db_password,
//    ));
//    $data = $req->fetch();
//    return ($data) ? true : false;
//    return true;
//}
//
//function subdomains_db_user_delete($db_user) {
//    return true;
//}
//
//function subdomains_db_user_exists($db_user) {
//    global $db;
//    $req = $db->prepare("SELECT user FROM mysql.user LIKE ?");
//    $req->execute(array('root'));
//    $data = $req->fetch();
//    return ($data) ? true : false;
//}
//
//function subdomains_db_user_password_update($db_user, $password) {
//    return true;
//}
//
////---
//function subdomains_db_add_user2db($db_name, $db_user) {
//    return true;
//}
//
////
//function subdomains_db_delete_user2db($db_name, $db_user) {
//    return true;
//}
//
//// llena la base de datos 
//
//function subdomains_db_fill() {
//
//    global $db;
//
//    $data = null;
//
//    $sql = "CREATE TABLE MyGuests (
//  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
//  firstname VARCHAR(30) NOT NULL,
//  lastname VARCHAR(30) NOT NULL,
//  email VARCHAR(50),
//  reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
//  )";
//
//    $req = $db->prepare($sql);
//    $req->execute(array(
//            // "db_name" => $db_name
//    ));
//
//    $data = $req->fetchall();
//
//    echo "$sql";
//
//    //return $data;
//}
//
//// vacia la db
//function subdomains_db_empty($db_name) {
//    return true;
//}
//
////
//function subdomains_config_add_case($subdomain, $domain) {
//    return true;
//}
//
////Busca la linea robin.factux.be en 
////    case 'robin.factux.be':
////    case 'http://robin.factux.be':
////    case 'https://robin.factux.be':
////        include "config_robin.factux.be";
////        break;
//function subdomains_config_file_search_line($line) {
//    return 1;
//}
//
////
//function subdomains_config_create_config_file($subdomain, $domain, $db_server, $db_name, $db_user, $db_pass, $create_by) {
//
//    // 54 caracterex maximo
//    $subdomain = strtolower($subdomain);
//    $domain = strtolower($domain);
//    $db_server = strtolower($db_server);
//    $db_name = strtolower($db_name);
//    $db_user = strtolower($db_user);
//    $db_pass = strtolower($db_pass);
//
//    $txt = "<?php" . "\n";
//    $txt .= '// Crado para empresa:  ' . $subdomain . '' . "\n";
//    $txt .= '// Creado por:  ' . $create_by . '' . "\n";
//    $txt .= '// Fecha: ' . date('Y-m-d') . ' YYYY mm dd' . "\n";
//    $txt .= '// Hora:  ' . date("G:i") . '' . "\n";
//    $txt .= '// ' . "\n";
//    $txt .= '$config_db_type = "MySQL";' . "\n";
//    $txt .= '$debug = 0;' . "\n";
//    $txt .= '//' . "\n";
//    $txt .= '$config_server = "' . $db_server . '";' . "\n";
//    $txt .= '$config_db = "' . $db_name . '"; ' . "\n";
//    $txt .= '$config_login = "' . $db_user . '";' . "\n";
//    $txt .= '$config_pass = \'' . $db_pass . '\';' . "\n";
//    $txt .= '//' . "\n";
//    $txt .= '$config_theme = "default"; ' . "\n";
//    $txt .= '// ' . "\n";
//    $txt .= '$config_public_theme = "default"; ' . "\n";
//    $txt .= '//' . "\n";
//    $txt .= '$config_secure_bank[\'bank\'] = "SECURE";' . "\n";
//    $txt .= '$config_secure_bank[\'account_number\'] = "SECURE xx";' . "\n";
//    $txt .= '$config_secure_bank[\'bic\'] = "SECURE CAES34"; ' . "\n";
//    $txt .= '$config_secure_bank[\'iban\'] = "SECURE CAES34-n"; ' . "\n";
//    $txt .= '$config_secure_bank[\'code\'] = "SECURE FDedSe5e4sS"; ' . "\n";
//    $txt .= '$config_secure_bank[\'invoices\'] = true; ' . "\n";
//    $txt .= '$config_secure_bank[\'status\'] = true; ' . "\n";
//    $txt .= '// ' . "\n";
//    $txt .= '//BANCO DOS ' . "\n";
//    $txt .= '$config_secure_bank2[\'account_number2\'] = false; ' . "\n";
//    $txt .= '$config_secure_bank2[\'bic2\'] = false; ' . "\n";
//    $txt .= '$config_secure_bank2[\'iban2\'] = false; ' . "\n";
//    $txt .= '$config_secure_bank2[\'code2\'] = false; ' . "\n";
//    $txt .= '$config_secure_bank2[\'invoices2\'] = true; ' . "\n";
//    $txt .= '$config_secure_bank2[\'status2\'] = true;' . "\n";
//    $txt .= ' ' . "\n";
//    $txt .= '$config_app[\'url\'] = "https://' . $subdomain . '.' . $domain . '/index.php?c=app";' . "\n";
//
//    // crea un archivo con el contenido
//    $file_name = 'admin/config_' . $subdomain . '.' . $domain . '.php';
//    /// crear el archivo 
//    $file = fopen($file_name, "w");
//
//    if ($file == false) {
//        return "Error al crear el archivo en w";
//    } else {
//        fwrite($file, "$txt");
//    }
//    fclose($file);
//    // crear el archivo     
//    if (file_exists($file_name)) {
//        return "Config file already exist";
//    } else {
//        return false;
//    }
//}
//
//function subdomains_file_new($file, $content) {
//    $fh = fopen($file, 'w') or die("Se produjo un error al crear el archivo");
//    fwrite($fh, $content) or die("No se pudo escribir en el archivo $file \n");
//    fclose($fh);
//    echo "El archivo '$file' Se ha escrito sin problemas  \n";
//}
//
//function subdomains_restoreMysqlDB($filePath, $conn) {
//
//    $conn = mysqli_connect("localhost", "root", "root", "test");
//
//    $sql = '';
//    $error = '';
//
//    if (file_exists($filePath)) {
//        $lines = file($filePath);
//
//        foreach ($lines as $line) {
//
//            // Ignoring comments from the SQL script
//            if (substr($line, 0, 2) == '--' || $line == '') {
//                continue;
//            }
//
//            $sql .= $line;
//
//            if (substr(trim($line), - 1, 1) == ';') {
//
//                $result = mysqli_query($conn, $sql);
//
//                if (!$result) {
//                    $error .= mysqli_error($conn) . "\n";
//                }
//                $sql = '';
//            }
//        } // end foreach
//
//        if ($error) {
//            $response = array(
//                "type" => "error",
//                "message" => $error
//            );
//        } else {
//            $response = array(
//                "type" => "success",
//                "message" => "Database Restore Completed Successfully."
//            );
//        }
//    } // end if file exists
//    return $response;
//}
//
//function subdomains_details_by_code($code) {
//    global $db;
//    $req = $db->prepare("SELECT * FROM subdomains WHERE code= ? ");
//    $req->execute(array($code));
//    $data = $req->fetch();
//    return $data;
//}
//
//function subdomains_rol_for_new_account() {
//    global $db;
//    $req = $db->prepare("SELECT data FROM _options WHERE option= ? ");
//    $req->execute(array(
//        "subdomains_rol_for_new_account"
//    ));
//
//    $rol = $req->fetch();
//
//    return (isset($rol[0])) ? $rol[0] : false;
//}
//
//// regresa el owner_id
//function subdomains_search_subdomain($subdomain) {
//    global $db;
//    $data = null;
//    $req = $db->prepare("SELECT * FROM subdomains WHERE subdomain = ?");
//    $req->execute(array($subdomain));
//    $data = $req->fetch();
//    //return $data[0];
//    return (isset($data)) ? $data : false;
//}
//
//function subdomains_create_account($subdomain, $domain, $cp3_db, $cp3_user, $pass, $cp_client_id) {
//    //
////    $subdomain = "$tva_client.factux.eu";
////    $cp3_db = "factuxeu_".$tva_client;
////    $cp3_user = "factuxeu_u".$tva_client;
////    $pass = "St)D3eT6y-dVKuVa-J)E,)~";
//    // crea subdominio 
//    // crea base de datos 
//    // crea usuario en la db
//    // agrega usuario a la db 
//    // llena la db 
//
//    vardump(
//            array(
//                '$subdomain' => $subdomain,
//                '$domain' => $domain,
//                '$cp3_db' => $cp3_db,
//                '$cp3_user' => $cp3_user,
//                '$pass' => $pass,
//                '$cp_client_id' => $cp_client_id,
//            )
//    );
//
//    $company = new Company();
//    $company->setCompany($cp_client_id);
////
////    vardump(cpanel3_subdomain_create($subdomain, $domain));
////    //
////    vardump(cpanel3_db_create($cp3_db));
////    // 
////    vardump(cpanel3_db_users_create($cp3_user, $pass));
////    //
////    vardump(cpanel3_db_add_user_to_db($cp3_user, $cp3_db));
////    // server, user, pass, db
////    vardump(cpanel3_db_fill($cp3_user, $pass, $cp3_db, $company));
////    //
//}
