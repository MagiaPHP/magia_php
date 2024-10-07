<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#contacts_banks_add">
    <?php _t("New"); ?>
</button>


<div class="modal fade" id="contacts_banks_add" tabindex="-1" role="dialog" aria-labelledby="contacts_banks_addLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="contacts_banks_addLabel">
                    <?php _t("Add new banks"); ?>    
                </h4>
            </div>
            <div class="modal-body">
                <?php include "form_contacts_banks_add.php"; ?>
            </div>


        </div>
    </div>
</div>