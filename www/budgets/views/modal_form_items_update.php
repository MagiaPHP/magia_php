<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_form_items_update">
    <?php _t("Registre payment"); ?>
</button>


<div class="modal fade" id="modal_form_items_update" tabindex="-1" role="dialog" aria-labelledby="modal_form_items_updateLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="modal_form_items_updateLabel">Modal title</h4>
            </div>
            <div class="modal-body">
                <?php
                include "form_items_update.php";
                ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>