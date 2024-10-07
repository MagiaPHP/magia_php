
<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addresses_add">
    <span class="glyphicon glyphicon-plus-sign"></span>
    <?php _t("Add new"); ?>
</button>

<div class="modal fade" id="addresses_add" tabindex="-1" role="dialog" aria-labelledby="addresses_addLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="addresses_addLabel"><?php _t("Add new"); ?></h4>
            </div>
            <div class="modal-body">
                <?php include "formAddressNew.php"; ?>
            </div>
        </div>
    </div>
</div>

