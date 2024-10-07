


<?php include view("invoices", "modal_date_update"); ?>

<div class="panel panel-default">
    <div class="panel-heading">
        <?php
        if (modules_field_module('status', "docu")) {
            echo docu_modal_bloc($c, $a, 'part_details_dates');
        }
        ?>

        <?php _t("Invoice date"); ?></div>

    <div class="panel-body">
        <?php echo $invoices['date']; ?>
        <?php //include view('invoices', 'form_date_update'); ?>      
    </div>
</div>





