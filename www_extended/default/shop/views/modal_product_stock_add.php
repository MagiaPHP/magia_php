
<button type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#stock_add">
    <span class="glyphicon glyphicon-plus-sign"></span>
    <?php _t("Add stock"); ?>
</button>


<div class="modal fade" id="stock_add" tabindex="-1" role="dialog" aria-labelledby="stock_addLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="stock_addLabel">
                    <?php _t("Add stock"); ?>
                </h4>
            </div>
            <div class="modal-body">
                <?php include "form_product_stock_add.php"; ?> 
            </div>
        </div>
    </div>
</div>