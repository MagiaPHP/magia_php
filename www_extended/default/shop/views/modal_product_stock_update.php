<!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#stock_update">
    <span class="glyphicon glyphicon-pencil"></span>
    <?php _t("Update"); ?>
</button>

<!-- Modal -->
<div class="modal fade" id="stock_update" tabindex="-1" role="dialog" aria-labelledby="stock_updateLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="stock_updateLabel">
                    <?php _t("Update stock"); ?>
                </h4>
            </div>
            <div class="modal-body">
                <?php include "form_stock_update.php"; ?> 
            </div>
        </div>
    </div>
</div>