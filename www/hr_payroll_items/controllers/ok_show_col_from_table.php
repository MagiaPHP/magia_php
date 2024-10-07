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
# Fecha de creacion del documento: 2024-09-21 12:09:52 
#################################################################################



if (!permissions_has_permission($u_rol, $c, "update")) {

    # si no tiene permiso lo redireccionamos 
    header("Location: index.php?c=home&a=no_access");

    # y matamos el proceso 
    die("Error has permission ");
}

$data = (isset($_POST)) ? json_encode($_POST) : false;
$redi = (isset($_POST["redi"])) ? clean($_POST["redi"]) : false;
$error = array();

#################################################################################

#################################################################################

#################################################################################
    
if (!$error) {

    if (isset($_POST["selected_columns"])) {

        // Obtener el array de columnas seleccionadas y ordenadas
        $selectedColumns = json_decode($_POST["selected_columns"], true);

        if ($selectedColumns && is_array($selectedColumns)) {
            // Aquí puedes guardar el array en la base de datos o en la sesión del usuario

            user_options_push_data($u_id, "hr_payroll_items_show_col_from_table", json_encode($selectedColumns));
            //
            //
        } else {
            echo "No se enviaron datos válidos.";
        }
    }

    //
    //
    //
        switch ($redi["redi"]) {
        case 1:
            header("Location: index.php?c=hr_payroll_items");
            break;

        case 2:
            header("Location: index.php?c=hr_payroll_items&a=details&id=$id");
            break;

        case 3:
            header("Location: index.php?c=hr_payroll_items&a=edit&id=$id");
            break;

        case 4:
            header("Location: index.php?c=hr_payroll_items&a=details&id=$lastInsertId");
            break;

        case 5: // custom
            // ejemplo index.php?c=yellow_pages&a=ok_edit&redi[redi]=5&redi[c]=contacts&redi[a]=details&redi[params]=id%3D1022
            header("Location: index.php?c=" . $redi['c'] . "&a=" . $redi['a'] . "&" . $redi['params'] . "#5");
            break;

        default:
            header("Location: index.php?");
            break;
    }
    //
    //
    //





switch ($redi["redi"]) {
        case 1:
            header("Location: index.php?c=hr_payroll_items");
            break;
            
        case 2:
            header("Location: index.php?c=hr_payroll_items&a=details&id=$id");
            break;
            
        case 3:
            header("Location: index.php?c=hr_payroll_items&a=edit&id=$id");
            break;
            
        case 4:
            header("Location: index.php?c=hr_payroll_items&a=details&id=$lastInsertId");
            break;
            

        case 5: // custom
            // ejemplo index.php?c=hr_payroll_items&a=ok_edit&redi[redi]=5&redi[c]=contacts&redi[a]=details&redi[params]=id%3D1022
            header("Location: index.php?c=" . $redi['c'] . "&a=" . $redi['a'] . "&" . $redi['params'] . "#5");
            break;

        default:
            header("Location: index.php?");
            break;
    }       
    

} else {

    include view("home", "pageError");
}

