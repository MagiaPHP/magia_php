
<div class="panel panel-<?php echo ($expense->getCe()) ? "default" : "primary"; ?>">
    <div class="panel-heading">
        <h3 class="panel-title">
            <?php _t("Structured communication"); ?>
        </h3>
    </div>
    <div class="panel-body">
        <?php // echo $expense->getCe(); ?>


        <?php
        if (permissions_has_permission($u_rol, 'expenses', 'update') && $a != 'registre_payement') {
            include "form_ce_update.php";
        } else {
            echo $expense->getCe();
        }
        ?>


    </div>
</div>