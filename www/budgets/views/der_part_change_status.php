<div class="panel panel-default">
    <div class="panel-heading">

        <?php
        if (modules_field_module('status', "docu")) {
            echo docu_modal_bloc($c, $a, 'change_status');
        }
        ?>

        <?php _t("Change status"); ?></div>
    <div class="panel-body">


        <?php include "modal_change_status.php"; ?>


    </div>
</div>