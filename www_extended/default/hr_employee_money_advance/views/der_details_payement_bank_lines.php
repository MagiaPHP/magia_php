
<h3 class="text-center">
    <?php _menu_icon("top", 'bank lines'); ?>
    <?php _t("Bank lines"); ?>
</h3>


<?php
vardump($hr_employee_money_advance->getStatus());

switch ($hr_employee_money_advance->getStatus()) {
    case 0: // to pay        
        include "part_banks_lines.php";
        include "der_part_status.php";
        break;

    case 1: // payed
        include "part_banks_lines.php";
        include "der_part_status.php";
        break;

    default:
        break;
}
?>


