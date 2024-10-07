
<div class="panel panel-<?php echo ($expense->getComments()) ? "default" : "primary"; ?>">
    <div class="panel-heading">
        <h3 class="panel-title">
            <?php _t("Comments"); ?>
        </h3>
    </div>
    <div class="panel-body">
        <?php //echo $expense->getComments(); ?>


        <?php
        if (permissions_has_permission($u_rol, 'expenses', 'update') && $a != 'registre_payement') {
            include "form_comments_update.php";
        } else {
            echo $expense->getComments();
        }
        ?>


    </div>
</div>