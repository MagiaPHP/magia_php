<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#dateEdit">
    <span class="glyphicon glyphicon-new-window"></span>
    <?php _t("Change date"); ?>
</button>

<div class="modal fade" id="dateEdit" tabindex="-1" role="dialog" aria-labelledby="dateEditLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button 
                    type="button" 
                    class="close" 
                    data-dismiss="modal" 
                    aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="dateEditLabel">
                    <?php _t("Edit"); ?>
                </h4>
            </div>
            <div class="modal-body">
                
                <p>
                    <?php _t("The document date"); ?>
                </p>

                <?php include "form_date_update.php"; ?>   
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><?php _t("Close"); ?></button>
            </div>
        </div>
    </div>
</div>

<div class="panel panel-default">
    <div class="panel-heading">
        <?php
        if (modules_field_module('status', "docu")) {
            echo docu_modal_bloc($c, $a, 'part_details_dates');
        }
        ?>


        <?php _t("Date"); ?></div>
    <div class="panel-body">

        <?php echo $cn->getDate(); ?>
        <?php //include view('budgets', 'form_date_update'); ?> 
    </div>
</div>

