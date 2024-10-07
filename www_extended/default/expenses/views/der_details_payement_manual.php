<h3 class="text-center">    
    <?php _t("Manual payment registration"); ?>
</h3>

<br>

<?php
switch ($expense->getStatus()) {
    case 0: // Draf        
        break;

    case 5: // registred        
        //include "form_payement_registre.php";
        break;

    case 10: // to pay
    case 20: // partial payement
        include "form_payement_registre.php";
//        include "der_part_btn_pay_manual.php";
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



