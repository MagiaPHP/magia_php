<?php include "modal_date_expiration_update.php"; ?>

<div class="panel panel-default">
    <div class="panel-heading">
        <?php
        if (modules_field_module('status', "docu")) {
            echo docu_modal_bloc($c, $a, 'part_date_expiration_update');
        }
        ?>
        <?php _t("Expiration date"); ?></div>
    <div class="panel-body">
        <p>
            <?php echo $invoices['date_expiration']; ?>
            <a href="#" data-toggle="modal" data-target="#dateExpiration">
                <?php echo icon('pencil'); ?>
            </a>
        </p>
        <?php //include view('invoices', 'form_date_expiration_update'); ?>      
    </div>
</div>



