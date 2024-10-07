
<?php

################################################################################
################################################################################
################################################################################
################################################################################
################################################################################
if (permissions_has_permission($u_rol, "expenses", "update")) {

    vardump($expense->getStatus());

    switch ($expense->getStatus()) {
        case 0: // Draf        

            break;

        case 5: // Registre
        case 10: // To pay
        case 20: // Partial parcial
        case 30: // Full payement            
//            include "der_banks_lines.php";
//            include "der_part_payement_list.php";
//            include "der_part_registre_payement.php";
//            include "der_part_cancel.php";
            break;

        case -10: // Cancel
//            include "der_part_payement_list.php";
//            include "der_banks_lines.php";
            break;

        case -20: // Cancel and recupered
//            include "der_part_payement_list.php";
//            include "der_banks_lines.php";
            break;

        default:
            break;
    }
}
?>


