
<?php

################################################################################
################################################################################
################################################################################
################################################################################
################################################################################
if (permissions_has_permission($u_rol, "invoices", "update")) {

//    vardump($invoices['status']);

    switch ($invoices['status']) {
        case 0: // Draf        
            //    include "der_part_reminders.php";
            //    include "der_part_payement_list.php";
            include "part_banks_lines.php";
//            include "der_part_registre_payement.php";
//            include "der_part_cancel.php";
            // include "der_part_send_to_client.php";
            //    include "der_part_export.php";
            break;

        case 10: // Registre
        case 20: // Cobro parcial
//            include "der_part_reminders.php";
            include "part_banks_lines.php";
//            include "der_part_payement_list.php";
//            include "der_part_registre_payement.php";
//            include "der_part_cancel.php";
            // include "der_part_send_to_client.php";
            //    include "der_part_export.php";
            break;

        case 30: // Cobro total
//            include "der_banks_lines.php";
//            include "der_part_payement_list.php";            
//            include "der_part_registre_payement.php";
//            include "der_part_cancel.php";
            // include "der_part_send_to_client.php";
            //    include "der_part_export.php";
            break;

        case -10: // Cancel
//            include "der_part_payement_list.php";
            include "part_banks_lines.php";

            // include "der_part_send_to_client.php";
            //   include "der_part_export.php";
            break;

        case -20: // Cancel and credit note created
//            include "der_part_payement_list.php";
//            include "der_banks_lines.php";
            include "part_banks_lines.php";

            // include "der_part_send_to_client.php";
            //      include "der_part_export.php";
            break;

        default:
            break;
    }
}
// debe haber una opcion en la base de datos
// INSERT INTO `_options` (`id`, `option`, `data`, `group`) VALUES (NULL, 'config_mail', '1', '20')
?>


