<div class="form-group">        
    <input type="text"   
           class="form-control" 
           placeholder="123-456" 
           value="<?php echo orders_field_id("client_ref", $order['id']); ?>" 
           disabled="">
</div>


<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalOrderUpdateClientRef">
    <?php _t("Edit"); ?>
</button>


<div class="modal fade" id="modalOrderUpdateClientRef" tabindex="-1" role="dialog" aria-labelledby="modalOrderUpdateClientRefLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="modalOrderUpdateClientRefLabel">
                    <?php _t("Update my reference"); ?>
                </h4>
            </div>
            <div class="modal-body">
                <?php include "formOrderUpdateClientRef.php"; ?>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><?php _t("Close"); ?></button>
            </div>

        </div>
    </div>
</div>