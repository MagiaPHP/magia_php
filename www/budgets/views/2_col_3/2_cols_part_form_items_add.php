<?php
if (modules_field_module('status', 'services')) {

//    include "2_cols_services.php";
}
?>

<div class="well well-sm">
    <?php include "2_cols_form_items_add.php"; ?>
</div>




<?php if (permissions_has_permission($u_rol, 'config', 'update')) { ?>
    <?php
    if (modules_field_module('status', "docu")) {
        echo docu_modal_bloc($c, $a, 'form_price_value_default');
    }
    ?>

    <button type="button" class="btn btn-xs" data-toggle="modal" data-target="#price_value_default">    
        <?php echo _options_option("config_expenses_price_value_default"); ?>
        <?php _t("Default price"); ?>
    </button>
    <div class="modal fade" id="price_value_default" tabindex="-1" role="dialog" aria-labelledby="price_value_defaultLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="price_value_defaultLabel">
                        <?php _t('Add a default price'); ?>
                    </h4>
                </div>
                <div class="modal-body">
                    <p><?php _t('Add a default price to the form here'); ?></p>
                    <?php include view('expenses', 'form_price_value_default', $arg = array("redi" => 3, "id" => "$id")) ?>
                </div>
            </div>
        </div>
    </div>

    <button type="button" class="btn btn-xs" data-toggle="modal" data-target="#vat_value_default">    

        <?php echo _options_option("config_expenses_vat_value_default"); ?>%
        <?php _t("Default vat"); ?>
    </button>
    <div class="modal fade" id="vat_value_default" tabindex="-1" role="dialog" aria-labelledby="vat_value_defaultLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="vat_value_defaultLabel">
                        <?php _t('Add a default vat'); ?>
                    </h4>
                </div>
                <div class="modal-body">
                    <p><?php _t('Add a default price to the form here'); ?></p>
                    <?php include view('expenses', 'form_vat_value_default', $arg = array("redi" => 3, "id" => "$id")) ?>
                </div>
            </div>
        </div>
    </div>
<?php } ?>



