

<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">
            <?php
            if (modules_field_module('status', "docu")) {
                echo docu_modal_bloc($c, $a, 'rejected');
            }
            ?>
            <?php _t(budget_status_by_status(40)); ?>
        </h3>
    </div>
    <div class="panel-body">

        <p> <?php _t("Register this budget as rejected by the customer"); ?></p>

        <?php
        include "modal_budget_rejected.php";
        ?>


    </div>
</div>
