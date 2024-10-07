<div class="panel panel-default">
    <div class="panel-heading">

        <?php
        if (modules_field_module('status', "docu")) {
            echo docu_modal_bloc($c, $a, 'create_invoice');
        }
        ?>

        <?php _t("Create invoice"); ?></div>
    <div class="panel-body">


        <?php
        include 'modal_invoice_create_chosse_partia_or_one.php';
        ?> 


    </div>
</div>


