<?php
if (modules_field_module("status", "docu")) {
    //echo docu_modal_bloc($c, $a, _menus_get_file_name(__FILE__));
    echo docu_modal_bloc($c, $a, 'table_payments_list');
}
?>

<table class="table table-striped" id="table_payments_list">

    <thead>

        <tr>
            <th><?php echo _tr("Account number"); ?>

                <?php
                if (modules_field_module("status", "docu")) {
                    //echo docu_modal_bloc($c, $a, _menus_get_file_name(__FILE__));
                    echo docu_modal_bloc($c, $a, 'table_payments_list_account_number');
                }
                ?>

            </th>

            <th><?php echo _tr("Operation number"); ?>
                <?php
                if (modules_field_module("status", "docu")) {
                    //echo docu_modal_bloc($c, $a, _menus_get_file_name(__FILE__));
                    echo docu_modal_bloc($c, $a, 'table_payments_list_operation_number');
                }
                ?>
            </th>

            <th class="text-right"><?php echo _tr("Total"); ?></th>
            <th class="text-center"><?php echo _tr("Canceled code"); ?>

                <?php
                if (modules_field_module("status", "docu")) {
                    //echo docu_modal_bloc($c, $a, _menus_get_file_name(__FILE__));
                    echo docu_modal_bloc($c, $a, 'table_payments_list_canceled_code');
                }
                ?>


            </th>
            
            <th><?php echo _tr("Action"); ?></th>
        </tr>

    </thead>


    <?php
    $total = null;

    foreach (banks_transactions_list_by_document_document_id("hr_payroll", $hr_payroll->getId()) as $key => $banks_transactions_list_item) {

        $btl = new Banks_transactions();

        $btl->setBanks_transactions($banks_transactions_list_item['id']);

        $total = $total + $btl->getTotal();

        $canceled_code = ($btl->getCanceled_code()) ? $btl->getCanceled_code() : '';

        echo '
    <tr>
        <td>' . ($btl->getAccount_number()) . '</td>      
            
          
        <td class="text-right">' . ($btl->getOperation_number()) . '</td>      
        <td class="text-right">' . monedaf($btl->getTotal()) . '</td>        
        <td  class="text-center">' . $canceled_code . '</td>    
            
        <td>';
        // si no tiene codigo de cancelado se puede poner el boton  de borrar 
        if (!$canceled_code) {
            include "modal_payment_cancel.php";
        }
        echo '</td>  
            
    </tr>
    ';
    }
    ?>
    <tr>
        <td></td>
        <td  class="text-right" ><?php _t("Total"); ?></td>
        <td class="text-right">
            <b>
                <?php echo monedaf(banks_transactions_get_total_by_document_document_id('hr_payroll', $hr_payroll->getId())); ?>
            </b>

            <?php
            if (modules_field_module("status", "docu")) {
                //echo docu_modal_bloc($c, $a, _menus_get_file_name(__FILE__));
                echo docu_modal_bloc($c, $a, 'table_payments_list_sum_total');
            }
            ?>


        </td>
        <td></td>
        <td></td>
    </tr>
</table>

<?php
// vardump(banks_transactions_get_total_by_document_document_id('hr_payroll', $hr_payroll->getId())); 
?>
