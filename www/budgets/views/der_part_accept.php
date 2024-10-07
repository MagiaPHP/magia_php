
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">
            <?php
            if (modules_field_module('status', "docu")) {
                echo docu_modal_bloc($c, $a, 'create_invoice');
            }
            ?>
            <?php _t("Create an invoice"); ?></h3>
    </div>
    <div class="panel-body">

        <p><?php _t("Create an invoice from this budget"); ?></p>

        <?php
        include "modal_budget_acepted.php";
        ?>

    </div>
</div>