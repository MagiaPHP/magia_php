
<h3 class="text-center">
    <?php _menu_icon("top", 'bank lines'); ?>
    <?php _t("Bank lines"); ?>
</h3>


<?php
//vardump($expense->getStatus());

switch ($expense->getStatus()) {
    case 0: // Draf        
//        include "der_part_status.php";
        break;

    case 5: // registred
//        include "part_banks_lines.php";
        break;

    case 10: // to pay
        include "part_banks_lines.php";
//        include "der_payement_bank_lines.php";
        break;

    case 20: // partial payement
        include "part_banks_lines.php";
//        include "der_payement_bank_lines.php";
        break;

    case 30: // full payement
        break;

    case -10: // cancel
        include "der_part_status.php";
        break;

    case -20: // cancel AND recupereds
        break;

    default:
        break;
}
?>


