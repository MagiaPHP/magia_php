

<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">
            <?php
            if (modules_field_module('status', "docu")) {
                echo docu_modal_bloc($c, $a, 'rejected');
            }
            ?>

            <?php _t("Change the status to"); ?> : 
            <?php _t(budget_status_by_status(30)); ?>
        </h3>
    </div>
    <div class="panel-body">

        <p> <?php _t("Register this budget as accepted by the customer"); ?></p>

        <?php
        include "modal_budget_accepted_by_customer.php";
        ?>


    </div>
</div>
