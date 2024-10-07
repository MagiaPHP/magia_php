<h3 class="text-center">    
    <?php _t("Manual payment registration"); ?>
</h3>

<br>

<?php
vardump($hr_employee_money_advance->getStatus());

switch ($hr_employee_money_advance->getStatus()) {
    case 0: // to pay
        include "part_form_payement_registre.php";
        break;

    case 1: // payed
        include "part_form_payement_registre.php";
        include "der_part_status.php";
        break;

    default:
        break;
}
?>



