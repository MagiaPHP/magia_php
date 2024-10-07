<?php
// Contenio de config.php
try {


    $config_page = '../admin/config_localhost.php';

    include $config_page;

    $options = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');

    $db = new PDO("mysql:host=$config_server;dbname=$config_db", "$config_login", "$config_pass", $options);
    
} catch (Exception $e) {

    die(" 1) Data base conection error... ");
}


function logo() {
    $logo_ascii = "#   __  __             _         _____  _    _ _____  
#  |  \/  |           (_)       |  __ \| |  | |  __ \ 
#  | \  / | __ _  __ _ _  __ _  | |__) | |__| | |__) |
#  | |\/| |/ _` |/ _` | |/ _` | |  ___/|  __  |  ___/ 
#  | |  | | (_| | (_| | | (_| | | |    | |  | | |     
#  |_|  |_|\__,_|\__, |_|\__,_| |_|    |_|  |_|_|     
#                 __/ |                         
#                |___/             \n";

    $logo_ascii .= "# \n";
    $logo_ascii .= "# \n";
    $logo_ascii .= "# Documento creado con mago de Magia_PHP \n";
    $logo_ascii .= "# http://magiaphp.com \n";
    $logo_ascii .= "# Fecha de creacion del documento: " . date("Y-m-d H:m:s") . " \n";

    return $logo_ascii;
}

// almoadilla
function al($t) {
    $a = '#';
    $b = '';

    for ($i = 0; $i <= $t; $i++) {
        $b = $a . $b;
    }
    
    $b = $b . "\n"; 

    return $b;
}

function redi($plugin) {
    $r = '
switch ($redi["redi"]) {
        case 1:
            header("Location: index.php?c=' . $plugin . '");
            break;
            
        case 2:
            header("Location: index.php?c=' . $plugin . '&a=details&id=$id");
            break;
            
        case 3:
            header("Location: index.php?c=' . $plugin . '&a=edit&id=$id");
            break;
            
        case 4:
            header("Location: index.php?c=' . $plugin . '&a=details&id=$lastInsertId");
            break;
            

        case 5: // custom
            // ejemplo index.php?c=' . $plugin . '&a=ok_edit&redi[redi]=5&redi[c]=contacts&redi[a]=details&redi[params]=id%3D1022
            header("Location: index.php?c=" . $redi[\'c\'] . "&a=" . $redi[\'a\'] . "&" . $redi[\'params\'] . "#5");
            break;

        default:
            header("Location: index.php?");
            break;
    }   ';

    return $r;
}


