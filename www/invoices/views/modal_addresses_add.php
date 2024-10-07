<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_addresses_add">
    <span class="glyphicon glyphicon-plus-sign"></span> <?php _t("Add Addresses"); ?>
</button>


<div class="modal fade" id="modal_addresses_add" tabindex="-1" role="dialog" aria-labelledby="modal_addresses_addLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="modal_addresses_addLabel"><?php _t("Add Addresses"); ?></h4>
            </div>
            <div class="modal-body">
                <?php
                include "form_addresses_add.php";
                ?>
            </div>
        </div>
    </div>
</div>