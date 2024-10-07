

<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">
            <?php _t("Expense"); ?>
        </h3>
    </div>
    <div class="panel-body">
        <table class="table table-striped">
            <tr>
                <td><?php echo _t("Status"); ?></td>
                <td><?php echo $expense->getStatus(); ?></td>
            </tr>

            <tr>
                <td><?php echo _t("My reference"); ?></td>
                <td><?php echo $expense->getId(); ?></td>
            </tr>

            <tr>
                <td><?php echo _t("Client reference"); ?></td>
                <td><?php echo $expense->getId(); ?></td>
            </tr>

            <tr>
                <td><?php echo _t("Title"); ?></td>
                <td><?php echo $expense->getTitle(); ?></td>
            </tr>
        </table>
    </div>
</div>




<?php
###############################################################################
# PAY L I S T 
###############################################################################

switch ($expense->getStatus()) {
    case 5:// 5 10 20 30 -10 -20 
        include "part_der_details_references.php";
        include "part_der_details_payements_list.php";
        include "part_payement_registre.php";
        include "part_der_details_next_payements.php";
        include "part_der_details_actions.php";
        break;
    case 10:// 5 10 20 30 -10 -20 
        include "part_der_details_references.php";
        include "part_der_details_payements_list.php";
        include "part_payement_registre.php";
        include "part_der_details_next_payements.php";
        include "part_der_details_actions.php";
        break;
    case 20:// 5 10 20 30 -10 -20 
        include "part_der_details_references.php";
        include "part_der_details_payements_list.php";
        include "part_payement_registre.php";
        include "part_der_details_next_payements.php";
        include "part_der_details_actions.php";
        break;
    case 30:// 5 10 20 30 -10 -20 
        include "part_der_details_references.php";
        include "part_der_details_payements_list.php";
        include "part_payement_registre.php";
        include "part_der_details_next_payements.php";
        include "part_der_details_actions.php";
        break;

    default:
        break;
}
?>

