
<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#dateUpdate">
    <span class="glyphicon glyphicon-edit"></span>  
    <?php _t('Change'); ?>
</button>

<div class="modal fade" id="dateUpdate" tabindex="-1" role="dialog" aria-labelledby="dateUpdateLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="dateUpdateLabel">
                    <?php _t("Update"); ?>
                </h4>
            </div>
            <div class="modal-body">

                <h3><?php _t("Update date"); ?></h3>

                <?php include view("invoices", "form_date_update"); ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>