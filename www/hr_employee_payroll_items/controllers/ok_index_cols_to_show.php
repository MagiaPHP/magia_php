<?php 
#   __  __             _         _____  _    _ _____  
#  |  \/  |           (_)       |  __ \| |  | |  __ \ 
#  | \  / | __ _  __ _ _  __ _  | |__) | |__| | |__) |
#  | |\/| |/ _` |/ _` | |/ _` | |  ___/|  __  |  ___/ 
#  | |  | | (_| | (_| | | (_| | | |    | |  | | |     
#  |_|  |_|\__,_|\__, |_|\__,_| |_|    |_|  |_|_|     
#                 __/ |                         
#                |___/             
# 
# 
# Documento creado con mago de Magia_PHP 
# http://magiaphp.com 
# Fecha de creacion del documento: 2024-09-21 12:09:34 
#################################################################################


# 1) Verificamos si el `$u_rol` en `$c` tiene permiso para `update` 
if (!permissions_has_permission($u_rol, $c, "update")) {

    # si no tiene permiso lo redireccionamos 
    header("Location: index.php?c=home&a=no_access");
    
    # y matamos el proceso 
    die("Error has permission ");
}

$data = (isset($_REQUEST["data"])) ? clean($_REQUEST["data"]) : false;
$redi = (isset($_REQUEST["redi"])) ? ($_REQUEST["redi"]) : false;


$error = array();

if ($data == "") {
    array_push($error, "Data is mandatory");
}

#################################################################################

#################################################################################

#################################################################################

if (!$error) {
    
    _options_push("hr_employee_payroll_items_index_cols_to_show", json_encode($data), "hr_employee_payroll_items");





switch ($redi["redi"]) {
        case 1:
            header("Location: index.php?c=hr_employee_payroll_items");
            break;
            
        case 2:
            header("Location: index.php?c=hr_employee_payroll_items&a=details&id=$id");
            break;
            
        case 3:
            header("Location: index.php?c=hr_employee_payroll_items&a=edit&id=$id");
            break;
            
        case 4:
            header("Location: index.php?c=hr_employee_payroll_items&a=details&id=$lastInsertId");
            break;
            

        case 5: // custom
            // ejemplo index.php?c=hr_employee_payroll_items&a=ok_edit&redi[redi]=5&redi[c]=contacts&redi[a]=details&redi[params]=id%3D1022
            header("Location: index.php?c=" . $redi['c'] . "&a=" . $redi['a'] . "&" . $redi['params'] . "#5");
            break;

        default:
            header("Location: index.php?");
            break;
    }     
    



} else {

    include view("home", "pageError");
}







