<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModalForm_express_no_express">
    <?php _t("Click for datails"); ?>
</button>

<div class="modal fade" id="myModalForm_express_no_express" tabindex="-1" role="dialog" aria-labelledby="myModalForm_express_no_expressLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalForm_express_no_expressLabel">
                    <?php _t("Make your order express"); ?>
                </h4>
            </div>
            <div class="modal-body">
                <p><?php _t("If you make express your order, an additional charge will be applied to your invoice"); ?></p>
                <?php include "tabForm_express_update.php"; ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><?php _t("Close"); ?></button>

            </div>
        </div>
    </div>
</div>