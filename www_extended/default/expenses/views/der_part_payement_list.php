<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">
            <?php
            if (modules_field_module('status', "docu")) {
                echo docu_modal_bloc($c, $a, 'payements', array('c' => $c, 'a' => $a, 'id' => $id));
            }
            ?>
            <a name="Payments"></a>
            <?php _t("Payment history"); ?>
        </h3>
    </div>
    <div class="panel-body">
        <?php
        if (balance_list_by_expense($expense->getId())) {
            include "payments_list.php";
        } else {
            message('info', 'There are no payments recorded');
        }
        ?>



    </div>
</div>

