<?php

function cpanel3_subdomain_list() {
    global $cpanel3;
    $user = $cpanel3['user'];
    $token = $cpanel3['token'];
    $url = "https://" . $cpanel3['domain'];

    $query = "https://127.0.0.1:2087/json-api/listaccts?api.version=1";
    $query = "https://146.59.235.13:2087/json-api/listaccts?api.version=1";
    $query = "https://146.59.235.13:2083/json-api/listaccts?api.version=1";

//    $query = "https://146.59.235.13:2087/json-api/accountsummary?api.version=1";
//    $query = "https://146.59.235.13:2087/json-api/list_database_users?api.version=1";
//    $query = "https://127.0.0.1:2087/json-api/list_databases?api.version=1";

    $query = $url . ':2083/execute/DomainInfo/domains_data';

    $curl = curl_init();
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $header[0] = "Authorization: cpanel $user:$token";
//    vardump($header);
    curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
    curl_setopt($curl, CURLOPT_URL, $query);
    $result = curl_exec($curl);
    $http_status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
    if ($http_status != 200) {
        echo "[!] Error: " . $http_status . " returned\n";
    } else {
        $json = json_decode($result);
        $array = json_decode($result, true);
        $resp = array();
        //
        ($sub_domains = $array['data']['sub_domains']);
        //
        //
        foreach ($sub_domains as $key => $value) {
            array_push($resp, $value['domain']);
        }
    }

    curl_close($curl);
    return $json;
}

function cpanel3_subdomain_search() {
    global $cpanel3;
    $user = $cpanel3['user'];
    $token = $cpanel3['token'];
    $url = "https://" . $cpanel3['domain'];
}

function cpanel3_subdomain_create($subdomain, $rootdomain, $dir = "/public_html/_wildcard_") {
    global $cpanel3;
    $user = $cpanel3['user'];
    $token = $cpanel3['token'];
    $url = "https://" . $cpanel3['domain'];

    //
    $query = $url . ":2083/execute/SubDomain/addsubdomain?domain=$subdomain&rootdomain=$rootdomain&dir=$dir";
    //
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $header[0] = "Authorization: cpanel $user:$token";
    curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
    curl_setopt($curl, CURLOPT_URL, $query);
    $result = curl_exec($curl);
    $http_status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
    if ($http_status != 200) {
        echo "[!] Error: " . $http_status . " returned\n";
    } else {
        $json = json_decode($result);
        $resp = array();
        foreach ($json->{'data'} as $details) {
            array_push($resp, $details->{'database'});
        }
    }
    curl_close($curl);
    return $resp;
}

function cpanel3_db_list() {
    global $cpanel3;
    $user = $cpanel3['user'];
    $token = $cpanel3['token'];
    $url = "https://" . $cpanel3['domain'];
    //
    $query = $url . ':2083/execute/SubDomain/addsubdomain';
    //
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $header[0] = "Authorization: cpanel $user:$token";
    curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
    curl_setopt($curl, CURLOPT_URL, $query);
    $result = curl_exec($curl);
    $http_status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
    if ($http_status != 200) {
        echo "[!] Error: " . $http_status . " returned\n";
    } else {
        $json = json_decode($result);
        $resp = array();
        foreach ($json->{'data'} as $details) {
            array_push($resp, $details->{'database'});
        }
    }
    curl_close($curl);
    return $resp;
}

function cpanel3_db_search() {
    global $cpanel3;
    $user = $cpanel3['user'];
    $token = $cpanel3['token'];
    $url = "https://" . $cpanel3['domain'];
}

function cpanel3_db_create($db) {
    global $cpanel3;
    $user = $cpanel3['user'];
    $token = $cpanel3['token'];
    $url = "https://" . $cpanel3['domain'];
    //
    $query = $url . ":2083/execute/Mysql/create_database?name=$db";
    //
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $header[0] = "Authorization: cpanel $user:$token";
    curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
    curl_setopt($curl, CURLOPT_URL, $query);
    $result = curl_exec($curl);
    $http_status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
    if ($http_status != 200) {
        echo "[!] Error: " . $http_status . " returned\n";
    } else {
        $json = json_decode($result);
//        vardump($json);
//        $resp = array();
//        foreach ($json->{'data'} as $details) {
//            array_push($resp, $details->{'user'});
//        }
    }
    curl_close($curl);
    return $json;
}

//
// https://api.docs.cpanel.net/openapi/cpanel/operation/restore_databases/
//
// 
function cpanel3_db_fill($hostname, $db_user, $db_pass, $db_name, $company) {
    global $cpanel3;
    // esto esta en connect_db_2.php
    $sql_file_path = $cpanel3['sql_file_path'];
    // LLenamos la db
    (db_fill($sql_file_path, $hostname, $db_user, $db_pass, $db_name, false));
}

function cpanel3_db_fill_company_data($hostname, $db_user, $db_pass, $db_name, $tva) {
    global $cpanel3;
    // esto esta en connect_db_2.php
    $sql_file_path_update = $cpanel3['sql_file_path_update'];
    // LLenamos la db
    (db_update($sql_file_path_update, $hostname, $db_user, $db_pass, $db_name, $tva));
}

//
function restoreMysqlDB($cp3_db, $cp3_db_user, $passwordRandom, $filePath) {

    define("BACKUP_PATH", "$filePath");

    $cmd = "mysqldump --routines -h {$server_name} -u {$username} -p{$password} {$database_name} > " . BACKUP_PATH . "{$date_string}_{$database_name}.sql";

    exec($cmd);
}

function cpanel3_db_users_list() {
    global $cpanel3;
    $user = $cpanel3['user'];
    $token = $cpanel3['token'];
    $url = "https://" . $cpanel3['domain'];
    //
    $query = $url . ':2083/execute/Mysql/list_users';
    //
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $header[0] = "Authorization: cpanel $user:$token";
    curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
    curl_setopt($curl, CURLOPT_URL, $query);
    $result = curl_exec($curl);
    $http_status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
    $resp = array();
    if ($http_status != 200) {
        echo "[!] Error: " . $http_status . " returned\n";
    } else {
        $json = json_decode($result);
        $resp = array();
        foreach ($json->{'data'} as $details) {
            array_push($resp, $details->{'user'});
        }
    }
    curl_close($curl);
    return $resp;
}

function cpanel3_db_users_search() {
    global $cpanel3;
    $user = $cpanel3['user'];
    $token = $cpanel3['token'];
    $url = "https://" . $cpanel3['domain'];
}

function cpanel3_db_users_create($db_user, $db_pass) {
    global $cpanel3;
    $user = $cpanel3['user'];
    $token = $cpanel3['token'];
    $url = "https://" . $cpanel3['domain'];
    //
    $query = $url . ":2083/execute/Mysql/create_user?name=$db_user&password=$db_pass";
    //
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $header[0] = "Authorization: cpanel $user:$token";
    curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
    curl_setopt($curl, CURLOPT_URL, $query);
    $result = curl_exec($curl);
    $http_status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
    if ($http_status != 200) {
        echo "[!] Error: " . $http_status . " returned\n";
    } else {
        $json = json_decode($result);
    }
    curl_close($curl);
    return $json;
}

function cpanel3_db_add_user_to_db($cp3_user, $cp3_db) {
    global $cpanel3;
    $user = $cpanel3['user'];
    $token = $cpanel3['token'];
    $url = "https://" . $cpanel3['domain'];
    //
    $query = $url . ":2083/execute/Mysql/set_privileges_on_database?user=$cp3_user&database=$cp3_db&privileges=ALL%20PRIVILEGES";
    //
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $header[0] = "Authorization: cpanel $user:$token";
    curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
    curl_setopt($curl, CURLOPT_URL, $query);
    $result = curl_exec($curl);
    $http_status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
    if ($http_status != 200) {
        echo "[!] Error: " . $http_status . " returned\n";
    } else {
        $json = json_decode($result);
//        $resp = array();
//        foreach ($json->{'data'} as $details) {
//            array_push($resp, $details->{'user'});
//        }
    }
    curl_close($curl);
    return $json;
}

////////////////////////////////////////////////////////////////////////////////
function cpanel3_sub_domain_exist($sd) {
    global $cpanel3;
    $user = $cpanel3['user'];
    $token = $cpanel3['token'];
    $url = "https://" . $cpanel3['domain'];
    //
    $query = $url . ":2083/execute/DomainInfo/list_domains";
    //
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $header[0] = "Authorization: cpanel $user:$token";
    curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
    curl_setopt($curl, CURLOPT_URL, $query);
    $result = curl_exec($curl);
    $http_status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
    if ($http_status != 200) {
        echo "[!] Error: " . $http_status . " returned\n";
    } else {
        $res = json_decode($result, true)['data']['sub_domains'];
        $resp = array();
        foreach ($res as $subdomain) {
            array_push($resp, $subdomain);
        }
    }
// 
    if (in_array($sd, $resp)) {
        $r = true;
    } else {
        $r = false;
    }
    curl_close($curl);
    //  bepato.factux.eu
    //  bepato.factux.eu
    return $r;
}

/**
 * Verifica si una DB existe
 * @global type $cpanel3
 * @param type $db_name
 * @return bool
 */
function cpanel3_db_exist($db_name) {
    global $cpanel3;
    $user = $cpanel3['user'];
    $token = $cpanel3['token'];
    $url = "https://" . $cpanel3['domain'];

    //
    $query = $url . ":2083/execute/Mysql/list_databases";
    //
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $header[0] = "Authorization: cpanel $user:$token";
    curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
    curl_setopt($curl, CURLOPT_URL, $query);
    $result = curl_exec($curl);
    $http_status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
    if ($http_status != 200) {
        echo "[!] Error: " . $http_status . " returned\n";
    } else {
        $res = json_decode($result, true)['data'];
        $resp = array();
        foreach ($res as $db) {
            array_push($resp, $db['database']);
        }
    }
// 
    if (in_array($db_name, $resp)) {
        $r = true;
    } else {
        $r = false;
    }
    curl_close($curl);
    return $r;
}

function cpanel3_db_already_has_data($db_name) {
    global $cpanel3;
    $user = $cpanel3['user'];
    $token = $cpanel3['token'];
    $url = "https://" . $cpanel3['domain'];

    //
    $query = $url . ":2083/execute/Mysql/dump_database_schema?dbname=$db_name";
    //
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $header[0] = "Authorization: cpanel $user:$token";
    curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
    curl_setopt($curl, CURLOPT_URL, $query);
    $result = curl_exec($curl);
    $http_status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
    if ($http_status != 200) {
        echo "[!] Error: " . $http_status . " returned\n";
    } else {
        $res = json_decode($result, true)['data'];
//        $resp = array();
//        foreach ($res as $db) {
//            array_push($resp, $db['database']);
//        }
    }
// 
//    if (in_array($db_name, $resp)) {
//        $r = true;
//    } else {
//        $r = false;
//    }
    curl_close($curl);
//$db_name
    return $res;
}

function cpanel3_db_user_exist($db_user) {
    global $cpanel3;
    $user = $cpanel3['user'];
    $token = $cpanel3['token'];
    $url = "https://" . $cpanel3['domain'];

    //
    $query = $url . ":2083/execute/Mysql/list_users";
    //
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $header[0] = "Authorization: cpanel $user:$token";
    curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
    curl_setopt($curl, CURLOPT_URL, $query);
    $result = curl_exec($curl);
    $http_status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
    if ($http_status != 200) {
        echo "[!] Error: " . $http_status . " returned\n";
    } else {
        $res = json_decode($result, true)['data'];
        $resp = array();
        foreach ($res as $user) {
            array_push($resp, $user['user']);
        }
    }
// 
    if (in_array($db_user, $resp)) {
        $r = true;
    } else {
        $r = false;
    }
    curl_close($curl);
//$db_name
    return $r;
}

function cpanel3_emails_exist($email) {
    global $cpanel3;
    $user = $cpanel3['user'];
    $token = $cpanel3['token'];
    $url = "https://" . $cpanel3['domain'];
    return 0;
}

function cpanel3_exe() {
    global $cpanel3;
    $user = $cpanel3['user'];
    $token = $cpanel3['token'];
    $url = "https://" . $cpanel3['domain'];

    return exec($r);
}

function cpanel3_db_excute_line($cp3_db, $cp3_user, $cp3_pass, $line = null) {


    $config_server = "localhost";

    try {
        $options = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
        $db = new PDO("mysql:host=$config_server;dbname=$cp3_db", "$cp3_user", "$cp3_pass", $options);
    } catch (Exception $e) {
        return $e;
    }

    // ejecuta cadalinea del la DB para llenar 
    // $line = 'CREATE TABLE `aaa` (`aaa` INT(11) NULL DEFAULT NULL ) ENGINE = InnoDB';
    $data = null;
    $req = $db->prepare("$line");
    $req->execute(array());
}

function cpanel3_file_create($config_file, $content) {
    global $cpanel3;
    $user = $cpanel3['user'];
    $token = $cpanel3['token'];
    $url = "https://" . $cpanel3['domain'];

    $path = "/home/$user/public_html/_wildcard_/admin/";
    //
    $query = $url . ":2083/execute/Fileman/save_file_content?file=$config_file&dir=$path&content=$content&fallback=0";
    //              :2083/execute/Fileman/save_file_content?file=example.html
    // "path": "/home/user/public_html/example.html",
//    "path": "/home/user/public_html/example.html",

    $curl = curl_init();
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $header[0] = "Authorization: cpanel $user:$token";
    curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
    curl_setopt($curl, CURLOPT_URL, $query);

    $result = curl_exec($curl);
    $http_status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
    if ($http_status != 200) {
        echo "[!] Error: " . $http_status . " returned\n";
    } else {
        $res = json_decode($result, true);
        array_push($res, $config_file);
//        $resp = array();
//        foreach ($res as $user) {
//            array_push($resp, $user['user']);
//        }
    }
    curl_close($curl);
//$db_name
    return $res;
}

//CREATE TABLE `factuxbe_dreng885854585`.`aaa` (`aaa` INT(11) NULL DEFAULT NULL ) ENGINE = InnoDB; 
// Busca el email 
// crea el email 
function cpanel3_email_search($email) {
    return 0;
}

function cpanel3_email_create($email, $password) {

    global $cpanel3;
    $user = $cpanel3['user'];
    $token = $cpanel3['token'];
    $url = "https://" . $cpanel3['domain'];
    //
    $query = $url . ":2083/execute/Email/add_pop?email=$email&password=$password";
    //
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $header[0] = "Authorization: cpanel $user:$token";
    curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
    curl_setopt($curl, CURLOPT_URL, $query);
    $result = curl_exec($curl);
    $http_status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
    if ($http_status != 200) {
        echo "[!] Error: " . $http_status . " returned\n";
    } else {
        $json = json_decode($result);
//        vardump($json);
//        $resp = array();
//        foreach ($json->{'data'} as $details) {
//            array_push($resp, $details->{'user'});
//        }
    }
    curl_close($curl);
    return $json;
}

function cpanel3_email_exist($email) {
    global $cpanel3;
    $user = $cpanel3['user'];
    $token = $cpanel3['token'];
    $url = "https://" . $cpanel3['domain'];

    //
    $query = $url . ":2083/execute/Email/list_pops";
    //
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $header[0] = "Authorization: cpanel $user:$token";
    curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
    curl_setopt($curl, CURLOPT_URL, $query);
    $result = curl_exec($curl);
    $http_status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
    if ($http_status != 200) {
        echo "[!] Error: " . $http_status . " returned\n";
    } else {
        $res = json_decode($result, true)['data'];
        $resp = array();
        foreach ($res as $db) {
            array_push($resp, $db['email']);
        }
    }
// 
    if (in_array($email, $resp)) {
        $r = true;
    } else {
        $r = false;
    }
    curl_close($curl);
    return $r;
}
